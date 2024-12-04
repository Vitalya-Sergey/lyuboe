<?php session_start();

include_once './db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $formData = array_map('trim', $_POST); // Очищаем данные от лишних пробелов
    $fields = [
        'name',
        'surname',
        'email',
        'phone',
        'password',
        'password_confirm', 
        'agree'
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

    if ($formData['password'] !== $formData['password_confirm']) {
        $errors['password_confirm'][] = 'Пароли не совпадают | par ne sovp';
    }

    $phone = $formData['phone'];
    $user = $db->query("SELECT id FROM users WHERE phone = '$phone'"
    )->fetchAll();
    if(!empty($user)){
        $errors['phone'][] = 'TAKOY UZE ECT';
    }

    if (empty($errors)){
        $request = $db->
        prepare("
      INSERT INTO `users`(`name`, `surname`, `email`, `phone`, `passwords`, `agree`) 
      VALUES (?,?,?,?,?,?)
        ")->execute([
            $formData['name'],
            $formData['surname'],
            $formData['email'],
            $formData['phone'],
           password_hash($formData['password'], PASSWORD_BCRYPT),
            $formData['agree'] ? 1:0,
        ]);
        $_SESSION['register-errors'] =[];
        header('Location: ../login.php');
    }

    if (!empty($errors)){
        $_SESSION['register-errors'] = $errors;
        header('Location: ../register.php');
    }

    echo json_encode($errors);
    exit;
}

?>


