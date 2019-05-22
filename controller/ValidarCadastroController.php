<?php
//inclui arquivos
include_once '../model/CpfAluno.php';
include_once '../model/Aluno.php';

//recebe dado do formulário
$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
//metodo estatico, não precisa instanciar
$validacao = CpfAluno()->validaCpf($cpf);
//instaciar classe aluno e verificar se aluno nao está com cadastrado ativo
// note que a classe tem que ser instanciada
$alunoExistente = new Aluno();
//chamar metodo -- não é estatico

$alunoExistente = $alunoExistente->verificarAluno($cpf)

//varificar se validacao retorno true e o campo nome não é vazio
if ($validacao == true && isset($nome) && !empty($nome)) {
    //sessao com dados do pre cadastrado

    //verificar se o aluno nao possui cadastrado ativp
	if ($alunoExistente != 1) {
        $_SESSION['dados'] = [$cpf, $nome];
        //redireciona para cadastro aluno
        header('Location: http://localhost/public/FormularioCadastroAluno.php');
	}else {
		echo "<script>alert('Oops... esse(a) aluno(a) já possui um perfil no sistema :(. Tente usando outro CPF, ou edite seu perfil já existente em Editar Perfil ;)');</script>";
		echo "<script>location.href = 'estudantes.php'</script>";
	}

}else {
	echo "<script>alert('Esse CPF não pertence a nenhum estudante do IFRO!');</script>";
	echo "<script>location.href='identificaAluno.php';</script>";
}



 ?>
