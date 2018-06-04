   $(document).ready(function() {
     $("#button").click(function() {
       var aluno = $("#aluno").val();
       var ra = $("#ra").val();
       var turma = $("#turma").val();
       $.ajax({
         url: 'php/salvar_lider.php',
         method: 'POST',
         data: {
           aluno: aluno,
           ra: ra,
           turma: turma
         },
         success: function(data) {
           document.getElementById('erro').style.color='green';
          document.getElementById('erro').innerHTML =(aluno + ' , Aluno(a) inserida com sucesso !! ');
           aluno = $("#aluno").val('');
           ra = $("#ra").val('');
           turma = $("#turma").val('');
         }
       });
       return false;
     });
     $("#button_organização_cadastrar").click(function() {
       var aluno = $("#aluno_comi").val();
       var ra = $("#ra_comi").val();
       var comissao = $("#comissão").val();
       $.ajax({
         url: 'php/salvar_organização.php',
         method: 'POST',
         data: {
           aluno: aluno,
           ra: ra,
           comissao: comissao
         },
         success: function(data) {
          document.getElementById('erro').innerHTML = (aluno + ' , Aluno(a) inserida com sucesso !! ');
           aluno = $("#aluno_comi").val('');
           ra = $("#ra_comi").val('');
           comissao = $("#comissao").val('');
         }
       });
       return false;
     });
   });