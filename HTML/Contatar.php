<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<title>Contatar</title>
		<meta name="description" content="">
		<meta name="author" content="Matheus">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<link rel="shortcut icon" href="IMG/network.png">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link href="CSS/bootstrap.min.css"  rel="stylesheet" type="text/css"/>
		<script src="JS/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
		<script src="JS/jquery.mask.min.js" type="text/javascript"></script>
		<script src="JS/jquery.validate.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap-notify.min.js" type="text/javascript"></script>		
		<script type="text/javascript">
			$(document).ready(function(){
  	$('#Tel').mask('(00)0000-00000');
});
	</script>
	<style>
		body{
			background: url(IMG/cidade.jpg) no-repeat center center;
			-webkit-background-size: 100% 100%;
			-moz-background-size: 100% 100%;
			-o-background-size: 100% 100%;
			background-size: 100% 100%;
		}
		label{
			color: #00FFFF;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 20px;	
		}
	</style>
	</head>
		<div id="all"align="center">
			<body style="margin-top: 70px;">		
				<table class="table" style="width: 600px">					
						<form method="post" action="PHP/Contatar.php" name="FrmContato">
						<td>					
							<div class="form-group">
								<label> Tipo de contato:</label>			
									<select class="form-control" id="Tipo" name="Tipo">
										<option value="Elogios">Elogios</option>
										<option value="Duvidas"> Duvidas</option>
										<option value="Criticas">Criticas</option>
										<option value="Sugestoes"> Sugestões</option>
										<option value="Outros">Outros Asuntos</option>
									</select>
								</div>	
								<div class="form-group">
									<label>Nome</label>
									<input  id="nome" name="Nome" type="text" maxlength="120" class="form-control" required minlength="5"/>							
								</div>								
								<div class="form-group">
									<label>Email</label>
									<input id="email" name="Email" type="email" maxlength="50" class="form-control" required="" />						
								</div>										
								<div class="form-group">
									<label> Telefone</label>
									<input type="tel" name="Tel" id="Tel" maxlength="20"class="form-control" required minlength="12" />							
								</div>									
								<div class="form-group">
									<label> Grau de urgência </label>
									<input type="number"  min="1" max="10"  name="GU" class="form-control"> 									
								</div>									
								<div class="form-group">
									<label> Mensagem</label>											
									<textarea class="form-control" rows="3" name="MSG" id="MSG" required minlength="20" >							
									</textarea>
								</div>
								<div align="center">		
									<button class="btn btn-success" type="submit">Enviar</button>
									<input class="btn btn-danger" type="reset" value="Limpar">
						 			<a href="javascript:history.back()" class="btn btn-primary">Voltar</a> 					
								</div>
								</td>								
							</form>						
					</table>			
				<footer>
					<p>
						&copy; Copyright  by Matheus
					</p>
				</footer>
		</body>	
	</div>
</html>
