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
</div>


