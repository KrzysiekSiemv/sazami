<?php
require 'elements/database.php';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);
    $id_user = 0;
    if(isset($_GET['user_token']) && isset($_GET['token'])){
        $is_valid = false;
        if($row = mysqli_fetch_row(mysqli_query($conn, "SELECT is_used, valid_to, login_tokens.token, users.id FROM new_password_tokens, users, login_tokens WHERE np_token = '" . $_GET['token'] . "' AND users.id = new_password_tokens.id_user AND login_tokens.id_user = users.id"))){
            if($row[0] == 0){
                if(strtotime($row[1]) > time()){
                    if($row[2] == $_GET['user_token']){
                        $is_valid = true;
                        $id_user = $row[3];
                    } else {
                        echo "Tokeny się nie zgadzają!";
                    }
                } else {
                    echo "Link wygasł!";
                }
            } else {
                echo "Hasło zostało już zmienione z tego linku";
            }
        }
    } else {
        header("location: index.php");
    }

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php include "elements/head.php"; ?>

    <title>Przypomnienie hasła - Sazami</title>
</head>
<body>
<?php include 'elements/header.php'; ?>
<div class="container subpage">
    <form method="POST" action="elements/change_pass.php" class="mailing-form">
        <h5>Zmiana hasła</h5>
        <div class="form-floating mb-3">
            <input type="password" name="newpass" class="form-control" />
            <label for="email">Nowe hasło</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="repass" class="form-control" />
            <label for="topic">Powtórz hasło</label>
        </div>
        <input type="hidden" name="user_token" value="<?php echo $_GET['user_token'] ?>" />
        <input type="hidden" name="user_id" value="<?php echo $id_user ?>" />
        <input type="hidden" name="pass_token" value="<?php echo $_GET['token'] ?>" />
        <button class="btn btn-primary" name="submitNewPassword" type="submit">Zmień hasło</button>
    </form>
</div>
<?php include 'elements/footer.php'; ?>
</body>
<script src='scripts/theme.js' crossorigin='anonymous'></script>
<script>
    (function(e){
        const contentBox = document.getElementById('content');
        contentBox.focus();
        contentBox.selectionStart = 0;
        contentBox.selectionEnd = 0;
    })();
</script>
</html>
