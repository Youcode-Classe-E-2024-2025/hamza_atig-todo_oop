<?php
session_start();
require_once __DIR__ . '/../src/config/db.php';
require_once __DIR__ . '/../src/classes/Bug.php';
require_once __DIR__ . '/../src/classes/Feature.php';

$pageTitle = 'Create Task';
$db = Database::getInstance();

// Get all users for assignment
$users = $db->query("SELECT id, username FROM users")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $type = $_POST['type'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $assignedTo = !empty($_POST['assigned_to']) ? (int)$_POST['assigned_to'] : null;

        // Create the appropriate task type
        if ($type === 'BUG') {
            $severity = $_POST['severity'];
            $task = new Bug($title, $description, $severity, $assignedTo);
        } else {
            $priority = $_POST['priority'];
            $deadline = !empty($_POST['deadline']) ? new DateTime($_POST['deadline']) : null;
            $task = new Feature($title, $description, $priority, $deadline, $assignedTo);
        }

        // Insert into database
        $stmt = $db->prepare("
            INSERT INTO tasks (title, description, type, status, assigned_to, created_at, updated_at, severity, priority, deadline)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $task->getTitle(),
            $task->getDescription(),
            $task->getType(),
            $task->getStatus(),
            $task->getAssignedTo(),
            $task->getCreatedAt()->format('Y-m-d H:i:s'),
            $task->getUpdatedAt()->format('Y-m-d H:i:s'),
            $type === 'BUG' ? $task->getSeverity() : null,
            $type === 'FEATURE' ? $task->getPriority() : null,
            $type === 'FEATURE' && $task->getDeadline() ? $task->getDeadline()->format('Y-m-d H:i:s') : null
        ]);

        $_SESSION['flash_message'] = 'Task created successfully!';
        $_SESSION['flash_type'] = 'success';
        header('Location: /tasks.php');
        exit;
    } catch (Exception $e) {
        $_SESSION['flash_message'] = 'Error creating task: ' . $e->getMessage();
        $_SESSION['flash_type'] = 'error';
    }
}

ob_start();
?>

<h2>Create New Task</h2>

<form method="POST" class="task-form">
    <div class="form-group">
        <label for="type">Task Type</label>
        <select name="type" id="type" required>
            <option value="BUG">Bug</option>
            <option value="FEATURE">Feature</option>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="4" required></textarea>
    </div>

    <div class="form-group">
        <label for="assigned_to">Assign To</label>
        <select name="assigned_to" id="assigned_to">
            <option value="">Unassigned</option>
            <?php foreach ($users as $user): ?>
                <option value="<?php echo $user['id']; ?>">
                    <?php echo htmlspecialchars($user['username']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="bug-fields" style="display: none;">
        <div class="form-group">
            <label for="severity">Severity</label>
            <select name="severity" id="severity">
                <option value="LOW">Low</option>
                <option value="MEDIUM">Medium</option>
                <option value="HIGH">High</option>
                <option value="CRITICAL">Critical</option>
            </select>
        </div>
    </div>

    <div class="feature-fields" style="display: none;">
        <div class="form-group">
            <label for="priority">Priority</label>
            <select name="priority" id="priority">
                <option value="LOW">Low</option>
                <option value="MEDIUM">Medium</option>
                <option value="HIGH">High</option>
            </select>
        </div>

        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="datetime-local" name="deadline" id="deadline">
        </div>
    </div>

    <button type="submit" class="btn">Create Task</button>
</form>

<script>
document.getElementById('type').addEventListener('change', function() {
    const bugFields = document.querySelector('.bug-fields');
    const featureFields = document.querySelector('.feature-fields');
    
    if (this.value === 'BUG') {
        bugFields.style.display = 'block';
        featureFields.style.display = 'none';
    } else {
        bugFields.style.display = 'none';
        featureFields.style.display = 'block';
    }
});

// Show initial fields based on default selection
document.getElementById('type').dispatchEvent(new Event('change'));
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../views/layout.php';