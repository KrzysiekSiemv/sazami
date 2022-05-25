<?php
    if(isset($_POST['change'])){
        setcookie("theme", $_POST['themeType'] . "-theme", time() + (10 * 365 * 24 * 60 * 60), "/");
        header("location: ../dashboard.php?success=true");
    }