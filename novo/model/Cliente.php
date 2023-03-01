<?php

/* CARREGA A CLASSE DE CONEXÃO COM O BANCO DE DADOS */
require_once('../config/Conexao.php');

class Cliente {

    /* ATRIBUTOS DA CLASSE */
    Private $nome;
    Private $telefone;
    Private $endereco;
    private $tipo;

    /* FUNÇÃO DE INCLUSÃO DE DADOS */
    public function incluir($nome, $telefone, $endereco, $tipo) { 
        $insert = 'INSERT INTO cliente(nome, telefone, endereco, tipo) VALUES ("' . $nome . '","' . $telefone . '","' . $endereco . '" ,"' . $tipo . '")';
        $BancoDados = new BancoDados();
        $BancoDados->Conexao();
        $BancoDados->Query($insert);
    }
    
    /* FUNÇÃO DE CONSULTA DE DADOS */
    public function consultar($sql) {
        $BancoDados = new BancoDados();
        $BancoDados->Conexao();
        $BancoDados->Query($sql);
        $this->Linha = @mysqli_affected_rows($BancoDados->result);
        $this->Result = $BancoDados->result;
    }

    /* FUNÇÃO DE EXCLUSÃO DE DADOS */
    public function excluir($codigo) {
        $delete = 'DELETE FROM cliente WHERE codigo="' . $codigo . '"';
        $BancoDados = new BancoDados();
        $BancoDados->Conexao();
        $BancoDados->Query($delete);
    }

    /* FUNÇÃO DE EDIÇÃO DE DADOS */
    public function alterar($nome, $telefone, $endereco, $tipo, $codigo) {
        $update = 'UPDATE cliente SET nome="' . $nome . '", telefone="' . $telefone . '" , endereco="' . $endereco . '", tipo="'  . $tipo .'" WHERE codigo="' . $codigo . '"';
        $BancoDados = new BancoDados();
        $BancoDados->Conexao();
        $BancoDados->Query($update);
        $this->Linha = mysqli_num_rows($BancoDados->result);
        $this->Result = $BancoDados->result;
    }

}
