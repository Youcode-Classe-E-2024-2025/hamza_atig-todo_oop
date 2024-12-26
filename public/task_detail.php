<?php
session_start();
require_once __DIR__ . '/../src/config/database.php';

$pageTitle = 'Task Detail';
$db = Database::getInstance();

if (!isset($_GET['id'])) {
    header('Location: /tasks.php');
    exit;
}

$taskId = (int)$_GET['id'];

// Get task details
$stmt = $db->prepare("
    SELECT t.*, u.username 
    FROM tasks t 
    LEFT JOIN users u ON t.assigned_to = u.id 
    WHERE t.id = ?
");
$stmt->execute([$taskId]);
$task = $stmt->fetch();

if (!$task) {
    $_SESSION['flash_message'] = 'Task not found';
    $_SESSION['flash_type'] = 'error';
    header('Location: /tasks.php');
    exit;
}

// Handle status update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status'])) {
    $newStatus = $_POST['status'];
    $stmt = $db->prepare("UPDATE tasks SET status = ?, updated_at = NOW() WHERE id = ?");
    $stmt->execute([$newStatus, $taskId]);
    
    $_SESSION['flash_message'] = 'Task status updated successfully';
    $_SESSION['flash_type'] = 'success';
    header("Location: /task_detail.php?id=$taskId");
    exit;
}

ob_start();
?>


<div class="task-detail">
    <h2><?php echo htmlspecialchars($task['title']); ?></h2>

    <div class="task-info">
        <div class="info-section">
            <div class="status-section">
                <h3>Status: <span class="status-badge status-<?php echo strtolower($task['status']); ?>"><?php echo $task['status']; ?></span></h3>
                
                <?php if (isset($_SESSION['user_id'])): ?>
                    <form method="POST" class="status-form">
                        <select name="status" onchange="this.form.submit()" class="form-control">
                            <option value="TODO" <?php echo $task['status'] === 'TODO' ? 'selected' : ''; ?>>Todo</option>
                            <option value="IN_PROGRESS" <?php echo $task['status'] === 'IN_PROGRESS' ? 'selected' : ''; ?>>In Progress</option>
                            <option value="DONE" <?php echo $task['status'] === 'DONE' ? 'selected' : ''; ?>>Done</option>
                        </select>
                    </form>
                <?php endif; ?>
            </div>
</div>