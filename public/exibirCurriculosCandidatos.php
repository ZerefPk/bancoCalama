<!DOCTYPE html>
<html lang="pt-BR ">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Todos os Alunos Cadastrados</title>
  <!-- arquivos locais
  <link rel="stylesheet" href="material.min.css">
  <script src="material.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
-->
<!--arquivos online-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.green-light_green.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<style>

.mdl-card{
  display:-webkit-flex;
  display:-ms-flexbox;
  display:flex;
  -webkit-flex-direction:column;
  -ms-flex-direction:column;
  flex-direction:column;
  min-height:20%;
  overflow:hidden;
  width:50%;
  position:relative;
}

.esquerda {
  float: left;
  text-align: left;
  padding-left: 10px;
  padding-bottom-top: 8px;
}

.mdl-layout__content{
  -ms-flex:0 1 auto;
  position:relative;
  display:inline-block;
  overflow-y:auto;
  overflow-x:hidden;
  -webkit-flex-grow:1;
  -ms-flex-positive:1;
  flex-grow:1;
  z-empresas:1;
  -webkit-overflow-scrolling:touch
}


.mdl-mini-footer .mdl-logo {
  line-height: 0px;

}

/* Small devices (landscape phones, 576px and up)*/
@media screen and (min-width: 576px) {
  .mdl-card{
    width: 95%;
    margin-top: 10%;
  }
}

/* Medium devices (tablets, 768px and up)*/
@media screen and (min-width: 768px) {
  .mdl-card{
    width: 80%;
    margin-top: 10%;
  }
}

/* Large devices (desktops, 992px and up)*/
@media screen and (min-width: 992px) {
  .mdl-card{
    width: 70%;
    margin-top: 10%;
  }
}

/* Extra large devices (large desktops, 1200px and up)*/
@media screen and (min-width: 1200px) {
  .mdl-layout__header-row {
    height: 56px;
    padding: 0 20px 0 20px;
  }

  .mdl-card{
    width: 50%;
    margin-top: 10%;
  }
  .img-circle {
border-radius: 50%;
}
}
</style>
<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <!--back arrow-->
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon " onclick="history.go(-1);">
          <i class="material-icons" style="color: white;">arrow_back</i>
        </button>
        <div class="mdl-layout-spacer"></div>
        <span class="mdl-layout-title" style="color: white;">Vagas Disponíveis</span>
      </div>
    </header>
<nav>
  <center>
    <select >
  <option value="Inglês">Inglês</option>
  <option value="Espanhol">Espanhol</option>
  <option value="saab"></option>
  <option value="mercedes">Mercedes</option>
  <option value="audi">Audi</option>
</select>
  </center>
</nav>
    <?php
    include('listarCandidatos.php');


/*echo "<pre>";
print_r($rows);
echo "</pre>";
*/

while ($dados = $query->fetch_assoc()) {
  echo '
  <center>
 <section>
 </br> </br> </br> </br>
  <div class="container py-2">
    <div class="card"style = "width: 42rem;height:17rem">
      <div class="row ">
        <div class="col-md-4">
            <img class="img-circle" src="',$dados['foto'],'" style = "width: 10rem;"  >
          </div>
          <div class="col-md-8 px-3">
            <div class="card-block px-3">
              <h4 class="card-title" >'.$dados['nome'].'</h4>
              <p class="card-text" style="font-family:Lucida Sans Unicode;font-size:15px;">'.$dados['objetivo_prof'].' </p>
 <a href="exibirCurriculos.php?idAluno="'.$aluno_id_aluno.'"><button class=" mdl-button mdl-button--raised mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-color-text--white" type="submit" name= "candidatos">+Ver Mais</button></a>            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>


</br></br></br>


</center>
 ';
}

$totalItens = 1;
$maxLinks=5;
$pagina =  (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1 ;

$inicio = ($pagina * $totalItens) - $totalItens;

$sql =  "SELECT * FROM candidato ORDER BY ID_candidato DESC LIMIT $inicio,$totalItens  " ;

$totalItensBanco = "SELECT COUNT(ID_vaga) vagas FROM vagas ";
$totalItensBanco = $conn->query($totalItensBanco);
$totalItensBanco = $totalItensBanco->fetch_assoc();
$totalItensBanco = $totalItensBanco['vagas'];

$totalPaginas=ceil($totalItensBanco/1);
$query = $conn->query($sql);
?>


<div class="mdl-card mdl-shadow--6dp">
  <div class="esquerda">
    <nav>
      <ul class="pagination ">
        <?php if ($totalItensBanco > 1) {
          echo '<li><a href="?pagina=1" aria-label="Previous"><span aria-hidden="true">«</span></a></li>';
    											for ($i= $pagina - $maxLinks; $i <= $pagina - 1; $i++) {

    												if ($i>=1) {
    													echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
    												}
    											}
    											echo '<li class="active"><span>'.$pagina.'</span></a></li>';
    											for ($i= $pagina +1; $i <= $pagina + $maxLinks; $i++) {

    												if ($i<=$totalPaginas) {
    													echo '<li><a href="?pagina='.$i.'"</a>'.$i.'</li>';
    												}
    											}


    			echo '<li><a href="?pagina='.$totalPaginas.'" aria-label="Next"><span aria-hidden="true">»</span></a></li>';

        } ?>
      </ul>
    </nav>
  </div>
</div>

</div>
</body>
</html>
