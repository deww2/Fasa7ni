<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form Popup</title>
    <link rel="stylesheet" href="Style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>
<body>

<button id="loginButton">Login</button>

<div id="loginPopup">
    <form>
        <h2>Login</h2><br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
        <button type="button" id="closeButton">Close</button>
    </form>
</div>

<script src="Script2.js"></script>
</body>
</html>