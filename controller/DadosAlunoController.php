<?php
include_once('model/Aluno.php');

$id = $_SESSION['id'];
$aluno = new Aluno();

$aluno = $aluno->detalheAluno($id);


 ?>
