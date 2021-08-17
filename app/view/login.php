<?php

namespace app\view;

session_start();

if(isset($_SESSION['user'])){
    header("Location: ../view/index.php");
}

require_once 'html/header.php';

?>

    <!-- conteudo -->
    <?php if(isset($_SESSION['msg'])): ?>
            <div class="alert alert-danger" role="alert">
        
                <p><?=$_SESSION['msg']?></p>
                
            </div>
    <?php 
            unset($_SESSION['msg']); 
            endif 
    ?>
    

    <h1>Login</h1>

    <hr>

    <form action="../controller/controllerLogin.php" method="post">
    
        <label for="login">Login</label>
        <input type="text" name="login" id="login">

        <label for="senha">Senha:</label>
        <input type="password" name="password" id="password">

        <input type="submit" value="Acessar">
    </form>

<?php

    require_once 'html/footer.php';

?>


    