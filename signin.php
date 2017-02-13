	<?php
  include("header.php");
  ?>
  <div style="padding: 60px" class="rx_wrapper">
  <form accept-charset="UTF-8" role="form" action="login.php" method="post">
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
  <input style="margin-top: 10px;" onclick="window.location='register.php'" class="go-button orange full" type="submit" value="Cadastrar" name="cadastrar">
  </div>