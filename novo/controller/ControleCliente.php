<?php

/* CARREGA A CLASSE USUARIO */
require_once("../model/Cliente.php");  

function cliente($Processo) {

	
    switch ($Processo) { 

		/* INCLUIR USUARIO */
        case 'incluir': 

            global $linhaCliente; // variável global - "qtd linhas"
            global $rsCliente;    // variável global - conjunto de dados

            $cliente = new Cliente(); // cria objeto USUÁRIO

            $cliente->consultar("SELECT * FROM cliente"); // Realiza consulta e grava nas variáveis globais
            $linhaCliente = $cliente->Linha;
            $rsCliente = $cliente->Result;

            if(isset($_POST['ok'])){
                if ($_POST['ok'] == 'true') {
                    
                    // !! Aqui efetua validações dos campos e inclui regras de negócio se necessário !! //
                    
                    $cliente->incluir($_POST['nome'], $_POST['telefone'], $_POST['endereco'], $_POST['tipo']);
                    echo '<script>alert("Cadastrado com sucesso !");</script>'; // Alerta JS ao usuário
                    echo '<script>window.location="listar_cliente.php";</script>'; // Redirecionar página
                }
            }   

            break;

	
		/* CONSULTAR USUARIO */
        case 'consultar': 
            
			global $linhaCliente; 
            global $rsCliente; 

            $cliente = new Cliente(); 
            
            $cliente->consultar("SELECT * FROM cliente"); 
            $linhaCliente = $cliente->Linha;
            $rsCliente = $cliente->Result;
            /* EXCLUIR USUÁRIO */
            
            if(isset($_GET['ok'])){
                if ($_GET['ok'] == "excluir") {
                    $cliente->excluir($_GET['codigo']);
                    echo '<script>alert("Excluido com sucesso !");</script>'; // Alerta JS ao usuário
                    echo '<script>window.location="listar_cliente.php";</script>'; // Redirecionar página
                }   
            }
            break;

	
		/*  EDITAR USUARIO */
        case 'editar':

            global $linhaCliente; 
            global $rsCliente; 

            $cliente = new Cliente(); 

            $cliente->consultar("select * from cliente where codigo=" . $_GET['codigo']); 
            $linhaCliente = $cliente->Linha;
            $rsCliente = $cliente->Result;

            if(isset($_POST['ok'])){
                if ($_POST['ok'] == "true") {
                    
                    // !! Aqui efetua validações dos campos e inclui regras de negócio se necessário !! //
                    
                    $cliente->alterar($_POST['nome'], $_POST['telefone'], $_POST['endereco'], $_POST['tipo'], $_GET['codigo']);
                    echo '<script>alert("Alterado com sucesso !");</script>'; // Alerta JS ao usuário
                    echo '<script>window.location="listar_cliente.php";</script>'; // Redirecionar página
                }
            }
            break;
    }

}

//function busca_id($id) {

  //  global $linhaUsuario; 
    //global $rsUsuario; 

    //$usuario = new Usuario(); 

    //$usuario->consultar("select * from usuario where id=" . $id); 
    //$linhaUsuario = $usuario->Linha;
    //$rsUsuario = $usuario->Result;

    //$row = mysqli_fetch_array($rsUsuario);
    //return $row['nome'];
//}
