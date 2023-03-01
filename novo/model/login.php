<?php

/* CARREGA A CLASSE DE CONEXÃO COM O BANCO DE DADOS */
// require_once('../config/Conexao.php');

class Login {

    /* ATRIBUTOS DA CLASSE */
    Private $pdo;
    public $msgErro;
    
    public function conectar($nome, $host, $email, $senha){}
        global $pdo;
        global $msgErro

        try {
            //code...
        $pdo = new PDO("mysql:dbname=".$nome.";host". $host, $email, $senha);

        } catch (PDOException $e) {
            //throw $th;
            $msgErro =  $e->getMessage();
        }
}

    public function cadastrar($nome, $telefone, $endereco, $email, $senha){}
        global $pdo;

        $pdo = new PDO();

        $sql = $pdo->prepare("SELECT codigo FROM login WHERE email = :e");

        $sql->bindValue(":e", $email);

        $sql->execute();

        if($sql->rowCount() > 0){
            return false; //Já está cadastrado
        }
        else{
            $sql = $pdo->prepare("INSERT INTO login (nome, telefone, endereco, email, senha) VALUES (:n, :t, :d, :e, :s)");
        
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":d", $endereco);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":s", $senha);

            $sql->execute();

            return true;
        }
}

    public function conectar($email, $senha){}
        global $pdo;

        $sql = $pdo ->prepare("SELECT codigo FROM login WHERE email = :e AND senha = :s");
        $sql ->bindValue(":e", $email);
        $sql ->bindValue(":s", $senha);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            session_start();
            $_SESSION["codigo"] = $dado["codigo"]; 
            return true;
        }
        else{
            return false;
        }
}

?>