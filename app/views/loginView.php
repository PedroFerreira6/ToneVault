<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ToneVault</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .login-container { max-width: 400px; margin: auto; }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login to ToneVault</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form action="login/logar" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <br><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
