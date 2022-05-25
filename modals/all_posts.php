<?php
    echo "
    <div class='modal fade' id='allPostsModal'>
        <div class='modal-dialog modal-xl modal-dialog-centered'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title'>Zarządzanie postami</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                </div>
                <div class='modal-body'>
                    <input type='text' class='form-control mb-3' placeholder='Filtruj wyniki...' id='filtrItPosts'/>
                    <form method='POST' action='elements/posts_management.php'>
                        <table class='table'>
                            <thead>
                            <tr>
                                <th scope='col'>id</th>
                                <th scope='col'>tytul</th>
                                <th scope='col'>tresc</th>
                                <th scope='col'>dodano</th>
                                <th scope='col'>dodane przez</th>
                                <th scope='col'>akcje</th>
                            </tr>
                            </thead>
                            <tbody id='postsTable'>";
                            require './elements/posts.php';
                            echo "</tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>";