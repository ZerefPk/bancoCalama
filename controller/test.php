<?php
include_once '../model/Aluno.php';
include_once '../model/CpfAluno.php';

$a = new CpfAluno();
$a = $a->validaCpf('041.964.202.14');
echo $a;
 ?>
