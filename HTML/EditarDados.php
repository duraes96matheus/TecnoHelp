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
		{
		$logado = $_SESSION['Username'];						
		$sqlconsulta =  "select * from TB_Usuario where Username = '$logado';";					
		$dados = $mysql->sqlquery($sqlconsulta,'PagePrestador.php');
		$Direcionamento= $dados['type'];
		}
		?>
		<title>TecnoHelp - A tecnologia criando soluções</title>
		<meta charset="utf-8">		
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<meta name="description" content="">
		<meta name="author" content="Matheus">
		<link rel="shortcut icon" href="IMG/network.png">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">	
		<link href="CSS/bootstrap.min.css"  rel="stylesheet" type="text/css"/>
		<script src="JS/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
		<script src="JS/jquery.mask.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap-notify.min.js" type="text/javascript"></script>	
		<script src="JS/Validacoes.js" type="text/javascript"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
		<script src="JS/jquery.mask.min.js" type="text/javascript"></script>
		<script src="JS/jquery.validate.min.js" type="text/javascript"></script>		
		<script src="JS/bootstrap.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap-notify.min.js" type="text/javascript"></script>
		<script src="JS/jquery.correios.js" type="text/javascript"></script>		
        <script src="JS/BuscaCep.js" type="text/javascript"></script>
        <script src="JS/Validacoes.js" type="text/javascript"></script>	
		<script>
			$(document).ready(function(){
  	$('#CPF').mask('000.000.000-00');
});
		$(document).ready(function(){
  	$('#Tel_1').mask('(00)0000-0000');
});
		$(document).ready(function(){
  	$('#Tel_2').mask('(00)00000-0000');
});
		$(document).ready(function(){
  	$('#CEP').mask('00000-000');
});
	$(document).ready(function(){
  	$('#DT_Nascimento').mask('00/00/0000');
});
	$(document).ready(function(){
  	$('#DT_Conclusao').mask('0000');
});
		</script>
		<style>
			body{
				background: url(IMG/Exclusao.jpg)
			
			}
			label{
				color: #00FFFF;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 15px;		
			}
		</style>
		</head>
	<div id="all" style="margin-left: 50px; margin-right: 50px; margin-top: 10px;"  align="center">
		<body>			
			<table  class="table table-dark" style="width: 400px;">
				<form name="FrmAtualizacao"  method="post" method="get" action="PHP/Atualizacao.php"  name="atualizacao">
					<br />
					<div class="row">
						<div class="col-sm-3">
						<label>Imagem de Perfil:</label>
							<input type="file" name="IMG_Usuario" class="form-control" />
						</div>
						<div class="col-sm-5">
						<label>Nome Completo: </label> 
							<input type="text" name="NM_Usuario"  value="<?php echo $dados['name']; ?>"   maxlength="255" class="form-control"   readonly="true" >
						</div>
						<div class="col-sm-2">
							<label>Data de Nascimento:</label>
							<input type="text" name="DT_Nascimento" id="DT_Nascimento" value="<?php echo $dados['DT_Nascimento']; ?>"  placeholder="Data de Nascimento"  class="form-control" required readonly="true" >
						</div>										
						<div class="col-sm-2">
							<label>Sexo: </label>
							<input type="text" name="DT_Nascimento" id="Sexo"   value="<?php echo $dados['SEXO']; ?>"  placeholder="Data de Nascimento"  class="form-control" required readonly="true" >
						</div>
					</div>
					<br />
					<div class="row">
						<div class="col-sm-2">
							<label>CPF: </label>		
							<input type="text" name="CPF" id="CPF" placeholder="CPF" value="<?php echo $dados['CPF']; ?>" class="form-control" required minlength="14" readonly="true">
						</div>
											
						<div class="col-sm-4">
							<label>Email: </label>
							<input type="email" maxlength='155' name="DS_Email" id="DS_Email" maxlength="100" value="<?php echo $dados['DS_Email']; ?>" placeholder="Email" class="form-control"required>
						</div>					
						<div class="col-sm-3">
							<label>Telefone 1: </label>
							<input type="text" name="Tel_1" maxlength="20" id="Tel_1" placeholder="Telefone Fixo"  value="<?php echo $dados['TEL1']; ?>"class="form-control" required minlength="12">
						</div>
						<div class="col-sm-3">
							<label>Telefone 2: </label>
							<input type="text"  name="Tel_2" maxlength="20" id="Tel_2" value="<?php echo $dados['TEL2']; ?>" placeholder="Telefone Celular"class="form-control" required minlength="12"> 
						</div>
					</div>
					<br />
					<div class="row">
						<div class="col-sm-2">
							<label>CEP: </label>
							<input type="text" maxlength="20" name="CEP" id="CEP" placeholder="CEP" value="<?php echo $dados['CEP']; ?>" class="form-control" required>
						</div>						
						<div class="col-sm-3">
							<label>Endereco: </label>
							<input type="text" maxlength='100' name="DS_Endereco" value="<?php echo $dados['address']; ?>" placeholder="Endereço" id="DS_Endereco" class="form-control" readonly="true">
						</div>
						<div class="col-sm-2">
							<label>Cidade: </label>							
							<input type="text" maxlength="255" value="<?php echo $dados['DS_Cidade']; ?>" name="DS_Cidade" id="DS_Cidade" placeholder="Cidade" class="form-control" readonly="true">
						</div>
						<div class="col-sm-3">
							<label>Bairro: </label>
							<input type="text" maxlength='100' name="DS_Bairro" id="DS_Bairro" value="<?php echo $dados['DS_Bairro']; ?>"placeholder="Bairro"class="form-control" >
						</div>	
						<div class="col-sm-2">
							<label>Numero  </label>
							<input type="text" maxlength='100' name="complemento" id="Complemento" placeholder="Número/Complemento" value="<?php echo $dados['Complemento']; ?>" class="form-control" >
						</div>
					</div>
					<br />
					<div class="row">															
						<?php if ($Direcionamento == 'Prestador') { ?>		
						<div id="DadosPrestador" class="col-sm-3">								
							<label>Prestador para a área da:</label>
							<select name="DS_Area" id="DS_Area" class="form-control">
								<option><?php echo $dados['DS_Area']; ?></option>
								<option>Informatica</option>
								<option>Eletrônica</option>
								<option>Ambas</option>
							</select>
						</div>
						<div class="col-sm-4">	
							<label>Formação Acadêmica:</label>						
								<select name="DS_Formacao" id=""class="form-control">
									<option><?php echo $dados['DS_Formacao']; ?></option>
									<option value="Tecnico">Técnico</option>
									<option value="Bacharelado">Bacharelado</option>
									<option value="Especialização">Especialização</option>
									<option value="Mestrado">Mestrado</option>
									<option value="Doutorado">Doutorado</option>
									<option value="Outros">Outros</option>											
								</select>
							</div>
							<div class="col-sm-3">	
								<label>Curso:</label>
								<input type="text" name="Curso"  id="Curso" placeholder="Curso" class="form-control" value="<?php echo $dados['Curso']; ?>"required/>
							</div>
							<div class="col-sm-2">	
								<label>Status: </label>							
									<select name="Status"class="form-control"    >
										<option><?php echo $dados['Status']; ?></option>
										<option value="Concluído">Concuído</option>
										<option value="Cursando">Cursando</option>
										<option value="Interrompido">Interrompido</option>
										<option value="Outros">Outros</option>
								</select>
							</div>
						</div>
						<br />
						<div class="row">	
							<div class="col-sm-2">	
								<label>Instituição de ensino</label>
								<input type="text" maxlength="100" name="DS_Instituicao" value="<?php echo $dados['DS_Insitiuicao']; ?>" id="DS_Instituicao" placeholder="Etec Zona Leste" class="form-control"/>
							</div>
							<div class="col-sm-3">	
								<label>Ano de Conclusão</label>
								<input type="text" name="DT_Conclusao" id="DT_Conclusao"  value="<?php echo $dados['DT_Conclusao']; ?>"class="form-control"/>
							</div>									
							<div class="col-sm-4">	
								<label>Envio de Certificados,Diplomas e outros</label>										
								<input type="file" name="Certificados" class="form-control" placeholder="Certificados"  id="Certificados"value="<?php echo $dados['Certificados']; ?>"/>
							</div>
							<div class="col-sm-3">	
								<label>Disponibilidade para atender fora:</label>
								<select name="Disponibilidade" class="form-control">
									<option><?php echo $dados['Disponibilidade']; ?></option>
									<option value="Possuo">Possuo</option>
									<option value="Não Possuo">Não Possuo</option>
								</select>
							</div>
						</div>
						<br />
						<div class="row">								
							<div class="col-sm-4">	
								<label>Observações:</label>
								<input type="text" maxlength="200" name="OBS" value="<?php echo $dados['OBS']; ?>" class="form-control"/>
							</div>								
							<br />
						<?php } ?>						
							<div class="col-sm-4">
								<label>Username</label>
								<input type="text" 	value="<?php echo $dados['Username']; ?>" maxlength="20" name="Username"  class="form-control" />
							</div>
							<div class="col-sm-4">
								<label>Senha</label>
								<button class="btn-outline-success" type="button" onclick="mostrarSenha()">Exibir</button>
								<input type="password" maxlength="20" id="Senha" name="Password" value="<?php echo $dados['Senha']; ?>" class="form-control"/>
								<script>
									function mostrarSenha(){
										var tipo = document.getElementById("Senha");
										if(tipo.type == "password"){
											tipo.type = "text";
										}else{
											tipo.type = "password";
										}
									}
								</script>
							</div>									
						</div>
					</div>
					<br /><br />
					 <button class="btn btn-success" type="submit" onclick="Atualizar()">Salvar</button>
					 <a href="javascript:history.back()" class="btn btn-primary">Voltar</a>							
				</form>					  		
			</table>								
			</body>
		</div>
</html>
