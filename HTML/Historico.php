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
	$result_Solicitacoes = "SELECT * FROM Solicitacoes where User_Prestador = '$logado' and Ativo='00'  ";
	$resultado_Solicitacoes = mysqli_query($conn, $result_Solicitacoes);
	
	//$result_Avaliacao = "SELECT * FROM Solicitacoes where User_Prestador = '$logado' and Ativo='00'  ";
	//$resultado_Solicitacoes = mysqli_query($conn, $result_Solicitacoes);
	$result_Avaliacoes = "SELECT * FROM avaliacao";
	$resultado_Avaliacoes = mysqli_query($conn, $result_Avaliacoes);
	mysqli_close($conn);
	
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Histórico de Atendimento</title>
		<meta charset="utf-8">
		<meta name="author" content="Matheus">
		<script src="JS/ajax.jquery.min.1.11.3.js" type="text/javascript"></script>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">		
		<link rel="shortcut icon" href="IMG/network.png">			
		<script type="text/javascript" src="JS/personalizado.js"></script>
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
		<link rel="stylesheet" href="CSS/dataTables.bootstrap.min.css" type="text/css" />
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
						<th>Nota Final</th>
						<th>Recomendaria?</th>
						<th>Ações</th>			
					</tr>
				</thead>
				<tbody>	 
					<?php while($rows_Avaliacoes = mysqli_fetch_assoc($resultado_Avaliacoes)){ ?>
					<?php while($rows_Solicitacoes = mysqli_fetch_assoc($resultado_Solicitacoes)){ ?>
						<tr>
							<td ><?php echo $rows_Solicitacoes['ID_Solicitacao']; ?></td>
							<td width="150"><?php echo $rows_Solicitacoes['NM_Solicitante']; ?></td>
							<td width="150" ><?php echo $rows_Solicitacoes['Data']; ?></td>
							<td ><?php echo $rows_Solicitacoes['GU']; ?></td>
							<td ><?php echo $rows_Solicitacoes['Categoria']; ?></td>
							<td ><?php echo $rows_Avaliacoes['Q14']; ?></td>
							<td ><?php echo $rows_Avaliacoes['Q8']; ?></td>

							<td >	
								<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Visualizacao<?php echo $rows_Solicitacoes['ID_Solicitacao']; ?>">Visualizar</button>
								<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#Avaliacao<?php echo $rows_Avaliacoes['ID_SOLICITACAO']; ?>">Avaliação</button>
							</td>
						</tr>
						<div class="modal fade" id="Visualizacao<?php echo $rows_Solicitacoes['ID_Solicitacao']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
											<div class="col-sm-4">
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
											<div class="col-sm-6">
												<label>Forma de Cobrança</label>
												<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['FormadeCobranca'] ?>" readonly="true" />
											</div>		
											<div class="col-sm-6">
												<label>Valor da mão de Obra</label>
												<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['Valor'] ?>" readonly="true" />
											</div>										
											<div class="col-sm-3">
												<label>Grau de Urgência</label>												
												<input type="text" class="form-control" min="1" max="10" value="<?php echo $rows_Solicitacoes['GU'] ?>" readonly="true"/>
											</div>
											<div class="col-sm-5">
												<label>Categoria</label>												
												<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['Categoria'] ?>" readonly="true" />
											</div>
											<div class="col-sm-4">
												<label>Tipo</label>												
												<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['Tipo'] ?>" readonly="true" />
											</div>
											<div class="col-sm-6">
												<label>Agendamento</label>											
												<input type="text" class="form-control" value="<?php echo $rows_Solicitacoes['Agendamento'] ?>" readonly="true" />
											</div>
											<div class="col-sm-6">
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
						<div class="modal fade" id="Avaliacao<?php echo $rows_Avaliacoes['ID_SOLICITACAO'];  ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
											<div class="col-sm-6" align="center">					
												<label>Solução do problema</label>
												<input type="text" class="form-control" value="<?php echo $rows_Avaliacoes['Q1'] ?>"  readonly="true">	
											</div>						
											<div class="col-sm-6" align="center">					
												<label>Prontidão de atendimento do telefone</label>
												<input type="text" class="form-control" value="<?php echo $rows_Avaliacoes['Q2'] ?>"  readonly="true">				
											</div>
										</div>
											<br />
										<div class="row">
											<div class="col-sm-4" align="center">					
												<label>Profissionalismo do Prestador</label>
												<input type="text" class="form-control" value="<?php echo $rows_Avaliacoes['Q3'] ?>"  readonly="true">											
											</div>
											<div class="col-sm-4" align="center">					
												<label>Assistência do Prestador</label>
												<input type="text" class="form-control" value="<?php echo $rows_Avaliacoes['Q4'] ?>"  readonly="true">
											</div>
											<div class="col-sm-4" align="center">					
												<label>Facilidade de contatar</label>
												<input type="text" class="form-control" value="<?php echo $rows_Avaliacoes['Q5'] ?>"  readonly="true">
											</div>
										</div>
										<br />
										<div class="row">
											<div class="col-sm-4" align="center">	
												<label>Prontidão de resposta do e-mail</label>
												<input type="text" class="form-control" value="<?php echo $rows_Avaliacoes['Q6'] ?>"  readonly="true">
											</div>
											<div class="col-sm-8" align="center">	
												<label>Por favor, avalie sua satisfação geral com o Prestador:</label>
												<input type="text" class="form-control" value="<?php echo $rows_Avaliacoes['Q7'] ?>"  readonly="true">												
											</div>
										</div>
										<br />										
										<div class="row">
											<div class="col-sm-4" align="center">	
												<label>Recomendaria o prestador</label>
												<input type="text" class="form-control" value="<?php echo $rows_Avaliacoes['Q8'] ?>"  readonly="true">												
											</div>													
											<div class="col-sm-4" align="center">	
												<label>O Prestador foi experiente</label>
												<input type="text" class="form-control" value="<?php echo $rows_Avaliacoes['Q9'] ?>"  readonly="true">											
											</div>
											<div class="col-sm-4" align="center">	
												<label>O Prestador foi paciente:</label>
												<input type="text" class="form-control" value="<?php echo $rows_Avaliacoes['Q10'] ?>"  readonly="true">											
											</div>
										</div>
										<br />
										<div class="row">							
											<div class="col-sm-6" align="center">	
												<label>O Prestador foi simpático:</label>
												<input type="text" class="form-control" value="<?php echo $rows_Avaliacoes['Q11'] ?>"  readonly="true">											
											</div>
											<div class="col-sm-6" align="center">	
												<label>O Prestador foi responsável</label>
												<input type="text" class="form-control" value="<?php echo $rows_Avaliacoes['Q12'] ?>"  readonly="true">											
											</div>
										<br />										
										<div class="col-sm-6" >	
											<label>Pontos a melhorar:</label>
											<input type="text" class="form-control" value="<?php echo $rows_Avaliacoes['Q13']?>" />
										</div>
										<div class="col-sm-6">
											<label>Nota final de atendimento</label>
											<input type="text" class="form-control" value="<?php echo $rows_Avaliacoes['Q13']; ?>" />																																																															
										</div>
									</div>
										<br />
										<input type="button" onclick="cont();" value="Imprimir">												
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
						<?php } ?>
						</tbody>
					 </table>
 					 <a href="javascript:history.back()" class="btn btn-primary">Voltar</a> 
				</div>
			</div>		
		</div>		
 	 </body>
</html>
