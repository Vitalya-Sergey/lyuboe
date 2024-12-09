<?php session_start(); 
include_once('api/db.php');

if(array_key_exists('token', $_SESSION)){
    $token=$_SESSION['token'];
    $userId = $db->query("
        SELECT id FROM users WHERE api_token= '$token'
        ")->fetchAll();

        if(empty($userId)){
            unset($_SESSION['token']);
            header('Location: ../login.php');
        }

}else{
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lib/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/pages/user.css">
    <link rel="stylesheet" href="styles/settings.css">
    <title>Новая жизнь | Пользователь</title>
</head>
<body>
    <header>
        <div class="container">
<a href="index.php">< На главную</a>
        </div>
    </header>
    
    <main>
        <section class="info">
<div class="container">
    <div>
        <img src="img/broen.jpg">
    </div>
    <div class="info_item">
<ul>
    <li><b>Личные данные:</b></li>
    <li>Номер телефона: 8 (800) 555 35-35</li>
    <li>Email: <a href="*">Legenda@mail.ru</a></li>
    <li>Количество добавленных объявлений: 8</li>
    <li>Количество животных, которые вернулись к хозяевам: 4  <i class="fa fa-paw" aria-hidden="true"></i></li>
    <li>Дата Регистрации: 11.11.24 (12 дней)</li>
</ul>
    </div>
</div>
        </section>

<section class="hero">
    <div class="container">
        <h2>Обьявления</h2>
        <select name="" id="">
            <option value="0">Активно</option>
            <option value="1">На модерации</option>
            <option value="2">Найдено</option>
            <option value="3">В архиве</option>
        </select>
        <ul>
            <li>
                <img src="img/h.jpg">
                <small>23.11.2024 | Кировский р-н</small>
                <p>
                    Дополнительная информация
                </p>
            </li>
            <li>
                <img src="img/h.jpg">
                <small>23.11.2024 | Кировский р-н</small>
                <p>
                    Дополнительная информация
                </p>
            </li>
            <li>
                <img src="img/h.jpg">
                <small>23.11.2024 | Кировский р-н</small>
                <p>
                    Дополнительная информация
                </p>
            </li>
        </ul>

    </div>
</section>

    </main>
</body>
</html>