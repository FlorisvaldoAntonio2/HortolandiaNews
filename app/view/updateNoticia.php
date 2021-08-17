<?php

namespace app\view;

use app\controller\ControllerUpdate;
use app\controller\ControllerSelect;

require_once("../../vendor/autoload.php");

session_start();


require_once 'html/header.php';



$s = new ControllerSelect();

$categorias = $s->listCategoria();

$u = new ControllerUpdate($_GET['id']);

$noticia = $u->retorno();


?>

<form action="../controller/ControllerUpdate.php?id=<?=$noticia[0]['id']?>" method="post" enctype="multipart/form-data">

    <input type="number" value="<?=$noticia[0]['id']?>" name="id" hidden>

    <label for="tituloNoticia">Titule:</label>
    <input type="text" name="tituloNoticia" id="tituloNoticia" value="<?=$noticia[0]['titulo']?>">

    <select name="categoriaNoticia" id="categoriaNoticia">
        <option disabled >Categorias</option>
        <?php foreach ($categorias as $value): 
            if($value['nome'] == $noticia[0]['categoria']): ?>
                <option selected value="<?=$value['id']?>"><?=$value['nome']?></option>
            <?php else:?>
                <option value="<?=$value['id']?>"><?=$value['nome']?></option>
            <?php endif ?>
            
        <?php endforeach ?>
    </select>

    <label for="conteudoNoticia">Conteudo:</label>
    <textarea name="conteudoNoticia" id="conteudoNoticia" cols="30" rows="10"><?=$noticia[0]['conteudo']?></textarea>

    <input type="submit" value="Cadastrar">

</form>

<?php

require_once 'html/footer.php';

?>