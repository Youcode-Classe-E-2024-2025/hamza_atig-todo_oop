<?php
session_start();
require_once __DIR__ . '/./src/config/db.php';
require_once __DIR__ . '/./src/classes/User.php';

$pageTitle = 'Login';
$db = Database::getInstance();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $userData = $stmt->fetch();

    if ($userData) {
        $user = new User($userData['username'], $userData['email'], '');
        
        if (password_verify($password, $userData['password'])) {
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['username'] = $userData['username'];
            
            $_SESSION['flash_message'] = 'Welcome back, ' . $userData['username'] . '!';
            $_SESSION['flash_type'] = 'success';
            
            header('Location: /');
            exit;
        }
    }

    $_SESSION['flash_message'] = 'Invalid email or password';
    $_SESSION['flash_type'] = 'error';
}

ob_start();
?>

<div class="login-page">
    <h2>Login</h2>

    <form method="POST" class="login-form">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit" class="btn">Login</button>
    </form>
</div>

<?php
