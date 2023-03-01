<?php
require_once("../novo/classes/login.php");
$u = new Login_user;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../novo/public/css/login.css">

    <title>Login</title>

</head>
<body>
    
    <div id="corpo-form">
        <form method="POST">
        
            <h1>ACESSAR</h1>
            <input type="email" name="email" placeholder="E-mail">
            <input type="password" name="senha" placeholder="Senha">
            <input type="submit" value="ENTRAR">
            <!-- <a href="cad_login.php">Ainda não possui um Login? <strong>Clique Aqui!</strong></a> -->
        
        </form>
        
    </div>

    <?php

        if(isset($_POST['email']))
        {
            $email      =   addslashes($_POST['email']);
            $senha      =   addslashes($_POST['senha']);

            if(!empty($email) && !empty($senha))
                {
                    $u -> conectar("ordem_de_servico", "localhost", "root", "");
                    if($u->msgErro == "")
                    {
                    if($u->logar($email, $senha))
                    {
                        header("location: ../novo/view/sgt_list.php");
                    }
                     
                    else
                    {
                        ?>
                        <div class="msg-erro">
                        E-mail e/ou senha estão incorretos!
                        </div>
                        <?php
                    }
                }
                else
                    {
                        ?>
                        <div class="msg-erro">
                        <?php 
                        echo "Erro: ".$u->msgErro;
                        ?>
                        </div>
                        <?php
                         
                    }
                                     
                    }
                    else
                    {
                        ?>
                        <div class="msg-erro">
                        Preencha todos os campos!!
                        </div>
                        <?php
                    }
                }

    ?>

</body>
</html>