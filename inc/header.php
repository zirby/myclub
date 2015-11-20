<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>TC Standard - MyClub</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/app.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
    <div class="navbar-fixed">
  <nav class="teal lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo center">TC Standard - Inscription</a>
     <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="admin/index.php">admin</a></li>
      </ul>
      <ul class="right hide-on-med-and-down">
        <?php if(isset($_SESSION['auth'])):?>
            <li><a class="page-scroll" href="account.php">Mon compte</a></li>
            <li><a class="page-scroll" href="logout.php">Se déconnecter</a></li>
        <?php else: ?>
            <li><a class="page-scroll" href="register.php">S'inscrire</a></li>
            <li><a class="page-scroll" href="login.php">Se connecter</a></li>
        <?php endif; ?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
    </div>
    <div class="container">
        
        <?php if(isset($_SESSION['flash'])): ?>
            <?php foreach ($_SESSION['flash'] as $type => $message): ?>
                <div class="card-panel <?=$type;?> lighten-4">
                    <?=$message;?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>



