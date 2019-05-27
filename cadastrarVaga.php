<!DOCTYPE html>

 <html lang="pt-BR ">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vagas</title>
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

.mdl-card{
  display:-webkit-flex;
  display:-ms-flexbox;
  display:flex;
  -webkit-flex-direction:column;
  -ms-flex-direction:column;
  flex-direction:column;
  min-height:40%;
  overflow:hidden;
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
   <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
       <header class="mdl-layout__header">
          <div class="mdl-layout__header-row">
                  <!--back arrow-->
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon " onclick="history.go(-1);">
                  <i class="material-icons" style="color: white;">arrow_back</i>
              </button>
              <a class='mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon' href='/'>
                <i class='material-icons' style='color: white;'>home</i>
              </a>
            <div class="mdl-layout-spacer"></div>
            <span class="mdl-layout-title" style="color: white;">Cadastrar Vaga</span>
          </div>
       </header>
    <center>
    <br>
    <div class="">
        <div class="mdl-card mdl-shadow--6dp">
           <form action="../controller/CadastraVagaController" method="post">
             <div class="esquerda">
                <!--Textfield Cargo -->
                <br>
                <label><b>Cargo:</b></label>
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text"  name="cargo">
                </div>
                <!-- GRANDE ÁREA DE ATUAÇÃO-->
                <div>
                    <label><b>Vaga para Técnico em:</b></label>
                    <br>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
                        <input type="radio" class="mdl-radio__button" name="area" value="Edificações" required>
                        <span class="mdl-radio__label">Edificações</span>
                    </label>
                    <br>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
                        <input type="radio" class="mdl-radio__button" name="area" value="Eletrotécnica" required>
                        <span class="mdl-radio__label">Eletrotécnica</span>
                    </label>
                    <br>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
                        <input type="radio" class="mdl-radio__button" name="area" value="Informática" required>
                        <span class="mdl-radio__label">Informática</span>
                    </label>
                    <br>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
                        <input type="radio" class="mdl-radio__button" name="area" value="Química" required>
                        <span class="mdl-radio__label">Química</span>
                    </label>

                </div>



                 <!--Textfield Período -->
                  <div>
                    <label><b>Período</b></label>
                    <br>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
                        <input type="radio" class="mdl-radio__button" name="periodo" value="Matutino" required>
                        <span class="mdl-radio__label">Matutino</span>
                    </label>
                    <br>
                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
                        <input type="radio" class="mdl-radio__button" name="periodo" value="Vespertino" required>
                        <span class="mdl-radio__label">Vespertino</span>
                    </label>
                </div>
                <!--Textfield Número de Vagas -->
                <br>
                <label><b>Número de vagas:</b></label>
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" name="vaga">
                </div>
                <!--Textfield Carga Horária -->
                <br>
                <label><b>Carga horária (semanal):</b></label>
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" name="cargahoraria">
                </div>
                <!--Textfield Remuneração -->
                <br>
                <label><b>Remuneração:</b></label>
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" name="remuneracao">
                </div>
                <div>
                <!--Textfield Descrição da vaga -->
                    <br>
                    <label><b>Descrição da vaga</b></label>
                    <br>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <textarea class="mdl-textfield__input" type="text" rows= "3" name="descricao" style="border-width: 2px;border-style: solid;"></textarea>
                        <label class="mdl-textfield__label" for="sample3">Descrição</label>
                    </div>
                </div>


                <div>
                    <br>
                    <label><b>Requisitos da vaga</b></label>
                    <br>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <textarea class="mdl-textfield__input" type="text" rows= "3" name="requisitos" style="border-width: 2px;border-style: solid;"></textarea>
                        <label class="mdl-textfield__label" for="sample3">Requisitos</label>
                    </div>
                </div>
                <!--Textfield Email -->
                <br>
                <label><b>Email para contato:</b></label>
                <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="email"  name="email">
                </div>
                <br>
                <!--Textfield Telefone -->
                <br>
                <label><b>Telefone:</b></label>
                <br>
                    <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text"  name="telefone" placeholder="Fixo ex.: (069) 9999-9999">
                    </div>
                    <br>
            <br>
            <br>

              <div style="margin-bottom:5%;">
                <button class="mdl-button mdl-button--raised mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-color-text--white" type="submit" name= "inserir">Cadastrar Vaga</button>
              </div>
              </div>
          </form>
        </div>
        <br>
    </center>
</div>
</body>
</html>
