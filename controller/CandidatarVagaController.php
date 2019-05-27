<?php
include_once "model/Candidato.php";
session_start();
$vaga = $_GET["id"];
$idAluno = $_SESSION["id"];

if (isset($vaga) && !empty($vaga)) {

    $candidato = new Candidato();
    $candidato = $candidato->alunoCanditato($idAluno, $vaga);
    if ($candidato) {
        // code...
        $_SESSION['msn']=true;
        header('location: public/exibirVagas.php');

    }
    else {
        $_SESSION['msn']=false;
        header('location: public/exibirVagas.php');

    }

    // code...
}
 ?>
