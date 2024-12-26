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