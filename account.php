<?php 
require_once 'inc/function.php';
require_once 'inc/db.php';
session_start();

$req = $pdo->prepare("SELECT * FROM membres WHERE id =? ");
$req->execute([$_SESSION['auth']->id]);
$user = $req->fetch();   


?>

<?php require 'inc/header.php'; ?>
<h3>Bonjour <?= $_SESSION['auth']->firstname; ?></h3>
  <div class="container">
      <div class="row center">
          <table>
            <tbody>
              <tr>
                <th>IDENTIFIANT</th>
                <td><?= $_SESSION['auth']->username; ?></td>
             </tr>
              <tr>
                <th>NOM</th>
                <td><?= $_SESSION['auth']->lastname; ?></td>
             </tr>
              <tr>
                <th>PRENOM</th>
                <td><?= $_SESSION['auth']->firstname; ?></td>
             </tr>
              <tr>
                <th>ADRESSE</th>
                <td><?= $_SESSION['auth']->address ?></td>
             </tr>
              <tr>
                <th></th>
                <td><?= $_SESSION['auth']->code; ?>  <?= $_SESSION['auth']->localite; ?></td>
             </tr>
              <tr>
                <th>DATE DE NAISSANCE</th>
                <td><?= $_SESSION['auth']->birthday ?></td>
             </tr>
              <tr>
                <th>GSM</th>
                <td><?= $_SESSION['auth']->telephone ?></td>
             </tr>
              <tr>
                <th>E-MAIL</th>
                <td><?= $_SESSION['auth']->email ?></td>
             </tr>
              <tr>
                <th>CLASSEMENT</th>
                <td><?= $_SESSION['auth']->classement ?></td>
             </tr>
              <tr>
                <th>N° AFFILIATION</th>
                <td><?= $_SESSION['auth']->affiliation ?></td>
             </tr>
              <tr>
                <th>INTERCLUBS</th>
                <td><?= $_SESSION['auth']->interclub ?></td>
             </tr>
              <tr>
                <th>DATE INSCRIPTION</th>
                <td><?= $_SESSION['auth']->inscription_at ?></td>
             </tr>

            </tbody>
        </table>         
      </div>
  </div>


<?php require 'inc/footer.php';
