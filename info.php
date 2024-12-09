<?php session_start();
include_once 'api/db.php';
if (!array_key_exists('id',$_GET)){
  header('Location: poisk.php');
  exit;
}

$id = $_GET['id'];
$post = $db->query("
SELECT * FROM posts WHERE id='$id'
")->fetchAll();

if(empty($post)){
  header('Location: poisk.php');
  exit;
}
echo json_encode($post);

$userId = $post[0]['user_id'];
$user = $db->query("
SELECT * FROM users WHERE id='$userId'
")->fetchAll();
echo json_encode($user);
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="lib/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/settings.css">
    <link rel="stylesheet" href="styles/pages/info.css">
    <title>Новая жизнь | Информация о животном</title>
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
                <div class="info_item">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <img src="img/j.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="img/m.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="img/g.jpg" />
                          </div>
                
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                      </div>
                      <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <img src="img/j.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="img/m.jpg" />
                              </div>
                          <div class="swiper-slide">
                            <img src="img/g.jpg" />
                              </div>
                          
                        </div>
                      </div>
                </div>
                <div class="info_item">
                    <time datetime="29-11-2024">29-11-2024</time>
                    <h2>Собака</h2>
                    <p>Кировский р-н</p>
                    <p>Lorem ipsum dolor sit ameillo sit animias.</p>
                    <p>Иванов Иван</p>
                    <a class="telephone" href="tel:88005553535"><i class="fa fa-phone" aria-hidden="true"></i>
                    8(800)555-35-35</a>
                  <a class="mail" href="mailto:mail@newlife.ru"><i class="fa fa-envelope" aria-hidden="true"></i>  mail@newlife.ru</a>
                </div>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 10,
      slidesPerView: 3,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
    
    });
  </script>
 </body>
 </html>