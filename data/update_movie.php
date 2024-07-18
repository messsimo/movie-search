<?php
    // Запуск сессии
    session_start();

    // Подключение БД
    require("db.php");

    // Переменные с данными $_POST
    $id = $_POST["movieid"];
    $name = $_POST["moviename"];
    $genre = $_POST["moviegenre"];
    $rating = $_POST["movierating"];
    $description = $_POST["moviedescription"];
    $photo = $_POST["moviephoto"];

    // Валидация данных
    if (empty($name) && empty($genre) && empty($rating) && empty($description) && empty($photo)) {
        $_SESSION["alert-movie-update"] = 'Fill all the fields';
        header("Location: /admin.php");
    } else if (strlen($name) > 70) {
        $_SESSION["alert-movie-update"] = 'Name must be under 70 characters.';
        header("Location: /admin.php");
    } else if ($rating > 10.00) {
        $_SESSION["alert-movie-update"] = 'Rating must be under "10.0".';
        header("Location: /admin.php");
    } else {
        $_SESSION["alert-movie-update"] = "Success update";
        header("Location: /admin.php");
    }

    // Добавление значений в базу данных
    $sql = "UPDATE `movies` SET `name` = :name, `genre` = :genre, `rating` = :rating, `description` = :description, `photo` = :photo WHERE `id` = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        "id" => $id,
        "name" => $name,
        "genre" => $genre,
        "rating" => $rating,
        "description" => $description,
        "photo" => $photo
    ]);

    


