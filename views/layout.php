<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - <?php echo $pageTitle ?? 'Task Management'; ?></title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" type="image/png" href="/favicon.png">
    <meta name="theme-color" content="#3498db">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <h1>TaskFlow</h1>
                <nav>
                    <a href="/" class="btn">Dashboard</a>
                    <a href="/tasks.php" class="btn">Tasks</a>
                    <a href="/tasks_create.php" class="btn">Create Task</a>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <span class="user-info">
                            Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>
                            <a href="/logout.php" class="btn btn-danger">Logout</a>
                        </span>
                    <?php else: ?>
                        <a href="/login.php" class="btn">Login</a>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
    </header>

    <main class="container">
        <?php if (isset($_SESSION['flash_message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['flash_type'] ?? 'success'; ?>">
                <?php 
                    echo $_SESSION['flash_message'];
                    unset($_SESSION['flash_message']);
                    unset($_SESSION['flash_type']);
                ?>
            </div>
        <?php endif; ?>

        <?php if (strpos($_SERVER['REQUEST_URI'], 'tasks.php') !== false): ?>
            <div class="task-search">
                <input type="text" placeholder="Search tasks..." aria-label="Search tasks">
            </div>
        <?php endif; ?>

        <?php echo $content; ?>
    </main>

    <footer class="container">
        <p>&copy; <?php echo date('Y'); ?> TaskFlow. All rights reserved.</p>
    </footer>

    <script src="/js/main.js"></script>
</body>
</html>
