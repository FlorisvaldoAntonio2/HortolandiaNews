<?php

namespace app\view;

require_once("../../vendor/autoload.php");

use app\controller\ControllerSelect;

session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../view/login.php");
}

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

$u = new ControllerSelect();
$noticias = $u->list();

require_once 'html/header.php';

require_once 'html/menu.php';
?>

<!-- conteudo -->
<div class="row">
<?php
    foreach ($noticias as $value){
?>
    

        <div class="col-12 col-sm-6 col-lg-4 mb-3">
        <div class="card-deck">
            <div class="card" style="width: 18rem;">
            <img class="card-img-top img-thumbnail" src="../img/upload/<?=$value['nome_img']?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?=$value['titulo']?></h5>
                <p class="card-text"><?php echo $coteudo = substr( $value['conteudo'] , 0 , 100)?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?=$value['categoria']?></li>
            </ul>
            <?php if(isset($_SESSION['adm']) && $_SESSION['adm'] == 1): ?>
                <div class="card-body">
                    <a href="../controller/ControllerDelete.php?id=<?=$value['id']?>" class="card-link">Apagar</a>
                    <a href="../view/updateNoticia.php?id=<?=$value['id']?>" class="card-link">Alterar</a>
                </div>
            <?php endif ?>
            </div>
        </div>

        </div>

   

<?php
    }
?>

</div>

<?php

require_once 'html/footer.php';

?>