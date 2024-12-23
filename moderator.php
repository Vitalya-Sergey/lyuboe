<?php session_start();
include_once('api/db.php');

if(array_key_exists('token', $_SESSION)){
    $token=$_SESSION['token'];
    $userId = $db->query("
        SELECT id, type FROM users WHERE api_token= '$token'
        ")->fetchAll();
        
        if(empty($userId)){
            unset($_SESSION['token']);
            header('Location: login.php');
        } else{
            $type = $userId[0]['type'];
            if($type != 'mod'){
                header('Location: index.php');
            }
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
    <link rel="stylesheet" href="styles/settings.css">
    <link rel="stylesheet" href="styles/pages/moder.css">
    <title>Новая жизнь | Модератор</title>
</head>
<body>
    <header>
        <div class="container">
            <a href="index.php">< На главную</a>
        </div>
            </header>

            <main>
                <section class="filter">
                    <div class="container">
                        <label for="date-form">От</label>
                        <input type="date" name="date-form" id="date-form">
                        <label for="date-form">До</label>
                        <input type="date" name="date-to" id="date-to">
                        <select name="type" id="type">
                            <option value="0">На модерации</option>
                            <option value="1">Активно</option>
                            <option value="2">Найдено</option>
                            <option value="3">В архиве</option>        
                        </select>
                        <button class="bu" type="submit">Поиск</button>
                        </div>
                        </section>

                <section class="items">
                    <div class="container">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="img/d.jpg" alt="Найденный кот">
                                    <div class="animal-info">
                                        <h3>Кот</h3>
                                        <p>Найден в парке, заблудился во время прогулки.</p>
                                        <a href="#details-cat" class="details-button">Подробнее</a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <img src="img/h.jpg" alt="Найденная собака">
                                    <div class="animal-info">
                                        <h3>Собака</h3>
                                        <p>Нашли на улице, искала своего хозяина.</p>
                                        <a href="#details-dog" class="details-button">Подробнее</a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <img src="img/v.jpg" alt="Найденный вомбат">
                                    <div class="animal-info">
                                        <h3>Кот</h3>
                                        <p>Найден в лесу, возможно, сбежал из питомника.</p>
                                        <a href="#details-wombat" class="details-button">Подробнее</a>
                                    </div>
                                </div>
                               
                    </div>
                </section>
                </main>
</body>
</html>