<?php
echo "
    <div class='modal fade' id='themeModal'>
        <div class='modal-dialog modal-dialog-centered'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title'>Zmiana motywu</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                </div>
                <div class='modal-body'>
                    <form method='POST' action='elements/change_theme.php'>
                        <div class='input-group'>
                            <select name='themeType' class='form-control'>
                                <option value='default'>Domyślny</option>
                                <option value='dark'>Ciemny</option>
                                <option value='light'>Jasny</option>
                            </select>
                            <button type='submit' class='btn btn-primary' name='change'>Zatwierdź zmiane</button>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>
    ";