<?php

/* CARREGA A CLASSE DE CONEXÃO COM O BANCO DE DADOS */
require_once('../config/Conexao.php');

class Prestador{

    /* ATRIBUTOS DA CLASSE */
    Private $nome;
    Private $telefone;
    Private $endereco;
    private $categoria;


    /* FUNÇÃO DE INCLUSÃO DE DADOS */
    public function incluir($nome, $telefone, $endereco, $categoria) { 
        $insert = 'INSERT INTO prestador(nome, telefone, endereco, categoria) VALUES ("' . $nome . '","' . $telefone . '","' . $endereco . '","' . $categoria . '")';
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
        $delete = 'DELETE FROM prestador WHERE codigo="' . $codigo . '"';
        $BancoDados = new BancoDados();
        $BancoDados->Conexao();
        $BancoDados->Query($delete);
    }

    /* FUNÇÃO DE EDIÇÃO DE DADOS */
    public function alterar($nome, $telefone, $endereco, $categoria, $codigo) {
        $update = 'UPDATE prestador SET nome="' . $nome . '", telefone="' . $telefone . '" , endereco="' . $endereco . '", categoria="'  . $categoria .'" WHERE codigo="' . $codigo . '"';
        $BancoDados = new BancoDados();
        $BancoDados->Conexao();
        $BancoDados->Query($update);
        $this->Linha = mysqli_num_rows($BancoDados->result);
        $this->Result = $BancoDados->result;
    }

}
