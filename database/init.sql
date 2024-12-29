-- Use database
USE taskmanager_db;

-- Create tasks table
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    due_date DATE NOT NULL,
    status ENUM('To do', 'Doing', 'Done') NOT NULL DEFAULT 'To do',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);