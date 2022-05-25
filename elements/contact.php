<?php
    require 'database.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];
    $time = date('d-m-Y H:i:s');

    if(isset($_POST['send'])){
        if($email != "" && $name != "" && $subject != "" && $content != ""){
            $query = "INSERT INTO messages VALUES (NULL, '" . $name . " " . $surname . "', '" . $email . "', '" . $subject . "', '" . $content . "', NOW())";
            mysqli_query($conn, $query);
            send_copy($subject, $content, $email, $time);
            header("location: ../index.php?sent=success");
        } else
            echo "<h3>Nie wszystkie wymagane pola zostały wypełnione!</h3><p>Za chwilę zostaniesz przeniesiony na stronę główną. Jeżeli to nie nastąpi, przejdź za pomocą <a href='../index.php'>linku do strony głównej</a> </p><script>setTimeout(function(e){window.location.href='../index.php'}, 4000)</script>";
    }

    function send_copy($subject, $content, $email, $time){
        mail($email, "Kopia formularza kontaktowego Sazami", "Oto kopia treści z Twojego formularza kontaktowego, który został wysłany do administratorów serwisu Sazami: \n\n  Temat: " . $subject . " \n  Treść wiadomości:\n  " . $content . "\n  Wysłano: " . $time . "\n\nAdministratorzy postarają się skontaktować z Tobą jak najszybciej. Prosimy sprawdzać folder SPAM/Wiadomości-śmieci.");
    }