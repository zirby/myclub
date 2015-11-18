<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
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
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo center">TC Standard - Inscription</a>
     <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="#">admin</a></li>
      </ul>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">S'inscrire</a></li>
        <li><a href="#">se coonecter</a></li>
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
                <div class="card-panel alert-<?=$type;?> lighten-4">
                    <?=$message;?>
                </div>
            <?php endforeach; ?>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>



