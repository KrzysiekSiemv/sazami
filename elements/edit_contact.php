<?php
    require 'database.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    if(isset($_POST['saveEdit'])){
        if($_POST['name'] != "" && $_POST['surname'] != "" && ($_POST['email'] != "" || $_POST['phone_number'] != "")){
            $query = "UPDATE contacts SET name = '" . $_POST['name'] . "', surname = '" . $_POST['surname'] . "', email = '" . $_POST['email'] . "', phone_number = " . $_POST['phone_number'] . ", description = '" . $_POST['description'] . "' WHERE id = " . $_POST['saveEdit'] . ";";
            if(mysqli_query($conn, $query)){
                header("location: ../dashboard.php?contact_edit=success");
            }
        } else {
            echo "<h3>Nie wypełniono najważniejszych pól!</h3><p>Za chwilę zostaniesz przeniesiony na panel administracyjny. Jeżeli to nie nastąpi, przejdź za pomocą <a href='../dashboard.php'>linku do panelu administracyjnego</a> </p><script>setTimeout(function(e){window.location.href='../dashboard.php'}, 4000)</script>";
        }
    }