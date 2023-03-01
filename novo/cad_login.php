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

    <title>Cadastro Login</title>



</head>
<body>
    
    <div id="corpo-form">
        
        <form method="POST">

            <h1>Cadastro</h1>

            <input type="text"      name="nome"         placeholder="Nome Completo">
            <input type="text"      name="telefone"     placeholder="Telefone">
            <input type="text"      name="email"        placeholder="E-mail">
            <input type="password"  name="senha"        placeholder="Senha">

            <input type="submit" value="CADASTRAR">

        </form>
        
    </div>

<?php

    if(isset($_POST['nome']))
    {
        $nome       =   addslashes($_POST['nome']);
        $telefone   =   addslashes($_POST['telefone']);
        $email      =   addslashes($_POST['email']);
        $senha      =   addslashes($_POST['senha']);
    
        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha)){
            $u -> conectar("ordem_de_servico", "localhost", "root", "");
            if($u->msgErro == "") // tudo ok
            {
                if($u->cadastrar($nome, $telefone, $email, $senha))
                {
                    ?>
                    echo '<script>alert("Cadastrado com sucesso !");</script>'; // Alerta JS ao usuário
                    echo '<script>window.location="index.php";</script>'; // Redirecionar página
                    <?php
                    
                }
                else
                {
                    ?>
                    <div class="msg-erro">
                        Email ja cadastrado
                    </div>
                    <?php
                    
                }
            }
            else{
                    ?>
                    <div class="msg-erro">
                        <?php echo "Erro: " . $u->msgErro; ?>
                    </div>
                    <?php
                
            }
        } else {
                    ?>
                    <div class="msg-erro">
                    Preencha todos os campos!
                    </div>
                    <?php
            
        }
    
    
    
    }

?>



</body>
</html>