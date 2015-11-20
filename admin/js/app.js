$(document).ready(function(){
   
    $('#updCatModal').on('show.bs.modal', function (event) {
      var modalInput = $(event.relatedTarget); // Button that triggered the modal
      var id = modalInput.data('id'); 
      var equipe = modalInput.data('equipe');
      var serie = modalInput.data('serie');
      var capitaine = modalInput.data('capitaine');
      var gsm = modalInput.data('gsm');
      var modal = $(this);
      //modal.find('.modal-title').text('Commande ' + recipient)
      modal.find('.modal-body input[name="updId"]').val(id);
      modal.find('.modal-body input[name="updCat"]').val(equipe);
      modal.find('.modal-body input[name="updSerie"]').val(serie);
      modal.find('.modal-body input[name="updCapitaine"]').val(capitaine);
      modal.find('.modal-body input[name="updGsm"]').val(gsm);
    });
     
    $('#btnUpdCat').click( function () {
        var id = $('#updId').val();
        var cat = $('#updCat').val();
        var serie = $('#updSerie').val();
        var capitaine = $('#updCapitaine').val();
        var gsm = $('#updGsm').val();

        $.ajax({
            url:'inc/updCategorie.php?updId='+id+'&updCat='+cat+'&updSerie='+serie+'&updCapitaine='+capitaine+'&updGsm='+gsm,
            success: function(data) {
                    $('#updCatModal').modal('toggle')
                    location.href="equipes.php";
             }
        });
        
    });


    $('#btnAddCat').click( function () {
        var cat = $('#addCat').val();
        var serie = $('#addSerie').val();
        var capitaine = $('#addCapitaine').val();
        var gsm = $('#addGsm').val();

        $.ajax({
            url:'inc/addCategorie.php?addCat='+cat+'&addSerie='+serie+'&addCapitaine='+capitaine+'&addGsm='+gsm,
            success: function(data) {
                    $('#addCatModal').modal('toggle')
                    location.href="equipes.php";
             }
        });
        
    });

    
});
