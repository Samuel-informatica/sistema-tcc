<!DOCTYPE html>
<html lang="PT-BR">
    <head>
        <meta charset="UTF-8">
        <title>Menu</title>
        <link rel="stylesheet" type="text/css" href="../public/css/prestador.css">
    </head>
    <body>
<?php include('menu.php');  ?>
<?php
require_once('../controller/ControlePrestador.php'); 
ProcessoPrestador('incluir'); 
?>

<script src="../public/js/Validacaoform.js"></script>
<div class="container"> 
<label for="text" id="texto">CADASTRAR PRESTADOR</label>
    <form class="form-signin" action="" id="form" name="form" method="post">
        <h2 class="form-signin-heading"></h2>

        <div class="input">
            <label>Nome</label> 
            <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" required autofocus><br>
            <label>Telefone</label>
            <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Telefone" required><br>
            <label>Endereço</label>
            <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereco" required><br>
            <label>Categoria</label> 
            <input type="text" id="categoria" name="categoria" class="form-control" placeholder="Categoria" required><br>
        </div>
            <div class="input">
                <input type="button" name="salvar" id="salvar" value="Salvar" class="btn btn-primary" onclick="validar(document.form);"/>
                <input type="hidden" name="ok" id="ok" />
            </div>
        

    </form>

</div>
</body>
</html>