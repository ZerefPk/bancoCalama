<?php
session_start();
$_SESSION['cnpj']= $cnpj;

?>

<html>
<title>Cadastrar empresa</title>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- arquivos locais
        <link rel="stylesheet" href="material.min.css">
        <script src="material.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      -->
      <!--arquivos online-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.green-light_green.min.css">
      <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
      <script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
      <script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"/></script>
    </head>
    <style>
    /*Coiso que faz o card não ficar cagado*/
    .mdl-card{
      display:-webkit-flex;
      display:-ms-flexbox;
      display:flex;
      -webkit-flex-direction:column;
      -ms-flex-direction:column;
      flex-direction:column;
      min-height:40%;
      overflow:hidden;
      min-width: 50%;
      width:90%;
      position:relative;
    }

    .esquerda {
      float: left;
      text-align: left;
      padding-left: 1em;
      padding-bottom-top: 2em;
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
    /*Fim*/
    /*Adapta pra tela de Iphone 4(NOTA: RESOLUÇÃO 768X1024, 800X1280, 980X1280 ESTÃO MEIO BUGADAS*/
    @media screen and (max-width: 480px){
     .mdl-card{
       width: 75%;
       margin-top: 5%;
       margin-bottom: 5%;
     }
   }
   /*Fim*/
   /*Ajusta o Cabeçalho*/
   @media screen and (max-width: 280px){
    .esconde-celular{
      display: none;
    }

  }
  @media screen and (min-width: 510px){
    .mostra-celular{
      display: none;
    }
  }
  .demo-layout .mdl-layout__header .mdl-layout__drawer-button {
    color: rgba(0, 0, 0, 0.54);
    border: none;
  }
  @media screen and (max-width: 1920px){
    .mdl-layout__header-row {
      height: 56px;
      padding: 0 20px 0 20px;
    }
  }
  /*Fim*/
</style>

<script>
  function formatar(mascara, documento){
    var i = documento.value.length;
    var saida = mascara.substring(0,1);
    var texto = mascara.substring(i)

    if (texto.substring(0,1) != saida){
      documento.value += texto.substring(0,1);
    }

  }
</script>

<script>
  $(document).ready(function(){
    $("#cnpj").mask("99.999.999/9999-99");
    $("#Celular").mask("(99) 99999-9999");
    $("#Telefone").mask("(999) 9999-9999");
  });
</script>

<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header"><!--Cabeçalho-->
   <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!--back arrow-->
      <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon " onclick="history.go(-1);">
        <i class="material-icons" style="color: white;">arrow_back</i>
      </button>
      <div class="mdl-layout-spacer"></div>
      <span class="mdl-layout-title" style="color: white;">Editar Empresa</span>
    </div>
  </header>
  <?php
  include('connection.php');

  $rows = [];
  $sql =  "SELECT * FROM empresa WHERE 	Id='".$_SESSION['id']."'" ;
  $query = $conn->query($sql);

  for ($x = 1; $x <= $conn->affected_rows; $x++) {
    $rows[] = $query->fetch_assoc();
  }


  echo '<center>
  <br>
  <div class="">
  <div class="mdl-card mdl-shadow--6dp">
  <form action="EE_settings.php" method="post">
  <div class="esquerda">
  <!--Textfield Nome Fictício -->
  <br>
  <label><b>Nome Fantasia:</b></label>
  <div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="sample" name="NomeFicticio" value="'.$rows[0]['nome'].'">
  <label class="mdl-textfield__label" for="sample">Nome Fictício: '.$rows[0]['nome'].'</label>
  </div>
  <!--Textfield CNPJ -->
  <br>
  <label><b>CNPJ:</b></label>
  <div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="sample" name="CNPJ" inputmode="numeric"  value="'.$rows[0]['cnpj'].'">
  <label class="mdl-textfield__label" for="sample">CNPJ: '.$rows[0]['cnpj'].'</label>
  </div>
  <!--Textfield Endereço -->
  <br>
  <label><b>Endereço:</b></label>
  <div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="sample" name="Endereco" value="'.$rows[0]['endereco'].'">
  <label class="mdl-textfield__label" for="sample">Endereço: '.$rows[0]['endereco'].'</label>
  </div>
  <!--Textfield Razão Social -->
  <br>
  <label><b>Razão Social:</b></label>
  <div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="sample" name="RazaoSocial" value="'.$rows[0]['razao'].'">
  <label class="mdl-textfield__label" for="sample">Razão Social: '.$rows[0]['razao'].'</label>
  </div>
  <!--Textfield Ramo de Atividade da Empresa -->
  <br>
  <label><b>Ramo de Atividade da Empresa:</b></label>
  <div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="sample" name="Ramo" value="'.$rows[0]['ramo'].'">
  <label class="mdl-textfield__label" for="sample">Ramo de Atividade da Empresa: '.$rows[0]['ramo'].'</label>
  </div>
  <!--Textfield E-mail -->
  <br>
  <label><b>E-mail:</b></label>
  <div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="sample" name="Email" value="'.$rows[0]['email'].'">
  <label class="mdl-textfield__label" for="sample">E-mail: '.$rows[0]['email'].'</label>
  </div>
  <!--Textfield Telefone -->
  <br>
  <label><b>Telefone:</b></label>
  <br>
  <div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="Telefone" name="Telefone" placeholder="Fixo ex.: (069) 9999-999" value="'.$rows[0]['telefone'].'">
  <br>
  <label><b>Celular:</b></label>
  <input class="mdl-textfield__input" type="text" id="Celular" name="Celular" placeholder="Celular ex.: (69) 99999-9999" value="'.$rows[0]['celular'].'">
  </div>
  <!--Textfield Senha -->
  <br>
  <label><b>Senha:</b></label>
  <div class="mdl-textfield mdl-js-textfield">
  <input class="mdl-textfield__input" type="text" id="sample" name="Senha" value="'.$rows[0]['senha'].'">
  <label class="mdl-textfield__label" for="sample">Senha: '.$rows[0]['senha'].'</label>
  </div>
  <div>
  <input type="hidden" name="id" value="'.$rows[0]['Id'].'">
  </div>
  <div style="margin-bottom:5%;">
  <button class="mdl-button mdl-button--raised mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-color-text--white" type="submit" name= "inserir">Editar Empresa</button>
  </div>
  </div>
  </form>
  </div>
  <br>
  </center>
  ';?>
</body>
</html>
