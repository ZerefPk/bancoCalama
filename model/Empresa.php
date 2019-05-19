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

    public function cadastraEmpresa($nome, $ramo, $endereco, $email, $telefone, $cnpj,$razao,$senha, $celular){

        $sql = "INSERT INTO empresa VALUES(DEFAULT, :nome, :ramo, :endereco, :email, :tl, :cnpj,
        :rz, :senha, :celular)";

        try {
            $stmt = ConexaoFactory::getConexao()->prepare($sql);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':ramo', $ramo);
            $stmt->bindValue(':endereco', $endereco);
            $stmt->bindValue(':email', $emal);
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
}
