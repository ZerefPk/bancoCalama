<!DOCTYPE html>
<html lang="pt-BR ">
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" type="imagem/x-icon" href="icone.png"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>e-Curriculum || Porto Velho Calama</title>
  <!--arquivos online-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.green-light_green.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

</head>
<style>


nav.mdl-navigation .mdl-badge[data-badge]:after{
  top: 5px;
  right: -8px;
}

@media screen and (max-width: 500px){
  .esconde-celular{
    display: none;

  }
  nav.mdl-navigation .mdl-badge[data-badge]:after{
    right: 5px;
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

.mdl-mini-footer .mdl-logo {
  line-height: 0px;
}
@media screen and (max-width: 1920px){
  .mdl-layout__header-row {
    height: 56px;
    padding: 0 20px 0 20px;
  }
}

/*@MEDIA COM BOOTSTRAP*/
/* Small devices (landscape phones, 576px and up)*/
@media (min-width: 576px) {
  .card-left-nick {
    width: auto;
    height: auto;
    padding-right-left: 0.1em;
    padding-top: 0.2em;
    padding-bottom: 0.3em;
  }

  /*.espacamento_entre_cabecalho_e_botoes {
    padding: 1em;
    }*/

    .card-left-nick {
      padding-left: 5%;
      padding-right: 5%;
      width: 100%;
    }
  }

  /* Medium devices (tablets, 768px and up)*/
  @media (max-width: 1024px) {
  /*.espacamento_entre_cabecalho_e_botoes {
    padding: 5em;
    }*/

  }

  /* Large devices (desktops, 992px and up)*/
  @media (min-width: 992px) {
    .card-left-nick {
      float: left;
      padding-right-left: 0.1em;
      padding-top: 0.3em;
      padding-bottom: 0.3em;
    }

  /*.espacamento_entre_cabecalho_e_botoes {
    padding: 5em;
    }*/
  }

  /* Extra large devices (large desktops, 1200px and up)*/
  @media (min-width: 1200px) {
    .card-left-nick {
      float: left;
      padding-right-left: 0.1em;
      padding-top: 0.3em;
      padding-bottom: 0.3em;
    }
  }
  .mdl-card{
    align-self: center;
    margin-top: 100px;
  }
  .mdl-mini-footer .mdl-logo {
    line-height: 0px;

  }
  @media screen and (max-width: 500px){
    .mdl-card{
      width: 70%;
      margin-top: 10%;
    }
    .esconde-celular{
      display: none;
    }
  }

  @media screen and (min-width: 510px){
    .mostra-celular{
      display: none;
    }
  }
  @media screen and (max-width: 1920px){
    .mdl-layout__header-row {
      height: 56px;
      padding: 0 20px 0 20px;
    }
    .card-imgdiv {
      position: relative;
      width: 80%;
      height: 80%;
      padding-top: 1%;
      overflow: hidden;
    }
    .card-body{
      padding-right:6%;
      padding-left:6%;
    }
    .card {
      display:inline-block;
      margin-right:18px;
    }


    /*PARA iPads*/
    @media(max-width: 768px and max-height: 1024px or max-width: 1024px and max-height: 768px){
      .espacamento_entre_cabecalho_e_botoes {
        padding-top: 10%;
      }
    }

    /*PARA iPads Pro*/
    @media(max-width: 1024px and max-height: 1366px or max-width: 1366px and max-height: 1024px){
      .espacamento_entre_cabecalho_e_botoes {
        padding-top: 10%;
      }
    }
    /*FIM @MEDIA COM BOOTSTRAP*/
    .mdl-button--primary.mdl-button--primary.mdl-button--raised, .mdl-button--primary.mdl-button--primary.mdl-button--fab {
      color: rgb(255,255,255);
      background-color: rgb(63,81,181);
      border-radius: 2px;
      alignment-baseline: : center;
      font color: #000;
      margin-left: auto;
      margin-right: auto;
      height: 200px;
      min-width: 250px;
      padding: 6 68px;
      font-weight: 500;
    }

    .center-align{
      text-align: center;
    }

    .botao {
      width: 100%;
      height: 5em;
      padding-top: 2em;
      padding-left: 1em;
      font-size: 2em;
    }

    .card-left-nick {
      float: left;
      padding-right-left: 0.1em;
      padding-top: 0.3em;
      padding-bottom: 0.3em;
    }

    .btn-success {
      color: #fff;
      padding: 15%;
    }

    /*somente faz interferenia no botão*/
    .card-body-nick {
    }

/*.botao {
  width: 100%;
  font-size: 2em;
  }*/

  .espacamento_entre_cabecalho_e_botoes {
    padding-top: 5%;
  }
  @media (min-width: 300px){
    .vituriano{
      height: 11rem;
      width: 21rem;
    }
  }
  @media (min-width: 1300px){
    .vituriano{
      height: 18rem;
      width: 38rem;
    }
  }
</style>
<body>
 <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
   <div class="mdl-layout__header-row">
     <!--back arrow-->



     <i style="color: white;" class="material-icons">
      supervised_user_circle
    </i><a class="mdl-layout-title mdl-layout-title" style="color: white;" href="calamadesenvolvedores.php">Sobre</a>

    <div class="mdl-layout-spacer"></div>
    <span class="mdl-layout-title" style="color: white;">Para Estudantes</span>
  </div>
</header>
<br>

<center>
  <a href="validarAluno">
    <div class="card" style=" margin-top: 1.8%;">
      <button type="button"  class="vituriano btn btn-success botao">Cadastrar Aluno</button>
    </div>
  </a>

  <a href="loginAluno">
    <div class="card" style=" margin-top: 1.8%;">
      <button type="button" class="vituriano btn btn-success botao">Aluno Cadastrado</button>
    </div>
  </a>

 </center>

<br><br><br><br>

<center>
  <div style="padding: 7%;">
    <h6>Desenvolvido  por Felipe Raymison, Giovanna Nunes, Maria Luiza Botelho, Tony Padilha e 4º ano de Informática de 2018</h6>
    <h6>SAC: curriculoscalamaifro@gmail.com</h6>
  </div>
</center>

</body>
</html>
