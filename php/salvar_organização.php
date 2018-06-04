<?php

	 include('cloud.php');

	 $connect = new Cloud();

	 $campo = $_POST['aluno'];
	 $campo1 = $_POST['ra'];
	 $campo2 = $_POST['comissao'];

	 $connect->insert_organização($campo,$campo1,$campo2);

?>