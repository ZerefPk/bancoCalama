<?php
include_once '../model/Vaga.php';

$vaga = new Vaga();
$totalItens = 1;
$maxLinks=4;
$pagina =  (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1 ;

$vaga = $vaga->listaVaga($pagina,$totalItens);
$totalPaginas=ceil($vaga[1]/1);
$totalItensBanco = $vaga[1];

 ?>
 ?>
