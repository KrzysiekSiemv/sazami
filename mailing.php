<?php
    require 'elements/database.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    $email = $topic = $content = "";

    if(isset($_GET['reply_to'])){
        $query = mysqli_query($conn, "SELECT email, topic, message, sent_at, name FROM messages WHERE id = " . $_GET['reply_to'] . ";");
        if($row = mysqli_fetch_row($query)){
            $email = $row[0];
            $topic = "Re: " . $row[1];
            $content = "\n\n----------\nWysłane przez: " . $row[4] . " (" . $row[0] . ")\nData wysłania: " . $row[3] . "\nTemat wiadomości: " . $row[1] . "\nTreść wiadomości:\n" . $row[2] . "\n----------";
        }
    }

    if(isset($_GET['send_to'])){
        $query = mysqli_query($conn, "SELECT email FROM contacts WHERE id = " . $_GET['send_to']);
        $email = mysqli_fetch_row($query)[0];
    }

    ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <?php
    include "elements/head.php";
    ?>

    <title>Nowa wiadomość - Sazami</title>
</head>
<body>
    <?php include 'elements/header.php'; ?>
    <div class="container subpage">
        <form method="POST" action="elements/send_mail.php" class="mailing-form">
            <h5>Wysyłanie wiadomości</h5>
            <p>Pamiętaj, że wysyłasz wiadomość do użytkownika z maila, na który nie otrzymasz odpowiedzi od tego użytkownika. Wyślij swoje dane kontaktowe, jeżeli zamierzasz prowadzić z nim rozmowe.</p>
            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" value="<?php echo $email ?>" />
                <label for="email">Adres odbiorcy</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="topic" class="form-control" value="<?php echo $topic ?>"/>
                <label for="topic">Temat wiadomości</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="content" id="content" style="height: 300px"><?php echo $content ?></textarea>
                <label for="content">Treść wiadomości</label>
            </div>
            <button class="btn btn-primary" name="sendmsgBtn" type="submit">Wyślij</button>
            <button class="btn btn-primary" type="button" onclick="location.href='dashboard.php'">Anuluj</button>
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
