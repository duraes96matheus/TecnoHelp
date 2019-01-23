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
			  header('location:Index.php');
			}
	$logado = $_SESSION['Username'];
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$result_Solicitacoes = "SELECT * FROM Solicitacoes where User_Prestador='$logado' and Ativo='01'" ;
	$resultado_Solicitacoes = mysqli_query($conn, $result_Solicitacoes);
	mysqli_close($conn);
	
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Solicitações Recebidas</title>
		<meta charset="utf-8">
		<meta name="author" content="Matheus">
		<link rel="shortcut icon" href="IMG/network.png">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<script src="JS/ajax.jquery.min.1.11.3.js" type="text/javascript"></script>
		<script src="JS/jquery-1.11.0.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="JS/personalizado.js"></script>
		<script src="JS/jquery-3.3.1.js" type="text/javascript"></script>
		<link href="CSS/bootstrap.min.css"  rel="stylesheet" type="text/css"/>
		<script src="JS/bootstrap.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap-notify.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="CSS/jquery.dataTables.min.css">		
		<script src="JS/bootstrap.min.js" type="text/javascript"></script>
		<script src="JS/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" href="CSS/bootstrap.min.css" type="text/css" />	
		<script type="text/javascript">
					$(document).ready( function () {
			    $('#listar-usuario').DataTable();
			} );
		</script>
		<script type="text/javascript">
			$.fn.dataTable.ext.errMode = 'throw';	//try catch
		
					$(document).ready(function() { // cria a função seleção na tabela
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
		<script>
			$(document).ready( function () {
    $('#listar-usuario').DataTable( {
    	responsive: true
    } );
} );
		</script>		
	</head>
	<div id="all" align="center" style="margin-left: 20px; margin-right: 20px; margin-top: 20px;" >
		<body>
			<table class="table table-bordred table-striped" id="listar-usuario" class="display" style="width:100%">
				<thead>
						<tr>
						<th>N°Solicitação</th>
						<th>Solicitante</th>
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
						<td width="150"><?php echo $rows_Solicitacoes['NM_Solicitante']; ?></td>
						<td width="100" ><?php echo $rows_Solicitacoes['Data']; ?></td>
						<td ><?php echo $rows_Solicitacoes['GU']; ?></td>
						<td ><?php echo $rows_Solicitacoes['Categoria']; ?></td>
						<td ><?php echo $rows_Solicitacoes['Tipo']; ?></td>
						<td ><?php echo $rows_Solicitacoes['Status']; ?></td>
						<td  width="200px;">							
							<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_Solicitacoes['ID_Solicitacao']; ?>">Visualizar</button>
							<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $rows_Solicitacoes['ID_Solicitacao']; ?>
							"data-whatevernome="<?php echo $rows_Solicitacoes['Status']; ?>
							"data-whateverAgendamento="<?php echo $rows_Solicitacoes['DTHRSugerida']; ?>
							"data-whateverresposta="<?php echo $rows_Solicitacoes['Resposta']; ?>
							"data-whateverformadecobranca="<?php echo $rows_Solicitacoes['FormadeCobranca']; ?>
							"data-whatevervalor="<?php echo $rows_Solicitacoes['Valor']; ?>
							">Responder</button>						
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
									<label>Nome do Solicitante</label>
									<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['NM_Solicitante'] ?>" />												
								</div>
								<div class="col-sm-9">
									<label>Endereço</label>												
									<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['Endereco'];?> <?php echo $rows_Solicitacoes['Bairro'];?> <?php echo $rows_Solicitacoes['Complemento']?>"   />
								</div>
								<div class="col-sm-3">
									<label>Urgência</label>												
									<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['GU'] ?>" />
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<label>Categoria</label>												
									<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['Categoria'] ?>" />
								</div>
								<div class="col-sm-6">
									<label>Tipo</label>												
									<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['Tipo'] ?>" />
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<label>Descrição</label>
									<textarea class="form-control"> 
									<?php echo $rows_Solicitacoes['Des'] ?>
									</textarea>
								</div>
								<div class="col-sm-6">
									<label>Agendado para:</label>
									<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['Agendamento'] ?>" />							
								</div>
								<div class="col-sm-6">
									<label>Data da Solicitação</label>											
									<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['Data'] ?>" />
								</div>																																																						
							</div>
							<br /><br />
							<button class="btn btn-success" onclick="cont();">Imprimir</button>
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
				<form method="POST" action="PHP/processap.php" enctype="multipart/form-data">
				    <div class="form-group">
						<label for="recipient-name" class="control-label">Status:</label>
							<select class="form-control" name="Status">
								<option value="Pendente">Pendente</option>
								<option value="Aceita">Aceita</option>
								<option value="Contra Proposta">Contra Proposta</option>	
								<option value="Recusada">Recusada</option>
								<option value="Outros">Outros</option>
							</select>
					  </div>
					  <div class="form-group">
					  	<label>Sugerir data para o serviço</label>
						<input type="text" class="form-control" name="Agendamento" id="Agendamento" />
					  </div>								  
					  <div class="form-group">
						<label for="message-text" class="control-label">Resposta:</label>
						<textarea  class="form-control" id="resposta" name="Resposta"></textarea>
					  </div>
					  <div class="form-group">
						<label for="message-text" class="control-label">Forma de Cobrança:</label>
							<select class="form-control" name="FormadeCobranca" id="formadecobranca">
								<option value="Hora Trabalhada">Hora Trabalhada</option>
								<option value="Dia Trabalhado">Dia Trabalhado</option>
								<option value="Pelo serviço completo">Pelo serviço completo</option>
								<option value="Outros">Outros</option>
							</select>									
					 </div>
					 <div class="form-group">
						<label for="message-text" class="control-label">Valor:</label>
						<input type="text" id="valor" class="form-control" name="valor" />
					</div>
					<div style="display: none">
					  	<input  name="id" class="form-control" id="id">
					</div>
					<button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-success">Responder</button>							 
				</form>
			  </div>								  
			</div>
	 	</div>
	 <script>
		$('#exampleModal').on('show.bs.modal', function (event) {
			 var button = $(event.relatedTarget) // Button that triggered the modal
			 var recipient = button.data('whatever') // Extract info from data-* attributes
			 var recipientnome = button.data('whatevernome')
			 var recipientagendamento = button.data('whateverAgendamento')
			 var recipientresposta = button.data('whateverresposta')
			 var recipientformadecobranca = button.data('whateverformadecobranca')
			 var recipientvalor = button.data('whatevervalor')		
			  var modal = $(this)
		  modal.find('.modal-title').text('Solicitação de n° ' + recipient)
		  modal.find('#id').val(recipient)
		  modal.find('#recipient-name').val(recipientnome)
		  modal.find('#Agendamento').val(recipientagendamento)
		  modal.find('#resposta').val(recipientresposta)
		  modal.find('#formadecobranca').val(recipientformadecobranca)
		  modal.find('#valor').val(recipientvalor)		
				});
		</script>				
 	 </body>
</html>
