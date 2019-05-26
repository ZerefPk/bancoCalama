<!DOCTYPE html>
<?php session_start(); ?>
<html lang="pt-BR ">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vagas Disponíveis</title>
  <!-- arquivos locais
  <link rel="stylesheet" href="material.min.css">
  <script src="material.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
-->
<!--arquivos online-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.green-light_green.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.css">

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
}
.pagination {
  display: -ms-flexbox;
  display: flex;
  padding-left: 0;
  list-style: none;
  border-radius: 0.25rem;
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

    <?php
    include('../controller/ListarVagasController.php');

/*echo "<pre>";
print_r($dados);
echo "</pre>";
*/
if (isset($_SESSION['msn'])) {
    // code...
    if ($_SESSION['msn']) {
        // code...
        echo "<script>alert('Curriculo enviado com sucesso!');</script>";
        unset($_SESSION['msn']);
    }
    else {
        // code...
        echo "<script>alert('Você já envio curriculo para essa vaga!');</script>";
        unset($_SESSION['msn']);
    }

}

while ($dados = $vaga[0]->fetch(PDO::FETCH_ASSOC)) {
  // code...
  echo '
  <center>
  <br>
  <div class="">
  <div class="mdl-card mdl-shadow--6dp">
  <div class="esquerda">
  <!--Textfield Cargo -->
  <br>
  <label><b>Cargo:</b></label>
  <div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="sample" name="cargo" value="'.$dados['cargo'].'"readonly="readonly" required>
  </div>
  <!-- GRANDE ÁREA DE ATUAÇÃO-->


  <div>
  <label><b>Vaga para Técnico em:</b></label>
   <div class="mdl-textfield mdl-js-textfield">
    <input class="mdl-textfield__input" type="text" name="area" value="' .$dados['area'] .'" readonly="readonly" required>
  </div>
   </div>
  <!--Textfield Especialidade -->
  <label><b>Especialidade:</b></label>
  <div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="sample" name="especialidade" value="'.$dados['especialidade'].'"readonly="readonly" required>
  </div>
  <!--Textfield Período -->
  <br>
  <label><b>Período:</b></label>
  <div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="sample" name="periodo" value="'.$dados['periodo'].'"readonly="readonly" required>
  </div>
  <!--Textfield Número de Vagas -->
  <br>
  <label><b>Número de vagas:</b></label>
  <div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="sample" name="numerovagas" value="'.$dados['numerovagas'].'"readonly="readonly" required>
  </div>
  <!--Textfield Carga Horária -->
  <br>
  <label><b>Carga horária (semanal):</b></label>
  <div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="sample" name="cargahoraria" value="'.$dados['cargahoraria'].'"readonly="readonly" required>
  </div>
  <!--Textfield Remuneração -->
  <br>
  <label><b>Remuneração:</b></label>
  <div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="sample" name="remuneracao" value="'.$dados['remuneracao'].'"readonly="readonly" required>
  </div>
   <div style="margin-bottom:5%;">
   <a href="../controller/CandidatarVagaController?id='.$dados['ID_vaga'].'"><button class="mdl-button mdl-button--raised mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-color-text--white" type="submit" name= "candidato" value="candidato">Candidatar-se</button></a>
  </div>
  </div>
  </form>
  </div>
  <br>
  </center>
  ';

}

?>
<center>
<div class="mdl-card mdl-shadow--6dp">
  <div class="esquerda">
    <nav >
      <ul class="pagination">
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

</center>
</div>
</body>
</html>
