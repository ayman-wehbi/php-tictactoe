<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    try {
        $stmt->execute([$username, $password]);
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    <div class="container">
        <h3 class="center-align">Register</h3>
        <?php if (isset($error)): ?>
            <div class="card-panel red lighten-2 white-text"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="input-field">
                <input type="text" id="username" name="username" required>
                <label for="username">Username</label>
            </div>
            <div class="input-field">
                <input type="password" id="password" name="password" required>
                <label for="password">Password</label>
            </div>
            <button type="submit" class="btn waves-effect waves-light">Register</button>
            <a href="login.php" class="btn-flat">Login</a>
        </form>
    </div>
</body>
</html>
