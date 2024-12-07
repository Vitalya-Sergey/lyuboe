<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lib/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/pages/add.css">
    <link rel="stylesheet" href="styles/settings.css">
    <title>Новая жизнь | Новое Обьявление</title>
</head>
<body>
    <header>
        <div class="container">
            <a href="index.php">< На главную</a>
                    </div>
    </header>

    <main>
        <section class="add">
        <div class="container">
<form >

    <label class="f" for="phone">Номер телефона</label>
    <input type="tel" name="phone" id="phone" placeholder="Введите номер телефона">
    <label for="phone">Почта</label>
    <input type="email" name="email" id="email" placeholder="Введите адрес почты">
    <label for="type-animal"> Вид животного</label>

    <select  name="type-animal" id="type-animal">
        <option value="cat">кот</option>
        <option value="dog">собака</option>
        <option value="rabbit">Кролик</option>
        <option value="hamster">Хомяк</option>
        <option value="parrot">Попугай</option>
        <option value="dr">другое</option>
    </select>

 <label for="photo">Фотографии животного</label>
    <input type="file" name="photo" id="photo">
<label for="desc">Дополнительная информация</label>
    <textarea name="desc" id="desc"></textarea>
    <label for="mark">Клеймо (если есть)</label>
    <input type="text" name="mark" id="mark">
    <select name="place" id="place">
        <option value="0">Правый берег</option>
        <option value="1">Левый берег</option>
    </select>
    <label for="date">Дата</label>
    <input type="date" name="date" id="date">
    <label for="agree">
        <input type="checkbox" name="agree" id="agree">
        Согласие на обработку персональных данных
    </label>
    <button class="bu" type="submit">Отправить на модерацию</button>
</form>
        </div>
    </section>
  </main>
</body>
</html>