	<?php
  include("header.php");
  ?>
  <div class="go-login-page">
  <div class="login-box">
  <form accept-charset="UTF-8" role="form" action="signin.php" method="post">
    <fieldset>
      <div class="form-group">
        <input class="form-control" placeholder="Usuário" name="username" type="text">
      </div>
      <div class="form-group">
        <input class="form-control" placeholder="Senha" name="password" type="password" value="">
      </div>
      <input class="go-button blue full" type="submit" value="Entrar" name="login">
    </fieldset>
  </form>
  <input style="margin-top: 10px;" onclick="window.location='signup.php'" class="go-button orange full" type="submit" value="Cadastrar" name="cadastrar">

  <?php

    if(isset($_POST['login'])){
        
        $username = protect($_POST['username']);
        $password = protect($_POST['password']);
        
        $login_check = mysql_query("SELECT `id` FROM `user` WHERE `username`='$username' AND `password`='".md5($password)."'") or die(mysql_error());
        if(mysql_num_rows($login_check) == 0){
            echo "Usuário ou senha inválidos!";
        }else{
            $get_id = mysql_fetch_assoc($login_check);
            $_SESSION['uid'] = $get_id['id'];
            header("Location: index.php");
        }
    }
?>

  </div>
  </div>

  <?php require_once("footer.php") ?>