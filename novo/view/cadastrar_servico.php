<link rel="stylesheet" type="text/css" href="../public/css/servico.css">
<?php include('menu.php');  ?>
<?php
require_once('../controller/ControleServico.php'); 
ProcessoServico('incluir'); 
?>


<form class="form-signin" action="" id="form" name="form" method="post"><br>
<center><label for="text" id="texto">CADASTRAR SERVIÇO</label></center>
    <div class="container">    
            <div class="form-row">
                <div class="form-group col-md-7">
                    <label>Endereço</label>
                    <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereço" required autofocus><br>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Complemento</label>
                    <input type="text" id="complemento" name="complemento" class="form-control" placeholder="Complemento" required autofocus><br>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Telefone</label>
                    <input type="text" id="telefone" name="telefone" class="form-control" placeholder="(51) 99999-9999" required autofocus><br>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-7">
                    <label>Solicitante</label>
                    <input type="text" id="solicitante" name="solicitante" class="form-control" placeholder="Solicitante" required autofocus><br>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-5">
                    <label>Tipo<small id="small"> (ex: inquilino ou proprietário)</small></label>
                    <input type="text" id="tipo" name="tipo" class="form-control" placeholder="Tipo" required><br>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Inicio</label>
                    <input type="date" id="data_inicio" name="data_inicio" class="form-control" required><br>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Término</label>
                    <input type="date" id="data_termino" name="data_termino" class="form-control" required><br>   
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Situação</label>
                    <input type="text" id="situacao" name="situacao" class="form-control" placeholder="Situação" required> <br>  
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Problema</label>
                    <input type="text" id="problema" name="problema" class="form-control" placeholder="Problema" required> <br>  
                </div>
            </div>  

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Data da descrição</label>
                    <input type="date" id="data_descricao" name="data_descricao" class="form-control" required><br>   
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-10">
                    <label>Descrição</label>
                    <input type="text" id="descricao" name="descricao" class="form-control" placeholder="Descrição" required><br>   
                </div>
            </div>  

            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="button" name="button" id="button" value="Salvar serviço" class="btn btn-primary" onclick="validar(document.form);"/>
                    <input type="hidden" name="ok" id="ok" />
                </div>
            </div>
            
        </div>   
    </form>
<script src="../public/js/Validacaoform.js"></script>
