<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
        max-width: 400px;
        margin: 0 auto;
        margin-top: 100px;
        background-color: #05445E;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-heading {
        text-align: center;
        margin-bottom: 30px;
        color: #F9BE02;
        font-size: 32px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        color: #F9BE02;
        font-weight: bold;
    }

    .form-control {
        height: 40px;
        border-radius: 3px;
        background: linear-gradient(to right, #05445E, #01293A);
        border: none;
        padding-left: 10px;
        color: #FFFFFF;
        font-size: 16px;
    }

    .error-message {
        color: #dc3545;
        margin-bottom: 20px;
        text-align: center;
        font-size: 14px;
    }

    .submit-btn {
        width: 100%;
        height: 40px;
        background: linear-gradient(to right, #F9BE02, #F67E02);
        color: #FFFFFF;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    .submit-btn:hover {
        background: linear-gradient(to right, #F67E02, #E54900);
    }

    .register-link {
        color: #F9BE02;
        font-size: 14px;
    }
    p.text-center {
        color: #f8f9fa;
    }
</style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h1 class="login-heading">Login</h1>
            <?php
            session_start();
                    // Redirect if user is already logged in
        if (isset($_SESSION['user_id'])) {
            // Redirect to the appropriate page based on user role
            if ($_SESSION['role'] == 'admin') {
                header("Location: index.php");
            } else {
                header("Location: home.php");
            }
            exit();
        }

        // Check if there is an error message in session
        $error = '';
        if (isset($_SESSION['login_error'])) {
            $error = $_SESSION['login_error'];
            unset($_SESSION['login_error']);
        }
        if ($error): ?>
            <div class="error-message"><?= $error ?></div>
        <?php endif; ?>
        <form action="login_process.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Login" class="submit-btn">
            </div>
        </form>
        <p class="text-center">Don't have an account? <a href="register.php" class="register-link">Register</a></p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>