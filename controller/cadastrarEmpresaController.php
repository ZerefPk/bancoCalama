<?php
//incluir a Model
// include once inclui apenas uma vez
require_once '../model/Empresa.php';

$nomeFicticio = $_POST["NomeFicticio"];
$cnpj = $_POST["cnpj"];
$endereco = $_POST["Endereco"];
$razao = $_POST["RazaoSocial"];
$ramo = $_POST["Ramo"];
$email = $_POST["Email"];
$telefone = $_POST["Telefone"];
$celular = $_POST["Celular"];
$senha = $_POST["senha"];


//façam uma veficacao pra cada uma das variaveis

if(isset($_POST['NomeFicticio'])&& isset($_POST['cnpj'])&& isset($_POST['Endereco'])&& isset($_POST['RazaoSocial'])&& isset($_POST['Ramo'])&& isset($_POST['Email'])
&& isset($_POST['Telefone'])&& isset($_POST['Celular'])&& isset($_POST['senha'])
{

//Obj aluno
$empresa = new Empresa();

$empresa = $empresa->cadastraEmpresa($nomeFicticio, $cnpj, $endereco, $razao, $ramo,
        $email,$telefone, $celular, $senha)

if ($aluno) {
    //redicinar se o cadastro foi efetudo com sucesso
    echo "cadastro";
}
}
else {
    //redicar para cadastro
    echo "nao";
}
 ?>
