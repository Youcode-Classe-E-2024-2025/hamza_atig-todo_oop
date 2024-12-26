<?php

try {
    $pdo = new PDO(
        "mysql:host=localhost",
        "root",
        "",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );

    $pdo->exec("CREATE DATABASE IF NOT EXISTS taskflow");
    echo "Database created successfully\n";

    $pdo->exec("USE taskflow");

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            email VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            created_at DATETIME NOT NULL
        )
    ");
    echo "Users table created successfully\n";

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS tasks (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(100) NOT NULL,
            description TEXT,
            status ENUM('TODO', 'IN_PROGRESS', 'DONE') NOT NULL DEFAULT 'TODO',
            type ENUM('BUG', 'FEATURE') NOT NULL,
            assigned_to INT,
            created_at DATETIME NOT NULL,
            updated_at DATETIME NOT NULL,
            severity ENUM('LOW', 'MEDIUM', 'HIGH', 'CRITICAL') NULL,
            priority ENUM('LOW', 'MEDIUM', 'HIGH') NULL,
            deadline DATETIME NULL,
            FOREIGN KEY (assigned_to) REFERENCES users(id) ON DELETE SET NULL
        )
    ");
    echo "Tasks table created successfully\n";

    $password = password_hash("test123", PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("
        INSERT INTO users (username, email, password, created_at)
        VALUES (?, ?, ?, NOW())
        ON DUPLICATE KEY UPDATE id=id
    ");
    $stmt->execute(['test_user', 'test@example.com', $password]);
    echo "Test user created successfully\n";

} catch (PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
}
