    <?php

    include("header.php");

    ?>
     <div class="go-login-page">
     <div class="login-box">
     <div class="box-content">
    <form accept-charset="UTF-8" role="form" action="signup.php" method="post">
      <fieldset>
        <div class="form-group">
          <input class="form-control" placeholder="Usuário" name="username" type="text">
        </div>
        <div class="form-group">
          <input class="form-control" placeholder="Senha" name="password" type="password" value="">
        </div>

        <div class="form-group">
          <input class="form-control" placeholder="Email" name="email" type="email" value="">
        </div>

        <input class="go-button green full" type="submit" value="Cadastrar" name="register">
        <a href="index.php" class="go-button blue full">Fazer Login</a>
        <!-- <button class="go-button purple full" value="Login" onclick="window.location='index.php'">Logaaain</button> -->
      </fieldset>
    </form>

    <?php

    if(isset($_POST['register'])){
      $username = protect($_POST['username']);
      $password = protect($_POST['password']);
      $email = protect($_POST['email']);

      if($username == "" || $password == "" || $email == ""){
        echo "<div class='error'>Preencha todos os campos!</div>";
      }elseif(strlen($username) > 14){
        echo "<div class='error'>Usuário deve conter menos de 14 caracteres!</div>";
      }elseif(strlen($email) > 100){
        echo "<div class='error'>E-Mail muito longo!</div>";
      }else{
        $register1 = mysql_query("SELECT `id` FROM `user` WHERE `username`='$username'") or die(mysql_error());
        $register2 = mysql_query("SELECT `id` FROM `user` WHERE `email`='$email'") or die(mysql_error());
        if(mysql_num_rows($register1) > 0){
          echo "<div class='error'>Este usuário já está em uso!</div>";
        }elseif(mysql_num_rows($register2) > 0){
          echo "<div class='error'>Este endereço de e-mail já está em uso!</div>";
        }else{ 

         $ins1 = mysql_query("INSERT INTO `user` (`username`,`password`,`email`) VALUES ('$username','".md5($password)."','$email')") or die(mysql_error());

         if ($ins1 == true) {
          echo '<a href="index.php"><div class="error blue">Usuário Cadastrado, Clique Aqui para fazer login</div></a>';
        }
      }
    }
  }
?>

    </div>
</div>
</div>

<?php require_once("footer.php") ?>