<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/support_schema.php';
header('Content-Type: application/json; charset=utf-8');

$conversationId = (int)($_SESSION['support_conversation_id'] ?? 0);
$token = $_SESSION['support_token'] ?? '';
$after = max(0, (int)($_GET['after'] ?? 0));

if (!$conversationId || !$token) {
    echo json_encode(['has_conversation'=>false, 'status'=>'open', 'messages'=>[]]);
    exit;
}

try {
    ensure_support_tables($db);
    $check = $db->prepare('SELECT status FROM support_conversations WHERE id=? AND session_token=?');
    $check->bind_param('is', $conversationId, $token);
    $check->execute();
    $conversation = $check->get_result()->fetch_assoc();
    if (!$conversation) {
        unset($_SESSION['support_conversation_id']);
        echo json_encode(['has_conversation'=>false, 'status'=>'open', 'messages'=>[]]);
        exit;
    }

    $stmt = $db->prepare('SELECT id,sender,message,DATE_FORMAT(created_at, "%H:%i") AS time FROM support_messages WHERE conversation_id=? AND id>? ORDER BY id ASC');
    $stmt->bind_param('ii', $conversationId, $after);
    $stmt->execute();
    echo json_encode([
        'has_conversation'=>true,
        'status'=>$conversation['status'],
        'messages'=>$stmt->get_result()->fetch_all(MYSQLI_ASSOC)
    ], JSON_UNESCAPED_UNICODE);
} catch (mysqli_sql_exception $exception) {
    http_response_code(500);
    echo json_encode(['error'=>'Chat-i nuk është instaluar. Importo database/chat_support_migration.sql.'], JSON_UNESCAPED_UNICODE);
}
