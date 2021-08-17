<?php

namespace app\view;

use app\controller\ControllerSelect;

require_once("../../vendor/autoload.php");

session_start();


require_once 'html/header.php';

require_once 'html/menu.php';



$u = new ControllerSelect();
$categorias = $u->listCategoria();


?>

<form action="../controller/ControllerCadastroNoticia.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <div class="form-row">

            <div class="col-6">
                <label for="tituloNoticia">Titule:</label>
                <input class="form-control" type="text" name="tituloNoticia" id="tituloNoticia">
            </div>

            <div class="col-6">
                <label for="categoriaNoticia">Categoria</label>
                <select class="form-control" name="categoriaNoticia" id="categoriaNoticia">
                    <option disabled >Categoria</option>
                    <?php foreach ($categorias as $value): ?>
                        <option value="<?=$value['id']?>"><?=$value['nome']?></option>
                    <?php endforeach ?>
                </select>
            </div>

        </div>

        <div class="form-row">
            <div class='col-12'></div>
                <label for="conteudoNoticia">Conteudo:</label>
                <textarea class="form-control" name="conteudoNoticia" id="conteudoNoticia" cols="30" rows="10"></textarea>
            </div>
        </div>

        <div class="form-row">

            <div class='col-6'>
                <label for="foto_noticia">Imagem:</label>
                <input class="form-control-file" type="file" name="foto_noticia" id="foto_noticia" required>
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