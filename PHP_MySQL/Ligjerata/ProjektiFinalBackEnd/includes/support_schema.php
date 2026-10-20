<?php
/**
 * Krijon tabelat e chat-it automatikisht ne instalimet ekzistuese.
 * SQL migration mbetet gjithashtu ne database/ per import manual ne phpMyAdmin.
 */
function ensure_support_tables(mysqli $db): void
{
    if (!empty($_SESSION['support_schema_checked'])) return;

    $db->query("CREATE TABLE IF NOT EXISTS support_conversations (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT UNSIGNED NULL,
        session_token VARCHAR(64) NOT NULL UNIQUE,
        customer_name VARCHAR(100) NOT NULL,
        customer_email VARCHAR(150) NOT NULL,
        status ENUM('open','closed') NOT NULL DEFAULT 'open',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        CONSTRAINT fk_support_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL,
        INDEX idx_support_updated (updated_at),
        INDEX idx_support_status (status)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

    $db->query("CREATE TABLE IF NOT EXISTS support_messages (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        conversation_id INT UNSIGNED NOT NULL,
        sender ENUM('customer','admin','bot') NOT NULL,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        CONSTRAINT fk_support_conversation FOREIGN KEY (conversation_id) REFERENCES support_conversations(id) ON DELETE CASCADE,
        INDEX idx_support_message_conversation (conversation_id, id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

    $_SESSION['support_schema_checked'] = true;
}
