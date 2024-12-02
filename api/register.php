<?php

include_once './db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $formData = array_map('trim', $_POST); // Очищаем данные от лишних пробелов
    $fields = [
        'name',
        'surname',
        'email',
        'phone',
        'password',
        'password_confirm', // Изменено с duplicate 'password'
        'agree'
    ];
    $errors = [];

    // Базовая проверка на заполненность
    foreach ($fields as $field) {
        if (empty($formData[$field])) {
            $errors[$field] = 'Поле необходимо заполнить';
        }
    }

    // Валидация email
    if (!empty($formData['email'])) {
        if (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Неверный формат email';
        } else {
            // Проверка уникальности email
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
            $stmt->execute([$formData['email']]);
            if ($stmt->fetchColumn() > 0) {
                $errors['email'] = 'Такой email уже зарегистрирован';
            }
        }
    }

    // Валидация телефона
    if (!empty($formData['phone'])) {
        $phone = preg_replace('/[^0-9]/', '', $formData['phone']);
        if (strlen($phone) < 10 || strlen($phone) > 12) {
            $errors['phone'] = 'Неверный формат телефона';
        }
    }

    // Проверка пароля
    if (!empty($formData['password'])) {
        if (strlen($formData['password']) < 8) {
            $errors['password'] = 'Пароль должен быть не менее 8 символов';
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $formData['password'])) {
            $errors['password'] = 'Пароль должен содержать буквы в верхнем и нижнем регистре и цифры';
        }
        
        // Проверка совпадения паролей
        if ($formData['password'] !== $formData['password_confirm']) {
            $errors['password_confirm'] = 'Пароли не совпадают';
        }
    }

    if (empty($errors)) {
        // Если ошибок нет, хешируем пароль
        $hashedPassword = password_hash($formData['password'], PASSWORD_DEFAULT);
        
        // Здесь можно добавить код для сохранения данных в базу
        $response = ['success' => true, 'message' => 'Данные успешно проверены'];
    } else {
        $response = ['success' => false, 'errors' => $errors];
    }

    echo json_encode($response);
    exit;
}

?>


