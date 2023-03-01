<?php

/* CLASSE QUE EFETUA A CONEXÃO COM O BANCO DE DADOS */

class BancoDados {
    
    /* FUNÇÃO ABRIR CONEXÃO COM BD */
    public function Conexao() {

        $this->cnx = mysqli_connect("localhost", "root", "", "ordem_de_servico");

        if (mysqli_connect_errno()) {
            echo "Ocorreu um erro: " . mysqli_connect_error();
        }
    }

    /* EXECUTA A QUERY NO BANCO */
    public function Query($sql) {
        $this->result = mysqli_query($this->cnx,$sql, MYSQLI_STORE_RESULT);
    }

    /* FECHA A CONEXÃO COM O BANCO DE DADOS */
    public function __destruct() {
        mysqli_close($this->cnx);
    }

}
?> 

