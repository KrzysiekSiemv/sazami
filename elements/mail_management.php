<?php
    if(isset($_POST['replyMsg'])){
        header("location: ../mailing.php?reply_to=" . $_POST['replyMsg']);
    }

    if(isset($_POST['deleteMsg'])){
        echo "<script>
            let confirmation = confirm('Czy aby na pewno chcesz usunąć tą wiadomość?');
            if(confirmation)
                window.location.href = '../dashboard.php?remove_msg=" . $_POST['deleteMsg'] . "';
            else
                window.location.href = '../dashboard.php';
        </script>";
    }