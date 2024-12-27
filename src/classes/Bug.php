<?php

require_once __DIR__ . '/Task.php';

class Bug extends Task {
    private string $severity;

    public const SEVERITY_LOW = 'LOW';
    public const SEVERITY_MEDIUM = 'MEDIUM';
    public const SEVERITY_HIGH = 'HIGH';
    public const SEVERITY_CRITICAL = 'CRITICAL';

    public function __construct(string $title, string $description, string $severity, ?int $assignedTo = null) {
        parent::__construct($title, $description, $assignedTo);
        $this->setSeverity($severity);
    }

    public function getSeverity(): string {
        return $this->severity;
    }

    public function setSeverity(string $severity): void {
        if (!in_array($severity, [self::SEVERITY_LOW, self::SEVERITY_MEDIUM, self::SEVERITY_HIGH, self::SEVERITY_CRITICAL])) {
            throw new InvalidArgumentException("Invalid severity level");
        }
        $this->severity = $severity;
        $this->updateTimestamp();
    }

    public function getType(): string {
        return 'BUG';
    }
}
