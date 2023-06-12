<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php
    // Check if there is an error message in the URL query parameters
    if (isset($_GET['error'])) {
        if ($_GET['error'] === 'emptyfields') {
            echo "<p>Please fill in all the fields.</p>";
        } elseif ($_GET['error'] === 'invalidlogin') {
            echo "<p>Invalid username or password.</p>";
        }
    }
    ?>
    <form action="login_process.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>