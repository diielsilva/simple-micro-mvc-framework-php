<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>
</head>

<body>
    <h1>Login Page</h1>
    <form action=<?= BASE_LINK . '/public/?ctrl=UserController&mtd=attemptAuthenticate' ?> method="post">
        <input type="text" name="username" required>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
</body>

</html>