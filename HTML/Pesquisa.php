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
	$result_prestadores = "SELECT * FROM TB_Usuario where type='Prestador'";//pesquisa de prestadores
	$resultadado_prestadores = mysqli_query($conn, $result_prestadores);
	
	mysqli_close($conn);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Pesquisa de Prestadores</title>
		<meta charset="utf-8">
		<meta name="author" content="Matheus">
		<script src="JS/jquery.min.js" type="text/javascript"></script>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">		
		<link rel="shortcut icon" href="IMG/network.png">			
		<link href="CSS/bootstrap.min.css"  rel="stylesheet" type="text/css"/>
		<script src="JS/jquery-3.3.1.js" type="text/javascript" ></script>
		<script src="JS/bootstrap.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap-notify.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="CSS/jquery.dataTables.min.css">
		<script src="JS/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" href="CSS/bootstrap.min.css" type="text/css" />
		<link rel="stylesheet" type="text/css" href="CSS/StylePages.css"/>
		<script type="text/javascript" src="JS/StylePages.js"></script>
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
		<style type="text/css">
			body{
			  background-image: url(IMG/)
			}
		</style>
				
	</head>
	<div id="all" align="center" style="margin-left: 20px; margin-right: 20px; margin-top: 20px;" >
		<body>
			<table class="table table-bordred table-striped" id="listar-usuario" class="display" style="width:100%">
				<thead class="">
						<tr>
						<th >Nome</th>
						<th >Area</th>
						<th >Graducação</th>
						<th >Curso</th>
						<th >Localização</th>
						<th >Perfil Completo</th>		
					</tr>
				</thead>
				<tbody>
					<?php while($rows_Prestadores = mysqli_fetch_assoc($resultadado_prestadores)){ ?>
						<tr>
							<td align="center"><?php echo $rows_Prestadores['name']; ?></td>
							<td align="center"><?php echo $rows_Prestadores['DS_Area']; ?></td>
							<td align="center"><?php echo $rows_Prestadores['DS_Formacao']; ?></td>
							<td align="center"><?php echo $rows_Prestadores['Curso']; ?></td>
							<td align="center"><?php echo $rows_Prestadores['DS_Bairro']; ?></td>
							<td align="center">
								<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_Prestadores['ID_Usuario']; ?>">visualizar</button>
	                           	<a target="_blank" href="ExibicaodePerfis.php?id=<?php echo $rows_Prestadores['ID_Usuario']; ?>"><button type="button" class="btn btn-xs btn-success">Abrir</button></a>
	                        </td>
						</tr>
						<div class="modal fade" id="myModal<?php echo $rows_Prestadores['ID_Usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog modal-lg " role="document">
							<div class="modal-content">
								<div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLongTitle" align="center">Prestador: <?php echo $rows_Prestadores['name']; ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<style>															
									</style>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-sm-6">
											<label>Graduação</label>
											<input type="text" class="form-control" value="<?php echo $rows_Prestadores['DS_Formacao'];?>" />
										</div>
										<div class="col-sm-6">
											<label>Curso</label>
											<input type="text" class="form-control" value="<?php echo $rows_Prestadores['Curso'];?>" />
										</div>
										<div class="col-sm-6">
											<label>Instituição</label>
											<input type="text" class="form-control" value="<?php echo $rows_Prestadores['DS_Insitiuicao'];?>" />
										</div>
										<div class="col-sm-6">
											<label>Status</label>
											<input type="text" class="form-control" value="<?php echo $rows_Prestadores['Status'];?>" />
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<label>Endereço</label>
											<input type="text" class="form-control" value="<?php echo $rows_Prestadores['address'];?>" />
										</div>
										<div class="col-sm-6">
											<label>Bairro</label>
											<input type="text" class="form-control" value="<?php echo $rows_Prestadores['DS_Bairro'];?>" />
										</div>
										<div class="col-sm-6">
											<label>Disponibilidade para atender fora</label>
											<input type="text" class="form-control" value="<?php echo $rows_Prestadores['Disponibilidade'];?>" />
										</div>
										<div class="col-sm-6">
											<label>Observações</label>
											<input type="text" class="form-control" value="<?php echo $rows_Prestadores['OBS'];?>" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</tbody>
				<tfoot>
			        <tr>
				     <th >Nome</th>
					 <th >Area</th>
					 <th >Localização</th>
					 <th >Curso</th>
					 <th >Status</th>
					 <th >Perfil Completo</th>	 
			        </tr>
		       </tfoot>	
	    	</table>
		</body>	
		<a href="javascript:history.back()" class="btn btn-primary">Voltar</a>
	</div>
	<div id="particles"></div>
		<svg id="svg-source" height="0" version="1.1" 
		  xmlns="http://www.w3.org/2000/svg" style="position:absolute; margin-left: -100%" 
		  xmlns:xlink="http://www.w3.org/1999/xlink">
</html>
