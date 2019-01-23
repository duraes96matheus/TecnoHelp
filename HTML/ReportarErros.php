<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Reportar Erros</title>
		<meta name="description" content="">
		<meta name="author" content="Matheus">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">		
		<link rel="shortcut icon" href="IMG/network.png">			
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link href="CSS/bootstrap.min.css"  rel="stylesheet" type="text/css"/>
		<script src="JS/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
		<script src="JS/jquery.mask.min.js" type="text/javascript"></script>
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
	<body>
		<div id="all" align="center">
		<body style="margin-top: 20px;">		
				<table class="table" style="width: 600px">
						<form method="post" action="PHP/Reportacao.php" name="FrmContato" >
							<td>					
								<div class="form-group">
									<label>Tipo</label>			
										<select class="form-control" id="Tipo" name="Tipo">
											<option value="Problemas com cadastro">Problemas com cadastro</option>
											<option value="Problemas ao solicitar">Problemas ao solicitar</option>
											<option value="Problemas com login">Problemas com o login</option>
											<option value="Problemas ao me cadastrar">Problemas ao me cadastrar</option>
											<option value="Outros">Outros</option>
										</select>
								</div>	
								<div class="form-group">
									<label>Nome</label>
									<input  id="nome" type="text" maxlength="120" class="form-control" name="nome" required/>							
								</div>								
								<div class="form-group">
									<label>Email</label>
									<input id="email" type="text" maxlength="155" class="form-control" name="email"required/>						
								</div>										
								<div class="form-group">
									<label> Telefone</label>
									<input type="text" name="Tel" id="Tel" maxlength="20"class="form-control" name="Tel" required=""/>							
								</div>									
								<div class="form-group">
									<label> Grau de urgência </label>
									<input type="number"  min="1" max="10"  name="GU" class="form-control"> 
								</div>
								<div class="form-group">
									<label>Envio de Arquivos</label>
									<input type="file" class="form-control" placeholder="Envie somente o necessário" name="Arquivos" id="Arquivos" size="60"/>
								</div>												
								<div class="form-group">
									<label> Mensagem</label>											
									<textarea class="form-control"  rows="3" name="MSG" id="MSG" >
									</textarea>
								</div>										
									<button type="submit" class="btn btn-success">Enviar</button>
									<button type="reset" class="btn btn-danger">Limpar</button>
						 			<a href="javascript:history.back()" class="btn btn-primary">Voltar</a> 					
								</td>
							</form>		
					</table>			
			</body>
	</div>
</html>
