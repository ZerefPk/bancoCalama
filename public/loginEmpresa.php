<?php
session_start();
?>


<!DOCTYPE html>
<html lang="pt-BR ">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Empresa</title>
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
/*
.mdl-cell{
    background-color:#bbb;
    height:50px;
}
*/
.mdl-card{
    align-self: center;
    margin-top: 100px;
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
            <div class="mdl-layout-spacer"></div>
              <span class="mdl-layout-title" style="color: white;">Página de Login</span>
          </div>
        </header>

        <!--- aqui é feito o card do login--->

        <div class="mdl-card mdl-shadow--6dp" style="">
                   <form action="validaempresa.php" method="post">
					<div class="mdl-card__supporting-text">

				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" id="cnpj" name="cnpj" inputmode="numeric" maxlength="18"/>
                            <label class="mdl-textfield__label" for="cnpj">CNPJ</label>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="password" id="password" name="senha"/>
                            <label class="mdl-textfield__label" for="password">Senha</label>
                        </div>
                    </div>

                        <div class="mdl-grid">
                            <button class="mdl-cell mdl-cell--12-col mdl-button mdl-button--raised mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-color-text--white" type="submit">
                                ENTRAR
                            </button>

                        </div>
							</form>
                        <div class="mdl-grid" style="text-align: center">
                            <div class="mdl-cell mdl-cell--12-col">
                                <a href='recuperarSenhaEmpresa' class="mdl-color-text--primary " style="float: center">Esqueci Minha Senha</a>
                            </div>
                        </div>
                    </div>
        </div>

        <!--- exemplo do uso do grid
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">6(8tablet)</div>
            <div class="mdl-cell mdl-cell--4-col mdl-cell--6-col-tablet">4(6tablet)</div>
            <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-phone">2(4phone)</div>
        </div>
        --->
        </main>
    </div>
</body>
</html>
