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
else {
    //redicar para cadastro
    echo "nao";
}
 ?>
