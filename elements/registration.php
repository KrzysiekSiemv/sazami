<?php
    require 'database.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    $login = $_POST['email'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $phone = $_POST['phone'];
    $repass = $_POST['repassword'];

    if(isset($_POST['registerMe'])) {
        $check_email = "SELECT id FROM users WHERE email = '" . $login . "';";
        if(mysqli_num_rows(mysqli_query($conn, $check_email)) == 0) {
            if ($password == $repass) {
                if (isset($_POST['acceptToS'])) {
                    if ($fname != null && $sname != null && $password != null && $login != null) {
                        $pass = password_hash($password, PASSWORD_DEFAULT);
                        $registration = "INSERT INTO users VALUES(NULL, '" . $fname . "', '" . $sname . "', '" . $login . "', '" . $pass . "', NULL, '" . $phone . "', NOW(), NOW(), 0)";
                        mail($login, "Pomyślnie zarejestrowano! - Sazami", "Twoje konto zostało pomyślnie utworzone w serwisie Sazami, " . $fname . "! Życzymy miłego korzystania z usług naszego serwisu.", "Content-Type: text/html; charset=UTF-8");

                        mysqli_query($conn, "INSERT INTO messages VALUES(NULL, '" . $fname . " " . $sname . "', '" . $_POST['email'] . "', 'Pomyślnie zarejestrowano! - Sazami', 'Twoje konto zostało pomyślnie utworzone w serwisie Sazami, " . $fname . "! Życzymy miłego korzystania z usług naszego serwisu.', NOW(), 'sent')");
                        mysqli_query($conn, $registration);


                        $get_token = "SELECT id, NOW() FROM users WHERE users.email = '" . $login . "' AND users.password = '" . $pass . "';";
                        if ($logrow = mysqli_fetch_row(mysqli_query($conn, $get_token))) {
                            mysqli_query($conn, "INSERT INTO login_tokens VALUES (NULL, " . $logrow[0] . ", '" . md5($login . $fname) . "')");
                            setcookie("user_token", md5($login . $fname), time() + 60 * 60 * 24, "/");
                            setcookie("user_id", $logrow[0], time() + 60 * 60 * 24, "/");
                            mysqli_query($conn, "INSERT INTO posts VALUES(NULL, 'Utworzono nowego użytkownika!', 'Użytkownik " . $fname . " " . $sname . " został utworzony " . $logrow[1] . ". Witamy na pokładzie! :D', NOW(), NULL, NULL, NULL);");
                        }
                        header("location: ../dashboard.php");
                    } else {
                        echo "<h3>Nie wszystkie pola zostały wypełnione!</h3><p>Za chwilę zostaniesz przeniesiony do panelu logowania. Jeżeli to nie nastąpi, przejdź za pomocą <a href='../logowanie.php'>linku do panelu logowania</a> </p><script>setTimeout(function(e){window.location.href='../dashboard.php'}, 4000)</script>";
                    }
                } else {
                    echo "<h3>Regulamin serwisu nie został zaakceptowany! Korzystanie z serwisu nie jest możliwe bez jego zaakceptowania!</h3><p>Za chwilę zostaniesz przeniesiony do panelu logowania. Jeżeli to nie nastąpi, przejdź za pomocą <a href='../logowanie.php'>linku do panelu logowania</a> </p><script>setTimeout(function(e){window.location.href='../logowanie.php'}, 4000)</script>";
                }
            } else {
                echo "<h3>Hasła nie są identyczne!</h3><p>Za chwilę zostaniesz przeniesiony do panelu logowania. Jeżeli to nie nastąpi, przejdź za pomocą <a href='../logowanie.php'>linku do panelu logowania</a> </p><script>setTimeout(function(e){window.location.href='../logowanie.php'}, 4000)</script>";
            }
        } else {
            echo "Konto o podanym e-mailu już istnieje. Jeżeli nie pamiętasz hasła, możesz je przypomnieć <a href='#'>tutaj</a>";
        }
    }