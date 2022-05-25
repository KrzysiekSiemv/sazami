<?php
    require 'elements/database.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    $imie = $nazwisko = $email = $numer_telefonu = $opis = "";

    if(isset($_GET['id'])){
        $query = mysqli_query($conn, "SELECT * FROM contacts WHERE id = " . $_GET['id'] . ";");
        if($row = mysqli_fetch_row($query)){
            $imie = $row[1];
            $nazwisko = $row[2];
            $email = $row[3];
            $numer_telefonu = $row[4];
            $opis = $row[5];
        } else {
            echo "Nie ma kontaktu o podanym ID!";
        }
    } else {
        header("location: dashboard.php");
    }

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php require "elements/head.php"; ?>
</head>
<body>
    <?php include "elements/header.php"; ?>
    <div class="container subpage">
        <form method="POST" action="elements/edit_contact.php" class="edit-form">
            <h5>Edycja kontaktu</h5>
            <div class="row mb-3">
                <div class="form-floating col">
                    <input type="text" name="name" value="<?php echo $imie; ?>" class="form-control" />
                    <label for="name">Imię</label>
                </div>
                <div class="form-floating col">
                    <input type="text" name="surname" value="<?php echo $nazwisko; ?>" class="form-control" />
                    <label for="name">Nazwisko</label>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="description" class="form-control" value="<?php echo $opis; ?>" />
                <label for="description">Opis</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="phone_number" class="form-control" value="<?php echo $numer_telefonu; ?>" />
                <label for="phone_number">Numer telefonu</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" />
                <label for="email">Adres e-mail</label>
            </div>
            <button class="btn btn-primary" type="submit" name="saveEdit" value="<?php echo $_GET['id']; ?>">Zapisz zmiany</button>
            <button class="btn btn-primary" type="button" onclick="location.href='dashboard.php'">Anuluj</button>
        </form>
    </div>
    <?php include "elements/footer.php"; ?>
</body>
<script src='scripts/theme.js' crossorigin='anonymous'></script>
</html>