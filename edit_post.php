<?php
    require 'elements/database.php';
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);

    $title = $content = $added_at = $updated_at = "";
    $id_picture = 0;
    $link = "";

    if(isset($_GET['id'])){
        $query = mysqli_query($conn, "SELECT * FROM posts WHERE id = " . $_GET['id'] . ";");
        if($row = mysqli_fetch_row($query)){
            $title = $row[1];
            $content = $row[2];
            $added_at = $row[3];
            $updated_at = $row[4];
            if($row[6] != null)
                $id_picture = $row[6];
        } else {
            echo "Nie ma posta o podanym ID!";
        }

        if($id_picture != 0){
            $link = mysqli_fetch_row(mysqli_query($conn, "SELECT link FROM resources WHERE id = " . $id_picture))[0];

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
        <div class="edit-form">
            <form method="POST" action="elements/edit_post.php" class="mb-3">
                <h5>Edycja posta</h5>
                <div class="form-floating mb-3">
                    <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" />
                    <label for="description">Tytuł posta</label>
                </div>
                <label for="content">Treść posta</label>
                <textarea name="content" class="form-control mb-3" style="min-height: 400px"><?php echo $content; ?></textarea>
                <button class="btn btn-primary" type="submit" name="saveEdit" value="<?php echo $_GET['id']; ?>">Zapisz zmiany</button>
                <button class="btn btn-primary" type="submit" name="cancelIt">Anuluj</button>
            </form>
            <form method="POST" action="elements/post_image_edit.php" enctype="multipart/form-data">
                <h5>Zarządzanie obrazkiem</h5>
                <div class="input-group mb-3">
                    <input type='file' class='form-control' name='post-image' accept='image/jpeg, image/png' />
                    <button class="btn btn-primary" type="submit" name="applyImage" value="<?php echo $id_picture ?>.<?php echo $_GET['id']?>">Zatwierdź nowy obrazek</button>
                    <button class="btn btn-primary" type="submit" name="removeImage" value="<?php echo $id_picture ?>.<?php echo $_GET['id']?>">Usuń obrazek</button>
                </div>
                <img src="<?php echo $link ?>" alt="Zdjęcie z posta. Jeżeli jest puste, to znaczy, że nie ma żadnego zdjęcia" />
            </form>
        </div>
    </div>
    <?php include "elements/footer.php"; ?>
</body>
<script src='scripts/theme.js' crossorigin='anonymous'></script>
</html>