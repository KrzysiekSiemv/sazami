<?php
    echo "
    <div class='modal fade' id='changePassModal'>
        <div class='modal-dialog modal-xl modal-dialog-centered'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title'>Zmiana hasła</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                </div>
                <div class='modal-body'>
                    <form method='POST' action='elements/change_pass.php'>
                        <div class='row'>
                            <div class='col'>
                                <div class='form-floating'>
                                    <input type='password' class='form-control' name='oldpass' />
                                    <label for='oldpass'>Stare hasło</label>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='form-floating'>
                                    <input type='password' class='form-control' name='newpass' />
                                    <label for='oldpass'>Nowe hasło</label>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='form-floating'>
                                    <input type='password' class='form-control' name='repass' />
                                    <label for='oldpass'>Powtórz nowe hasło</label>
                                </div>
                            </div>
                        </div><br>
                        <button type='submit' class='btn btn-primary' name='submit'>Zmień hasło</button>
                        <br>
                        <p>Nie pamiętasz starego hasła?</p>
                        <button type='submit' class='btn btn-primary' name='sendLink'>Wyślij link z resetowaniem hasła na maila</button>
                    </form>
                    </div>
            </div>
        </div>
    </div>
    ";