
$('#btn_painel').click(function() {
	$('#painel').slideToggle();
	$('#disputas').hide( "slow" );
	$('#recursos').hide( "slow" );
	$('#classificação').hide( "slow" );
});

$('#btn_classificação').click(function() {
	$('#classificação').slideToggle();
	$('#disputas').hide( "slow" );
	$('#recursos').hide( "slow" );
	$('#painel').hide( "slow" );
});
$('#btn_arbitros').click(function() {
	$('#disputas').slideToggle();
	$('#painel').hide( "slow" );
	$('#recursos').hide( "slow" );
	$('#classificação').hide( "slow" );
});
$('#btn_recurso').click(function() {
	$('#recursos').slideToggle();
	$('#disputas').hide( "slow" );
	$('#painel').hide( "slow" );
		$('#classificação').hide( "slow" );
});
$('#myBtn').click(function() {
	$('#myModal').toggle('fast');
});
$('#close').click(function() {
	$('#myModal').hide( "fast ");
});
$('#myBtn2').click(function() {
	$('#myModal2').toggle('fast');
});
$('#close2').click(function() {
	$('#myModal2').hide( "fast ");
});

$('#menu').click(function() {
	$('#ul_menu').slideToggle();
});
 
$( function() {
    $( "#dialog-confirm" ).dialog({

      autoOpen: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {

        "Encerrar Sessão": function() {
          sair(true);
        },
        Cancelar: function() {
          sair(false);
        }
      }
    });
     $( "#opener" ).on( "click", function() {
      $( "#dialog-confirm" ).dialog( "open" );
    });
  });
    $( function() {
    $( "#dialog-message" ).dialog({
      autoOpen: false,
      modal: true,
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }
    });
});