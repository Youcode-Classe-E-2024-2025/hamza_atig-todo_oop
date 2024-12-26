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