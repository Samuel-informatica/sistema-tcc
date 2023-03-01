<?php

//require_once('../config/Conexao.php');

class Login_user
{
    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $email, $senha)
        {
            global $pdo;
            global $msgErro;
            try {
                $pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $email, $senha);   

            } catch (PDOException $e) {
                $msgErro = $e->getMessage();
            }     
        }

        public function cadastrar($nome, $telefone, $email, $senha)
        {
            global $pdo;  
            global $msgErro;   

            // verificar se ja existe email cadastrado
            $sql = $pdo -> prepare("SELECT codigo FROM login WHERE email = :e");
            $sql -> bindValue(":e", $email);
            $sql -> execute();

            if($sql -> rowCount() > 0)
            {
                return false; //ja esta cadastrado
            } 
            else{
                // caso não, cadastrar

                $sql = $pdo -> prepare("INSERT INTO login (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");

                $sql -> bindValue(":n", $nome);
                $sql -> bindValue(":t", $telefone);
                $sql -> bindValue(":e", $email);
                $sql -> bindValue(":s", md5($senha));

                $sql -> execute();
                return true;
            }
        }

    public function logar($email, $senha )
        {
            global $pdo;
            global $msgErro;
            
             $sql = $pdo -> prepare("SELECT codigo FROM login WHERE email = :e AND senha = :s");

             $sql -> bindValue(":e", $email);
             $sql -> bindValue(":s", md5($senha));

             $sql -> execute();

             if($sql->rowCount() > 0)
             {
                $dado = $sql -> fetch();
                session_start();
                $_SESSION['codigo'] = $dado['codigo'];
                return true; //logado com sucesso
             }
             else
             {
                return false;
             }

        }

}
?> 