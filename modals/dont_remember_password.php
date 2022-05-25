<?php
echo "
    <div class='modal fade' id='changePassModal'>
        <div class='modal-dialog modal-lg modal-dialog-centered'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title'>Nie pamiętasz starego hasła?</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                </div>
                <div class='modal-body'>
                    <form method='POST' action='elements/change_pass.php'>
                        <p>Podaj adres e-mail na które Twoje konto jest zarejestrowane, aby wysłać link przypominający</p>
                        <div class='input-group'>
                            <input type='email' name='email' placeholder='Twój adres e-mail' class='form-control' />
                            <button type='submit' class='btn btn-primary' name='sendLinkMail'>Wyślij link z resetowaniem hasła na maila</button>
                        </div>  
                    </form>
                    </div>
            </div>
        </div>
    </div>
    ";