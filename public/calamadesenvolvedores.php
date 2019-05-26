<!DOCTYPE html>
<html lang="pt-BR ">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>e-Curriculum || Porto Velho Calama</title>
  <link rel="shortcut icon" type="imagem/x-icon" href="icone.png"/>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.green-light_green.min.css">
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
  <script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"/></script>
  <link rel = "stylesheet" href = "mainpagestyle.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<style>
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

  #banner {
    display: -ms-flexbox;
    -ms-flex-pack: center;
    -ms-flex-align: center;
    padding: 8em 0 6em 0;
    -moz-align-items: center;
    -webkit-align-items: center;
    -ms-align-items: center;
    align-items: center;
    display: -moz-flex;
    display: -webkit-flex;
    display: -ms-flex;
    display: flex;
    -moz-justify-content: center;
    -webkit-justify-content: center;
    -ms-justify-content: center;
    justify-content: center;
    background-image: url("icone.png");
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    border-top: 0;
    min-height: 90vh;
    height: 90vh !important;
    position: relative;
    text-align: center;
    overflow: hidden;
  }
  #banner .inner {
    -moz-transform: scale(1.0);
    -webkit-transform: scale(1.0);
    -ms-transform: scale(1.0);
    transform: scale(1.0);
    -moz-transition: opacity 1s ease, -moz-transform 1s ease;
    -webkit-transition: opacity 1s ease, -webkit-transform 1s ease;
    -ms-transition: opacity 1s ease, -ms-transform 1s ease;
    transition: opacity 1s ease, transform 1s ease;
    opacity: 1;
    position: relative;
    z-estudantes: 2;
  }

  #banner h1 {
    font-size: 4em;
    margin-bottom: .25em;
    color: #FFF;
  }

  #banner p {
    color: rgba(255, 255, 255, 0.85);
    font-size: 1.75em;
  }

  @-moz-keyframes more {
    0% {
      bottom: -3em;
    }

    100% {
      bottom: 0;
    }
  }

  @-webkit-keyframes more {
    0% {
      bottom: -3em;
    }

    100% {
      bottom: 0;
    }
  }

  @-ms-keyframes more {
    0% {
      bottom: -3em;
    }

    100% {
      bottom: 0;
    }
  }

  @keyframes more {
    0% {
      bottom: -3em;
    }

    100% {
      bottom: 0;
    }
  }

  #banner:before {
    -moz-transition: opacity 3s ease;
    -webkit-transition: opacity 3s ease;
    -ms-transition: opacity 3s ease;
    transition: opacity 3s ease;
    -moz-transition-delay: 1.25s;
    -webkit-transition-delay: 1.25s;
    -ms-transition-delay: 1.25s;
    transition-delay: 1.25s;
    content: '';
    display: block;
    background-color: #000;
    height: 100%;
    left: 0;
    opacity: 0.65;
    position: absolute;
    top: 0;
    width: 100%;
    z-estudantes: 1;
  }

  @media screen and (max-width: 980px) {

    #banner {
      font-size: 1em;
    }

    #banner br {
      display: none;
    }

  }

  @media screen and (max-width: 736px) {

    #banner {
      min-height: 0;
      padding: 8em 2em 4em 2em;
    }

    #banner .inner {
      width: 100%;
    }

    #banner h1 {
      font-size: 2em;
      margin-bottom: 0.5em;
      padding-bottom: 0;
    }

    #banner p {
      font-size: 2.5em;
    }

    #banner .button {
      width: 100%;
    }

  }

  @media screen and (max-width: 480px) {

    #banner p {
      font-size: 1.2em;
    }

  }

  body.is-loading #banner .inner {
    -moz-transform: scale(0.99);
    -webkit-transform: scale(0.99);
    -ms-transform: scale(0.99);
    transform: scale(0.99);
    opacity: 0;
  }

  body.is-loading #banner:before {
    opacity: 1;
  }
}

@media screen and (max-height: 480px) {

  #banner p {
    font-size: 1.1em;
  }

}

body.is-loading #banner .inner {
  -moz-transform: scale(0.99);
  -webkit-transform: scale(0.99);
  -ms-transform: scale(0.99);
  transform: scale(0.99);
  opacity: 0;
}

