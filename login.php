<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/settings.css">
    <link rel="stylesheet" href="styles/pages/login.css">

    <title>Новая жизнь | Вход</title>
</head>
<body>
    <div class="nn">
    <h1>Авторизация</h1>
    <form method="POST" action="api/authUser.php" class="login-form">
        <label for="phone">Номер телефона</label>
        <input type="tel" name="phone" id="phone" placeholder="Введите номер телефона">
        <label for="password">Пароль</label>
        <input type="password" name="password" id="password" placeholder="Введите пароль">
        <button type="submit">Вход</button>
        <a href="register.php">Регистрация</a>
        <a href="index.html">Главная</a>
    </div>
    </form>
</body>
</html>