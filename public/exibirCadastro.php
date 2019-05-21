<?php

include('conexao.php');

// Check connection
if ($conn->connect_error) {
   	die("Connection failed: " . $conn->connect_error);
}

$nome = $_POST["nome"];
$sexo = $_POST["sexo"];
$data = date("d/m/Y", strtotime($_POST["data"]));
$bairro = $_POST["bairro"];
$idioma = $_POST["idioma"];
$cpf = $_POST["cpf"];
$senha = $_POST["senha"];
$tel = $_POST["telefone"];
$email = $_POST["email"];
$curso = $_POST["curso"];
$ano = $_POST["ano"];
$senha = $_POST["senha"];
$data_acesso = date('H:i');
$registro_vagas = 0;
$experiencia = $_POST["experiencia"];
$projetos = $_POST["projetos_de_extensao"];
$objetivo = $_POST["objetivo_profissional"];
$disponivel = $_POST["turno"];
$civil = $_POST["estCivil"];
$escolaridade = "Ensino Fundamental completo";

if ($disponivel == "Matutino") {
	$disponivel = "Vespertino";
}else{
	$disponivel = "Matutino";
}


$extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensão do arquivo
$novo_nome = md5(time()) . $extensao; //define o nome do arquivo
$diretorio = "uploads/"; //define o diretório para onde enviaremos o arquivo

move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua upload
//move_uploaded_file($novo_nome, "uploadsImages");

//MEXER DEPOIS NISSO, PARA VERIFICAR SE O USUÁRIO JÁ EXISTE!!
/*$search = mysql_query("SELECT * FROM aluno WHERE cpf = '$cpf'");

if(@mysql_num_rows($search) > 0){
	//Aqui é se o CPF já constar no banco
	echo "<script>alert(CPF já consta no banco de dados.\nVocê será redirecionado para a página de formulário.\nPor favor, tente novamente.');</script>";
	echo "<script>window.location = 'FormularioAluno.php';</script>";
}*/
$sql = "SELECT * FROM aluno WHERE cpf = '$cpf'";
$query = $conn->query($sql);
$result = $query->fetch_assoc(); // fetch it first
if ($conn->query($sql) == TRUE && $result["idAluno"]!="" ) {
	echo "<script>alert('Usuário com esse CPF já está cadastrado no banco de dados!');</script>";
	echo "<script>location.href='estudantes.php';</script>";
	exit();
}

$insert = "INSERT INTO aluno (nome, sexo, data_de_nascimento, cpf, telefone, email, curso, ano, senha, acesso, objetivo_prof, experiencia_prof, extensao, foto, disponibilidade, escolaridade, status_civil, bairro, idioma) VALUES ('$nome', '$sexo', '$data', '$cpf', '$tel', '$email', '$curso', '$ano', '$senha', '$data_acesso', '$objetivo', '$experiencia', '$projetos', '$novo_nome', '$disponivel', '$escolaridade', '$civil', '$bairro', '$idioma')";

$objetivo = nl2br($objetivo);
$experiencia = nl2br($experiencia);
$projetos = nl2br($projetos);

if ($conn->query($insert)) {
	echo "<script>alert('Inserção realizada com sucesso!');</script>";
}else{
	$error = mysqli_error($conn);
	echo "<script>console.log('" . $error . "')</script>";
	echo "<script>alert('Oops... tivemos um problema. :(.... Tente novamente!');</script>";
	//echo "<script>location.href = 'javascript:history.back()';</script>";
}
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
	margin-top: 0.5%;
	width:60%;
	text-align:left;
	margin-left: 7%;
	position: absolute;

}
.mdl-mini-footer .mdl-logo {
	line-height: 0px;

}
.left {
	float: left;
  	padding-right: 3em;
  	padding-top: 0.3em;
  	padding-bottom: 0.3em;
}
.acme-card {
	margin-left: 5%;
	height: 150px;
	width: 200px;
	margin-top:5%;

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
	printf("<div class='mdl-layout mdl-js-layout mdl-layout--fixed-header'>
        <header class='mdl-layout__header'>
            <div class='mdl-layout__header-row'>
                <button class='mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon' onclick='history.go(-1);'>
                	<i class='material-icons' style='color:white;'>arrow_back</i>
                </button>
            </div>
        </header>
	<div>
		<!--- cardzao principal --->
        <div class='mdl-card' style='padding-left: 2em;>
        	<!--- card da imagem--->
        	<div class='mdl-card left'>
        		<img src='uploads/%s' style='width:10em; height:11em;'>
        	</div>
        	<!--- card dos textos --->
        	<div class='mdl-card-testo left'>

		        <form action='estudantes.php'>
		        		<h3>Currículo</h3>

		        		<h5>Dados Pessoais </h5>
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
					<h5>Cursos/Experiência<h5>
					<hr>
					<p><b>Idioma Estrangeiro:</b> %s</p>
					<p><b>Experiência profissional:</b> %s</p>
					<p><b>Pesquisa, ensino e extensões:</b> %s</p>
					<h5>Objetivos</h5>
					<hr>
					<p><b>Objetivo Porfissional:</b> %s</p>
					<p><b>Disponibilidade:</b> %s</p>
					</br>

					<a href='imprimirCurriculo.php'><button class='mdl-button mdl-js-button mdl-button--raised mdl-button--colored' type='button' style='color:white; margin: 7px;' name='imprimir' value='imprimir'><img src='https://image.flaticon.com/icons/png/512/61/61764.png' border='0' ; width='36' height='36'</button></a>
</a></br>
	<button class='mdl-button mdl-js-button mdl-button--raised mdl-button--colored' type='input' margin-right:'2px' style='color:white;'>Sair</button></center>

		        </form>
            </div>
            <!--Gambiarra pra mostrar todo o texto acima-->
			<div class='' style='margin-bottom:20px'></div>
			<!--sera ajeitado dps-->
	</div>
</div>", $novo_nome, $nome, $sexo, $data, $email, $tel, $civil, $bairro,$escolaridade,$curso, $ano, $idioma, $experiencia, $projetos, $objetivo, $disponivel);
		?>




        <!--- exemplo do uso do grid
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">6(8tablet)</div>
            <div class="mdl-cell mdl-cell--4-col mdl-cell--6-col-tablet">4(6tablet)</div>
            <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-phone">2(4phone)</div>
        </div>
        --->
        <button></button>
    </main>
</div>
</div>
</div>
</body>
</html>
