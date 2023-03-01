<?php

/* CARREGA A CLASSE DE CONEXÃO COM O BANCO DE DADOS */
require_once('../config/Conexao.php');

class Servico {

    /* ATRIBUTOS DA CLASSE */
    Private $endereco;
    Private $complemento;
    Private $telefone;
    Private $solicitante;
    Private $tipo;
    Private $data_inicio;
    Private $data_termino;
    Private $situacao;
    Private $problema;
    Private $data_descricao;
    Private $desccricao;
    

    /* FUNÇÃO DE INCLUSÃO DE DADOS */
    public function incluir ($endereco, $complemento, $telefone, $solicitante, $tipo, $data_inicio, $data_termino, $situacao, $problema, $data_descricao, $descricao) { 
        $insert = 'INSERT INTO servico (endereco, complemento, telefone, solicitante, tipo, data_inicio, data_termino, situacao, problema, data_descricao, descricao) VALUES ("' . $endereco . '","' . $complemento . '","' . $telefone . '","' . $solicitante . '","' . $tipo . '","' . $data_inicio . '","' . $data_termino . '","' . $situacao . '","' . $problema . '","' . $data_descricao . '","' . $descricao . '")';
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
        $delete = 'DELETE FROM servico WHERE codigo="' . $codigo . '"';
        $BancoDados = new BancoDados();
        $BancoDados->Conexao();
        $BancoDados->Query($delete);
    }

    /* FUNÇÃO DE EDIÇÃO DE DADOS */
    public function alterar($endereco, $complemento, $telefone, $solicitante, $tipo, $data_inicio, $data_termino, $situacao, $problema, $data_descricao, $descricao) {
        $update = 'UPDATE servico SET endereco="' . $endereco . '", complemento="'. $complemento .'", telefone="'. $telefone .'", solicitante="'. $solicitante .'", tipo="'. $tipo .'", data_inicio="'. $data_inicio .'", data_termino="'. $data_termino .'", situacao="'. $situacao .'", problema="'. $problema .'", data_descricao="'. $data_descricao .'", descricao="'. $descricao .'" WHERE codigo="' . $codigo . '"';
        $BancoDados = new BancoDados();
        $BancoDados->Conexao();
        $BancoDados->Query($update);
        $this->Linha = mysqli_num_rows($BancoDados->result);
        $this->Result = $BancoDados->result;
    }

}
    