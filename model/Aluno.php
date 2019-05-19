<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once "ConexaoFactory.php";
/**
 * Description of Aluno
 *
 * @author ezequ
 */
class Aluno {
    //put your code here

    public function cadastraAluno($nome, $sexo, $dataNascimento, $cpf, $telefone,
            $email,$curso, $ano, $senha, $objetivo, $expertiencia,$extencao,$nomeImg ,$foto,
            $disponibilidade, $escolaridade, $stCivil, $bairro, $idioma){

        $valide = CpfAluno::validarCpf($cpf);
        if (valide=='1'){

            $valide = $this->verificarAluno($cpf);
            if ($valide=='0'){
                $sql = "INSERT INTO aluno VALUES(DEFAULT, :nome, :sexo, :dn, :cpf, :tl, :email,
                :curso, :ano, :senha, :obj, :experiencia, :extencao, :foto, :disp, :escolaridade,
                :stCivil, :bairro,  :idioma);"

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
                    $stmt->bindValue(':senha', crypt($senha));
                    $stmt->bindValue(':obj', $objetivo);
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
                        move_uploaded_file($imgProduto, $destinoImage);
                        return true;
                    }

                } catch (Exception $ex) {
                    return false;
                }

            }

        }
    }
    public function verificarAluno($cpf){
        try {
            $sql = "SELECT COUNT(idAluno) 'aluno' FROM aluno WHERE cpf = :cpf";

            $stmt = ConexaoFactory::getConexao()->prepare($sql);

            $stmt->bindValue(':cpf',$cpf);

            $stmt->execute();

            $stmt = $stmt->fetch();
            var_dump($stmt);

            return $stmt;

        } catch (Exception $exc) {
            echo 'nao foi possivel localizar o aluno';
        }
        }
    public function loginAluno($cpf, $senha)
    {
        $sql = "SELECT idAluno FROM aluno WHERE senha = :senha AND cpf = :cpf";

        try {

        } catch (Exception $e) {
            return false;
        }

    }
}
