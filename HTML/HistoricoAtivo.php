<?php
	session_start();
	$servername = "localhost";
	$username = "SistemaTH";
	$password = "14042015";
	$dbname = "SistemaTH";				
		if((!isset ($_SESSION['Username']) == true) and (!isset ($_SESSION['senha']) == true))
			{
			  unset($_SESSION['Username']);
			  unset($_SESSION['senha']);
			  unset($_SESSION['msg']);			  
			  header('location:Index.php');
			}
	$logado = $_SESSION['Username'];
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$result_Solicitacoes = "SELECT * FROM Solicitacoes where User_Solicitante = '$logado' and Ativo='01'  ";
	$resultado_Solicitacoes = mysqli_query($conn, $result_Solicitacoes);
	mysqli_close($conn);
	 
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Solicitações Realizadas</title>
		<meta charset="utf-8">
		<meta name="author" content="Matheus">
		<script src="JS/ajax.jquery.min.1.11.3.js" type="text/javascript"></script>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">		
		<link rel="shortcut icon" href="IMG/network.png">			
		<script type="text/javascript" src="JS/personalizado.js"></script>
		<link href="CSS/bootstrap.min.css"  rel="stylesheet" type="text/css"/>
		<script src="JS/bootstrap.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap-notify.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="CSS/jquery.dataTables.min.css">
		<script src="JS/jquery-3.3.1.js"></script>
		<script src="JS/jquery-1.11.0.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap.min.js" type="text/javascript"></script>
		<script src="JS/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" href="CSS/bootstrap.min.css" type="text/css" />
		<script type="text/javascript">
					$(document).ready( function () {
			    $('#listar-usuario').DataTable();
			} );
		</script>
		<script type="text/javascript">
			$.fn.dataTable.ext.errMode = 'throw';		
					$(document).ready(function() { 
    var table = $('#listar-usuario').DataTable(); 
    $('#listar-usuario tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } ); 
    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );
} );
		</script>
		<style>
			
		</style>		
	</head>
	<div id="all" align="center" style="margin-left: 20px; margin-right: 20px; margin-top: 20px;" >
		<body>
			<table class="table table-bordred table-striped" id="listar-usuario" class="display" style="width:100%">
				<thead>
						<tr>
						<th>N°Solicitação</th>
						<th>Prestador</th>
						<th>Data</th>
						<th>Urgência</th>
						<th>Categoria</th>
						<th>Tipo</th>
						<th>Status</th>
						<th>Ações</th>			
					</tr>
				</thead>
				<tbody>
					<?php while($rows_Solicitacoes = mysqli_fetch_assoc($resultado_Solicitacoes)){ ?>
						<tr>
							<td ><?php echo $rows_Solicitacoes['ID_Solicitacao']; ?></td>
							<td width="150"><?php echo $rows_Solicitacoes['NM_Prestador']; ?></td>
							<td width="150" ><?php echo $rows_Solicitacoes['Data']; ?></td>
							<td ><?php echo $rows_Solicitacoes['GU']; ?></td>
							<td ><?php echo $rows_Solicitacoes['Categoria']; ?></td>
							<td ><?php echo $rows_Solicitacoes['Tipo']; ?></td>
							<td ><?php echo $rows_Solicitacoes['Status']; ?></td>
							<td  width="350px;">	
								<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_Solicitacoes['ID_Solicitacao']; ?>">Visualizar</button>
								<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $rows_Solicitacoes['ID_Solicitacao']; ?>
									"data-whatevernome="<?php echo $rows_Solicitacoes['GU']; ?>
									"data-whatevercategoria="<?php echo $rows_Solicitacoes['Categoria']; ?>
									"data-whatevercatipo="<?php echo $rows_Solicitacoes['Tipo']; ?>
									"data-whatevercaagendamento="<?php echo $rows_Solicitacoes['Agendamento']; ?>
									"data-whateverdes="<?php echo $rows_Solicitacoes['Des']; ?>
									">Editar</button>
								<a href="Avaliacao.php?id=<?php echo $rows_Solicitacoes['ID_Solicitacao']; ?>"><button type="button" class="btn btn-xs btn-success" onclick="ChamarAtencao()">Avaliar</button></a>
								<?php echo  "<a href='PHP/proc_apagar_usuario.php?id=" . $rows_Solicitacoes['ID_Solicitacao'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar</a><br><hr>";?>
							</td>
						</tr>
						<div class="modal fade" id="myModal<?php echo $rows_Solicitacoes['ID_Solicitacao']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header"> 
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title text-center" id="myModalLabel"></h4>										
									</div>
									<div class="modal-body">												
										<script>
											function cont(){
												var conteudo = document.getElementById('print').innerHTML;
												tela_impressao = window.open('about:blank');
												tela_impressao.document.write(conteudo);
												tela_impressao.window.print();
												tela_impressao.window.close();
												}
										</script>													
										<div id="print" class="conteudo" align="left">
											<div class="row">
												<div class="col-sm-12">
													<label> Resposta do Prestador</label>
													<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['Resposta'] ?>" readonly="true" />
												</div>
												<div class="col-sm-4">
													<label>Status</label>
													<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['Status']; ?>" readonly="true"  />
												</div>											
												<div class="col-sm-4">
													<label>Data e hora Sugerida</label>
													<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['DTHRSugerida'] ?>" readonly="true" />
												</div>
												<div class="col-sm-4">
													<label>Forma de Cobrança</label>
													<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['FormadeCobranca'] ?>" readonly="true" />
												</div>		
												<div class="col-sm-4">
													<label>Valor da mão de Obra</label>
													<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['Valor'] ?>" readonly="true" />
												</div>	
												<div class="col-sm-4">
													<label>Nome do Prestador</label>
													<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['NM_Prestador'] ?>"  readonly="true"/>
													
												</div>
												<div class="col-sm-4">
													<label>Codigo</label>												
													<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['CD_Prestador'] ?>"  readonly="true"" />
												</div>
											</div>
											<div class="row">
												<div class="col-sm-3">
													<label>Grau de Urgência</label>												
													<input type="text" class="form-control" min="1" max="10" value="<?php echo $rows_Solicitacoes['GU'] ?>" readonly="true"/>
												</div>
												<div class="col-sm-4">
													<label>Agendamento</label>											
													<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['Agendamento'] ?>" readonly="true" />
												</div>
												<div class="col-sm-5">
													<label>Categoria</label>												
													<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['Categoria'] ?>" readonly="true" />
												</div>
												<div class="col-sm-4">
													<label>Tipo</label>												
													<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['Tipo'] ?>" readonly="true" />
												</div>												
												<div class="col-sm-8">
													<label>Descrição</label>
													<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['Des'] ?>"  readonly="true">							
												</div>
											</div>																																															
										</div>
										<br />
										<input type="button" onclick="cont();" value="Imprimir">												
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
						</tbody>
					 </table>
					 <a href="javascript:history.back()" class="btn btn-primary">Voltar</a> 
				</div>
			</div>		
		</div>
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Solicitação</h4>
					  </div>
						  <div class="modal-body">
							<form method="POST" action="PHP/Processa.php" enctype="multipart/form-data" id="edicao">
							  <div class="form-group">
								<label for="recipient-name" class="control-label">Grau de Urgência:</label>
								<input name="GU" type="number"min="1" max="10" class="form-control" id="recipient-name">
							  </div>
							  <div class="form-group">
								<label for="message-text" class="control-label">Categoria:</label>
									<select class="form-control" name="Categoria" >
										<option value="ASSISTÊNCIA TÉCNICA EM CASA ">ASSISTÊNCIA TÉCNICA EM CASA</option>
										<option value="DIAGNÓSTICO/ORÇAMENTO">DIAGNÓSTICO/ORÇAMENTO</option>
										<option value="SERVIÇOS DE HARDWARE/SOFTWARE">SERVIÇOS DE HARDWARE/SOFTWARE</option>
										<option value="SERVIÇOS DE REDE">SERVIÇOS DE REDE</option>
										<option value="SERVIÇOS DE WINDOWS SERVER">SERVIÇOS DE WINDOWS SERVER</option>
										<option value="SERVIÇOS DE SERVIDOR LINUX">SERVIÇOS DE SERVIDOR LINUX</option>
										<option value="outros">OUTROS</option>		
									</select>
							 	</div>
							  	<div class="form-group">
								<label for="message-text" class="control-label">Tipo:</label>
									<select class="form-control" name="Tipo">						
										<option value="OUTROS">✔ Manutenção preventiva</option>
										<option value="Manutenção preventiva">✔ Manutenção corretiva</option>
										<option value="Troca de Peças">✔ Troca de Peças</option>
										<option value="Instalação de novas peças">✔ Instalação de novas peças</option>
										<option value="Instalação de impressora">✔ Instalação de impressora</option>
										<option value="Instalação de sistema operacional Windows (com programas)">✔ Instalação de sistema operacional Windows (com programas)</option>
										<option value="Instalação de sistema operacional Linux">✔ Instalação de sistema operacional Linux</option>
										<option value="Instalação de sistema operacional Windows">✔ Instalação de sistema operacional Windows</option>
										<option value="Instalação de programas">✔ Instalação de programas</option>
										<option value="Retirada de Vírus, Spyware e spam">✔ Retirada de Vírus, Spyware e spam</option>
										<option value="Instalação de antivírus">✔ Instalação de antivírus</option>
										<option value="Outros">✔ Outros</option>
											
										<option value="Instalação de cabeamento (Cabos, RJ-45 fêmea, canaletas, etc.)">✔ Instalação de cabeamento (Cabos, RJ-45 fêmea, canaletas, etc.)</option>
										<option value="Configuração de computadores na rede">✔ Configuração de computadores na rede</option>
										<option value="Conserto de ponto de rede">✔ Conserto de ponto de rede</option>
										<option value="Conserto de configuração de computador na rede">✔ Conserto de configuração de computador na rede</option>
										<option value="Instalação de impressora na rede">✔ Instalação de impressora na rede</option>
										<option value="Compartilhamento de impressora em rede">✔ Compartilhamento de impressora em rede</option>
										<option value=" Instalação de rede sem fio">✔ Instalação de rede sem fio</option>
										<option value="Configuração de rede sem fio">✔ Configuração de rede sem fio</option>
										<option value=" Roteamento de modens ADSL">✔ Roteamento de modens ADSL</option>
										<option value="Outros">✔ Outros</option>
				
										
										<option value="Instalação de servidor Windows 2003 Server">✔ Instalação de servidor Windows 2003 Server</option>
										<option value="Configuração de servidor de internet">✔ Configuração de servidor de internet</option>
										<option value="Configuração de servidor DHCP">✔ Configuração de servidor DHCP</option>
										<option value="Configuração de servidor de arquivos">✔ Configuração de servidor de arquivos</option>
										<option value="Configuração de servidor de autenticação">✔ Configuração de servidor de autenticação</option>
										<option value="Configuração de servidor de firewall">✔ Configuração de servidor de firewall</option>						
										<option value="Outros">✔ Outros</option>
				
										
										<option value="Instalação de servidor Linux">✔ Instalação de servidor Linux</option>
										<option value="Configuração de servidor de internet">✔ Configuração de servidor de internet</option>
										<option value="Configuração de servidor DHCP">✔ Configuração de servidor DHCP</option>
										<option value="Configuração de servidor de arquivos">✔ Configuração de servidor de arquivos</option>
										<option value="Configuração de servidor de autenticação">✔ Configuração de servidor de autenticação</option>
										<option value="Configuração de servidor de firewall">✔ Configuração de servidor de firewall</option>
										<option value="Outros">✔ Outros</option>																		
									</select>						
								</div>							 
							    <div class="form-group">
									<label for="message-text" class="control-label">Agendamento:</label>
									<input type="text" name="Agendamento" class="form-control" id="agendamento">									
	                          </div>
							   <div class="form-group">
								<label for="message-text" class="control-label">Descrição:</label>
								<textarea name="Des" class="form-control" id="des"></textarea>
							  </div>
							  <div style="display: none;">
							  	<input name="ID_Solicitacao"  class="form-control" id="id">
							  </div>
							<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-danger">Alterar</button>								 
						</form>
					  </div>								  
					</div>
				  </div>
				<script>
					$('#exampleModal').on('show.bs.modal', function (event) {
					 var button = $(event.relatedTarget) // Button that triggered the modal
					 var recipient = button.data('whatever') // Extract info from data-* attributes
					 var recipientnome = button.data('whatevernome')
					 var recipientcategoria = button.data('whatevercategoria')
					 var recipientcatipo = button.data('whatevercatipo')
					 var recipientagendamento = button.data('whatevercaagendamento')
					 var recipientdes = button.data('whateverdes')		
				  var modal = $(this)
				  modal.find('.modal-title').text('Solicitação de n° ' + recipient)
				  modal.find('#id').val(recipient)
				  modal.find('#recipient-name').val(recipientnome)
				  modal.find('#categoria').val(recipientcategoria)
				  modal.find('#tipo').val(recipientcatipo)
				  modal.find('#agendamento').val(recipientagendamento)
				  modal.find('#des').val(recipientdes)		
				});
		</script>
 	 </body>
   </div>
</html>
