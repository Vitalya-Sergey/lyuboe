<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/settings.css">
    <link rel="stylesheet" href="styles/pages/register.css">

    <title>Новая жизнь | Регистрация</title>
</head>
<body>

    <div class="nn">
    <?php
        function showError($field){
            $listErrors = $_SESSION['register-errors'];
            if (array_key_exists($field, $listErrors)){  
                $error = implode(',', $listErrors[$field]); 
                 echo "<span class='error'>$error</span>";
            }
        }
        ?>
    
        <form method="POST" action="api/registrationUser.php" class="register-form">
        <h1>Регистрация</h1>
            <label for="name">Имя
            <?php showError('name') ?>
            </label>
            <input type="name" name="name" id="name" placeholder="Введите имя">

            <label for="surname">Фамилия
            <?php showError('surname') ?>
            </label>
            <input type="surname" name="surname" id="surname" placeholder="Введите фамилию">

            <label for="email">email
            <?php showError('email') ?>
            </label>
            <input require type="email" name="email" id="email" placeholder="Введите email">

            <label for="phone">Номер телефона
            <?php showError('phone') ?>
            </label>
            <input type="tel" name="phone" id="phone" placeholder="Введите номер телефона">

            <label for="password">Пароль
            <?php showError('password') ?>
            </label>
            <input type="password" name="password" id="password" placeholder="Введите пароль">
            
            <label for="password">Повтор пароля
            <?php showError('password_confirm') ?>
            </label>
            <input type="password" name="password_confirm" id="password_confirm" placeholder="Введите пароль повторно">

            <label for="checkbox">согласие на обработку персональных данных
            <?php showError('agree') ?>
            </label>
            <input type="checkbox"  name="agree" id="agree">

            <button type="submit">Регистрация</button>
            <a href="login.html">Авторизация</a>
            <a href="index.html">Главная</a>
            
        </div>
        </form>
</body>
</html>