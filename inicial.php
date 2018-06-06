<?php
	session_start();

    if (empty($_SESSION['nome']) && empty( $_SESSION['matricula'])) {
      header('location:index.php');
    }



  include('php/cloud.php');
	$ações = new  Cloud();



  $dados = $_SESSION['comissão'];
  $dados1 = $_SESSION['nome'];
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Painel geral JIIF </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <!-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> -->
    <meta >
  </head>
  <body>
    <header>
      <div class="logo_principal">
        <img src="img/logo.png">
      </div>
      <div class="indentificação_login">
         <img id="opener" src="img/sair.png">
      </div>
    </header>
    <main id="pagina">
      <section>
         <div class="menu_icon">
           <img src="img/icon_menu.png" id="menu">
          </div>
        <div class="menu" id="ul_menu">
          <nav>
              <ul>
                <li><a id="btn_painel">Atletas/Lideres</a></li>
                <li><a id="btn_arbitros">Arbitragem/Recursos</a></li>
                <li><a id="myBtn">Cadastrar Lider</a></li>
                <li><a id="myBtn2">Registrar organização</a></li>
                <li><a id="btn_recurso">Disputadas Lançadas</a></li>
                <li><a id="btn_classificação">Classificação Turmas</a></li>
								<li><a id="btn_add_noticia">Adicionar Notícia</a></li>
              </ul>
          </nav>
      </div>
    </section>
    <section class="container">
    <section class='classificação' id='classificação'>
          <div class="titulo_container">
            <h1>Classificação de pontuação</h1>
         </div>
      <table>
             <tr>
             <th>Turma</th>
             <th>Pontuação</th>
             </tr>

            <?php

              $ações->classificação();

            ?>
         </table>
        </section>
    <section class='painel' id="painel">
          <div class="titulo_container">
            <h1>Todos Atletas</h1>
         </div>
	 		<table>
	           <tr>
	           <th>Nome Atleta</th>
	           <th>Matricula (RA)</th>
	           <th>Modalidade</th>
	           </tr>

	         	<?php

	         		$ações->mostrar_atletas();

	         	?>
         </table>
         <div class="titulo_container">
            <h1>Lideres de salas</h1>
         </div>
      <table>
             <tr>
             <th>Nome lider</th>
             <th>Matricula (RA)</th>
             <th>Turma</th>
             <th>Ultimo acesso</th>
             </tr>

            <?php

              $ações->mostrar_lideres();

            ?>
         </table>
         <div class="titulo_container">
            <h1>Integrantes de comissões cadastradas</h1>
         </div>
      <table>
             <tr>
             <th>Nome Aluno</th>
             <th>Matricula (RA)</th>
             <th>Comissão</th>
             <th>Ultimo acesso</th>
             </tr>

            <?php

              $ações->mostrar_organização();

            ?>
         </table>
     </section>
     <section id="disputas" class="disputas">
         <div class="titulo_container">
            <h1>Equipe de arbitragem</h1>
         </div>
         <div>
          <table>
             <tr>
             <th>Nome Arbitro</th>
             <th>Matricula (RA)</th>
             </tr>
              <?php

              $ações->mostrar_arbitros();

            ?>
          </table>

         </div>
           <div class="titulo_container">
            <h1>Recursos solicitado </h1>
         </div>
         <div>
   	        <table>
             <tr>
             <th>Nome completo</th>
             <th>Horario Recurso</th>
             <th>Modalidade</th>
             <th>Situação</th>
             </tr>
              <?php

              $ações->mostrar_recursos();

              ?>
          </table>
         </div>
      </div>
    </section>
    <section class="cadastrados">

    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close" id="close">&times;</span>
        <br>
        <form action="#" method="post">
            <div class="container-input">
              <label>Nome completo</label>
              <input type="text" name="aluno" id='aluno' required>
            </div>
            <div class="container-input">
              <label>RA:</label>
              <input type="text" name="ra" id="ra" required>
            </div>
            <div class="container-input">
              <label>Turma:</label>
              <select name="turma" id="turma">
                <option>Selecione uma turma</option>
                 <?php

                  $ações->mostrar_turmas();

                  ?>
              </select>
            </div>
             <div class="btn_adicionais">
               <div class="container-input">
               <input type="submit" value="Registrar" id="button">
             </div>
             <div class="container-input">
               <input type="reset" value="Limpar">
             </div>
             </div>
        </form>
          <div class="validação">
            <ul>
                <li id="erro"></li>
            </ul>
        </div>
      </div>
    </div>
    </section>
      <section class="cadastrados">

    <div id="myModal2" class="modal">
      <div class="modal-content">
        <span class="close" id="close2">&times;</span>
        <br>
        <form action="php/salvar_organização.php" method="post">
            <div class="container-input">
              <label>Nome completo</label>
              <input type="text" name="aluno" id="aluno_comi" required>
            </div>
            <div class="container-input">
              <label>RA:</label>
              <input type="text" name="ra" id="ra_comi" required>
            </div>
            <div class="container-input">
              <label>Comissão participante:</label>
              <input type="tex" name="comissão" id="comissão" required>
            </div>
             <div class="btn_adicionais">
               <div class="container-input">
               <input type="submit" value="Cadastrar" id="button_organização_cadastrar">
             </div>
             <div class="container-input">
               <input type="reset" value="Limpar">
             </div>
             </div>
        </form>
          <div class="validação">
            <ul>
                <li id="erro"></li>
            </ul>
        </div>
      </div>
    </div>
  </section>
  <section class="recursos" id="recursos" style="display:none;">
       <div class="titulo_container">
          <h1>Modalidades lançadas pelo arbitros</h1>
       </div>

        <?php

          $ações->mostrar_disputas();

        ?>
    </section>
		<section id="casdastrar-noticias" class="container-noticias">
			<div class="container-cadastro-noticia">
				<div class="modal-content noticias-modal">
					<form >
							<div class="container-input">
								<label>Titulo da Notícia</label>
								<input type="text" name="titulo-noticia" id='titulo_noticia' required>
							</div>
							<div class="container-input">
								<label>Descrição da Notícia</label>
								<input type="text" name="desc-noticia" id="desc_noticia" required>
							</div>
							<div class="container-input">
								<label>Imagem/Banner</label>
								<form action="php/upload.php" method="post" enctype="multipart/form-data">
									<input type="file" name="img-noticia" id="img-noticia" accept="image/*" required>
									 <input type="submit" value="Upload da Imagem" name="submit" required>
								</form>
							</div>
							 <div class="btn_adicionais">
								 <div class="container-input">
								 <input type="submit" value="Registrar Notícia" id="button"/>
							 </div>
							 <div class="container-input">
								 <input type="reset" value="Limpar">
							 </div>
							 <div class="container-input class-vizualizar">
								 <input type="button" class="btn-preview" value="Vizualizar" id="vizualizar-noticia"/>
							 </div>
						</div>
					</form>
						<div class="validação">
							<ul>
									<li id="erro"></li>
							</ul>
					</div>
				</div>
			</div>
			<!-- VIZUALIZADOR -->
			<section id="myModal3" class="modal">
				 <div class="modal-content">
	         <span class="close" id="close-vizualizador">&times;</span>
	         <br>
	         <div id="todas-noticias" >
	           <div class="card-todasNoti">
	             <div class="contet-card-Tnoticias">
	               <h1>EXEMPLO:</h1>
	               <h2 id="titulo-noticias"></h2>
	               <p class="date-noticia"><i class="large material-icons">date_range</i>
	                 <?php
									 				 date_default_timezone_set("America/Campo_Grande");
	                         echo "Puclicado em: ".date("d/m/Y")."<br>"."às ".date("h:i:sa");
	                 ?>
	               </p>
	               <img src="https://i.ytimg.com/vi/403YQpHfRIk/maxresdefault.jpg"></img>
	               <div class="content-info">
	                  <p id="desc-noticia"></p>
	               </div>
	             </div> <!--fim-card-->
	       </div>
			</section>
			<div class="ultimas-noticias">
				<?php

				$ações->mostrar_Ultimas_noticias();

				 ?>
			</div>
		</section>
    </section>
		<div id="dialog-confirm"  title=" <?php echo $dados  ?>">
		 <p><?php echo $dados1  ?>, Deseja finalizar sua sessão ?</p>
		 </div>
		 <div id="dialog-message" title=" <?php echo $dados  ?>">
			 <p>
				 Solicitação  Cancelada !!!
			 </p>
		 </div>
    </main>
		<!--MVC - JS -->
	<script type="text/javascript" src="js/MVC/Noticia.js"></script>
	<script type="text/javascript" src="js/MVC/previewModel.js"></script>
	<script type="text/javascript" src="js/MVC/previewController.js"></script>
	<script type="text/javascript" src="js/MVC/previewView.js"></script>
	<script type="text/javascript" src="js/MVC/app.js"></script>

  <script type="text/javascript" src="js/sair.js"></script>
  <script type="text/javascript" src="js/exibição.js"></script>
  <script type="text/javascript" src="js/insert_lider.js"></script>
  </body>
</html>
