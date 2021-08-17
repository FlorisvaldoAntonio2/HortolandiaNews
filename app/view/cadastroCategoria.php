<?php

namespace app\view;

session_start();


require_once 'html/header.php';

require_once 'html/menu.php';


?>

<form action="../controller/ControllerCadastroCategoria.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <div class="form-row">

            <div class='col-6'>
                <label for="nomeCategoria">Nome</label>
                <input type="text" name="nomeCategoria" id="nomeCategoria">
            </div>

            <div class='col-6'>
                <input type="submit" value="Cadastrar">
            </div>
        </div>
    </div>

</form>



<?php

require_once 'html/footer.php';

?>