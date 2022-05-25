<?php
    echo "
    <div class='modal fade' id='addPostModal'>
        <div class='modal-dialog modal-xl modal-dialog-centered'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title'>Dodawanie nowego posta</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                </div>
                <div class='modal-body'>
                    <form method='POST' action='elements/add_post.php' enctype='multipart/form-data'>
                        <div class='form-floating'>
                            <input type='text' class='form-control' name='post-title' />
                            <label for='post-title'>Tytuł posta</label>
                        </div><br>
                        <div class='form-floating'>
                            <textarea class='form-control' name='post-content'></textarea>
                            <label for='post-content'>Treść posta</label>
                        </div>
                        <div class='mb-3'>
                            <label for='post-image'>Obraz posta (max. 8 MB)</label>
                            <input type='file' class='form-control' name='post-image' accept='image/jpeg, image/png' />
                        </div><br>
                        <button type='submit' name='addPost' class='btn btn-primary'>Dodaj post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>";