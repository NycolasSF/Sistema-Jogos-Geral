<?php

	include('cloud.php');


	$conectar =  new Cloud();



	 $login=$_POST['user'];	
  	 $senha=$_POST['senha'];

  	 

	$conectar->login($login,$senha);









?>