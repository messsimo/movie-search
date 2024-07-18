<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reg.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Sign In</title>
</head>
<body>
    <?php
        // Запуск сессии
        session_start();
    ?>

    <!-- Шапка сайта -->
    <header>
        <nav>
            <ul>
                <li><a href="/main.php">Collections</a></li>
                <li><a href="">About us</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </nav>

        <h1>Spectra</h1>
    </header>

    <!-- Секция с формой регистрации и входа -->
    <div class="container">
        <div class="block">
            <div class="sign-form">
                <h1>Sign In</h1>
                <form action="/data/sign_form.php" method="post">
                    <label for="name">Name</label><br>
                    <input type="text" placeholder="Jhon" name="username" id="name"><br>
                    <label for="password">Password</label><br>
                    <input type="password" placeholder="******" name="password" id="password"><br>

                    <span class="alert"><?= $_SESSION["alert-sign"] ?? '' ?></span><br>

                    <button>Sign In</button>
                </form>
            </div>

            <div class="reg-form">
                <h1>Registration</h1>
                <form action="/data/reg_form.php" method="post">
                    <label for="name">Name</label><br>
                    <input type="text" placeholder="Jhon" name="name" id="name"><br>
                    <label for="email">E-mail</label><br>
                    <input type="email" placeholder="jhon@mail.ru" name="email" id="email"><br>
                    <label for="password">Password</label><br>
                    <input type="password" placeholder="******" name="password" id="password"><br>
                    <label for="repassword">Approved password</label><br>
                    <input type="password" placeholder="******" name="rePassword" id="repassword"><br>

                    <span class="alert"><?= $_SESSION["alert-reg"] ?? '' ?></span><br>

                    <button>Registration</button>
                </form>
            </div>
        </div>
    </div>


    <?php
        // Подключение футера сайта
        require_once("blocks/footer.php");
    ?>
</body>
</html>