<?php require 'inc/function.php'; ?>
<?php 
session_start();

if(!empty($_POST) && !empty($_POST['ident']) && !empty($_POST['password'])){
    require 'inc/db.php';
    $req = $pdo->prepare("SELECT * FROM membres WHERE  username= ?");
    $req->execute([$_POST['ident']]);
    $user = $req->fetch();
    //var_dump($user);
    //die();
    if($user && password_verify($_POST['password'], $user->password)){
        $_SESSION['auth'] = $user;
        $_SESSION['flash']['green']="Vous êtes bien connecté";
        header('Location: account.php');
        exit();
    }else{
        $_SESSION['flash']['red']="Identifiant, Email ou mot de passe incorrect";
    }
}
?>
<?php require 'inc/header.php'; ?>
<form action="" method="POST" class="form-horizontal">
  <fieldset>
    <legend><h1>Se connecter</h1></legend>
    <?php if(!empty($errors)):?>
        <div class="card-panel red lighten-4">
            <ul>
            <?php  foreach($errors as $error): ?>
                <li><?= $error; ?></li>
            <?php  endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <div class="form-group">
      <label for="ident" class="col-lg-2 control-label">Identifiant ou Email</label>
      <div class="col-lg-10">
        <input class="form-control" name="ident" id="ident" placeholder="Identifiant ou Email" type="text">
      </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-lg-2 control-label">Mot de passe</label>
      <div class="col-lg-10">
        <input class="form-control" name="password" id="password" placeholder="Mot de passe" type="password">
        <span class="help-block"><a href="forget.php">(j'ai oublié mon mot de passe)</a></span>
        <div class="checkbox">
          <label>
              <input name="remember" value="1" type="checkbox"> Se souvenir
          </label>
        </div>

      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>


<?php require 'inc/footer.php'; ?>
