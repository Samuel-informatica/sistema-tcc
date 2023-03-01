
<?php 
    include('menu.php');
?>

<?php
    require_once('../controller/ControleCliente.php'); 
    Cliente('consultar'); 
?>



<link rel="stylesheet" href="../public/css/orcamento.css">
    
<form id="form"> 
        <div class="row">    
            <fieldset>
                <legend>Empresa</legend>
                    <div class="form-group">
                        <label>Imobell Administração de Imóveis Eireli</label>
                        <label>CNPJ: 95.443.818/0001-95</label>
                    </div>
            </fieldset>
        </div>
        <div class="row">
            <fieldset>
                <legend>Cliente</legend>
                    <div class="form-group">
                        <select class="form-control" name="codigo" id="select">
                            <?php while ($row = mysqli_fetch_array($rsCliente)) { ?>
                               <option value="<?php echo $row['codigo'] . "+" . $row['nome'] . "+" . $row['telefone'] . "+" . $row['endereco'] . "+" . $row['tipo']?>"> <?php echo $row['nome']; ?>
                               </option>
                            <?php } ?>
                        </select>
                    <label>Telefone: <label id="telefone"></label></label><br>
                    <label>Endereço: <label id="endereco"></label></label><br>  
                    <label>Inquilino/Proprietário: <label id="tipo"></label></label>                    
                    </div>
            </fieldset>
        </div>
<div class="row">
    <fieldset>
    <legend>Serviços</legend>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <form action="">
        
            1.<input type="text" placeholder="Serviço">  
            <input type="text" name="number_01" id="number_01" placeholder="Valor">
            <br>
            2.<input type="text" placeholder="Serviço">
            <input type="text" name="number_02" id="number_02" placeholder="Valor">
            <br>
            3.<input type="text" placeholder="Serviço">
            <input type="text" name="number_03" id="number_03" placeholder="Valor">
            <br>
            4.<input type="text" placeholder="Serviço">
            <input type="text" name="number_04" id="number_04" placeholder="Valor">
            <br>
            5.<input type="text" placeholder="Serviço">
            <input type="text" name="number_05" id="number_05" placeholder="Valor"><br>
            <div id="resultado">
            <label for="" id="total">Total: </label>
            <input type="text" name="result" id="result" placeholder="R$">
            </div>
        </form>
        

        <script>
            $('input[type="text"]').keyup(function(){
                var val = $($(this)).val().replace(',','.');
                $($(this)).val(val);
                $('#result').val(Number($('input[name="number_01"]').val()) + Number($('input[name="number_02"]').val()) + Number($('input[name="number_03"]').val()) + Number($('input[name="number_04"]').val()) + Number($('input[name="number_05"]').val()));
            });

            $(select).click(function (e) { 
                var codigo = document.getElementById("select").value;
                var resultado = codigo.split("+");

                console.log(resultado);

                document.getElementById("telefone").innerHTML = resultado[2];
                document.getElementById("endereco").innerHTML = resultado[3];
                document.getElementById("tipo").innerHTML = resultado[4];
            });
        </script>
        
    </fieldset>
</div>    
</form>