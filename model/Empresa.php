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
class Empresa {
  public function cadastraEmpresa($nome, $ramo, $endereco, $email, $telefone, $cnpj,$razao,$senha, $celular) {
    $sql = "INSERT INTO empresa VALUES(DEFAULT, :nome, :ramo, :endereco, :email, :tl, :cnpj, :rz, :senha, :celular)";
    try {
        $stmt = ConexaoFactory::getConexao()->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':ramo', $ramo);
        $stmt->bindValue(':endereco', $endereco);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':tl', $telefone);
        $stmt->bindValue(':cnpj', $cnpj);
        $stmt->bindValue(':rz', $razao);
        $stmt->bindValue(':senha', crypt($senha));
        $stmt->bindValue(':celular', $celular);

        $result = $stmt->execute();
        return $result;
    } catch (Exception $e) {
        return false;
    }
  }

  public function trocasenha($id, $senhaold, $senhanew) {
    $sql = "UPDATE empresa SET senha = :senha WHERE id = :id";
    $valide = "SELECT (id) 'valide' FROM empresa WHERE id = :id AND senha = :senha";
    try {
        $stmt = ConexaoFactory::getConexao()->prepare($valide);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":senha", $senhaold);
        $stmt->execute();
    } catch (\Exception $e) {
      throw new Exception("Erro ao verificar", $e);
    return;
    }

    if($stmt->rowCount()>0) {
      try {
        $stmt = ConexaoFactory::getConexao()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":senha", $senhanew);
        $result = $stmt->execute();
        return $result;
      } catch (Exception $e) {
        throw new Exception("Não foi possivel alterar a senha", $e);
      return;
      }
    } else {
      return false;
    }
  }
}
