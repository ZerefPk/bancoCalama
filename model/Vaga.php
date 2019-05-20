<?php
include_once 'ConexaoFactory.php';
/**
 * relacao Empresa vaga
 */
class Vaga
{
    public function cadastraVaga($cargo, $qtd, $cargaH, $esp, $periodo, $remuneracao, $area, $idEmp,
    $desc, $requisitos, $email, $telefone)
    {
        // code...
        $sql = "INSERT INTO vagas (DEFAULT, :cargo, :numerovagas,:cargahoraria ,:especialidade,
            :periodo, :remuneracao, :area, :ID_empresa, :descricao, :requisitos, :email,:tl)";

        try {
            $stmt = ConexaoFactory::getConexao()->prepare($sql);

            $stmt->bindValue(":cargo", $cargo);
            $stmt->bindValue(":numerovagas", $qtd);
            $stmt->bindValue(":cargahoraria", $cargaH);
            $stmt->bindValue(":especialidade", $esp);
            $stmt->bindValue(":periodo", $periodo);
            $stmt->bindValue(":remuneracao", $remuneracao);
            $stmt->bindValue(":area", $area);
            $stmt->bindValue(":ID_empresa", $idEmp);
            $stmt->bindValue(":descricao", $desc);
            $stmt->bindValue(":requisitos", $requisitos);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":tl", $telefone);

            $result = $stmt->execute();

            return $result;
        } catch (\Exception $e) {
            throw new \Exception("Error Processing Request", $e);

        }

    }
    public function editarVaga($idVaga,$cargo, $qtd, $cargaH, $esp, $periodo, $remuneracao, $area,
    $desc, $requisitos, $email, $telefone )
    {
        // code...
        $sql = "UPDATE vagas SET vaga = :cargo, numerovagas = :numerovagas, cargahoraria = :cargahoraria ,
        especialidade = :especialidade, periodo = :periodo, remuneracao = :remuneracao, area = :area,
        descricao = :descricao, requisitos = :requisitos, email = :email, telefone = :tl WHERE ID_vaga = :idVaga)";

        try {
            $stmt = ConexaoFactory::getConexao()->prepare($sql);

            $stmt->bindValue(":cargo", $cargo);
            $stmt->bindValue(":numerovagas", $qtd);
            $stmt->bindValue(":cargahoraria", $cargaH);
            $stmt->bindValue(":especialidade", $esp);
            $stmt->bindValue(":periodo", $periodo);
            $stmt->bindValue(":remuneracao", $remuneracao);
            $stmt->bindValue(":area", $area);

            $stmt->bindValue(":descricao", $desc);
            $stmt->bindValue(":requisitos", $requisitos);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":tl", $telefone);
            $stmt->bindValue(":idVaga", $idVaga);

            $result = $stmt->execute();

            return $result;
        } catch (\Exception $e) {
            throw new \Exception("Error Processing Request", $e);

        }

    }
    public function listaVaga($qtd, $pagina)
    {
        $inicio = ($pagina * $qtd) - $qtd;

        $sql =  "SELECT * FROM vagas ORDER BY ID_vaga DESC LIMIT $inicio,$qtd" ;

        $total = "SELECT COUNT(ID_vaga) 'vagas' FROM vagas ";


        try {
            $sql = ConexaoFactory::getConexao()->prepare($sql);
            $sql->execute();

            $total = ConexaoFactory::getConexao()->prepare($total);
            $total->execute();
            $total = $total->fetch(PDO::FETCH_ASSOC);

            $total = $total['vagas'];

            return [$sql, $total];
        } catch (\Exception $e) {
            throw new \Exception("Error Processing Request", $e);
        }


    }
    public function listaVagaEmpresa($id,$qtd, $pagina)
    {
        $inicio = ($pagina * $qtd) - $qtd;

        $sql =  "SELECT * FROM vagas WHERE ID_empresa = $id ORDER BY ID_vaga DESC LIMIT $inicio,$qtd" ;

        $total = "SELECT COUNT(ID_vaga) vagas FROM vagas WHERE ID_empresa = $id  ";

        try {
            $sql = ConexaoFactory::getConexao()->prepare($sql);
            $sql->execute();

            $total = ConexaoFactory::getConexao()->prepare($total);
            $total->execute();
            $total = $total->fetch(PDO::FETCH_ASSOC);

            $total = $total['vagas'];
            return [$sql, $total];
        } catch (\Exception $e) {
            throw new \Exception("Error Processing Request", $e);
        }


    }
    public function detalheVaga($id)
    {
        $sql ="SELECT V.ID_vaga,V.cargo,V.numerovagas,V.cargahoraria,
        V.especialidade,V.periodo,V.remuneracao,V.area,V.descricao,
        V.requisitos,V.email,V.telefone, E.nome FROM vagas V INNER JOIN empresa E
        ON V.ID_empresa = E.id WHERE V.ID_vaga = $id ";

        try {

            $stmt = ConexaoFactory::getConexao()->prepare($sql);
            $stmt->execute();

            $stmt = $stmt->fetch(PDO::FETCH_ASSOC);

            return $stmt;

        } catch (\Exception $e) {
            throw new \Exception("Error Processing Request", $e);
        }

    }
    public function deletarVaga($id) {
      $valide = "SELECT V.ID_vaga FROM vagas V INNER JOIN empresa E WHERE V.ID_empresa = E.id AND V.ID_vaga = $id ";
      $sql = "DELETE FROM vagas WHERE ID_vaga = :id";
      try {
        $stmt = ConexaoFactory::getConexao()->prepare($valide);
        $stmt->bindValue(':id', $id);
        $result = $stmt->execute();
        return $result;
      } catch(\Exception $e) {
        throw new Exception("Aparentemente esta conta de empresa não é a dona desta vaga.");
        return;
      }

      if($stmt->rowCount()>0) {
        try {
          $stmt = ConexaoFactory::getConexao()->prepare($sql);
          $stmt->bindValue(':id', $id);
          $result = $stmt->execute();
          return $result;
        } catch(\Exception $e) {
          throw new Exception('Não foi possivel deletar.', $e);
          return;
        }
      }

    }

}
