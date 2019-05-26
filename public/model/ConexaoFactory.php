<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Classe para conexao com o banco de dados
 */
final class ConexaoFactory{
    static $conexao;
    final static function getConexao(){
        try {
           self::$conexao = new PDO('mysql:host=localhost;'
                   .'dbname=banco_curriculo;'
                   .'charset=utf8'
                   , 'root',null);

           return self::$conexao;
        } catch (PDOException $Exception) {
            throw new Exception( $Exception->getMessage( ) , $Exception->getCode( ) );
        }
    }
}
