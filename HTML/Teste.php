<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php 
		
		?>
		<meta charset="utf-8">
		<title>Exclusao</title>
		<meta name="description" content="">
		<meta name="author" content="Matheus">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link href="CSS/bootstrap.min.css"  rel="stylesheet" type="text/css"/>
		<script src="JS/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
		<script src="JS/jquery.mask.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap-notify.min.js" type="text/javascript"></script>	
		<script src="JS/Validacoes.js" type="text/javascript"></script>
		<script>
		function ConfirmarAlteracao(){		
			if (confirm ("Deseja realmente alterar os dados da Empresa?"))		
			return true;	
			else		
			return false;}	
		</script>		
	</head>
	<body>
		<div id="all" align="center">
			<table width="400px;">
				<form action="PHP/TESTE.php">
					<td>
						<div class="form-group">
							<h2 align="center">Motivo da Exclusão?</h2>
							<textarea class="form-control" rows="05" name="motivo">								
							</textarea>
						</div>
						<div align="center">
						<a href="exclui.php?cod_registro=100" onclick="return confirm('Confirma exclusão do registro XPTO?')">Exclui registro</a>
						 <button class="btn btn-success" type="submit" onclick="confirmExclusao();">Confirmar</button>
						 <a href="javascript:history.back()" class="btn btn-primary">Voltar</a> 					
						</div>
					</td>
				</form>
			</table>
		</div>
	</body>
</html>
