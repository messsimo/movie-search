<?php 
    // Запуск сессии
    session_start();

    // Переменные с данными $_POST
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Переменные для отправки почты
    $sendTo = "spectra.call@mail.ru";
    $title = "Question from user";

    // Кодировка темы
    $title = "=?utf-8?B?" . base64_encode($title) . "?=";

    // Заголовок
    $header = "From:$email\r\nReply-to:\r\nContent-Type:text/plain; charset=utf-8";

    // Валидация данных
    if (empty($email) && empty($message)) {
        $_SESSION["alert"] = "Fill ale the fields.";
        header("Location: /index.php");
    } else if (!strpos($email, "@")) {
        $_SESSION["alert"] = "Write corrcect email. Example: spectra@mail.ru";
        header("Location: /index.php");
    } else if (strlen($message) < 10 || strlen($message) > 255) {
        $_SESSION["alert"] = "Your message must be from 10 to 255 characters"; 
        header("Location: /index.php");
    } else {
        $_SESSION["alert"] = "We get your questions. Thank you!";
        header("Location: /index.php");
    }

    // Отправка письма
    $mail = ($sendTo . $title . $message . $header);