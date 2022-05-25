<?php
    require 'database.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    if(isset($_POST['removeThem'])){
        $users = "";
        if(!empty($_POST['selectedusr'])){
            foreach ($_POST['selectedusr'] as $id){
                /*$query1 = "DELETE FROM login_logs WHERE id_user = " . $id . ";";
                $query2 = "DELETE FROM login_tokens WHERE id_user = " . $id . ";";
                $query3 = "DELETE FROM users WHERE id = " . $id . ";";
                mysqli_query($conn, $query1);
                mysqli_query($conn, $query2);
                mysqli_query($conn, $query3);
                echo "Konto o ID: " . $id . " zostało usunięte."; */
                $users = "remove[]=" . $id . "&";
            }
        }
        echo "    <script>
                    let alert = confirm('Czy aby na pewno chcesz usunąć wybrane konta?');
                    if(alert) {
                        window.location.href = '../dashboard.php?" . $users . "';
                    } else {
                        window.location.href = '../dashboard.php';
                    }
                  </script>";
    }

    if(isset($_POST['lockUnlock'])){
        if(!empty($_POST['selectedusr'])){
            foreach ($_POST['selectedusr'] as $token){
                $id = "";
                $query0 = "SELECT users.id FROM users, login_tokens WHERE login_tokens.token = '" . $token . "' AND users.id = login_tokens.id_user;";
                $id = mysqli_fetch_row(mysqli_query($conn, $query0))[0];
                $lock = 0;
                $query1 = "SELECT locked FROM users WHERE id = " . $id . ";";
                if($row = mysqli_fetch_row(mysqli_query($conn, $query1))){
                    if($row[0] == 0)
                        $lock = 1;
                    else
                        $lock = 0;
                }

                $query2 = "UPDATE users SET locked = " . $lock . " WHERE id = " . $id . ";";
                mysqli_query($conn, $query2);

                if($lock == 0)
                    echo "Konto o ID: " . $id . " zostało odblokowane.";
                else
                    echo "Konto o ID: " . $id . " zostało zablokowane.";
            }
        }
        header("location: ../dashboard.php");
    }