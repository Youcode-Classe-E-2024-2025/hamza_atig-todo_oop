<?php

class User {
    private int $id;
    private string $username;
    private string $email;
    private string $password;
    private DateTime $createdAt;

    public function __construct(string $username, string $email, string $password) {
        $this->username = $username;
        $this->email = $email;
        $this->setPassword($password);
        $this->createdAt = new DateTime();
    }

    public function getId(): int {
        return $this->id;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getCreatedAt(): DateTime {
        return $this->createdAt;
    }

    // ----------------
    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function setEmail(string $email): void {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Invalid email format");
        }
        $this->email = $email;
    }

    public function setPassword(string $password): void {
        if (strlen($password) < 6) {
            throw new InvalidArgumentException("Password must be at least 6 characters long");
        }
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function verifyPassword(string $password): bool {
        return password_verify($password, $this->password);
    }
}
