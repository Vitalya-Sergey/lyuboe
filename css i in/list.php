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
        <h1> Список задач </h1>
        <ul>

        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=todo_list;charset=utf8', 'root', null, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

        $todoList = $stmt = $pdo->query("select * from list_todo")->fetchAll();
        // print_r($todoList);

        foreach($todoList as $key => $value){
            $todo = $todoList[$key];
            $id = $todo['id'];
            $title = $todo['title'];
            $desc = $todo['description'];
            $complete = $todo['complete'] ? "Готово" : "Не готово";
            echo "
            <li>
                 <small>
                 <a href='info.php?id=$id'> $id</a> | $complete
                 </small>
                 <h2>$title </h2>
                <p>$desc</p>
            </li>
            ";
        }
        ?>
            <li>
                <h2> Заголовок задач</h2>
                <p> Описание задачи</p>
            </li>
        </ul>
        <a href="index.php">вернуться</a>
    </div>
</body>
</html>