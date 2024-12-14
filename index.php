<?php session_start(); 
include_once 'api/db.php';

$post = $db->query("
SELECT * FROM posts WHERE status = 'active' LIMIT 6
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="lib/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/pages/index.css">
    <link rel="stylesheet" href="styles/settings.css">

    <title>Новая Жизнь | Главная</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <a href="index.php" class="logo">New Live</a>
            <ul>
                <li>
                    <a href="poisk.php">Поиск  <i class="fa fa-search" aria-hidden="true"></i></a>
                </li>
                <li><a href="register.php">Регистрация  <i class="fa fa-at" aria-hidden="true"></i></a>
                </li>
                <li><a href="user.php">Личный кабинет  <i class="fa fa-user" aria-hidden="true"></i></a>      
                </li>
                <li><a href="add.php">Добавить  <i class="fa fa-plus" aria-hidden="true"></i></a>
                </li>
                <li><a href="info.php">Отзывы  <i class="fa fa-commenting" aria-hidden="true"></i></a>
                </li>
                <?php if(array_key_exists('token', $_SESSION)){
                    echo"<li><a class='reviews' href='api/logoutUser.php'>Выход  <i class='fa fa-sign-out' aria-hidden='true'></i> </a> </li>";
                }
                ?>

            </ul>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php
                            foreach($post as $key => $value){
                                $type = $value['type_animal'];
                                $desc = $value['description'];
                                $id = $value['id'];
                                echo "
                                    <div class='swiper-slide'>
                                    <img src='img/d.jpg' alt='Найденный кот'>
                                    <small>$type</small>
                                    <p> $desc</p>
                                    <a href='info.php?id=$id' class='details-button'>Подробнее</a>
                                    </div>
                                ";
                            }
                        ?>

                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

        </section>

<section class="short-search"> 
    <div class="container">
        <form>
            <label for="type-animal"> Вид животного</label>
            <select class="sel" name="type-animal" id="type-animal">
                <option value="cat">кот</option>
                <option value="dog">собака</option>
                <option value="rabbit">Кролик</option>
                <option value="hamster">Хомяк</option>
                <option value="parrot">Попугай</option>
                <option value="dr">другое</option>
            </select>
            <button class="bu" type="submit">Поиск  <i class="fa fa-search" aria-hidden="true"></i>
            </button>
           

        </form>
    </div>
</section>

<section class="facts">
<div class="container">
<h2>Факты</h2>
<ul>
    <li>
        <i class="fa fa-paw" aria-hidden="true"></i>
        <h3>Помогли найти более 500 животных</h3>
    </li>
    <li>
        <i class="fa fa-tag" aria-hidden="true"></i>
        <h3>Более трех лет способствуем возвращению питомцев к хозяевам.</h3>
    </li>
    <li>
        <i class="fa fa-angellist" aria-hidden="true"></i>

        <h3>Все услуги оказываются бесплатно.</h3>
    </li>
</ul>

</div>
</section>

<section class="search">
    <div class="container">
        <form>
            <label for="place">Район</label>
            <select class="sel" name="place" id="place">
                <option value="0">Правый берег</option>
                <option value="1">Левый берег</option>
            </select>
            <label for="animal">Вид животного</label>
            <select class="sel" name="animal" id="animal">
                <option value="cat">Кот</option>
                <option value="dog">Собака</option>
                <option value="rabbit">Кролик</option>
                <option value="hamster">Хомяк</option>
                <option value="parrot">Попугай</option>
            </select>
            <button class="bu" type="submit">Поиск</button>
        </form>
        <div class="search_item">
            <img src="img/h.jpg" alt="dog">
            </div>
    </div>
   
</section>

<section class="reviews">
    <div class="container">
    <h2> Отзывы</h2>
        <div class="swiper reviews-swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide"> 
                <div class="an">
                <img src="img/v.jpg" alt="Фото животного" class="animal-photo">
                <h3 class="author-name">Андрей</h3>
                <p class="review-text">нашел кота с помощью этого сайта</p>
                <span class="review-date">Дата отзыва: 01.01.2024</span></div>
                </div>

                <div class="swiper-slide"> 
                    <div class="an">
                  <img src="img/v.jpg" alt="Фото животного" class="animal-photo">
                  <h3 class="author-name">Андрей</h3>
                  <p class="review-text">нашел кота с помощью этого сайта</p>
                  <span class="review-date">Дата отзыва: 01.01.2024</span></div>
                </div>

                <div class="swiper-slide"> 
                    <div class="an">
                  <img src="img/v.jpg" alt="Фото животного" class="animal-photo">
                  <h3 class="author-name">Андрей</h3>
                  <p class="review-text">нашел кота с помощью этого сайта</p>
                  <span class="review-date">Дата отзыва: 01.01.2024</span></div>
                </div>

                <div class="swiper-slide"> 
                    <div class="an">
                  <img src="img/v.jpg" alt="Фото животного" class="animal-photo">
                  <h3 class="author-name">Андрей</h3>
                  <p class="review-text">нашел кота с помощью этого сайта</p>
                  <span class="review-date">Дата отзыва: 01.01.2024</span></div>
                </div>
         </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
          </div>

    </div>
</section>


<section class="sub">
<div class="container">
    <form >
<input class="ema" type="email" name="email" id="email" placeholder="example">
<input class="ema" type="checkbox" name="agree" id="agree">
<label for="agree">Соглавие на обработку персональных данных</label>
<button class="bu">Подписаться</button>
    </form>
</div>
</section>

    </main>

<footer>
    <div class="container">
        <div class="footer_item">
            <a class="telephone" href="tel:88005553535"><i class="fa fa-phone" aria-hidden="true"></i>
                  8(800)555-35-35</a>
            <a class="mail" href="mailto:mail@newlife.ru"><i class="fa fa-envelope" aria-hidden="true"></i>  mail@newlife.ru</a>
        </div>
            <div class="footer_item">
            <ul>
                <li>
                    <a href="index.php">Главная</a>
                </li>
                <li><a href="register.php">Регистрация</a>
                </li>
                <li><a href="login.php">Авторизация</a>      
                </li>
                <li><a href="user.php">Личный кабинет</a>
                </li>
                <li><a href="info.php">Найденно животное</a>
                </li>
                <li><a href="poisk.php">Поиск</a>
                </li>

            </ul>
        </div>
        
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints:{
                992:{
                    slidesPerView: 3,
                },
                576:{
                    slidesPerView: 2,
                },
                0:{
                    slidesPerView: 1,
                }
            }

        });

        var reviewsSwiper = new Swiper(".reviews-swiper", {
            spaceBetween: 30,
            pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
            },
            navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
         },
            breakpoints:{
                992:{
                    slidesPerView: 3,
                },
                576:{
                    slidesPerView: 2,
                },
                0:{
                    slidesPerView: 1,
                }
            }
        
    });
    </script>
</body>

</html>