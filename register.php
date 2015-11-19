

<?php 
require_once 'inc/function.php';
require_once 'inc/db.php';
session_start();

$req = $pdo->prepare("SELECT * FROM classements ORDER BY points ");
$req->execute();
$classements = $req->fetchAll();
//print_r($classements);
//die();
$req = $pdo->prepare("SELECT * FROM inscriptions ");
$req->execute();
$inscriptions = $req->fetchAll();
//print_r($inscriptions);
//die();


if(!empty($_POST)){
    
    $errors = array();
    
    
    if(empty($_POST['username'])){
        $errors['username']="Entrez votre identifiant";
    }
    if(empty($_POST['firstname'])){
        $errors['firstname']="Entrez votre prénom";
    }
    if(empty($_POST['lastname'])){
        $errors['lastname']="Entrez votre nom";
    }
    if(empty($_POST['address'])){
        $errors['address']="Entrez votre adresse";
    }
    if(empty($_POST['code'])){
        $errors['code']="Entrez votre code postal";
    }
    if(empty($_POST['localite'])){
        $errors['localité']="Entrez votre localité";
    }
    if(empty($_POST['birthday'])){
        $errors['birthday']="Entrez votre date de naissance";
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
        
        $req = $pdo->prepare("INSERT INTO membres SET "
                . "username = ?, "
                . "firstname = ?, "
                . "lastname = ?, "
                . "address = ?, "
                . "code = ?, "
                . "localite = ?, "
                . "birthday = ?, "
                . "telephone = ?, "
                . "classement = ?, "
                . "affiliation = ?, "
                . "email = ?, "
                . "cotisation = ?, "
                . "password = ? ,"
                . "inscription_at = NOW() ");

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $req->execute([
            $_POST['username'], 
            $_POST['firstname'], 
            $_POST['lastname'], 
            $_POST['address'], 
            $_POST['code'], 
            $_POST['localite'], 
            $_POST['birthday'], 
            $_POST['telephone'], 
            $_POST['classement'], 
            $_POST['affiliation'], 
            $_POST['email'], 
            $_POST['cotisation'], 
            $password]);
        $user_id = $pdo->lastInsertId();
        //mail($_POST['email'], 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://localhost/coupe_davis_2016/confirm.php?id={$user_id}&token=$token");
        $_SESSION['flash']['green'] = "Un e-mail avec les modalités de paiement vous a été envoyé";
        $req = $pdo->prepare("SELECT * FROM membres WHERE id =? ");
        $req->execute([$user_id]);
        $user = $req->fetch();   
        $_SESSION['auth'] = $user;
        header('location: interclubs.php');
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
        <div class="input-field col s6">
            <input name="username" id="username" placeholder="Identifiant" type="text" class="validate">
            <label for="username">Identifiant</label>
        </div>
        <div class="input-field col s6">
            <select name="cotisation" id="cotisation">
                <?php foreach($inscriptions as $cotisation): ?>
                    <option value="<?= $cotisation->inscription; ?>"><?= $cotisation->inscription; ?></option>
                <?php endforeach; ?>
            </select>
            <label>Cotisation</label>        

        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <input placeholder="Prénom" name="firstname" id="firstname" type="text">
            <label for="firstname">Prénom</label>
        </div>
        <div class="input-field col s6">
            <input placeholder="Nom/Nom de famille" name="lastname" id="lastname" type="text">
            <label for="lastname">Nom</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <input name="address" id="address" placeholder="Adresse" type="text" class="validate">
            <label for="address">Adresse</label>
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
            <select name="classement" id="classement">
                <?php foreach($classements as $class): ?>
                    <option value="<?= $class->classement; ?>"><?= $class->classement; ?> </option>
                <?php endforeach; ?>
            </select>
            <label>Classement</label>        
        </div>
        <div class="input-field col s6">
            <input placeholder="N° affiliation" name="affiliation" id="affiliation" type="text">
            <label for="affiliation">N° affiliation</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6">
            <input placeholder="Mot de passe" name="password" id="password" type="password">
            <label for="password">Mot de passe</label>
        </div>
        <div class="input-field col s6">
            <input placeholder="Mot de passe (confirmation)" name="passwordconfirm" id="passwordconfirm" type="password">
            <label for="passwordconfirm">Mot de passe (confirmation)</label>
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
