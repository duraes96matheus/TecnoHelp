<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<?php 
		session_start();
		$servername = "localhost";
		$username = "SistemaTH";
		$password = "14042015";
		$dbname = "SistemaTH";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
				
			if((!isset ($_SESSION['Username']) == true) and (!isset ($_SESSION['senha']) == true))
				{
				  unset($_SESSION['Username']);
				  unset($_SESSION['senha']);
				  header('location:Index.php');
				}
		$logado = $_SESSION['Username'];
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
			$id = $_GET['id'];
			if (empty($id)) {				
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '3;HistoricoAtivo.php'>
					<script>
						swal({
					  title: 'Selecione a avaliação à ser avaliada!',
					  icon:'error',
					  button: 'OK!',
					})
				</script> 
			  ";	
			}
			$result_Solicitacoes = "select * from Solicitacoes where ID_Solicitacao = '$id'";
			$resultadado_Solicitacoes = @mysqli_query($conn, $result_Solicitacoes);
			$rows_Solicitacoes = @mysqli_fetch_assoc($resultadado_Solicitacoes);
		mysqli_close($conn);		
		?>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Formulario de Avaliação</title>
		<meta name="description" content="">
		<meta name="author" content="Matheus">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">		
		<link rel="shortcut icon" href="IMG/network.png">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link href="CSS/bootstrap.min.css"  rel="stylesheet" type="text/css"/>
		<script src="JS/jquery-3.3.1.slim.min.js" type="text/javascript"></script>		
		<script src="JS/jquery.mask.min.js" type="text/javascript"></script>
		<script src="JS/jquery.validate.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap-notify.min.js" type="text/javascript"></script>
		<script src="JS/function.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="CSS/StyleSolicitacao.css" />
		<style type="text/css">
			body{
				background: url(IMG/Exclusao.jpg) 
			}
			label{
				color: #FFD700;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 15px;		
			}
		</style>		
	</head>
		<body style="margin-left: 20px; margin-right: 20px; margin-top: 20px;">												
			<form id="formulario" enctype="multipart/form-data" action="PHP/Avaliar.php" method="post">
			<fieldset>
				<div class="row ">
					<div class="col-sm-12">
						<label>Nome do Prestador</label>
						<input type="text" class="form-control" readonly="true"  value="<?php echo $rows_Solicitacoes['NM_Prestador'];?>"  />
					</div>
					<div class="col-sm-6">
						<label>Código da Solicitação</label>
						<input type="text" class="form-control" readonly="true" name="ID_Solicitacao" value="<?php echo $rows_Solicitacoes['ID_Solicitacao'];?>"  />
					</div>	
					<div class="col-sm-6">
						<label>Código do Prestador</label>
						<input type="text" class="form-control" readonly="true" name="ID_Prestador" value="<?php echo $rows_Solicitacoes['CD_Prestador'];?>"  />
					</div>
					<div style="display: none">
						<label>Código do Solicitante</label>
						<input type="text" class="form-control" readonly="true"  name="NM_Prestador" value="<?php echo $rows_Solicitacoes['User_Prestador'];?>"  />
					</div>
					<div style="display: none">
						<label>Código do Solicitante</label>
						<input type="text" class="form-control" readonly="true"  name="ID_Solicitante" value="<?php echo $rows_Solicitacoes['ID_Solicitante'];?>"  />
					</div>								
				</div>
				<br />
			<input type="button" name="next" class="next acao" value ="Confirmar"/>
			</fieldset>
			<fieldset>
				<div class="form-group">					
				<label>Solução do problema</label>
					<select class="form-control" name="A">
						<option value="Muito Satisfeito">Muito satisfeito</option>
						<option value="Satisfeito">Satisfeito</option>
						<option value="Nem satisfeito, nem insatisfeito">Nem satisfeito, nem insatisfeito</option>
						<option value="Insatisfeito">Insatisfeito</option>
						<option value="Muito insatisfeito">Muito insatisfeito</option>
					</select>
				</div>						
				<div class="form-group" >	
				<label>Prontidão de atendimento do telefone</label>
					<select class="form-control" name="B">
						<option value="Muito Satisfeito">Muito satisfeito</option>
						<option value="Satisfeito">Satisfeito</option>
						<option value="Nem satisfeito, nem insatisfeito">Nem satisfeito, nem insatisfeito</option>
						<option value="Insatisfeito">Insatisfeito</option>
						<option value="Muito insatisfeito">Muito insatisfeito</option>
					</select>
				</div>
				<div class="form-group">	
				<label>Profissionalismo do Prestador</label>
					<select class="form-control" name="C">
						<option value="Muito Satisfeito">Muito satisfeito</option>
						<option value="Satisfeito">Satisfeito</option>
						<option value="Nem satisfeito, nem insatisfeito">Nem satisfeito, nem insatisfeito</option>
						<option value="Insatisfeito">Insatisfeito</option>
						<option value="Muito insatisfeito">Muito insatisfeito</option>
					</select>
				</div>
				<div class="form-group">	
				<label>Assistência do Prestador</label>
					<select class="form-control" name="D">
						<option value="Muito Satisfeito">Muito satisfeito</option>
						<option value="Satisfeito">Satisfeito</option>
						<option value="Nem satisfeito, nem insatisfeito">Nem satisfeito, nem insatisfeito</option>
						<option value="Insatisfeito">Insatisfeito</option>
						<option value="Muito insatisfeito">Muito insatisfeito</option>
					</select>
				<div class="form-group">
				</div>	
				<label>Facilidade de contatar</label>
					<select class="form-control" name="E">
						<option value="Muito Satisfeito">Muito satisfeito</option>
						<option value="Satisfeito">Satisfeito</option>
						<option value="Nem satisfeito, nem insatisfeito">Nem satisfeito, nem insatisfeito</option>
						<option value="Insatisfeito">Insatisfeito</option>
						<option value="Muito insatisfeito">Muito insatisfeito</option>
					</select>
				</div>
				<div class="form-group">	
				<label>Prontidão de resposta do e-mail</label>
					<select class="form-control" name="F">
						<option value="Muito Satisfeito">Muito satisfeito</option>
						<option value="Satisfeito">Satisfeito</option>
						<option value="Nem satisfeito, nem insatisfeito">Nem satisfeito, nem insatisfeito</option>
						<option value="Insatisfeito">Insatisfeito</option>
						<option value="Muito insatisfeito">Muito insatisfeito</option>
					</select>
				</div>
				<div class="form-group">
					<label>Por favor, avalie sua satisfação geral com o Prestador:</label>
						<label class="form-control"  style="width: 550px;">							
						 <label  style="color: #000000;"><input type="radio" name="G"  value="Muito Satisfeito" name="G">Muito Satisfeito</label>
						 <label style="color: #000000;"><input type="radio" name="G" value="Satisfeito" name="G">Satisfeito</label>
						 <label style="color: #000000;"><input type="radio" name="G"  value="Razoavel" name="G">Razoavel</label>
						 <label style="color: #000000;"><input type="radio" name="G" value="Insatisfeito" name="G">Insatisfeito</label>
						 <label style="color: #000000;"><input type="radio" name="G"  value="Muito Insatisfeito" name="G">Muito Insatisfeito</label>
					 </label>
				</div>		
				<input type="button" name="prev" class="prev acao" value ="anterior"/>
				<input type="button" name="next" class="next acao" value ="proximo"/>
			</fieldset>	
			<fieldset>	
				<div class="form-group">					
					<label>Recomendaria o prestador</label>
						<label class="form-control">
						<label style="color: #000000;"><input type="radio" name="H" value="Sim" name="H">Sim</label>
						 <label style="color: #000000;"><input type="radio" name="H" value="Não" name="H">Não</label>
					 </label>
				</div>													
				<div class="form-group">		
					<label>O Prestador foi experiente</label>
					<select class="form-control" name="I">
						<option value="Concordo completamente"> Concordo completamente</option>
						<option value="Concordo parcialmente"> Concordo parcialmente</option>
						<option value="Não concordo nem discordo"> Não concordo nem discordo</option>
						<option value="Discordo parcialmente<"> Discordo parcialmente</option>
						<option value="Discordo completamente"> Discordo completamente</option>
					</select>
				</div>
				<div class="form-group">	
					<label>O Prestador foi paciente</label>
					<select class="form-control" name="J">
						<option value="Concordo completamente"> Concordo completamente</option>
						<option value="Concordo parcialmente"> Concordo parcialmente</option>
						<option value="Não concordo nem discordo"> Não concordo nem discordo</option>
						<option value="Discordo parcialmente<"> Discordo parcialmente</option>
						<option value="Discordo completamente"> Discordo completamente</option>
					</select>
				</div>							
				<div class="form-group">	
				<label>O Prestador foi simpático</label>
					<select class="form-control" name="K">
						<option value="Concordo completamente"> Concordo completamente</option>
						<option value="Concordo parcialmente"> Concordo parcialmente</option>
						<option value="Não concordo nem discordo"> Não concordo nem discordo</option>
						<option value="Discordo parcialmente<"> Discordo parcialmente</option>
						<option value="Discordo completamente"> Discordo completamente</option>
					</select>
				</div>
				<div class="form-group">	
				<label>O Prestador foi responsável</label>
					<select class="form-control" name="L">
						<option value="Concordo completamente"> Concordo completamente</option>
						<option value="Concordo parcialmente"> Concordo parcialmente</option>
						<option value="Não concordo nem discordo"> Não concordo nem discordo</option>
						<option value="Discordo parcialmente<"> Discordo parcialmente</option>
						<option value="Discordo completamente"> Discordo completamente</option>
					</select>
				</div>
				<div class="form-group">	 
					<label>Pontos a melhorar:</label>
					<textarea class="form-control" rows="3" name="M"> 						
					</textarea>
				</div>
				<div class="form-group row">
					<label for="example-number-input" class="col-6 col-form-label">Nota Final de Atendimento</label>
				<div class="col-6">
					<input class="form-control" type="number" max="10" min="0" name="N">
				</div>	
				<br />							
				<div class="form-group" align="center">				
				<br /><br />								
				<input type="button" name="prev" class="prev acao" value ="anterior"/> 
				<button  type="submit">Avaliar</button>				
			</fieldset>
			<br />			
			</form>			
		</body>		
	</div>
</html>
