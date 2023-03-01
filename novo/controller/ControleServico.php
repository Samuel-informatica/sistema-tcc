<?php

/* CARREGA A CLASSE USUARIO */
require_once("../model/Servico.php");  

function ProcessoServico($Processo) {

	
    switch ($Processo) { 

		/* INCLUIR SERVIÇO */
        case 'incluir': 

            global $linha; // variável global - "qtd linhas"
            global $rs;    // variável global - conjunto de dados

            $servico = new Servico(); // cria objeto Servico

            $servico->consultar("SELECT * FROM servico"); // Realiza consulta e grava nas variáveis globais
            $linha = $servico->Linha;
            $rs = $servico->Result;

            if(isset($_POST['ok'])){
                if ($_POST['ok'] == 'true') {
                    
                    // !! Aqui efetua validações dos campos e inclui regras de negócio se necessário !! //
                    
                    $servico->incluir($_POST['endereco'], $_POST['complemento'], $_POST['telefone'], $_POST['solicitante'], $_POST['tipo'], $_POST['data_inicio'], $_POST['data_termino'], $_POST['situacao'], $_POST['problema'], $_POST['data_descricao'], $_POST['descricao']);
                    echo '<script>alert("Cadastrado com sucesso !");</script>'; // Alerta JS ao usuário
                    echo '<script>window.location="listar_servico.php";</script>'; // Redirecionar página
                }
            }   

            break;

	
		/* CONSULTAR SERVIÇO */
        case 'consultar': 
            
			global $linha; 
            global $rs; 

            $servico = new Servico(); 
            
            $servico->consultar("SELECT * FROM servico"); 
            $linha = $servico->Linha;
            $rs = $servico->Result;

            /* EXCLUIR SERVIÇO */
            
            if(isset($_GET['ok'])){
                if ($_GET['ok'] == "excluir") {
                    $servico->excluir($_GET['codigo']);
                    echo '<script>alert("Excluido com sucesso !");</script>'; // Alerta JS ao usuário
                    echo '<script>window.location="listar_servico.php";</script>'; // Redirecionar página
                }   
            }
            break;

	
		/*  EDITAR SERVIÇO */
        case 'editar':

            global $linha;      
            global $rs; 

            $servico = new Servico(); 

            $servico->consultar("select * from servico where codigo= " . $_GET['codigo']); 
            $linha = $servico->Linha;
            $rs = $servico->Result;

            if(isset($_POST['ok'])){
                if ($_POST['ok'] == "true") {
                    
                    // !! Aqui efetua validações dos campos e inclui regras de negócio se necessário !! //
                    
                    $servico->alterar($_POST['endereco'], $_POST['complemento'], $_POST['telefone'], $_POST['solicitante'], $_POST['tipo'], $_POST['data_inicio'], $_POST['data_termino'], $_POST['situacao'], $_POST['problema'], $_POST['data_descricao'], $_POST['descricao']);
                    echo '<script>alert("Alterado com sucesso !");</script>'; // Alerta JS ao usuário
                    echo '<script>window.location="listar_servico.php";</script>'; // Redirecionar página
                }
            }
            break;
    }
}
