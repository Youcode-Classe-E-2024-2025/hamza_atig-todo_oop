<?php

require_once __DIR__ . '/Task.php';

class Feature extends Task {
    private string $priority;
    private ?DateTime $deadline;

    public const PRIORITY_LOW = 'LOW';
    public const PRIORITY_MEDIUM = 'MEDIUM';
    public const PRIORITY_HIGH = 'HIGH';

    public function __construct(string $title, string $description, string $priority, ?DateTime $deadline = null, ?int $assignedTo = null) {
        parent::__construct($title, $description, $assignedTo);
        $this->setPriority($priority);
        $this->deadline = $deadline;
    }

    public function getPriority(): string {
        return $this->priority;
    }

    public function getDeadline(): ?DateTime {
        return $this->deadline;
    }

    public function setPriority(string $priority): void {
        if (!in_array($priority, [self::PRIORITY_LOW, self::PRIORITY_MEDIUM, self::PRIORITY_HIGH])) {
            throw new InvalidArgumentException("Invalid priority level");
        }
        $this->priority = $priority;
        $this->updateTimestamp();
    }

    public function setDeadline(?DateTime $deadline): void {
        $this->deadline = $deadline;
        $this->updateTimestamp();
    }

    public function getType(): string {
        return 'FEATURE';
    }
}
