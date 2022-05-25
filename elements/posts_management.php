<?php
    if(isset($_POST['removePost'])){
        echo "<script>
            let alert = confirm('Czy aby na pewno chcesz usunąć ten post?');
            if(alert){
                window.location.href = '../dashboard.php?remove_post=" . $_POST['removePost'] . "';          
            } else {
                window.location.href = '../dashboard.php';
            }
        </script>";
    }

    if(isset($_POST['editPost'])){
        header("location: ../edit_post.php?id=" . $_POST['editPost']);
    }