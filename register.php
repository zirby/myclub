

<?php 
require_once 'inc/function.php';
session_start();
if(!empty($_POST)){
    
    $errors = array();
    require_once 'inc/db.php';
    
    if(empty($_POST['username'])){
        $errors['username']="Entrez votre identifiant";
    }
    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email']="Votre e-mail n'est pas valide";
    }else{
        $req = $pdo->prepare("SELECT id FROM membres WHERE email = ?");
        $req->execute([$_POST['email']]);
        $user = $req->fetch();
        if($user){
            $errors['email']= "Ce mail est déjà utilisé";
        }
        
    }
    if(empty($_POST['password']) || $_POST['password'] != $_POST['passwordconfirm']){
        $errors['password']="Mot de passe non valide";
    }
    if (empty($errors)){
        
        $req = $pdo->prepare("INSERT INTO membres SET username = ?, email = ?, password = ?, confirmation_token = ? ");
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $token = str_random(60);
        $req->execute([$_POST['username'], $_POST['email'], $password, $token]);
        $user_id = $pdo->lastInsertId();
        mail($_POST['email'], 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://localhost/coupe_davis_2016/confirm.php?id={$user_id}&token=$token");
        $_SESSION['flash']['green'] = "Un e-mail de confirmation avec les  vous a été envoyé";
        header('location: login.php');
        exit();

    }
}


?>
<?php require 'inc/header.php'; ?>
    <?php if(!empty($errors)):?>
        <div class="card-panel red lighten-4">
            <ul>
            <?php  foreach($errors as $error): ?>
                <li><?= $error; ?></li>
            <?php  endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

<form action="" method="POST" class="col s12">
  <fieldset>
    <legend><h1>S'inscrire</h1></legend>
 
    <div class="row">
        <div class="input-field col s12">
            <input name="username" id="username" placeholder="Identifiant" type="text" class="validate">
            <label for="username">Identifiant</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <input placeholder="Prénom" name="firstname" id="firstname" type="text">
            <label for="firstname">Prénom</label>
        </div>
        <div class="input-field col s6">
            <input placeholder="Nom" name="lastname" id="lastname" type="text">
            <label for="lastname">Nom</label>
        </div>
    </div>

    
    <div class="row">
        <div class="input-field col s3">
            <input placeholder="Code postal" name="code" id="code" type="text">
            <label for="code">Code postal</label>
        </div>
        <div class="input-field col s9">
            <input placeholder="Localité" name="localite" id="localite" type="text">
            <label for="localite">Localité</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <input placeholder="Date de naissance" name="birthday" id="birthday" type="text">
            <label for="birthday">Date de naissance</label>
        </div>
        <div class="input-field col s6">
            <input placeholder="Téléphone/GSM" name="telephone" id="telephone" type="text">
            <label for="telephone">Tel/GSM</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <input name="email" id="email" placeholder="Email" type="text" class="validate">
            <label for="email">Email</label>
        </div>
    </div>
    
    <div class="row">
        <div class="input-field col s6">
            <input placeholder="Classement" name="classement" id="classement" type="text">
            <label for="classement">Classement</label>
        </div>
        <div class="input-field col s6">
            <input placeholder="N° affiliation" name="affiliation" id="affiliation" type="text">
            <label for="affiliation">N° affiliation</label>
        </div>
    </div>

    
    <div class="form-group">
      <label for="password" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input class="form-control" name="password" id="password" placeholder="Password" type="password">
      </div>
    </div>
    <div class="form-group">
      <label for="passwordconfirm" class="col-lg-2 control-label">Password confim</label>
      <div class="col-lg-10">
        <input class="form-control" name="passwordconfirm" id="passwordconfirm" placeholder="Password" type="password">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Annuler</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </fieldset>
</form>


<?php require 'inc/footer.php'; ?>
