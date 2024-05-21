<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <form method="POST" action="/reset_password">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
