<?php

/* CARREGA A CLASSE USUARIO */
require_once("../model/Manutencao.php");  

function Processo($Processo) {

	
    switch ($Processo) { 

		/* INCLUIR USUARIO */
        case 'incluir': 

            global $linha; // variável global - "qtd linhas"
            global $rs;    // variável global - conjunto de dados

            $usuario = new Manutencao(); // cria objeto USUÁRIO

            $usuario->consultar("SELECT * FROM tipo_manut"); // Realiza consulta e grava nas variáveis globais
            $linha = $usuario->Linha;
            $rs = $usuario->Result;

            if(isset($_POST['ok'])){
                if ($_POST['ok'] == 'true') {
                    
                    // !! Aqui efetua validações dos campos e inclui regras de negócio se necessário !! //
                    
                    $usuario->incluir($_POST['descricao'], $_POST['situacao']);
                    echo '<script>alert("Cadastrado com sucesso !");</script>'; // Alerta JS ao usuário
                    echo '<script>window.location="index.php";</script>'; // Redirecionar página
                }
            }   

            break;

	
		/* CONSULTAR USUARIO */
        case 'consultar': 
            
			global $linha; 
            global $rs; 

            $manutencao = new Manutencao(); 
            
            $manutencao->consultar("SELECT * FROM tipo_manut"); 
            $linha = $manutencao->Linha;
            $rs = $manutencao->Result;

            /* EXCLUIR USUÁRIO */
            
            if(isset($_GET['ok'])){
                if ($_GET['ok'] == "excluir") {
                    $manutencao->excluir($_GET['codigo']);
                    echo '<script>alert("Excluido com sucesso !");</script>'; // Alerta JS ao usuário
                    echo '<script>window.location="manut_listar.php";</script>'; // Redirecionar página
                }   
            }
            break;

	
		/*  EDITAR USUARIO */
        case 'editar':

            global $linha; 
            global $rs; 

            $manutencao = new Manutencao(); 

            $manutencao->consultar("select * from tipo_manut where codigo=" . $_GET['codigo']); 
            $linha = $manutencao->Linha;
            $rs = $manutencao->Result;

            if(isset($_POST['ok'])){
                if ($_POST['ok'] == "true") {
                    
                    // !! Aqui efetua validações dos campos e inclui regras de negócio se necessário !! //
                    
                    $manutencao->alterar($_POST['descricao'], $_GET['codigo']);
                    echo '<script>alert("Alterado com sucesso !");</script>'; // Alerta JS ao usuário
                    echo '<script>window.location="manut_listar.php";</script>'; // Redirecionar página
                }
            }
            break;
    }
}
