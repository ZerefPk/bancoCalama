<?php
include_once '../model/Aluno.php';
session_start();
$senha = $_POST['senha'];
$cpf   = $_POST['cpf'];

if (isset($senha) && isset($cpf)) {
    $aluno = new Aluno();
    $aluno = $aluno->loginAluno($cpf, $senha);

    if ($aluno) {
        header('location: ../public/indexAlunoCadastrados.php');
    }
    else {
        echo "<script>alert('CPF OU SENHA INVALIDO');</script>";
    	echo "<script>location.href='index.php';</script>";
    }
}
else {
    echo "<script>alert('CPF OU SENHA INVALIDO');</script>";
	echo "<script>location.href='index.php';</script>";
}


 ?>
