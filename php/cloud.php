<?php

  include('conexão.php');



class Cloud extends Conexao
{

   // Busca banco de dados

   private $_arbitros = 'select*from arbitros';
   private $_todos_recursos = "SELECT nome_completo,horario_recurso,modalidade,situação FROM recursos INNER JOIN lider_sala INNER JOIN Turma ON recursos.id_turma = Turma.id_turma and recursos.id_lider = lider_sala.id_lider";
    private $_atletas = 'SELECT id_atleta,nome_aluno,nome_turma,nome_modalidade,altletas.RA FROM lider_sala INNER JOIN modalidades INNER JOIN Turma INNER JOIN altletas on altletas.id_lider = lider_sala.id_lider AND altletas.id_turma = Turma.id_turma and altletas.id_modalidade = modalidades.id_modalidade ';

   private $turma = 'select*from Turma';

   private $lider_salas ='SELECT*FROM lider_sala INNER JOIN Turma on lider_sala.id_turma = Turma.id_turma ORDER BY nome_turma ASC ';

   private $disputas = 'SELECT nome_modalidade,nome_integrante_organização,data_disputada,pontuação,adversario_turma,relatorio_jogo FROM modalidades INNER JOIN arbitros INNER JOIN disputas INNER JOIN Turma ON disputas.id_modalidade = modalidades.id_modalidade and disputas.id_turma = Turma.id_turma and disputas.id_arbitro = arbitros.id_arbitro';


    private $Organização = 'select*from Organização';
    private $classificação = 'select nome_turma,sum(pontuação) as soma FROM disputas INNER JOIN Turma INNER JOIN lider_sala on disputas.id_turma = Turma.id_turma GROUP BY nome_turma HAVING sum(pontuação) ORDER BY sum(pontuação) DESC';

    private $ultimasNoticias = 'SELECT * FROM NOTICIAS';//aq que está dando o erro na função mostrar-mostrar_Ultimas_noticias
   // Fim

   public function mostrar_arbitros()
    {
      $sql = mysqli_query($this->conectar(),$this->_arbitros);
      while($exibe = mysqli_fetch_assoc($sql)){

        echo "<tr>";
        echo "<td >".$exibe['nome_integrante_organização'] ."</td>";
        echo "<td >".$exibe['RA']."</td>";
        echo "</tr>";
      }
    }
     public function classificação()
    {
      $sql = mysqli_query($this->conectar(),$this->classificação);
      while($exibe = mysqli_fetch_assoc($sql)){

        echo "<tr>";
        echo "<td >".$exibe['nome_turma'] ."</td>";
        echo "<td >".$exibe['soma']."</td>";
        echo "</tr>";
      }
    }
    public function mostrar_lideres()
    {
      $sql = mysqli_query($this->conectar(),$this->lider_salas);
      $contar = mysqli_num_rows($sql);
       if($contar>0){
      while($exibe = mysqli_fetch_assoc($sql)){

        echo "<tr>";
        echo "<td>".$exibe['nome_completo'] ."</td>";
        echo "<td>".$exibe['Ra']."</td>";
        echo "<td>".$exibe['nome_turma']."</td>";
        echo "<td>".$exibe['data_acesso']."</td>";
        echo "</tr>";
      }
    }
    }
    public function mostrar_disputas()
    {
      $sql = mysqli_query($this->conectar(),$this->disputas);
      $contar = mysqli_num_rows($sql);

      if($contar > 0){
        while($exibe = mysqli_fetch_assoc($sql)){

          echo'<div class="disputas_registrada">';
            echo ' <div class="titulo_container">';
            echo '<h1>Modalidade:'.$exibe['nome_modalidade'].'</h1>';
            echo ' </div>';
             echo '<ul>';
               echo '<li>Horário Disputa '.$exibe['data_disputada'].'</li>';
               echo '<li>Arbitro:'.$exibe['nome_integrante_organização'].'</li>';
               echo '<li>Turma concorrente:'.$exibe['adversario_turma'].'</li>';
               echo '<li>Relatorio do jogo:'.$exibe['relatorio_jogo'].'</li>';
                echo '<li>Modalidade:'.$exibe['nome_modalidade'].'</li>';
             echo '</ul>';;
             echo ' </div>';
        }
      }else{
          echo'<div class="disputas_registrada">';
            echo ' <div class="titulo_container">';
            echo '<h1>Nenhum registro encontrado...</h1>';
            echo ' </div>';
      }
    }

