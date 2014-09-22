<?php 
	$breadcrumb = "Categoria";
	require_once 'topo.php'; 
	$arrDados = $_POST;
?>

<div id="page-wrapper">
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Categorias cadastradas</h1>
  </div>
  <!-- /.col-lg-12 --> 
</div>
<!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-body">
        <form id="form" name="form" method="post" accept-charset="listCategoria.php">
          <label for="fltStatus">Status</label>
          <input type="checkbox" name="fltStatus[]" id="fltStatus[]" value="A"
					<?php 
						for ($i=0; $i < count($arrDados['fltStatus']); $i++) 
						{ 
							echo $arrDados['fltStatus'] == "A" ? " checked = 'checked' " : "";
						}
					?>
					/>
          Ativo
          <input type="checkbox" name="fltStatus[]" id="fltStatus[]" value="B"
					<?php 
						for ($i=0; $i < count($arrDados['fltStatus']); $i++) 
						{ 
							echo $arrDados['fltStatus'] == "B" ? " checked = 'checked' " : "";
						}
					?>/>
          Bloqueado
          <label for="fltNome"></label>
          <input class="form-control" name="fltNome" id="fltNome" placeholder="insira sua pesquisa.." value="<?php echo $arrDados["fltNome"]; ?>">
        </form>
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>Código</th>
                <th>Categoria</th>
                <th>Status</th>
                <th>Ação</th>
              </tr>
            </thead>
            <?php	
						$arrDados["fltNome"] = mysql_real_escape_string($arrDados["fltNome"]);				
						$strSQL = "SELECT 	idCategoria
											, NmCategoria
											, FgStatus 
									FROM 
											teCategoria 
									WHERE 
											1=1";
						//if tenario de uma linha que trabalha os dois escopos true ou false de forma simplificada.		
						$strSQL .= (strlen($arrDados["fltNome"]) <= 0)?"" :" AND NmCategoria LIKE '%{$arrDados["fltNome"]}%'";
						
						for($i = 0; $i < count($arrDados['flStatus']);$i++)
						{
							$arrDados["fltNome"][$i] = mysql_real_escape_string(trim($arrDados["fltNome"][$i]));
							$strPidStatus .= ", '{$arrDados["fltStatus"][$i]}'";
							
						}
						$strPidStatus = substr($strPidStatus, 1);
						$strSQL .= ($strPidStatus != "") ?" AND FgStatus in ({$strPidStatus}) " : "";			
						
						//se estiver usando a versao ate 5.5 ainda usara o mysql_query assima dessa versao usar o pdo. 
						$objRs = mysql_query($strSQL);
						
						while ($objRow = mysql_fetch_array($objRs))
						{	
							echo "<tr>";
								echo "<td> {$objRow['idCategoria']} </td>";
								echo "<td> {$objRow['NmCategoria']} </td>";
								echo "<td>";
									echo($objRow[FgStatus] === 'A' ? 'Ativo': 'Bloqueado');
								echo "</td>";
								echo "<td class='center'>
										<a class='btn btn-info' href='#' data-toggle='modal' data-target='#edit'>
											<i class='fa fa-pencil-square-o'></i>
										</a>
										<a class='btn btn-info' href='#' data-toggle='modal' data-target='#del'>
											<i class='fa fa-trash-o'></i>
										</a>
									</td>";
							echo "</tr>";
						}
						
						?>
          </table>
          <!-- Button trigger modal -->
          <div class="clear"></div>
          <div class="panel pull-right">
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" class="pull-right">
            <span class="fa fa-plus"></span> &nbsp; Nova Categoria
            </button>
          </div>
          <!-- Modal inserção -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Cadastrar Nova Categoria</h4>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal" action="listCategoria.php">
                    <div class="form-group">
                      <div class="col-sm-8">
                        <div class="input-group">
                          <div class="input-group-addon"><span class="fa fa-table fa-fw"></span></div>
                          <input class="form-control" type="text" placeholder="Categoria" name="NmCategoria" maxlength="100">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-8">
                        <div class="input-group">
                          <label for="fltStatus">Status</label>
                          <br />
                          <input type="checkbox" name="fltStatus[]" id="fltStatus[]" value="A"
														<?php 
															for ($i=0; $i < count($arrDados['fltStatus']); $i++) 
															{ 
																echo $arrDados['fltStatus'] == "A" ? " checked = 'checked' " : "";
															}
														?>
														/>
                          Ativo
                          <input type="checkbox" name="fltStatus[]" id="fltStatus[]" value="B"
														<?php 
															for ($i=0; $i < count($arrDados['fltStatus']); $i++) 
															{ 
																echo $arrDados['fltStatus'] == "B" ? " checked = 'checked' " : "";
															}
														?>/>
                          Bloqueado </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success">Salvar</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <?php 
										  
										  $strSQL = "INSERT INTO teCategoria (NmCategoria, FgStatus) VALUES ('{$arrDados['NmCategoria']}, '{$arrDados['FltStatus']}";
										  $result = mysql_query($strSQL);
										  
			
  ?>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Modal deletar -->
          <div class="modal fade" id="del" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel">Tem certeza que deseja deletar essa categoria?</h3>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal">
                    <div class="form-group">
                      <div class="col-sm-8">
                        <div class="input-group">
                          <div class="input-group-addon"><span class="fa fa-table fa-fw"></span></div>
                          <input class="form-control" type="text" placeholder="Categoria" maxlength="100">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-8">
                        <div class="input-group">
                          <label for="fltStatus">Status</label>
                          <br />
                          <input type="checkbox" name="fltStatus[]" id="fltStatus[]" value="A"
														<?php 
															for ($i=0; $i < count($arrDados['fltStatus']); $i++) 
															{ 
																echo $arrDados['fltStatus'] == "A" ? " checked = 'checked' " : "";
															}
														?>
														/>
                          Ativo
                          <input type="checkbox" name="fltStatus[]" id="fltStatus[]" value="B"
														<?php 
															for ($i=0; $i < count($arrDados['fltStatus']); $i++) 
															{ 
																echo $arrDados['fltStatus'] == "B" ? " checked = 'checked' " : "";
															}
														?>/>
                          Bloqueado </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="T" class="btn btn-success">Confirmar</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Modal edição -->
          <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Editar Categoria</h4>
                </div>
                <div class="modal-body">
                  <form class="form-horizontal" id="editCat">
                    <div class="form-group">
                      <div class="col-sm-8">
                        <div class="input-group">
                          <div class="input-group-addon"><span class="fa fa-table fa-fw"></span></div>
                          <input class="form-control" type="text" placeholder="Categoria" maxlength="100">
                        </div>
                        <span class="errocat"></span> </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-8">
                        <div class="input-group">
                          <label for="fltStatus">Status</label>
                          <br />
                          <input type="checkbox" name="fltStatus[]" id="fltStatus[]" value="A"
														<?php 
															for ($i=0; $i < count($arrDados['fltStatus']); $i++) 
															{ 
																echo $arrDados['fltStatus'] == "A" ? " checked = 'checked' " : "";
															}
														?>
														/>
                          Ativo
                          <input type="checkbox" name="fltStatus[]" id="fltStatus[]" value="B"
														<?php 
															for ($i=0; $i < count($arrDados['fltStatus']); $i++) 
															{ 
																echo $arrDados['fltStatus'] == "B" ? " checked = 'checked' " : "";
															}
														?>/>
                          Bloqueado </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" id="execute" class="btn btn-success">Salvar Alterações</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
                <script type="text/javascript">
													document.getElementById("execute").onclick = function () 
																		{	
														var categoria = document.getElementById('fltStatus[]');
														
											if(categoria.length <= 5){ 
							document.getElementById("errocat").innerHTML="<font class='alert-danger'>Digite um email válido</font>";
							
						}
					}
						document.getElementById("editCat").submit();  								
														</script> 
              </div>
            </div>
          </div>
          <?php require_once 'rodape.php'; ?>
