# Nexa Store — Projekt final PHP & MySQL

Mini e-commerce i punuar me PHP procedural/OOP `mysqli`, MySQL, HTML, CSS dhe JavaScript. Projekti përfshin variabla, array, kushte, loops, funksione, forma, validim, superglobals, include/require, cookie/session, lidhje me databazë, regjistrim/hyrje dhe CRUD (Insert, Update, Delete).

## Instalimi me phpMyAdmin

1. Hap `http://localhost/phpmyadmin`.
2. Zgjidh **Import** dhe importo `database/nexa_store.sql`.
3. Projekti përdor kredencialet e ligjëratave (`kebir` / `Kebir123!`). Nëse MySQL juaj ka kredenciale të tjera, ndrysho `DB_USER` dhe `DB_PASS` te `config/database.php`.
4. Hap projektin në browser: `http://localhost/NiveliBackEnd/PHP_MySQL/Ligjerata/ProjektiFinalBackEnd/`.

## Admin paneli

- URL: `admin/` ose hyr përmes `login.php`
- Email: `admin@nexa.test`
- Fjalëkalimi: `Admin123!`

Admini mund të shtojë, ndryshojë, çaktivizojë dhe fshijë produkte, të ngarkojë fotografi, të ndryshojë statusin e porosive dhe të lexojë/fshijë mesazhet.

## Chat support

Nëse databaza është importuar para shtimit të chat-it, importo vetëm `database/chat_support_migration.sql`. Klienti shkruan nga widget-i **Support**, merr përgjigje automatike për pyetjet bazë dhe administratori mund t'i përgjigjet nga **Admin → Support Chat**.

## Faqet kryesore

- `index.php` — ballina
- `products.php` — katalogu me kërkim dhe kategori
- `product.php` — detajet dhe shtimi në shportë
- `cart.php` / `checkout.php` — shporta dhe porosia
- `contact.php` — forma e kontaktit
- `register.php` / `login.php` / `account.php` — përdoruesit
- `admin/` — paneli administrativ dhe CRUD

Fotografitë e ngarkuara ruhen në `uploads/`, ndërsa emri i tyre ruhet në databazë.
