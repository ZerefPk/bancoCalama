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
        echo $valide;

        if ($valide==0) {
            try {
                $stmt = ConexaoFactory::getConexao()->prepare($sql);

                $stmt->bindValue(':idAluno',$idAluno);
                $stmt->bindValue(':idVaga', $idVaga);
                var_dump($stmt);
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
            $stmt = $stmt->rowCount();
            return $stmt;

        } catch (\Exception $e) {
            throw new \Exception("Error Processing Request", $e);

        }
    }
    public function listarCandidatos($idVaga, $pagina, $qtd)
    {


        $inicio = ($pagina * $qtd) - $qtd;

        $total = "SELECT COUNT(ID_candidato) candidato FROM candidato WHERE  vaga_id_vaga = :idVaga";

        $sql= "SELECT
                     C.id_candidato,A.idAluno, A.nome, A.curso,V.cargo
                      FROM
                          candidato AS C
                              INNER JOIN
                          aluno AS A ON C.aluno_id_aluno = A.idAluno
                              INNER JOIN
                          vagas AS V ON C.vaga_id_vaga = V.ID_vaga
                              INNER JOIN
                          empresa AS E ON V.ID_empresa = E.Id
                      WHERE
                         C.vaga_id_vaga = :idVaga
                      LIMIT $inicio, $qtd;";


        try {
            $total = ConexaoFactory::getConexao()->prepare($total);
            $total->bindValue(':idVaga', $idVaga);
            $total->execute();
            $total = $total->fetch(PDO::FETCH_ASSOC);
            $total = $total['candidato'];

            $stmt = ConexaoFactory::getConexao()->prepare($sql);

            $stmt->bindValue(':idVaga', $idVaga);

            $stmt->execute();

            return [$stmt, $total];

        } catch (\Exception $e) {
            throw new \Exception("Error Processing Request", $e);

        }


    }
    public function deletarCanditato($id) {

        $sql = "DELETE FROM candidato WHERE id_candidato = :id";
            try {
            $stmt = ConexaoFactory::getConexao()->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return $stmt->rowCount()>0;
        } catch(\Exception $e) {
            throw new Exception("erro ao deletear", $e);
            return;
        }


    }

}
