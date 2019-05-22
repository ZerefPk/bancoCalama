<?php
//incluir a Model
// include once inclui apenas uma vez
require_once '../model/Aluno.php';

$nome = $_POST["nome"];
$sexo = $_POST["sexo"];
$dataNascimento = $_POST["data"];
$bairro = $_POST["bairro"];
$idioma = $_POST["idioma"];
$cpf = $_POST["cpf"];
$nomeImg = $_FILES['arquivo']['name'];
$foto    = $_FILES['arquivo']['tmp_name'];
$senha = $_POST["senha"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$curso = $_POST["curso"];
$ano = $_POST["ano"];
$senha = $_POST["senha"];
$data_acesso = date('H:i');
$experiencia = $_POST["experiencia"];
$projetos = $_POST["projetos_de_extensao"];
$objetivo = $_POST["objetivo_profissional"];
$disponivel = $_POST["turno"];
$stCivil = $_POST["estCivil"];// Pega a extensão
$escolaridade = "Ensino Fundamental completo";



//façam uma veficacao pra cada uma das variaveis

if(isset($_POST['nome'])&& isset($_POST['sexo'])&& isset($_POST['data'])&& isset($_POST['bairro'])&& isset($_POST['idioma'])&& isset($_POST['cpf'])
isset($_POST['foto'])&& isset($_POST['senha'])&& isset($_POST['telefone'])&& isset($_POST['email'])&& isset($_POST['curso'])&&
isset($_POST['ano'])&& isset($_POST['$experiencia'])&& isset($_POST['projetos_de_extensao'])&& isset($_POST['objetivo_profissional'])&&
isset($_POST['turno'])&& isset($_POST['estCivil']))
{

// trata nome da imagem
$extensao = pathinfo ( $nomeImg, PATHINFO_EXTENSION );
if(strstr ( '.jpg;.jpeg;.png', $extensao )){

    $nomeImg = str_replace(" ",'-',$nome);
    $nomeImg = $nomeImg.'-'.$numImagem.'.'.$extensao;

}

//Obj aluno
$aluno = new Aluno();

$aluno = $aluno->cadastraAluno($nome, $sexo, $dataNascimento, $cpf, $telefone,
        $email,$curso, $ano, $senha, $objetivo, $expertiencia,$extencao,$nomeImg ,$foto,
        $disponibilidade, $escolaridade, $stCivil, $bairro, $idioma)

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
