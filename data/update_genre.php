<?php
    // Запуск сессии
    session_start();

    // Подключение БД
    require("db.php");

    // Переменные с данными $_POST
    $id = $_POST["genreid"];
    $name = $_POST["genrename"];

    // Валидация данных
    if (empty($name)) {
        $_SESSION["alert-movie-update"] = 'Fill all the fields';
        header("Location: /admin.php");
    } else if (strlen($name) > 70) {
        $_SESSION["alert-movie-update"] = 'Name must be under 70 characters.';
        header("Location: /admin.php");
    } else {
        $_SESSION["alert-movie-update"] = "Success update";
        header("Location: /admin.php");
    }

    // Добавление значений в базу данных
    $sql = "UPDATE `genre` SET `name` = :name WHERE `id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "id" => $id,
        "name" => $name
    ]);

    


