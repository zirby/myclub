<?php 
    require_once 'inc/conn.php';
    $req = $pdo->prepare("SELECT  * FROM equipes ");
    $req->execute();
?>
<?php require 'inc/header.php'; ?>
<div class="row">
    <div class="col-md-6">
        <h1>Equipes Interclubs</h1>
    </div>
    <div class="col-md-6 text-right" style="margin-top: 21px;">
        <a href="inc/doSupprimer.php" class="btn btn-danger" title="supprimer"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Suppression automatique</a>
    </div>
</div>
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
                <td style="text-align: left;color:red;"><?= strtoupper($res->equipe); ?></td>
                <td style="text-align: left;"><?= $res->série; ?></td>
                <td style="text-align: left;color:green;"><?= $res->capitaine; ?></td>
                <td style="text-align: left;"><?= $res->gsm; ?></td>
                <td style="text-align: right;">
                    <a href="#" class="btn btn-default btn-xs" data-toggle="modal" data-target=".bs-example-modal-sm" data-id="<?= $res->rid; ?>"><span class="glyphicon glyphicon-euro" aria-hidden="true"></span></a>
                    <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target=".bs-envoye-modal-sm" data-id="<?= $res->rid; ?>"><span class="glyphicon glyphicon-send" aria-hidden="true"></span></a>
                    <a href="inc/printReservation.php?id=<?= $res->rid; ?>" class="btn btn-info btn-xs" title="imprimer"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    <a href="#" class="btn btn-success btn-xs" title="attribuer les places" data-toggle="modal" data-target=".bs-places-modal-sm" data-id="<?= $res->rid; ?>" data-jour="<?= $res->jour; ?>" data-nbplaces="<?= $res->nbplaces; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
                    <a href="inc/doAccepteLe.php?reserv=<?= $res->rid; ?>" class="btn btn-danger btn-xs" title="accepter"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                </td>
             </tr>
             <?php endwhile; ?>
        </tbody>
    </table>
</div>
<!-- Modal PAYE LE-->
<div class="modal fade bs-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Réservation</h4>
      </div>
     <form action="" method="POST">
         <div class="modal-body ">
            <div class="form-group">
                <label for="recipient-name" class="control-label">Réservation n°:</label>
                <input name="Nreserve" id="Nreserve" type="text" class="form-control" id="recipient-name">
                </div>
             <strong> Payé le:</strong>
          <div class="form-group">
              <div id="dtPaye"></div>
          </div>
        </div>
        <div class="modal-footer">
             <button  id="btnPayeLeReset" type="button" class="btn btn-primary">Reset</button>
        </div>
     </form>
    </div>
  </div>
</div>
<!-- Modal ENVOYE LE-->
<div class="modal fade bs-envoye-modal-sm" id="envoyeModal" tabindex="-1" role="dialog" aria-labelledby="envoyeModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="envoyeModalLabel">Envoyer</h4>
      </div>
     <form action="" method="POST">
         <div class="modal-body ">
            <div class="form-group">
                <label for="envoye-name" class="control-label">Réservation n°:</label>
                <input name="NEreserve" id="NEreserve" type="text" class="form-control" id="envoye-name">
                </div>
             <strong> Envoyé le:</strong>
          <div class="form-group">
              <div id="dtEnvoye"></div>
          </div>
        </div>
        <div class="modal-footer">
             <button name="btnEnvoyeLeReset" id="btnEnvoyeLeReset" type="button" class="btn btn-primary">Reset</button>
        </div>
     </form>
    </div>
  </div>
</div>
<!-- Modal doPlaces-->

<div class="modal fade bs-places-modal-sm" id="placesModal" tabindex="-1" role="dialog" aria-labelledby="placesModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="envoyeModalLabel">Attribuer les places</h4>
      </div>
     <form action="inc/doPlacesReserv.php" method="POST">
         <div class="modal-body ">
            <div class="form-group">
                <label for="NPreserve" class="control-label">Réservation n°:</label>
                <input name="NPreserve" id="NPreserve" type="text" class="form-control" >
            </div>
            <div class="form-group">
                <label for="jour" class="control-label">Jour:</label>
                <input name="jour" id="jour" type="text" class="form-control" >
            </div>            
            <div class="form-group">
                <label for="nbplaces" class="control-label">Nb de Places:</label>
                <input name="nbplaces" id="nbplaces" type="text" class="form-control" >
            </div>            
            <strong> Les places:</strong>
            <div class="form-group">
                <select id="selPlaces" name="selPlaces[]"  multiple="multiple"></select>
            </div>
        </div>
        <div class="modal-footer">
            <button name="btnDoPlaces" id="btnDoPlaces" type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
     </form>
    </div>
  </div>
</div>
<?php require 'inc/footer.php';