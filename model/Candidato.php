<?php
require_once 'ConexaoFactory.php';
/**
 *
 */
class Candidato
{

    public function alunoCanditato($idAluno, $idVaga)
    {


        $sql = "INSERT INTO candidato VALUES (default, :idAluno, :idVaga, default)";
        $valide = $this->verificarAluno($idAluno, $idVaga);

        if ($valide) {
            try {
                $stmt = ConexaoFactory::getConexao()->prepare($sql);

                $stmt->bindValue(':idAluno',$idAluno);
                $stmt->bindValue(':idVaga', $idVaga);

                $result = $stmt->execute();
                return $result;
            } catch (\Exception $e) {
                throw new \Exception("Error Processing Request", $e);

            }
        }
        else {
            return false;
        }

    }
    public function verificarAluno($idAluno, $idVaga)
    {
        $sql = "SELECT id_candidato FROM candidato WHERE vaga_id_vaga = :idVaga AND aluno_id_aluno = :idAluno";

        try {
            $stmt = ConexaoFactory::getConexao()->prepare($sql);

            $stmt->bindValue(':idAluno',$idAluno);
            $stmt->bindValue(':idVaga', $idVaga);
            $stmt->execute();
            $stmt = $stmt->rowCount():
            return $stmt;

        } catch (\Exception $e) {
            throw new \Exception("Error Processing Request", $e);

        }
    }


}
