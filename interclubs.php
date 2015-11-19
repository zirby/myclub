<?php
require_once 'inc/function.php';
require_once 'inc/db.php';
session_start();

if(isset($_POST['interclub_non'])){
    $req = $pdo->prepare("UPDATE membres SET interclub=false WHERE id=?");
    $req->execute([$_SESSION['auth']->id]);
    header('location: account.php');
}
if(isset($_POST['interclub_oui'])){
    $req = $pdo->prepare("UPDATE membres SET interclub=true WHERE id=?");
    $req->execute([$_SESSION['auth']->id]);
    header('location: interclubs_det.php');
}
?>
<?php require 'inc/header.php'; ?>


    <div class="container">
      <div class="row center">
        <h5 class="header col s12 ">Je souhaite faire partie d'une équipe d'Interclub</h5>
      </div>
      <div class="row center">
          <form action="" method="POST">
                <button type="submit" id="interclub_non" name="interclub_non" class="btn-large waves-effect waves-light orange">NON</button>
                <button type="submit" id="interclub_oui" name="interclub_oui" class="btn-large waves-effect waves-light green">OUI</button>
          </form>
      </div>
    </div>


<?php require 'inc/footer.php';
