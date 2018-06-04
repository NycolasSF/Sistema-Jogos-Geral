<?php

	 include('cloud.php');

	 $connect = new Cloud();

	 $campo = $_POST['aluno'];
	 $campo1 = $_POST['ra'];
	 $campo2 = $_POST['turma'];



	 $connect->insert_lider($campo,$campo1,$campo2);

?>