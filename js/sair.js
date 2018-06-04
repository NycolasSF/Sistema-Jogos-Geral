	var container = document.getElementById('erro');
	let data = localStorage.getItem('login');

	
	if (data == 'false'){
		container.style.color = 'green';
		container.innerHTML = 'Desculpe seus dados não foram encontrado, entre em contato com a equipe de T.I';
		 localStorage.clear();
	}


function sair(logico) {
	if (logico == true) {
		window.location.href='php/sair.php';
	}else{
		 $('#dialog-message').dialog( "open" );
		$( "#dialog-confirm" ).dialog( "close" );
	}
}

function validar(){

	let user = document.getElementById('user').value;
	let senha = document.getElementById('senha').value;


	if (user && senha) {
		container.style.color = 'green';
		container.innerHTML = 'Estamos procurando seu cadastro, aguarde...';
	}


	try{
		if (!user  && !senha) throw 'Campo usuário e matricula estão vazio...';
		if (!user) throw 'Campo usuário vazio...';
		if (!senha) throw 'Campo matricula vazio...';
	}catch(err){
		container.style.color = 'red';
		container.innerHTML = err;
	}


}