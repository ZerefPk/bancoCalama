<?php
include_once "ConexaoFactory.php";
/**
 * Description of CpfAluno
 *
 * Verficar existencia do cpf do aluno
 *
 * @author ezequ
 */
class CpfAluno {
    //put your code here
    final static function validaCpf($cpf){

        try {
            $sql        =  "SELECT COUNT(idCPF) 'existe' FROM cpf_alunos WHERE cpf = :cpf";

            $stmt    = ConexaoFactory::getConexao()->prepare($sql);
            
            $stmt->bindValue(':cpf',$cpf);
            $stmt->execute();

            $stmt = $stmt->fetch();

            $retorno = $stmt['existe'];

            return $retorno;
        } catch (Exception $ex) {
            echo 'Erro ao executar busca';
        }




    }
}
