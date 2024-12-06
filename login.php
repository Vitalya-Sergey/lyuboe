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
    <?php
        function showError($field){     
            if(!array_key_exists('register-errors', $_SESSION)){
                    echo'';
            } else{
                $listErrors = $_SESSION['auth-errors']; 
            if (array_key_exists($field, $listErrors)){  
                $error = implode(',', $listErrors[$field]); 
                 echo "<span class='error'>$error</span>";
            }    
        }
     }
        ?>
    <form method="POST" action="api/authUser.php" class="login-form">
        <label for="phone">Номер телефона
        <?php showError('phone') ?>
        </label>
        <input type="tel" name="phone" id="phone" placeholder="Введите номер телефона">
        <label for="password">Пароль
        <?php showError('password') ?>
        </label>
        <input type="password" name="password" id="password" placeholder="Введите пароль">
        <button type="submit">Вход</button>
        <a href="register.php">Регистрация</a>
        <a href="index.html">Главная</a>
    </div> 
    </form>
</body>
</html>