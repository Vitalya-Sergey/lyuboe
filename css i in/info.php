<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php
    $id = $_GET['id'];
    $pdo = new PDO('mysql:host=localhost;dbname=todo_list;charset=utf8', 'root', null, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

     $todo = $pdo->query("select * from list_todo where id = $id")->fetchAll();
     print_r($todo);

?>
</body>
</html>