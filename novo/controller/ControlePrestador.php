<?php

/* CARREGA A CLASSE PRESTADOR */
require_once("../model/Prestador.php");  

function ProcessoPrestador($Processo) {

	
    switch ($Processo) { 

		/* INCLUIR PRESTADOR */
        case 'incluir': 

            global $linha; // variável global - "qtd linhas"
            global $rs;    // variável global - conjunto de dados

            $prestador = new Prestador(); // cria objeto PRESTADOR

            $prestador->consultar("SELECT * FROM prestador"); // Realiza consulta e grava nas variáveis globais
            $linha = $prestador->Linha;
            $rs = $prestador->Result;
    
            if(isset($_POST['ok'])){
                if ($_POST['ok'] == 'true') {
                    
                    // !! Aqui efetua validações dos campos e inclui regras de negócio se necessário !! //
                    
                    $prestador->incluir($_POST['nome'], $_POST['telefone'], $_POST['endereco'], $_POST['categoria']);
                    echo '<script>alert("Cadastrado com sucesso !");</script>'; // Alerta JS ao usuário
                    echo '<script>window.location="listar_prestador.php";</script>'; // Redirecionar página
                }
            }   

            break;

	
		/* CONSULTAR PRESTADOR */
        case 'consultar': 
            
			global $linha; 
            global $rs; 

            $prestador = new Prestador(); 
            
            $prestador->consultar("SELECT * FROM prestador"); 
            $linha = $prestador->Linha;
            $rs = $prestador->Result;

            /* EXCLUIR PRESTADOR */
            
            if(isset($_GET['ok'])){
                if ($_GET['ok'] == "excluir") {
                    $prestador->excluir($_GET['codigo']);
                    echo '<script>alert("Excluido com sucesso !");</script>'; // Alerta JS ao usuário
                    echo '<script>window.location="listar_prestador.php";</script>'; // Redirecionar página
                }   
            }
            break;

	
		/*  EDITAR PRESTADOR */
        case 'editar':

            global $linha; 
            global $rs; 

            $prestador = new Prestador(); 

            $prestador->consultar("select * from prestador where codigo=" . $_GET['codigo']); 
            $linha = $prestador->Linha;
            $rs = $prestador->Result;

            if(isset($_POST['ok'])){
                if ($_POST['ok'] == "true") {
                    
                    // !! Aqui efetua validações dos campos e inclui regras de negócio se necessário !! //
                    
                    $prestador->alterar($_POST['nome'], $_POST['telefone'], $_POST['endereco'], $_POST['categoria'], $_GET['codigo']);
                    echo '<script>alert("Alterado com sucesso !");</script>'; // Alerta JS ao usuário
                    echo '<script>window.location="listar_prestador.php";</script>'; // Redirecionar página
                }
            }
            break;
    }
}
