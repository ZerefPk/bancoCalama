<?php
session_start();
?>

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
<link rel="shortcut icon" type="imagem/x-icon" href="icone.png"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.green-light_green.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

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
#sample5{width: 550px; height: 100px; resize: none


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
    include('connection.php');

    $rows = [];
    $sql =  "SELECT * FROM aluno" ;
    $query = $conn->query($sql);

    for ($x = 1; $x <= $conn->affected_rows; $x++) {
      $rows[] = $query->fetch_assoc();
    }
/*echo "<pre>";
print_r($rows);
echo "</pre>";
*/
for ($x = 0; $x <= count($rows)-1; $x++) {


  echo '
  <center>
  <br>
  <div class="">
  <div class="mdl-card mdl-shadow--1dp">
  <div class="esquerda">
  <!--Textfield Nome -->
  <br>
  <label><b>Nome:</b></label>
  <div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="sample" name="nome" value="'.$rows[$x]['nome'].'"readonly="readonly" required>
  </div>

  <div>
   <img src="'.$rows[$x]['uploads/%s'].'" alt="Minha foto">
  </div>
  <div>
  <label><b>Idade:</b></label>
   <div class="mdl-textfield mdl-js-textfield">
    <input class="mdl-textfield__input" type="text" name="idade" value="' .$rows[$x]['foto'] .'" readonly="readonly" required>
  </div>
   </div>

  <label><b>Idioma que domina:</b></label>
  <div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="sample" name="idioma" value="'.$rows[$x]['idioma'].'"readonly="readonly" required>
  </div>

  <br>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
  <label><b>Resumo e objetivo profissional:</b></label>
        <textarea readonly type="text" rows= "3" id="sample5" name="objetivo_profissional" style="border-width: 2px;border-style: none;">'.$rows[$x]['objetivo_prof'].'</textarea>
  </div>
  <!--Textfield Foto -->
  <br>
 <div class="mdl-card" style="padding-left: 2em;>
        	<!--- card da imagem--->
        	<div class="mdl-card left">
        	<label><b>IMAGEM</b></label>
 <td><img src="uploads/%s" style="width:10em; height:11em;" alt="imagem";>'.$rows[$x]['foto'].'</td>
    <img src='.$foto.'/img>
        	</div> </br> </br>

   <div style="margin-bottom:5%;">
  <a href="exibirCurriculos?idAluno="'.$aluno_id_aluno.'"><button class=" mdl-button mdl-button--raised mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-color-text--white" type="submit" name= "candidatos">+Ver Mais</button></a>
  </div>
  </div>

  </div>
  </center>
  ';
}
?>
</div>
</body>
</html>
