
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
ProcessoPrestador('consultar'); 
?>

<div class="container">
<label id="titulo">LISTA DE PRESTADOR</label>
    <div class="panel panel-primary">
    <td><b><a href="cadastrar_prestador.php?pg=cadastrar"><button type="button" class="btn btn-primary button-margin">Cadastrar</button></a></b>
        <table class="table table-striped">
            <thead align="center">
            <td><b>C&Oacute;DIGO</b></td>
            <td><b>NOME</b></td>
            <td><b>TELEFONE</b></td>
            <td><b>ENDEREÇO</b></td>
            <td><b>CATEGORIA</b></td>
            <td><b>A&Ccedil;&Otilde;ES</b></td>
            </td>
            </thead>

            <?php while ($row = mysqli_fetch_array($rs)) { ?>
                <tbody align="center">
                <td> <?php echo $row['codigo']; ?> </td>
                <td> <?php echo $row['nome']; ?> </td>
                <td> <?php echo $row['telefone']; ?> </td>
                <td> <?php echo $row['endereco']; ?> </td>
                <td> <?php echo $row['categoria']; ?> </td>
                <td>
                    <a href="editar_prestador.php?codigo=<?php echo $row['codigo']; ?>"><button type="button" class="btn btn-success">Editar</button></a>
                    <a href="listar_prestador.php?ok=excluir&codigo=<?php echo $row['codigo']; ?>"><button type="button" class="btn btn-danger">Excluir</button></a></td>
				</td>
                </tbody>
            <?php } ?>
        </table>

        </div>           
    </div>

</body>
</html>