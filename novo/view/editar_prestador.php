
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
ProcessoPrestador('editar'); 
?>
<script src="../public/js/Validacaoform.js"></script>
<div class="container">
<label for="text" id="texto">EDITAR PRESTADOR</label>
    <form class="form-signin" action="" id="form" name="form" method="post">
        <h2 class="form-signin-heading"></h2>

          <?php while ($row = mysqli_fetch_array($rs)) { ?>
        
        <div class="input">
            <label>Nome</label> 
            <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $row['nome']; ?>"><br>
            <label>Telefone</label>
            <input type="text" id="telefone" name="telefone" class="form-control" value="<?php echo $row['telefone']; ?>"><br>
            <label>Endereço</label>
            <input type="text" id="endereco" name="endereco" class="form-control" value="<?php echo $row['endereco']; ?>"><br>
            <label>Categoria</label> 
            <input type="text" id="categoria" name="categoria" class="form-control" value="<?php echo $row['categoria']; ?>"><br>
        </div>

   <?php } ?>      
        <div class="button">
            <div>
                <input type="button" name="button" id="button" value="Salvar informação" class="btn btn-primary" onclick="validar(document.form);"/>
                <input type="hidden" name="ok" id="ok" />
            </div>
        </div>

    </form>

</div>
</body>
</html>
