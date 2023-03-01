<!DOCTYPE html>
<html lang="PT-BR">
    <head>
        <meta charset="UTF-8">
        <title>Menu</title>
        <link rel="stylesheet" type="text/css" href="../public/css/cliente.css">

        <!-- Bootstrap core CSS -->
        <link href="../public/bootstrap/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../public/bootstrap/justified-nav.css" rel="stylesheet">
        <link href="../public/bootstrap/signin.css" rel="stylesheet">

        <!-- Personalizações --> 
        <link href="../public/bootstrap/estilo.css" rel="stylesheet">

    </head>
    <body>
<?php include('menu.php');?>

<?php
require_once('../controller/ControleCliente.php'); 
Cliente('consultar'); 
?>

<div class="container">
<label id="titulo">LISTA DE PRESTADOR</label>
    <div class="panel panel-primary">
    <td><b><a href="cadastrar_cliente.php?pg=cadastrar"><button type="button" class="btn btn-primary button-margin">Cadastrar</button></a></b></td>
        <table class="table table-borderless">
            <thead align="center">
            <td><b>C&Oacute;DIGO</b></td>
            <td><b>NOME</b></td>
            <td><b>TELEFONE</b></td>
            <td><b>ENDEREÇO</b></td>
            <td><b>TIPO</b></td>
			<td><b>...</b></td>
            

            </thead>

            <?php while ($row = mysqli_fetch_array($rsCliente)) { ?>
                <tbody align="center">
                <td> <?php echo $row['codigo']; ?> </td>
                <td> <?php echo $row['nome']; ?> </td>
                <td> <?php echo $row['telefone']; ?> </td>
                <td> <?php echo $row['endereco']; ?> </td>
                <td> <?php echo $row['tipo']; ?> </td>
                <td>
                    <a href="editar_cliente.php?codigo=<?php echo $row['codigo']; ?>"><button type="button" class="btn btn-success">Editar</button></a>
                    <a href="listar_cliente.php?ok=excluir&codigo=<?php echo $row['codigo']; ?>"><button type="button" class="btn btn-danger">Excluir</button></a></td>
				</td>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>
</body>
</html>