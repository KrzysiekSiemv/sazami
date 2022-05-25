<?php
    if(isset($_GET['success'])){
        if($_GET['success'] == true){
            echo "<script>const msg = confirm('Operacja została wykonana pomyślnie!');
                if(msg)
                    window.location.href = 'dashboard.php';
                else
                    window.location.href = 'dashboard.php';
            </script>";
        }
    }