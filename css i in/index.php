<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="container">
    <form action="index.php" method="POST">
        <label for="title"> Заголовок </label>
        <input type="text" name="title" id="title">

        <label for="desc"> Описание </label>
        <input type="text" name="desc" id="desc">
        <button type="submit">Добавить задачу</button>
        <a href="list.php">Список задач </a>
    </form>
</div>
</body>
</html>

<?php

$pdo = new PDO('mysql:host=localhost;dbname=todo_list;charset=utf8', 'root', null, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

// $formData = $_POST;

$method = $_SERVER['REQUEST_METHOD'];
if($method === 'POST'){
    $data = $_POST;
    $id = time();
    $title = $data['title'];
    $desc = $data['desc'];

    $stmt = $pdo->prepare("INSERT INTO list_todo (title, description) VALUES (?, ?)");
    $stmt->execute([
        // $formData['title'],
        // $formData['desc']
        $data['title'],
        $data['desc']
    ]);

}
?>