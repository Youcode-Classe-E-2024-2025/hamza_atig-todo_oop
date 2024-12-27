<?php

abstract class Task {
    protected int $id;
    protected string $title;
    protected string $description;
    protected string $status;
    protected ?int $assignedTo;
    protected DateTime $createdAt;
    protected DateTime $updatedAt;

    // Status constants
    public const STATUS_TODO = 'TODO';
    public const STATUS_IN_PROGRESS = 'IN_PROGRESS';
    public const STATUS_DONE = 'DONE';

    public function __construct(string $title, string $description, ?int $assignedTo = null) {
        $this->title = $title;
        $this->description = $description;
        $this->status = self::STATUS_TODO;
        $this->assignedTo = $assignedTo;
        $this->createdAt = new DateTime();
        $this->updatedAt = new DateTime();
    }

    // Getters
    public function getId(): int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function getAssignedTo(): ?int {
        return $this->assignedTo;
    }

    public function getCreatedAt(): DateTime {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTime {
        return $this->updatedAt;
    }

    // Setters
    public function setTitle(string $title): void {
        $this->title = $title;
        $this->updateTimestamp();
    }

    public function setDescription(string $description): void {
        $this->description = $description;
        $this->updateTimestamp();
    }

    public function setStatus(string $status): void {
        if (!in_array($status, [self::STATUS_TODO, self::STATUS_IN_PROGRESS, self::STATUS_DONE])) {
            throw new InvalidArgumentException("Invalid status");
        }
        $this->status = $status;
        $this->updateTimestamp();
    }

    public function setAssignedTo(?int $userId): void {
        $this->assignedTo = $userId;
        $this->updateTimestamp();
    }

    protected function updateTimestamp(): void {
        $this->updatedAt = new DateTime();
    }

    abstract public function getType(): string;
}
