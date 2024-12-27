<?php
session_start();
require_once __DIR__ . '/../src/config/db.php';

$pageTitle = 'Tasks';
$db = Database::getInstance();

// Get filter parameters
$status = $_GET['status'] ?? '';
$type = $_GET['type'] ?? '';
$assignedTo = $_GET['assigned_to'] ?? '';

// Build query
$query = "
    SELECT t.*, u.username 
    FROM tasks t 
    LEFT JOIN users u ON t.assigned_to = u.id 
    WHERE 1=1
";
$params = [];

if ($status) {
    $query .= " AND t.status = ?";
    $params[] = $status;
}

if ($type) {
    $query .= " AND t.type = ?";
    $params[] = $type;
}

if ($assignedTo) {
    $query .= " AND t.assigned_to = ?";
    $params[] = $assignedTo;
}

$query .= " ORDER BY t.created_at DESC";

// Execute query
$stmt = $db->prepare($query);
$stmt->execute($params);
$tasks = $stmt->fetchAll();

// Get users for filter
$users = $db->query("SELECT id, username FROM users")->fetchAll();

ob_start();
?>

<div class="tasks-page">
    <h2>Tasks</h2>

    <div class="filters">
        <form method="GET" class="filter-form">
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="">All</option>
                    <option value="TODO" <?php echo $status === 'TODO' ? 'selected' : ''; ?>>Todo</option>
                    <option value="IN_PROGRESS" <?php echo $status === 'IN_PROGRESS' ? 'selected' : ''; ?>>In Progress</option>
                    <option value="DONE" <?php echo $status === 'DONE' ? 'selected' : ''; ?>>Done</option>
                </select>
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" id="type">
                    <option value="">All</option>
                    <option value="BUG" <?php echo $type === 'BUG' ? 'selected' : ''; ?>>Bug</option>
                    <option value="FEATURE" <?php echo $type === 'FEATURE' ? 'selected' : ''; ?>>Feature</option>
                </select>
            </div>

            <div class="form-group">
                <label for="assigned_to">Assigned To</label>
                <select name="assigned_to" id="assigned_to">
                    <option value="">All</option>
                    <?php foreach ($users as $user): ?>
                        <option value="<?php echo $user['id']; ?>" <?php echo $assignedTo == $user['id'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($user['username']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn">Apply Filters</button>
        </form>
    </div>

    <div class="task-list">
        <?php foreach ($tasks as $task): ?>
            <div class="task-card">
                <h3><?php echo htmlspecialchars($task['title']); ?></h3>
                <p><?php echo htmlspecialchars(substr($task['description'], 0, 100)) . '...'; ?></p>
                
                <div class="task-meta">
                    <p>Status: <span class="status-badge status-<?php echo strtolower($task['status']); ?>"><?php echo $task['status']; ?></span></p>
                    <p>Type: <span class="status-badge"><?php echo $task['type']; ?></span></p>
                    <p>Assigned to: <?php echo $task['username'] ?? 'Unassigned'; ?></p>
                    
                    <?php if ($task['type'] === 'BUG'): ?>
                        <p>Severity: <span class="status-badge"><?php echo $task['severity']; ?></span></p>
                    <?php else: ?>
                        <p>Priority: <span class="status-badge"><?php echo $task['priority']; ?></span></p>
                        <?php if ($task['deadline']): ?>
                            <p>Deadline: <?php echo (new DateTime($task['deadline']))->format('Y-m-d H:i'); ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <div class="task-actions">
                    <a href="/task_detail.php?id=<?php echo $task['id']; ?>" class="btn">View Details</a>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="/task_edit.php?id=<?php echo $task['id']; ?>" class="btn btn-success">Edit</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>

        <?php if (empty($tasks)): ?>
            <p>No tasks found matching your criteria.</p>
        <?php endif; ?>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../views/layout.php';