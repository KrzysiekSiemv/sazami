<?php
    echo "
    <div class='modal fade' id='editProfileModal'>
        <div class='modal-dialog modal-lg modal-dialog-centered'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title'>Edycja profilu</h5>
                    <button class='btn-close' data-bs-dismiss='modal'></button>
                </div>
                <div class='modal-body'>
                    <form method='POST' action='elements/update_avatar.php' enctype='multipart/form-data'>
                        <img src='$avatar' alt='profilowe' class='edit-avatar' /><br>
                        <label for='update-avatar'>Zdjęcie profilowe</label>
                        <div class='input-group mb-3'>
                            <input type='file' name='update-avatar' class='form-control' />    
                            <button type='submit' name='update-avatar-btn' class='btn btn-primary'>Wyślij</button>
                        </div>
                    </form>
                    <h3>Edycja danych</h3>
                    <form method='POST' action='elements/updateProfile.php'>
                        <div class='row g-2'>
                            <div class='col'>
                                <div class='form-floating mb-3'>
                                    <input type='text' name='fname' class='form-control' value='$imie' required/>
                                    <label for='fname'>Imie</label>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='form-floating mb-3'>
                                    <input type='text' name='sname' class='form-control' value='$nazwisko' required/>
                                    <label for='sname'>Nazwisko</label>
                                </div>
                            </div>
                        </div>
                        <div class='form-floating mb-3'>
                            <input type='email' name='email' class='form-control' value='$email' required/>
                            <label for='email'>Adres e-mail</label>
                        </div>
                        <div class='form-floating mb-3'>
                            <input type='tel' name='phone' class='form-control' value='$telefon' required/>
                            <label for='phone'>Numer telefonu</label>
                        </div>
                        <button type='submit' class='btn btn-primary' name='submitEdit'>Zapisz</button>
                    </form>
                </div>
            </div>
        </div>
    </div>";