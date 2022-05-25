<?php
    require 'database.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    if(isset($_POST['submit'])) {
        $oldpass = $_POST['oldpass'];

        $newpass = $_POST['newpass'];
        $repass = $_POST['repass'];
        if($oldpass != "" && $newpass != "" && $repass != "") {
            if ($newpass == $repass) {
                $query1 = "SELECT password, users.id FROM users, login_tokens WHERE token = '" . $_COOKIE['user_token'] . "' AND users.id = login_tokens.id_user;";
                $oldpassword = mysqli_fetch_row(mysqli_query($conn, $query1))[0];
                if(password_verify($oldpass, $oldpassword)){
                    $query2 = "UPDATE users SET password = '" . password_hash($newpass, PASSWORD_DEFAULT) . "', updated_at = NOW() WHERE id = " . mysqli_fetch_row(mysqli_query($conn, $query1))[1] . ";";
                    mysqli_query($conn, $query2);

                    header("location: ../dashboard.php?success=true");
                } else
                    echo "<h3>Nie poprawne stare hasło!</h3><p>Za chwilę zostaniesz przeniesiony na panel administracyjny. Jeżeli to nie nastąpi, przejdź za pomocą <a href='../dashboard.php'>linku do panelu administracyjnego</a> </p><script>setTimeout(function(e){window.location.href='../dashboard.php'}, 4000)</script>";
            } else
                echo "<h3>Hasła nie są identyczne!</h3><p>Za chwilę zostaniesz przeniesiony na panel administracyjny. Jeżeli to nie nastąpi, przejdź za pomocą <a href='../dashboard.php'>linku do panelu administracyjnego</a> </p><script>setTimeout(function(e){window.location.href='../dashboard.php'}, 4000)</script>";
        } else {
            echo "<h3>Nie ma wszystkich wymaganych pól!</h3><p>Za chwilę zostaniesz przeniesiony na panel administracyjny. Jeżeli to nie nastąpi, przejdź za pomocą <a href='../dashboard.php'>linku do panelu administracyjnego</a> </p><script>setTimeout(function(e){window.location.href='../dashboard.php'}, 4000)</script>";
        }
    }

    if(isset($_POST['sendLink'])){
        $new_pass_token = bin2hex(openssl_random_pseudo_bytes(16));
        $id_user = mysqli_fetch_row(mysqli_query($conn, "SELECT users.id FROM users, login_tokens WHERE token = '" . $_COOKIE['user_token'] . "' AND users.id = login_tokens.id_user;"))[0];
        $email = mysqli_fetch_row(mysqli_query($conn, "SELECT email FROM users, login_tokens WHERE token = '" . $_COOKIE['user_token'] . "' AND users.id = login_tokens.id_user;"))[0];
        mysqli_query($conn, "INSERT INTO new_password_tokens VALUES(NULL, " . $id_user . ", '" . $new_pass_token . "', 0, NULL, DATE_ADD(NOW(), INTERVAL 12 HOUR));");

        mail($email, "Zmiana hasła - Sazami", "Oto Twój link do zmiany hasła konta w Sazami: http://localhost/praktyki/zadanie2/change_pass.php?token=" . $new_pass_token . "&user_token=" . $_COOKIE['user_token'] . " \nLink jest ważny tylko 12 godzin od wysłania prośby o zmiane hasła.");
        header("location: ../dashboard.php?sent_link=true");
    }

    if(isset($_POST['sendLinkMail'])){
        $new_pass_token = bin2hex(openssl_random_pseudo_bytes(16));
        $id_user = mysqli_fetch_row(mysqli_query($conn, "SELECT users.id FROM users, login_tokens WHERE email = '" . $_POST['email'] . "' AND users.id = login_tokens.id_user;"))[0];
        mysqli_query($conn, "INSERT INTO new_password_tokens VALUES(NULL, " . $id_user . ", '" . $new_pass_token . "', 0, NULL, DATE_ADD(NOW(), INTERVAL 12 HOUR));");

        mail($_POST['email'], "Zmiana hasła - Sazami", "Oto Twój link do zmiany hasła konta w Sazami: http://localhost/praktyki/zadanie2/change_pass.php?token=" . $new_pass_token . "&user_token=" . $_COOKIE['user_token'] . " \nLink jest ważny tylko 12 godzin od wysłania prośby o zmiane hasła.");
        header("location: ../dashboard.php?sent_link=true");
    }

    if(isset($_POST['submitNewPassword'])){
        $newpass = $_POST['newpass'];
        $repass = $_POST['repass'];

        if($newpass == $repass) {
            $query2 = "UPDATE users SET password = '" . password_hash($newpass, PASSWORD_DEFAULT) . "', updated_at = NOW() WHERE id = " . $_POST['user_id'] . ";";
            mysqli_query($conn, $query2);
            mysqli_query($conn, "UPDATE new_password_tokens SET is_used = 1 WHERE np_token = '" . $_POST['token'] . "';");
            header("location: ../logowanie.php?success=true");
        }
    }