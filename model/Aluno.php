<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once "ConexaoFactory.php";
include_once "CpfAluno.php";
/**
 * Description of Aluno
 *
 * @author ezequ
 */
class Aluno {
    //put your code here

    public function cadastraAluno($nome, $sexo, $dataNascimento, $cpf, $telefone,
            $email,$curso, $ano, $senha, $objetivo, $experiencia,$extencao,$nomeImg ,$foto,
            $disponibilidade, $escolaridade, $stCivil, $bairro, $idioma){


            $sql = "INSERT INTO aluno VALUES(DEFAULT, :nome, :sexo, :dn, :cpf, :tl, :email,
            :curso, :ano, :senha, :obj, :experiencia, :extencao, :foto, :disp, :escolaridade,
            :stCivil, :bairro,  :idioma);";

            try {
                $stmt = ConexaoFactory::getConexao()->prepare($sql);
                $stmt->bindValue(':nome', $nome);
                $stmt->bindValue(':sexo', $sexo);
                $stmt->bindValue(':dn', $dataNascimento);
                $stmt->bindValue(':cpf', $cpf);
                $stmt->bindValue(':tl', $telefone);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':curso', $curso);
                $stmt->bindValue(':ano', $ano);
                $stmt->bindValue(':senha', md5($senha));
                $stmt->bindValue(':obj', $objetivo);
                $stmt->bindValue(':experiencia',  $experiencia);
                $stmt->bindValue(':extencao', $extencao);
                $stmt->bindValue(':foto', $nomeImg);
                $stmt->bindValue(':disp', $disponibilidade);
                $stmt->bindValue(':escolaridade', $escolaridade);
                $stmt->bindValue(':stCivil', $stCivil);
                $stmt->bindValue(':bairro', $bairro);
                $stmt->bindValue(':idioma', $idioma);

                $execult = $stmt->execute();
                if ($execult) {
                    $destinoImage = '../public/img/aluno/'.$nomeImg;
                    move_uploaded_file($foto, $destinoImage);
                    return true;
                }

            } catch (Exception $ex) {
                return false;
            }


    }
    public function alterarSenha($id,$senhaOld, $senhaNew)
    {
        $sql = "UPDATE aluno SET senha = :senha WHERE idAluno = :id";
        $valide = "SELECT (idAluno) 'valide' FROM aluno WHERE idAluno = :id AND senha = :senha";

        try {
            $stmt = ConexaoFactory::getConexao()->prepare($valide);
            $stmt->bindValue(":id",$id);
            $stmt->bindValue(":senha", md5($senhaOld));

            $stmt->execute();

        } catch (\Exception $e) {
            throw new Exception("Erro ao verificar", $e);

            return;
        }



        if ($stmt->rowCount()>0) {
            try {
                $stmt = ConexaoFactory::getConexao()->prepare($sql);
                $stmt->bindValue(":id",$id);
                $stmt->bindValue(":senha", md5($senhaNew));

                $result = $stmt->execute();

                return $result;
            } catch (Exception $e) {
                throw new Exception("Não foi possivel alterar a senha", $e);

                return;
            }
        }
        else {
            return false;
        }




    }
    public function alterarDados($id,$nome, $dataNascimento, $telefone,
            $email,$curso, $ano, $objetivo, $expertiencia,$extencao,$nomeImg ,$foto,
            $disponibilidade, $escolaridade, $stCivil, $bairro, $idioma, $altImg){
        // code...
        $sql = "UPDATE aluno SET nome = :nome, data_de_nascimento = :dn, telefone = :tl, email = :email,
        curso = :curso,
        ano =  :ano, objetivo_prof =  :obj, experiencia_prof = :experiencia, extensao = :extencao,
        disponibilidade = :disp, escolaridade = :escolaridade,
        status_civil = :stCivil, bairro = :bairro, idioma = :idioma);";
        try {
            $stmt = ConexaoFactory::getConexao()->prepare($sql);
            $stmt->bindValue(':nome', $nome);

            $stmt->bindValue(':dn', $dataNascimento);

            $stmt->bindValue(':tl', $telefone);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':curso', $curso);
            $stmt->bindValue(':ano', $ano);
            $stmt->bindValue(':obj', $objetivo);
            $stmt->bindValue(':extencao', $extencao);
            $stmt->bindValue(':disp', $disponibilidade);
            $stmt->bindValue(':escolaridade', $escolaridade);
            $stmt->bindValue(':stCivil', $stCivil);
            $stmt->bindValue(':bairro', $bairro);
            $stmt->bindValue(':idioma', $idioma);

            $execult = $stmt->execute();


        } catch (Exception $ex) {
            return false;
        }
        if ($altImg) {
            // code..
            try {
                $sql = "UPDATE aluno SET foto =  :foto";
                $stmt = ConexaoFactory::getConexao()->prepare($sql);
                $stmt->bindValue(':foto', $foto);

                $destinoImage = '../public/img/aluno/'.$nomeImg;
                move_uploaded_file($foto, $destinoImage);
                $stmt->execute();
                return true;

            } catch (\Exception $e) {
                throw new \Exception("Error Processing Request", $e);

            }



        }

    }
    public function detalheAluno($id)
    {
        // code.
        $sql = "SELECT `nome`,`sexo`,`data_de_nascimento`,`cpf`,`telefone`,`email`,
        `email`, `curso`, `ano`, `objetivo_prof`,
         `experiencia_prof`, `extensao`, `foto`, `disponibilidade`, `escolaridade`,
         `status_civil`, `bairro`, `idioma` FROM aluno WHERE idAluno = :id";

        try {

            $stmt = ConexaoFactory::getConexao()->prepare($sql);

            $stmt->bindValue(':id',$id);

            $stmt->execute();

            if ($stmt->rowCount()>0) {
                // code...
                $stmt = $stmt->fetch(PDO::FETCH_ASSOC);

                return $stmt ;
            } else {
                return false;
            }


        } catch (Exception $e) {
            return false;
        }


    }
    public function verificarAluno($cpf){
        try {
            $sql = "SELECT COUNT(idAluno) 'aluno' FROM aluno WHERE cpf = :cpf";

            $stmt = ConexaoFactory::getConexao()->prepare($sql);

            $stmt->bindValue(':cpf',$cpf);

            $stmt->execute();

            $stmt = $stmt->fetch();


            return $stmt['aluno'];

        } catch (Exception $exc) {
            echo 'nao foi possivel localizar o aluno';
        }
        }
    public function loginAluno($cpf, $senha)
    {
        $sql = "SELECT idAluno FROM aluno WHERE senha = :senha AND cpf = :cpf";

        try {
            $stmt = ConexaoFactory::getConexao()->prepare($sql);

            $stmt->bindValue(':senha', md5($senha));
            $stmt->bindValue(':cpf',$cpf);

            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                $stmt = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['id'] = $stmt['idAluno'];
                return true;

            }
            else {
                $_SESSION['LoginErro'] = "Usuário ou senha invalida";
                return false;
            }
        } catch (Exception $e) {
            return false;
        }

    }
}
