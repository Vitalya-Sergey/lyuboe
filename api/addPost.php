<?php
session_start();
include_once './db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Проверка наличия токена в сессии
    if (array_key_exists('token', $_SESSION)) {
        $token = $_SESSION['token'];

        // Получение ID пользователя по токену
        $stmt = $db->prepare("SELECT id FROM users WHERE api_token = :token");
        $stmt->execute(['token' => $token]);
        $userId = $stmt->fetch();

        // Если пользователь не найден, перенаправляем на страницу входа
        if (!$userId) {
            unset($_SESSION['token']);
            header('Location: ../login.php');
            exit;
        }
    } else {
        header('Location: ../login.php');
        exit;
    }

    // Получение и валидация данных из формы
    $animalType = $_POST['type-animal'];
    $description= $_POST['desc'];
   $mark = $_POST['mark'];
   $address = $_POST['address'];
   $date_found = $_POST['date'];
 
    // Вставка данных в таблицу posts
    $stmt = $db->prepare("
        INSERT INTO posts (user_id, type_animal, description, mark, address, date_found) 
        VALUES (?, ?, ?, ?, ?, ?)
    ");
    
    // Выполнение запроса
    $result = $stmt->execute([
        $userId['id'], // ID текущего пользователя
        $animalType,
        $description,
        $mark,
        $address,
        $date_found,
    ]);

    // Проверка успешности вставки
    if ($result) {
        echo "Информация о животном успешно добавлена.";
    } else {
        echo "Ошибка при добавлении информации. Пожалуйста, попробуйте снова.";
    }
} else {
    echo 'Неверный запрос.';
}
?>
