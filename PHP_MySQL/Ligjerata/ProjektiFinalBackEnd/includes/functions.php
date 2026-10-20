<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

function url(string $path = ''): string
{
    $script = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
    $script = preg_replace('#/admin$#', '', $script);
    return rtrim($script, '/') . '/' . ltrim($path, '/');
}

function redirect(string $path): never
{
    header('Location: ' . url($path));
    exit;
}

function flash(string $type, string $message): void
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function verify_csrf(): void
{
    if (!isset($_POST['csrf']) || !hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'])) {
        http_response_code(419);
        exit('Kerkesa skadoi. Rifresko faqen dhe provo perseri.');
    }
}

function is_logged_in(): bool
{
    return isset($_SESSION['user']);
}

function is_admin(): bool
{
    return ($_SESSION['user']['role'] ?? '') === 'admin';
}

function require_admin(): void
{
    if (!is_admin()) {
        flash('error', 'Duhet te hyni si administrator.');
        redirect('login.php');
    }
}

function cart_count(): int
{
    return array_sum($_SESSION['cart'] ?? []);
}

function money(float $amount): string
{
    return number_format($amount, 2, '.', ',') . ' €';
}

function product_image(?string $image): string
{
    if (!$image) {
        return url('assets/images/placeholder.svg');
    }
    if (preg_match('#^https?://#', $image)) {
        return $image;
    }
    return url('uploads/' . rawurlencode(basename($image)));
}
