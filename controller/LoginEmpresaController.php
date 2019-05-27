<?php
include_once '../model/Empresa.php';
session_start();
$senha = $_POST['senha'];
$cnpj   = $_POST['cnpj'];

if (isset($senha) && isset($cnpj )) {
    $empresa = new Empresa();
    $empresa = $empresa->loginEmpresa($cnpj, $senha);

    if ($empresa) {
        header('location: ../indexEmpresaCadastrada.php');
    }
    else {
        echo "<script>alert('CPF OU SENHA INVALIDO');</script>";
    	echo "<script>location.href='../index.php';</script>";
    }
}
else {
    echo "<script>alert('CPF OU SENHA INVALIDO');</script>";
	echo "<script>location.href='../index.php';</script>";
}



 ?>
