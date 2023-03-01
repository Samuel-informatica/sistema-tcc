<?php include('menu.php');?>

<?php
require_once('../controller/ControleServico.php'); 
ProcessoServico('consultar'); 
?>

<div class="container">
<label id="titulo">LISTA DE SERVIÇO</label>
    <div class="panel panel-primary">
    <td><b><a href="cadastrar_servico.php?pg=cadastrar"><button type="button" class="btn btn-primary button-margin">Cadastrar</button></a></b></td>
        <table class="table table-hover">
            <thead align="center">
            <td><b>C&Oacute;DIGO</b></td>
            <td><b>ENDEREÇO</b></td>
            <td><b>SOLICITANTE</b></td>
            <td><b>TIPO</b></td>
            <td><b>DATA INICIO</b></td>
            <td><b>DATA TERMINO</b></td>
            <td><b>SITUAÇÃO</b></td>
            <td><b>...</b></td>
            

            </thead>

            <?php while ($row = mysqli_fetch_array($rs)) { ?>
                <tbody align="center">
                <td> <?php echo $row['codigo']; ?> </td>
                <td> <?php echo $row['endereco']; ?> </td>
                <td> <?php echo $row['solicitante']; ?> </td>
                <td> <?php echo $row['tipo']; ?> </td>
                <td> <?php echo $row['data_inicio']; ?> </td>
                <td> <?php echo $row['data_termino']; ?> </td>
                <td> <?php echo $row['situacao']; ?> </td>
                <td>
                    <a href="visualizar_servico.php?codigo=<?php echo $row['codigo']; ?>"><button type="button" class="btn btn-success">Visualizar</button></a>
                    <a href="editar_servico.php?codigo=<?php echo $row['codigo']; ?>"><button type="button" class="btn btn-success">Editar</button></a>
                    <a href="listar_servico.php?ok=excluir&codigo=<?php echo $row['codigo']; ?>"><button type="button" class="btn btn-danger">Excluir</button></a></td>
				</td>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>
