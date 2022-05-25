<?php
    echo "
<div class='modal fade' id='sendMailModal' tabindex='-1'>
    <div class='modal-dialog modal-dialog-centered modal-xl'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title'>Odpowiedź na wiadomość</h5> 
                <button class='btn-close' data-bs-dismiss='modal'></button>
            </div>
            <div class='modal-body'>
                <form method='POST' action='elements/send_mail.php'>
                    <div class='form-floating mb-3'>
                        <input type='email' name='email' class='form-control' />
                        <label for='email'>Adres odbiorcy</label>
                    </div>
                    <div class='form-floating mb-3'>
                        <input type='text' name='topic' class='form-control' />
                        <label for='topic'>Temat wiadomości</label>    
                    </div>
                    <div class='form-floating mb-3'>
                        <textarea class='form-control' name='content'></textarea>
                        <label for='content'>Treść wiadomości</label>
                    </div>
                    <button class='btn btn-primary' name='send_reply' value=''>Wyślij</button>
                </form>
            </div>
        </div>
    </div>
</div>
    ";