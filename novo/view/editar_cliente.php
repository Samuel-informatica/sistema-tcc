<!DOCTYPE html>
<html lang="PT-BR">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../public/css/cliente.css">
    </head>
    <body>
<?php include('menu.php'); ?>

<?php
require_once('../controller/ControleCliente.php'); 
cliente('editar'); 
?>

<script src="../public/js/Validacaoform.js"></script>
    
<div class="container">
<label for="text" id="texto">EDITAR CADASTRO</label>
    <form class="form-signin" action="" id="form" name="form" method="post">
        <h2 class="form-signin-heading"></h2>

          <?php while ($row = mysqli_fetch_array($rsCliente)) { ?>
        
        <div class="input">
            <label>Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $row['nome']; ?>"><br><br>
            <label>Telefone</label>
            <input type="text" id="telefone" name="telefone" class="form-control" value="<?php echo $row['telefone']; ?>"><br><br>
            <label>Infome seu endereço</label>
            <input type="text" id="endereco" name="endereco" class="form-control" value="<?php echo $row['endereco']; ?>"><br><br>
            <label>Tipo de pessoa<small id="small">     (ex: inquilino ou proprietário)</small></label>
            <input type="text" id="tipo" name="tipo" class="form-control" value="<?php echo $row['tipo']; ?>">
        </div>

   <?php } ?>
        
        <div class="button">
            <div>
                <input type="button" name="button" id="button" value="Editar" class="btn btn-primary" onclick="validar(document.form);"/>
                <input type="hidden" name="ok" id="ok" />
            </div>
        </div>

    </form>

</div>
</body>
</html>
