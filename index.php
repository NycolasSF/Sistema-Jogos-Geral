<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>
      Painel Geral Administrativo
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">

  </head>
  <body>
    <main class="fundo_login">
      <div class="style_login">
          <form action="php/login.php" method="post"> 
          <div lang="titulo_container_2">
            <h1>Painel Administrativo JIIF</h1>
          </div> 
            <div  class="container-input">
              <label>Usuário:</label>
              <input type="text" name="user" id="user" required placeholder="Digite seu usuário">
            </div>
            <div  class="container-input">
              <label>Matricula (RA):</label>
              <input type="number" name="senha" id="senha" required placeholder="Digite sue RA">
            </div>
            <br>
          <div class="container-input">
            <input type="submit" value="Acessar" onclick="validar()">
          </div>
          <div class="validação">
            <ul>
                <li id="erro"></li>
            </ul>
        </div>
        </form>
        
    </div>
      </main>
      <script type="text/javascript" src="js/sair.js"></script>
  </body>
</html>