<?php
    require 'database.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    if(isset($_POST['removeContact'])){
        echo "
            <script>
                let rem_confirm = confirm('Czy aby na pewno chcesz usunąć ten kontakt?'); 
                if(rem_confirm) 
                    window.location.href = '../dashboard.php?remove_contact=" . $_POST['removeContact'] . "'; 
                else 
                    window.location.href = '../dashboard.php';
            </script>";
    }

    if(isset($_POST['addContact'])){
        if($_POST['name'] != "" && $_POST['surname'] != "" && ($_POST['email'] != "" || $_POST['phone_number'] != "")) {
            mysqli_query($conn, "INSERT INTO contacts VALUES(NULL, '" . $_POST['name'] . "', '" . $_POST['surname'] . "', '" . $_POST['email'] . "', '" . $_POST['phone_number'] . "', '" . $_POST['description'] . "')");
            header("location: ../dashboard.php?success=true");
        } else {
            echo "<h3>Nie wszystkie pola zostały wypełnione!</h3><p>Za chwilę zostaniesz przeniesiony na panel administracyjny. Jeżeli to nie nastąpi, przejdź za pomocą <a href='../dashboard.php'>linku do panelu administracyjnego</a> </p><script>setTimeout(function(e){window.location.href='../dashboard.php'}, 4000)</script>";
        }
    }

    if(isset($_POST['editContact'])){ header("location: ../edit_contact.php?id=" . $_POST['editContact']); }
    if(isset($_POST['sendMsg'])){ header("location: ../mailing.php?send_to=" . $_POST['sendMsg']); }