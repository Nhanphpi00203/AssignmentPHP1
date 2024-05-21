<!DOCTYPE html>
<html>
<head>
    <title>Request Password Reset</title>
</head>
<body>
    <form method="POST" action="/request_reset">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Request Password Reset</button>
    </form>
</body>
</html>
