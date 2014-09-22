<?php require_once("topo.php"); ?>
       <div id="page-wrapper">
            <h1>Cadastro de categoria</h1>
          	<div class="col-lg-12">      
        		<div class="panel panel-default">
            		<div class="panel-body">
	                	<form class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-6">
									<label for="NmCategoria">Categoria</label>
									<input class="form-control" placeholder="Nome Categoria"/>
								</div>
							</div>
           					<div class="form-group">
								<div class="col-sm-6">
									<label for="tipo">Tipo</label>
									<input type="checkbox" name="tipoRes" id="tipoRes" value="A"/> Reseita
									<input type="checkbox" name="tipoDes" id="tipoDes" value="B"/> Despesa
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-8">
									<button type="button" class="btn btn-success">Salvar</button>
			                		<button type="button" class="btn btn-danger">Cancelas</button>
								</div>
							</div>
						</form>
<?php require_once("rodape.php"); ?>