body.is-loading #banner:before {
  opacity: 1;
}
}
</style>
<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <!--back arrow-->
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon " onclick="history.go(-1);">
          <i class="material-icons" style="color:white;">arrow_back</i>
        </button>
        <div class="mdl-layout-spacer"></div>
        <span class="mdl-layout-title" style="color: white;">Desenvolvedores</span>
      </div>
    </header>

    <div>
      <center>
        <section id="banner">
          <div class="inner">
            <header>
             <center>
              <h1 style="width: 80%;">Olá, somos os desenvolvedores da plataforma Banco de Currículos</h1>
              <br>
              <p align="justify" style="width: 80%;" class="display-4">Com a necessidade de automatizar o processo de busca por vagas de estágio e emprego surgiu a ideia dessa plataforma que possui o objetivo de garantir o contato entre os alunos do Instituto Federal de Rondônia Campus Calama e as empresas interessadas em contratar os profissionais que o IFRO capacita.</p>
            </center>
          </header>
        </div>
      </section>
    </center>
  </div>
  <div class="jumbotron" style="background-color: white">
    <center>
      <div class="card"  style="width: 18rem; margin-top: 5%;">
        <div class="card-imgdiv">
          <img class="rounded-circle card-img-top card-img" src="img/vituriano.jpg" alt="Card image cap">
        </div>
        <div class="card-body">
          <h5 class="card-title">Vituriano Oliveira Xisto</h5>
          <a href="https://www.facebook.com/vituxisto" target="_blank" class="btn btn-primary"><i class="fab fa-facebook"></i>  vituxisto</a>
        </div>
      </div>

      <div class="card"  style="width: 18rem; margin-top: 5%;">
        <div class="card-imgdiv">
          <img class="rounded-circle card-img-top card-img" src="img/nicolas.jpg" alt="Card image cap">
        </div>
        <div class="card-body">
          <h5 class="card-title">Nícolas Costa Freitas</h5>
          <a href="https://www.facebook.com/nicolas.freitas.315080" target="_blank" class="btn btn-primary"><i class="fab fa-facebook"></i>  nicolas.freitas.315080</a>
        </div>
      </div>
      <div class="card"  style="width: 18rem; margin-top: 5%;">
        <div class="card-imgdiv">
          <img class="rounded-circle card-img-top card-img" src="img/felipi.jpeg" alt="Card image cap">
        </div>
        <div class="card-body">
          <h5 class="card-title">Felipe Raymison Teixeira</h5>
          <a href="https://www.instagram.com/felipe_raymison/" target="_blank" class="btn btn-primary"><i class="fab fa-instagram"></i> felipe.raymison</a>
        </div>
      </div>
      <br>
      <div class="card"  style="width: 18rem; margin-top: 5%;">
        <div class="card-imgdiv">
          <img class="rounded-circle card-img-top card-img" src="img/giovanna.jpeg" alt="Card image cap">
        </div>
        <div class="card-body">
          <h5 class="card-title">Giovanna Nunes Silva</h5>
          <a href="https://www.facebook.com/giovanna.nunes.5682" target="_blank" class="btn btn-primary"><i class="fab fa-facebook"></i> giovanna.nunes</a> 
        </div>
      </div>
       <div class="card"  style="width: 18rem; margin-top: 5%;">
        <div class="card-imgdiv">
          <img class="rounded-circle card-img-top card-img" src="img/luiza.jpeg" alt="Card image cap">
        </div>
        <div class="card-body">
          <h5 class="card-title">Maria Luiza Lemos</h5>
          <a href="https://www.facebook.com/malu.lemos.37" target="_blank" class="btn btn-primary"><i class="fab fa-facebook"></i> marialuiza.lemos</a>
        </div>
      </div>
        <div class="card"  style="width: 18rem; margin-top: 5%;">
        <div class="card-imgdiv">
          <img class="rounded-circle card-img-top card-img" src="img/toby.jpg" alt="Card image cap">
        </div>
        <div class="card-body">
          <h5 class="card-title">Tony Andrew Padilha</h5>
          <a href="https://www.facebook.com/tony.padilha.7" target="_blank" class="btn btn-primary"><i class="fab fa-facebook"></i> tonyandrew.padilha</a>
        </div>
      </div>
     

    </center>
  </div>
</div>
</body>
</html>

