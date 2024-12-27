<?php
session_start();
require_once __DIR__ . '/../src/config/database.php';

$pageTitle = 'Home';
$db = Database::getInstance();

// Get task statistics
$stats = [
    'total' => $db->query("SELECT COUNT(*) as count FROM tasks")->fetch()['count'],
    'bugs' => $db->query("SELECT COUNT(*) as count FROM tasks WHERE type = 'BUG'")->fetch()['count'],
    'features' => $db->query("SELECT COUNT(*) as count FROM tasks WHERE type = 'FEATURE'")->fetch()['count'],
    'todo' => $db->query("SELECT COUNT(*) as count FROM tasks WHERE status = 'TODO'")->fetch()['count'],
    'in_progress' => $db->query("SELECT COUNT(*) as count FROM tasks WHERE status = 'IN_PROGRESS'")->fetch()['count'],
    'done' => $db->query("SELECT COUNT(*) as count FROM tasks WHERE status = 'DONE'")->fetch()['count'],
];

// Get recent tasks
$recentTasks = $db->query("
    SELECT t.*, u.username 
    FROM tasks t 
    LEFT JOIN users u ON t.assigned_to = u.id 
    ORDER BY t.created_at DESC 
    LIMIT 5
")->fetchAll();

ob_start();
?>

<div class="dashboard">
    <h2>Dashboard</h2>
    
    <div class="stats">
        <div class="stat-card">
            <h3>Total Tasks</h3>
            <p><?php echo $stats['total']; ?></p>
        </div>
        <div class="stat-card">
            <h3>Bugs</h3>
            <p><?php echo $stats['bugs']; ?></p>
        </div>
        <div class="stat-card">
            <h3>Features</h3>
            <p><?php echo $stats['features']; ?></p>
        </div>
    </div>

    <div class="status-stats">
        <div class="stat-card">
            <h3>Todo</h3>
            <p><?php echo $stats['todo']; ?></p>
        </div>
        <div class="stat-card">
            <h3>In Progress</h3>
            <p><?php echo $stats['in_progress']; ?></p>
        </div>
        <div class="stat-card">
            <h3>Done</h3>
            <p><?php echo $stats['done']; ?></p>
        </div>
    </div>

    <h3>Recent Tasks</h3>
    <div class="task-list">
        <?php foreach ($recentTasks as $task): ?>
            <div class="task-card">
                <h4><?php echo htmlspecialchars($task['title']); ?></h4>
                <p><?php echo htmlspecialchars(substr($task['description'], 0, 100)) . '...'; ?></p>
                <p>Status: <?php echo $task['status']; ?></p>
                <p>Type: <?php echo $task['type']; ?></p>
                <p>Assigned to: <?php echo $task['username'] ?? 'Unassigned'; ?></p>
                <a href="/task_detail.php?id=<?php echo $task['id']; ?>" class="btn">View Details</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../views/layout.php';
