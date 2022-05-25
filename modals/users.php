<?php
    echo "
    <div class='modal fade' id='usersModal'>
        <div class='modal-dialog modal-xl modal-dialog-centered'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title'>Zarządzanie użytkownikami</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                </div>
                <div class='modal-body'>
                    <input type='text' class='form-control mb-3' placeholder='Filtruj wyniki...' id='filtrItUsr'/>
                    <form method='POST' action='elements/edit_users.php'>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th scope='col'></th>
                                    <th scope='col'>id</th>
                                    <th scope='col'>imie</th>
                                    <th scope='col'>nazwisko</th>
                                    <th scope='col'>email</th>
                                    <th scope='col'>numer telefonu</th>
                                    <th scope='col'>może się logować</th>
                                </tr>
                            </thead>
                            <tbody id='usersTable'>";
                            require './elements/users.php';
                            echo "</tbody>
                        </table>
                        <div class='btn-group'>
                            <button type='submit' class='btn btn-primary' name='removeThem'>Usuń użytkownika</button>
                            <button type='submit' class='btn btn-primary' name='lockUnlock'>Zablokuj/odblokuj dostęp</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    ";