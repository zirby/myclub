<?php 
    require_once 'inc/conn.php';
    $req = $pdo->prepare("SELECT  * FROM equipes ");
    $req->execute();
?>
<?php require 'inc/header.php'; ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Catégories interclubs</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><button id="btnModalAddCat" type="button" data-toggle="modal" data-target=".bs-addcat-modal-sm" class="btn btn-success navbar-btn"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter une catégorie</button></li>
        <li><button id="btnExportCat" type="button"  class="btn btn-default navbar-btn"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Export CSV</button></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="col-md-12">
    <table class="table table-striped table-hover ">
        <thead>
            <th>N°</th>
            <th>Equipe</th>
            <th>Série</th>
            <th>Capitaines</th>
            <th>GSM</th>
            <th style="text-align: right;">Action</th>
        </thead>
        <tbody>
            <?php while($res = $req->fetch()): ?>
            <tr>
                <td style="text-align: left;"><?= $res->id; ?></td>
                <td style="text-align: left;color:red;"><?= $res->equipe; ?></td>
                <td style="text-align: left;"><?= $res->serie; ?></td>
                <td style="text-align: left;color:green;"><?= $res->capitaine; ?></td>
                <td style="text-align: left;"><?= $res->gsm; ?></td>
                <td style="text-align: right;">
                    <a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target=".bs-updcat-modal-sm" 
                            data-id="<?= $res->id; ?>"
                            data-equipe="<?= $res->equipe; ?>"
                            data-serie="<?= $res->serie; ?>"
                            data-capitaine="<?= $res->capitaine; ?>"
                            data-gsm="<?= $res->gsm; ?>"                       
                            title="Modifier une catégorie"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    <a href="inc/delCategorie.php?id=<?= $res->id; ?>" class="btn btn-danger btn-xs" title="supprimer une catégorie"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
                </td>
             </tr>
             <?php endwhile; ?>
        </tbody>
    </table>
</div>
<!-- Modal ADD LE-->
<div class="modal fade bs-addcat-modal-sm" id="addCatModal" tabindex="-1" role="dialog" aria-labelledby="addCatModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addCatModalLabel">Ajouter une catégorie</h4>
      </div>
     <form action="" method="POST">
         <div class="modal-body ">
            <div class="form-group">
                <label for="addCat" class="control-label">Catégorie:</label>
                <input name="addCat" id="addCat" type="text" class="form-control" >
            </div>
            <div class="form-group">
                <label for="addSerie" class="control-label">Série:</label>
                <input name="addSerie" id="addSerie" type="text" class="form-control" >
            </div>
            <div class="form-group">
                <label for="addCapitaine" class="control-label">Capitaine:</label>
                <input name="addCapitaine" id="addCapitaine" type="text" class="form-control" >
            </div>
            <div class="form-group">
                <label for="addGsm" class="control-label">Gsm:</label>
                <input name="addGsm" id="addGsm" type="text" class="form-control" >
            </div>
        </div>
        <div class="modal-footer">
             <button  id="btnAddCat" type="button" class="btn btn-primary">Enregistrer</button>
        </div>
     </form>
    </div>
  </div>
</div>
<!-- Modal UPDATE-->
<div class="modal fade bs-updcat-modal-sm" id="updCatModal" tabindex="-1" role="dialog" aria-labelledby="updCatModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="updCatModalLabel">Modifier la catégorie</h4>
      </div>
     <form action="" method="POST">
         <div class="modal-body ">
            <div class="form-group">
                <label for="updId" class="control-label">Id:</label>
                <input name="updId" id="updId" type="text" class="form-control" >
            </div>
            <div class="form-group">
                <label for="updCat" class="control-label">Catégorie:</label>
                <input name="updCat" id="updCat" type="text" class="form-control" >
            </div>
            <div class="form-group">
                <label for="updSerie" class="control-label">Série:</label>
                <input name="updSerie" id="updSerie" type="text" class="form-control" >
            </div>
            <div class="form-group">
                <label for="updCapitaine" class="control-label">Capitaine:</label>
                <input name="updCapitaine" id="updCapitaine" type="text" class="form-control" >
            </div>
            <div class="form-group">
                <label for="updGsm" class="control-label">Gsm:</label>
                <input name="updGsm" id="updGsm" type="text" class="form-control" >
            </div>
        </div>
        <div class="modal-footer">
             <button  id="btnUpdCat" type="button" class="btn btn-primary">Enregistrer</button>
        </div>
     </form>
    </div>
  </div>
</div>
<?php require 'inc/footer.php';