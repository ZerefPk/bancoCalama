<?php
//incluir a Model
// include once inclui apenas uma vez
session_start();
require_once 'model/Empresa.php';

$nomeFicticio = $_POST["NomeFicticio"];
$cnpj = $_POST["cnpj"];
$endereco = $_POST["Endereco"];
$razao = $_POST["RazaoSocial"];
$ramo = $_POST["Ramo"];
$email = $_POST["Email"];
$telefone = $_POST["Telefone"];
$celular = $_POST["Celular"];
$senha = $_POST["Senha"];


//façam uma veficacao pra cada uma das variaveis

if(isset($nomeFicticio)&& isset($cnpj)&& isset($endereco)&& isset($razao)&& isset($email)&& isset($ramo)
&& isset($telefone)&& isset($celular)&& isset($senha))
{

    //Obj aluno
    $empresa = new Empresa();

    $empresa = $empresa->cadastraEmpresa($nomeFicticio, $email, $telefone,$ramo, $endereco, $cnpj,$razao,
              $senha, $celular);

    if ($empresa) {
        //redicinar se o cadastro foi efetudo com sucesso
        $_SESSION['msn']=true;
        header('location: public/loginEmpresa.php');
    }
}
else {
    //redicar para cadastro
    echo "nao";
}
 ?>
