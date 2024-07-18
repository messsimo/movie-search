<?php
    // Запуск сессии
    session_start();

    // Подключение БД
    require("db.php");

    // Переменные с данными $_POST
    $name = $_POST["genrenameadd"];

    // Выборка из БД
    $sql = "SELECT `name` FROM `genre` WHERE `name` = :name";
    $findName = $pdo->prepare($sql); 
    $findName->bindParam(':name', $name, PDO::PARAM_STR);
    $findName->execute();

    // Валидация данных
    if (empty($name) && empty($genre) && empty($rating) && empty($description) && empty($photo)) {
        $_SESSION["alert-genre-add"] = 'Fill all the fields';
        header("Location: /admin.php");
    } else if (strlen($name) > 100) {
        $_SESSION["alert-genre-add"] = 'Name must be under 100 characters.';
        header("Location: /admin.php");
    } else {
        $_SESSION["alert-genre-add"] = 'Success';
        header("Location: /admin.php");
    }

    // Проверка на наличие имени жанра
    if ($findName->rowCount() > 0) {
        $_SESSION["alert-genre-add"] = 'This name has been used.';
        header("Location: /admin.php");
    } else {
        // Добавление значений в базу данных
        $sql = "INSERT INTO `genre` (`name`) VALUES (:name)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "name" => $name,
        ]);
    }

    


