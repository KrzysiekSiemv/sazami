<?php
    require 'database.php';
    require 'login_log.php';

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    $login = $_POST['email'];
    $password = $_POST['password'];

    if(isset($_POST['loginMe'])){
        $loginQuery = "SELECT token, users.id, users.password, users.locked FROM login_tokens, users WHERE users.email = '" . $login . "' AND login_tokens.id_user = users.id";
        if($row = mysqli_fetch_row(mysqli_query($conn, $loginQuery))){
            if(password_verify($password, $row[2]) === true) {
                if($row[3] == 0) {
                    putInLog($row[1], $conn);
                    if (isset($_POST['rememberMe'])) {
                        setcookie("user_token", $row[0], time() + 60 * 60 * 24 * 30, "/");
                        setcookie("user_id", $row[1], time() + 60 * 60 * 24 * 30, "/");
                    } else {
                        setcookie("user_token", $row[0], time() + 60 * 60 * 24, "/");
                        setcookie("user_id", $row[1], time() + 60 * 60 * 24, "/");
                    }
                    header("location: ../dashboard.php");
                } else
                    echo "<h3>Twoje konto ma zablokowany dostęp do tego serwisu. Skontaktuj się z administratorem serwisu, aby odblokował Tobie dostęp do naszych usług.</h3><p>Za chwilę zostaniesz przeniesiony do panelu logowania. Jeżeli to nie nastąpi, przejdź za pomocą <a href='../logowanie.php'>linku do panelu logowania</a> </p><script>setTimeout(function(e){window.location.href='../logowanie.php'}, 4000)</script>";
            } else {
                echo "<h3>Podane hasło jest nieprawidłowe!</h3><p>Za chwilę zostaniesz przeniesiony do panelu logowania. Jeżeli to nie nastąpi, przejdź za pomocą <a href='../logowanie.php'>linku do panelu logowania</a> </p><script>setTimeout(function(e){window.location.href='../logowanie.php'}, 4000)</script>";
            }
        } else {
            echo "<h3>Podane konto nie istnieje!</h3><p>Za chwilę zostaniesz przeniesiony do panelu logowania. Jeżeli to nie nastąpi, przejdź za pomocą <a href='../logowanie.php'>linku do panelu logowania</a> </p><script>setTimeout(function(e){window.location.href='../logowanie.php'}, 4000)</script>";
        }
    }