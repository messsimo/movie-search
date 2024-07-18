<?php
    // Запуск сессии
    session_start();

    // Подклчение БД
    require("db.php");

    // Переменные с данными POST
    $username = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $rePassword = $_POST["rePassword"];

    // Валидация данных
    if ($username == "" || $email == "" || $password == "" || $rePassword == "") {
        $_SESSION["alert-reg"] = "Fill all the fields.";
        header("Location: /reg.php");
    } else if (strlen($username) < 2 || strlen($username) > 12) {
        $_SESSION["alert-reg"] = "Your name must be from 3 to 12 characters.";
        header("Location: /reg.php");
    } else if (strlen($password) < 4 || strlen($password) > 12) {
        $_SESSION["alert-reg"] = "Your password must be from 4 to 12 characters.";
        header("Location: /reg.php");
    } else if ($password != $rePassword) {
        $_SESSION["alert-reg"] = "Yours passwords are not similar.";
        header("Location: /reg.php");
    } else if (strpos($email, "@") === false) {
        $_SESSION["alert-reg"] = "Enter valid email. Example: jhon@mail.ru";
        header("Location: /reg.php");
    }

    // Выборка из БД
    $sql = "SELECT `username` FROM `users` WHERE `username` = :username";
    $findName = $pdo->prepare($sql);
    $findName->bindParam(':username', $username, PDO::PARAM_STR);
    $findName->execute();

    $sql = "SELECT `email` FROM `users` WHERE `email` = :email";
    $findEmail = $pdo->prepare($sql);
    $findEmail->bindParam(':email', $email, PDO::PARAM_STR);
    $findEmail->execute();

    // Проверка на наличие записи в БД
    if ($findName->rowCount() > 0) {
        $_SESSION["alert-reg"] = "This name already taken.";
        header("Location: /reg.php");
    } else if ($findEmail->rowCount() > 0) {
        $_SESSION["alert-reg"] = "This email already taken.";
        header("Location: /reg.php");
    } else {
        header("Location: /user.php");

        // Хэширование пароля
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Добавление записей в БД
        $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES (:username, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "username" => $username,
            "email" => $email,
            "password" => $password
        ]);
    }

