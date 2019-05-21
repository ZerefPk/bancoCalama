<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-BR ">
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="imagem/x-icon" href="icone.png"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>e-Curriculum || Porto Velho Calama</title>
  <!-- arquivos locais
  <link rel="stylesheet" href="material.min.css">
  <script src="material.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
-->
<!--arquivos online-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.green-light_green.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

</head>
<style>

.mdl-card{
	align-self:center;
	margin-top:5%;
	margin-bottom:0%;
	width:100%;
	text-align:center;
	margin-left: auto;
	margin-right: auto;
}
.mdl-card-testo{
	margin-top: 2%;
	width:60%;
	text-align:left;
	margin-left: 25%;
	position: absolute;

}
.mdl-mini-footer .mdl-logo {
	line-height: 0px;

}
.acme-card {
	margin-left: 5%;
	height: 150px;
	width: 200px;
	margin-top:5%;
	background: url('https://tfirdaus.github.io/mdl/images/laptop.jpg') center / cover;
}
.left {
	float: left;
  	padding-right: 3em;
  	padding-top: 0.3em;
  	padding-bottom: 0.3em;
}
@media screen and (max-width: 500px){
	.mdl-card{
		width: 100%;
		margin-top: 10%;
	}
	.acme-card{
		width:70%;
		height: auto;
	}
	.mdl-card-testo{
		width:70%;
		margin-top: 10%;
		position: relative;
		margin-left:5%;
	}
}
@media screen and (max-width: 1920px){
	.mdl-layout__header-row {
		height: 56px;
		padding: 0 20px 0 20px;
	}
}

</style>
<body>
	<?php

	include ('conexao.php');
	//$_SESSION['usuario'] = $id;
	$id = $_SESSION['aluno'];
	$select = mysqli_query($conn, "SELECT * FROM aluno WHERE idAluno = '$id'");


	while ($aluno = mysqli_fetch_array($select)) {
		$id = $aluno['idAluno'];
		$nome = $aluno['nome'];
		$sexo = $aluno['sexo'];
		$data = date("d/m/Y", strtotime($aluno['data_de_nascimento']));
		$cpf = $aluno['cpf'];
		$tel = $aluno['telefone'];
		$email = $aluno['email'];
		$curso = $aluno['curso'];
		$ano = $aluno['ano'];
		$senha = $aluno['senha'];
		$objetivo = $aluno['objetivo_prof'];
		$experiencia = $aluno['experiencia_prof'];
		$extensao = $aluno['extensao'];
		$foto = $aluno['foto'];
		$disponivel = $aluno['disponibilidade'];
		$civil = $aluno['status_civil'];
		$bairro = $aluno['bairro'];
		$idioma = $aluno['idioma'];
		$escolaridade = $aluno['escolaridade'];
		$projetos =  $aluno['extensao'];
	}


    printf("<div class='mdl-layout mdl-js-layout mdl-layout--fixed-header'>
        <header class='mdl-layout__header'>
            <div class='mdl-layout__header-row'>
                <button class='mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon' onclick='history.go(-1);'>
                	<i class='material-icons' style='color:white;'>arrow_back</i>
                </button>
                <div class='mdl-layout-spacer'></div>
        		<span class='mdl-layout-title' style='color: white;'>Meu Currículo</span>
            </div>
        </header>
	<div>
		<!--- cardzao principal --->
        <div class='mdl-card' style='padding-left: 2em;>
        	<!--- card da imagem--->
        	<div class='mdl-card left'>
        		<td><img src='uploads/%s' style='width:10em; height:11em;'></td>
        	</div>
        	<!--- card dos textos --->
        	<div class='mdl-card-testo left'>

		        <form action='estudantes.php'>
		                        <h3>Currículo</h3>

		                        <h5>Dados Pessoais</h5>
		                        <hr>
		                        <p><b>Nome:</b> %s</p>
		                        <p><b>Sexo:</b> %s</p>
					<p><b>Data de Nascimento:</b> %s</p>
					<p><b>E-mail:</b> %s</p>
					<p><b>Telefone:</b> %s</p>
					<p><b>Estado Civil:</b> %s</p>
					<p><b>Bairro em que reside:</b> %s</p>
					<h5>Formação</h5>
		                        <hr>
					<p><b>Formação Escolar:</b> %s</p>
					<p><b>Curso:</b> Técnico em %s Integrado</p>
					<p><b>Ano/Período:</b> %s</p>
					<h5>Cursos/Experiência</h5>
		                        <hr>
					<p><b>Idioma Estrangeiro:</b> %s</p>
					<p><b>Experiência profissional:</b> %s</p>
					<p><b>Pesquisa, ensino e extensões:</b> %s</p>
					<h5>Objetivos</h5>
		                        <hr>
					<p><b>Objetivo Porfissional:</b> %s</p>
					<p><b>Disponibilidade:</b> %s</p>
					</br>

					 <a href = 'imprimirCurriculo.php' target='_blank'><button class='mdl-button mdl-js-button mdl-button--raised mdl-button--colored' type='button' style='color:white;' name='imprimir' value='imprimir'> <img src='https://image.flaticon.com/icons/png/512/61/61764.png' border='0' ; width='36' height='36'</button></a>

<button class='mdl-button mdl-js-button mdl-button--raised mdl-button--colored' type='input' style='color:white; margin: 7px;'>Sair</button></center>

		        </form>
            </div>
            <!--Gambiarra pra mostrar todo o texto acima-->
			<div class='' style='margin-bottom:20px'></div>
			<!--sera ajeitado dps-->
	</div>
</div>", $foto, $nome, $sexo, $data, $email, $tel, $civil, $bairro, $escolaridade,$curso, $ano, $idioma,$experiencia,$projetos, $objetivo, $disponivel);
		?>

	</body>
	</html>