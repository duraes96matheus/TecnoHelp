<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php 
		session_start();
		include_once ('PHP\Conexao.php');
		$mysql = new Banco();
		$mysql->conecta();	
		
		if((!isset ($_SESSION['Username']) == true) and (!isset ($_SESSION['senha']) == true))
		{
		  unset($_SESSION['Username']);
		  unset($_SESSION['senha']);
		  header('location:Index.php');
		}
		 
		$logado = $_SESSION['Username'];						
		$sqlconsulta =  "select * from TB_Usuario where Username = '$logado';";					
		$dados = $mysql->sqlquery($sqlconsulta,'PagePrestador.php');
		?>
		<meta charset="utf-8">
		<title>Exclusao</title>
		<meta name="description" content="">
		<meta name="author" content="Matheus">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<link rel="shortcut icon" href="IMG/network.png">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link href="CSS/bootstrap.min.css"  rel="stylesheet" type="text/css"/>
		<script src="JS/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
		<script src="JS/jquery.mask.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap-notify.min.js" type="text/javascript"></script>	
		<script src="JS/Validacoes.js" type="text/javascript"></script>
		<script type="text/javascript">				
		</script>
		<style>
			body{
				background: url(IMG/Exclusao.jpg) ;
			}
			label{
				color: #00FFFF;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 20px;		
			}
		</style>		
	</head>
	<body>
		<div id="all" align="center">
			<form action="PHP/DeleteUsers.php">
				<table>
					<td width="400" align="center">
						<br /><br />
						<br /><br />
						<br /><br />
						<div class="grid">										
							<h3 style="color: #00FFFF;">Aonde podemos melhorar?</h3>
								<textarea class="form-control" name="motivo" rows="3">						
								</textarea>
							<a href="PHP\DeleteUsers.php" onclick="return confirm('Deseja prosseguir?')">Excluir Perfil</a>
							<a href="javascript:history.back()" class="btn btn-primary">Voltar</a> 	
						</div>
					</td>
				</table>
			</form>									
		</div>				
	</body>
</html>