   public function mostrar_atletas()
    {
      $sql = mysqli_query($this->conectar(),$this->_atletas);
       $contar = mysqli_num_rows($sql);
       if($contar>0){
          while($exibe = mysqli_fetch_assoc($sql)){


          echo "<tr>";
          echo "<td>".$exibe['nome_aluno'] ."</td>";
          echo "<td>".$exibe['nome_turma']."</td>";
          echo "<td>".$exibe['nome_modalidade']."</td>";
          echo "</tr>";
        }
        }

    }
     public function mostrar_organização()
    {
      $sql = mysqli_query($this->conectar(),$this->Organização);
       $contar = mysqli_num_rows($sql);
       if($contar>0){
          while($exibe = mysqli_fetch_assoc($sql)){


          echo "<tr>";
          echo "<td>".$exibe['nome_integrante_organização'] ."</td>";
          echo "<td>".$exibe['RA']."</td>";
          echo "<td>".$exibe['comissão']."</td>";
          echo "<td>".$exibe['data_acesso']."</td>";
          echo "</tr>";
        }
        }

    }
    public function mostrar_recursos()
    {
      $sql = mysqli_query($this->conectar(),$this->_todos_recursos);
      $contar = mysqli_num_rows($sql);
       if($contar>0){
      while($exibe = mysqli_fetch_assoc($sql)){


        echo "<tr>";
        echo "<td>".$exibe['horario_recurso'] ."</td>";
        echo "<td>".$exibe['nome_completo']."</td>";
        echo "<td>".$exibe['modalidade']."</td>";
        echo "<td>".$exibe['situação']."</td>";
        echo "</tr>";
      }
    }
    }
      public function mostrar_turmas()
      {
        $sql = mysqli_query($this->conectar(),$this->turma);
        while($exibe = mysqli_fetch_assoc($sql)){
         echo "<option value='".$exibe['id_turma'] ."'>".$exibe['nome_turma']."</option>";
        }
      }
    public function insert_lider($lider,$ra,$turma)
    {
      $sql = mysqli_query($this->conectar(),"insert into lider_sala values(0,'".$lider."','".$ra."','".$turma."',now())");
    }
    public function insert_organização($lider,$ra,$comissao)
    {
      $sql = mysqli_query($this->conectar(),"insert into Organização values(0,'".$lider."','".$ra."','".$comissao."',now())");
    }
    public function login($nome,$ra){


      $sql = mysqli_query($this->conectar(),"SELECT * FROM Organização where nome_integrante_organização='".$nome."' and RA='".$ra."'");
      $date = mysqli_query($this->conectar(),"update Organização set data_acesso = DATE_ADD(data_acesso, INTERVAL +11 HOUR) where RA='".$ra."'");
      $contar = mysqli_num_rows($sql);
       if($contar == 0){
        echo "<script>localStorage.setItem('login', 'false')</script>";
         echo "<script>window.location.href='../index.php';</script>";

       }else{
          if(!isset($_SESSION))
            session_start();
          while($exibe = mysqli_fetch_assoc($sql)){

            $_SESSION['comissão'] = $exibe['comissão'];
            $_SESSION['nome'] = $exibe['nome_integrante_organização'];
            $_SESSION['matricula']=$exibe['RA'];

            header('location:../inicial.php');

          }

       }
    }
    public function mostrar_Ultimas_noticias()
    {
      $sql = mysqli_query($this->conectar(),$this->ultimasNoticias);
      $contar = mysqli_num_rows($sql);


      if ($contar > 0) {
        while ($exibe = mysqli_fetch_assoc($sql)) {

         echo  '<div id="noticias" class="tabcontent">';
         echo    '<h1 class="title-tabs">Últimas Notícias</h1>';
         echo    '<div class="content-cards">';
         echo      '<div class="card card-01">';
         echo        '<h2 id="titulo-noticias">'.$exibe['titulo_noticia'].'</h2>';
         echo        '<p class="date-noticia"><i class="large material-icons">date_range</i>'.$exibe['data_noticia'].'</p>';
         echo          '<img src="https://i.ytimg.com/vi/403YQpHfRIk/maxresdefault.jpg"></img>';
         echo          '<div class="content-info">';
         echo            '<p>'.$exibe['desc_noticia'].'</p>';
         echo          '</div>';
         echo      '</div> <!--fim-card-->';
         echo      '<div class="card card-02">';
         echo        '<h2 id="titulo-noticias">'.$exibe['titulo_noticia'].'</h2>';
         echo        '<p class="date-noticia"><i class="large material-icons">date_range</i>'.$exibe['data_noticia'].'</p>';
         echo        '<img src="https://i.ytimg.com/vi/403YQpHfRIk/maxresdefault.jpg"></img>';
         echo          '<div class="content-info">';
         echo            '<p>'.$exibe['desc_noticia'].'</p>';
         echo          '</div>';
         echo      '</div> <!--fim-card-->';
        }
      }
    }

}

?>
