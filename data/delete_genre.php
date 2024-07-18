<?php
    // Запуск сессии
    session_start();

    // Подключение БД
    require("db.php");

    // Переменные с данными $_POST
    $name = $_POST["genrenamedelete"];

    // Валидация данных
    if (empty($name)) {
        $_SESSION["alert-genre-delete"] = 'Fill all the fields';
        header("Location: /admin.php");
    } else if (strlen($name) > 70) {
        $_SESSION["alert-genre-delete"] = 'Name must be under 70 characters.';
        header("Location: /admin.php");
    } else {
        $_SESSION["alert-genre-delete"] = "Success delete";
        header("Location: /admin.php");
    }

    // Добавление значений в базу данных
    $sql = "DELETE FROM `genre` WHERE `name` = :name";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "name" => $name
    ]);