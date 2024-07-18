<?php
    // Запуск сессии
    session_start();

    // Подключение БД
    require("db.php");

    // Переменные с данными $_POST
    $name = $_POST["namedel"];

    // Валидация данных
    if (empty($name)) {
        $_SESSION["alert-movie-delete"] = 'Fill all the fields';
        header("Location: /admin.php");
    } else if (strlen($name) > 70) {
        $_SESSION["alert-movie-delete"] = 'Name must be under 70 characters.';
        header("Location: /admin.php");
    } else {
        $_SESSION["alert-movie-delete"] = "Success delete";
        header("Location: /admin.php");
    }

    // Добавление значений в базу данных
    $sql = "DELETE FROM `movies` WHERE `name` = :name";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "name" => $name
    ]);