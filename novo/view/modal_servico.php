
<!DOCTYPE html>
<html lang="PT-BR">
    <head>
        <meta charset="UTF-8">
        <title>Menu</title>
        <link rel="stylesheet" type="text/css" href="../public/css/prestador.css">
    </head>
    <body>
<?php include('menu.php');  ?>
<div id="arrumar">
<?php
require_once('../controller/ControleServico.php'); 
ProcessoServico('consultar'); 
?>

<div class="container">

    <div class="panel panel-primary">


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <?php while ($row = mysqli_fetch_array($rs)) { ?>
                <tbody align="center">
                <td> <?php echo $row['codigo']; ?> </td>
                <td> <?php echo $row['nome']; ?> </td>
                <td> <?php echo $row['telefone']; ?> </td>
                <td> <?php echo $row['endereco']; ?> </td>
                <td> <?php echo $row['categoria']; ?> </td>
                <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Modal grande</button>
                <a href="editar_prestador.php?codigo=<?php echo $row['codigo']; ?>"><button type="button" class="btn btn-success">Visualizar</button></a>
				</td>
                </tbody>
                        <?php } ?>
                    </table>
                </div>           
            </div>
        </div>
    </div>
  </div>
</div>



</body>
</html>