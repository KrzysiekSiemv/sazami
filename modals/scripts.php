<?php
    echo "
    <div class='modal fade' id='scriptsModal'>
        <div class='modal-dialog modal-xl modal-dialog-centered'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title'>Skrypty zewnętrzne</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                </div>
                <div class='modal-body'>
                    <form method='POST' action='elements/scripts_management.php' enctype='multipart/form-data'>
                        <div class='upload'>
                            <h5>Dodaj nowy skrypt/styl</h5>
                            <label for='local-script-upload'>Lokalny skrypt/styl</label>
                            <div class='input-group mb-3'>
                                <input type='text' name='local-script-description' class='form-control col-4' placeholder='Opis' />  
                                <input type='file' name='local-script-upload' class='form-control col-4' />   
                                <select name='local-script-type' class='form-control col-3'>
                                    <option value='stylesheet'>Plik CSS</option> 
                                    <option value='script'>Plik JS</option>    
                                </select>
                                <button type='submit' name='local-script-upload-btn' class='btn btn-primary col-1'>Dodaj</button>
                            </div>
                            <label for='url-script-upload'>Sieciowy skrypt/styl</label>
                            <div class='input-group mb-3'>
                                <input type='text' name='url-script-description' class='form-control col-4' placeholder='Opis' />
                                <input type='text' name='url-script-upload' class='form-control col-4' placeholder='Link do stylu/skryptu'/>
                                <select name='url-script-type' class='form-control col-3'>
                                    <option value='stylesheet'>Plik CSS</option> 
                                    <option value='script'>Plik JS</option>    
                                </select>
                                <button type='submit' name='url-script-upload-btn' class='btn btn-primary col-1'>Dodaj</button>
                            </div>
                        </div>
                    </form>
                    <h5>Dodane skrypty/style</h5>
                    <input type='text' class='form-control mb-3' placeholder='Filtruj wyniki...' id='filtrIt'/>    
                    <form method='POST' action='elements/scripts_management.php' enctype='multipart/form-data'>
                        <table class='table'>
                            <thead>
                            <tr>
                                <th scope='col'>id</th>
                                <th scope='col'>opis</th>
                                <th scope='col'>link</th>
                                <th scope='col'>typ</th>
                                <th scope='col'>dodane przez</th>
                                <th scope='col'></th>
                            </tr>
                            </thead>
                            <tbody>";
                            require './elements/scripts.php';
                            echo "</tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>";