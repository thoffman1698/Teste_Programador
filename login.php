<?php

include 'assets/includes/header.php';

?>
    <div class="container-fluid" id="login">
      <div class="row">
        <div class="col-xs-4 offset-4" align="center">
          <form class="form-signin" method="POST" action="valida.php">
            <div class="form-group">
              <a href="https://www.uplexis.com.br" target="_blank"><img class="img-responsive" src="https://www.uplexis.com.br/wp-content/themes/uplexis/vendor/images/logo_color.png" /></a>
            </div>
            <div class="form-group">
              <input type="text" name="usuario" id="inputEmail" class="form-control" placeholder="Login" required autofocus maxlength="30">
            </div>
            
            <div class="form-group">
              <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required />
            </div>
            
            <button class="btn btn-lg btn-danger btn-block" type="submit">Acessar</button>
            <!-- <a class="btn btn-lg btn-success btn-block" href="cad_login.php">Cadastrar</a> -->
          </form>
          <p class="text-center text-danger">
            <?php if(isset($_SESSION['loginErro'])){
              echo $_SESSION['loginErro'];
              unset($_SESSION['loginErro']);
            }?>
          </p>
          <p class="text-center text-success">
            <?php 
            if(isset($_SESSION['logindeslogado'])){
              echo $_SESSION['logindeslogado'];
              unset($_SESSION['logindeslogado']);
            }
            ?>
          </p>
        </div>
      </div>

      </div> <!-- /container -->


<?php

include 'assets/includes/footer.php';

?>