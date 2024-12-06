<?php session_start();

include_once './db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $formData = array_map('trim', $_POST); // Очищаем данные от лишних пробелов
    $fields = [
        'email',
        'phone',
    ];
    $errors = [];
    foreach($formData as $key => $value){
        $formData[$key] = htmlspecialchars($value);
    }
 
    // Базовая проверка на заполненность
    foreach ($fields as $idx => $field) {
        if (array_key_exists($field, $formData)) {
         if($formData[$field]){
            continue;
         }
        }
        $errors[$field][]= 'zapolni eto pole plz';
    }

    if (!empty($errors)){
       echo 123;
    }

    if (!empty($errors)){
        $_SESSION['auth-errors'] = $errors;
        header('Location: ../login.php');
    }
    echo json_encode($errors);
    exit;
}
?>

