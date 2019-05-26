<?php
session_start();
include_once "../model/Vaga.php";
if(isset($_POST['cargo']) && isset($_POST['requisitos']) &&
 isset($_POST['vaga']) && isset($_POST['periodo']) && isset($_POST['cargahoraria']) &&
 isset($_POST['remuneracao']) && isset($_POST['area'])) {
	//$_POST['nomeficticio']) && isset($_POST['email']) &&
	//$nomeficticio = $_POST['nomeficticio'];
	//$email = $_POST['email'];

	$cargo = $_POST['cargo'];
	$especialidade = $_POST['requisitos'];
	$qtd = $_POST['vaga'];
	$periodo= $_POST['periodo'];
	$cargaH = $_POST['cargahoraria'];
	$remuneracao= $_POST['remuneracao'];
	$area = $_POST['area'];
    $desc = $_POST['descricao'];
    $idEmp = $_SESSION['idEmpresa'];
    $requisitos = $_POST['requisitos'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $vaga = new Vaga();
    $vaga = $vaga->cadastraVaga($cargo, $qtd, $cargaH, $requisitos, $periodo, $remuneracao, $area, $idEmp,
    $desc, $requisitos, $email, $telefone);

    if ($vaga ){
        // code...
        $_SESSION['msn']=true;
        header('location: ../public/indexEmpresaCadastrada.php');

    }
    else {
        $_SESSION['msn']=false;
        echo $vaga;
        echo $cargo, $qtd, $cargaH, $requisitos, $periodo, $remuneracao, $area, $idEmp,
        $desc, $requisitos, $email, $telefone;
        //header('location: ../public/indexEmpresaCadastrada.php');

    }


}
else {
    echo "err";
}
?>
