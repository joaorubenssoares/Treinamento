<?php
$breadcrumb = "Usuário";
 require_once("topo.php"); 
	$idUsuario = $_GET["idUsuario"]==""?0:$_GET["idUsuario"];
	$strAcao = "I";
	if($idUsuario!=0)
	{
		$strSQL = "SELECT
						 NmUsuario
						, DsEmail
					FROM
						tsUsuario
					WHERE
						idUsuario = '".mysql_real_escape_string($idUsuario)."' "; 
	
		$objRs = mysql_query($strSQL);
		$objRow = mysql_fetch_array($objRs);
		$strAcao = "E";
	}
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Cadastro de usuários</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
        	<div class="panel panel-default">
                <div class="panel-body">
				<div class="modal-dialog">
					<div class="modal-content">
				      	<div class="modal-body">
				       		<form class="form-horizontal" name="formCadUser" id="formCadUser" action="usuarios.php" method="post">
								<div class="form-group">														
									<div class="col-sm-8">
										<div class="input-group">
									      	<div class="input-group-addon"><span class="fa fa-user"></span></div>
									      	<label for="NmUsuario"></label>
									      	<input class="form-control" name="NmUsuario" id="NmUsuario" type="text" placeholder="Nome" maxlength="100" value="<?php echo $objRow['NmUsuario']; ?>">
										</div><span id="erron"></span>
									</div>                   
								</div>
								<div class="form-group">					
									<div class="col-sm-8">
										<div class="input-group">
									      	<div class="input-group-addon">@</div>
									      	<label for="DsEmail"></label>
									      	<input class="form-control" name="DsEmail" id="DsEmail" type="text" placeholder="Email" maxlength="255" value="<?php echo $objRow['DsEmail']; ?>">
										</div><span id="erroe"></span>
									</div>                   
								</div>
					            <div class="form-group">					
									<div class="col-sm-6">
										<div class="input-group">
									      	<div class="input-group-addon"><span class="fa fa-key"></span></div>
									      	<label for="DsSenha"></label>
									      	<input type="password" class="form-control" name="DsSenha" id="DsSenha" type="text" placeholder="Senha" maxlength="8">
										</div><span id="erros"></span>
									</div>                   
								</div>
					            <div class="form-group">					
									<div class="col-sm-6">
										<div class="input-group">
									      	<div class="input-group-addon"><span class="fa fa-key"></span></div>
									      	<label for="ConfSenha"></label>
									      	<input type="password" class="form-control" name="ConfSenha" id="ConfSenha" type="text" placeholder="Confirme a senha" maxlength="8">
										</div>
									</div>                   
								</div> 
				  			</form>
						</div>
					  	<div class="modal-footer">
					        <a href="listUsuario.php"><button name="cancelar" id="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button></a>
					        <button name="salvar" id="salvar" class="btn btn-success">Salvar</button>
					  	</div>
					</div>
				</div>
				
				<?php require_once("rodape.php"); ?>