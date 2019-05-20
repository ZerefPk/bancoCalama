<?php
include_once '../model/Aluno.php';
include_once '../model/CpfAluno.php';
include_once '../model/Empresa.php';
include_once '../model/Candidato.php';
session_start();
$a = new Candidato();
$b = $a->deletarCanditato(4);
var_dump($b);

 ?>
