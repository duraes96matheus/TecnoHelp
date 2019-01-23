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
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Formulario de Solicitação</title>
		<meta name="description" content="">
		<meta name="author" content="Matheus">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">		
		<link rel="shortcut icon" href="IMG/network.png">			
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link href="CSS/bootstrap.min.css"  rel="stylesheet" type="text/css"/>
		<script src="JS/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
		<script src="JS/jquery.mask.min.js" type="text/javascript"></script>
		<script src="JS/jquery.validate.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap-notify.min.js" type="text/javascript"></script>
		<script src="JS/function.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="CSS/StyleSolicitacao.css" />
		<script src="JS/jquery.correios.js" type="text/javascript"></script>		
        <script src="JS/BuscaCep.js" type="text/javascript"></script>
        <script src="JS/Validacoes.js" type="text/javascript"></script>	
		<script>				
		$(document).ready(function(){
  	$('#DT_Agendamento').mask('00/00 às 00:00');
});	
		$(document).ready(function(){
  	$('#Tel_1').mask('(00)0000-0000');
});	
		$(document).ready(function(){
  	$('#Tel_2').mask('(00)0000-00000');
});	
			$(document).ready(function(){
  	$('#CEP').mask('00000-000');
});	
	$(document).ready(function(){
  	$('#Agendamento').mask('00/00/0000 às 00:00');
});	
		</script>
		<style type="text/css">
			body{
				background: url(IMG/Exclusao.jpg);
				
			}
			label{
				color:#FFD700;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 15px;		
			}
		</style>		
	</head>
		<body style="margin-left: 20px; margin-right: 20px; margin-top: 20px;">												
			<form id="formulario" enctype="multipart/form-data" action="PHP/NovaSolicitacao.php" method="post">
				<ul id="progress">
				</ul>
			<fieldset>
			<div class="row">
				<div style="display: none">
					<input type="text" name="ID_solicitante" value="<?php echo $dados['ID_Usuario'];?>" />
				</div>
				<div style="display: none">
					<input type="text" name="Responsavel" value="<?php echo $dados['name'];?>" />
				</div>
				<div style="display: none">
					<input name="Username"  value="<?php echo $dados['Username'];?>" />
				</div>
				<div class="col-sm-12">								
					<label>Nome do Solicitante:</label>
					<input type="text"  id="nome" value="<?php echo $dados['name']; ?>"  name ="Nome"class="form-control" >
				</div>										
				<div class="col-sm-12">								
					<label>Email:</label>
					<input type="text"  name="DS_Email"  value="<?php echo $dados['DS_Email']; ?>"  class="form-control"  >
				</div>
				<div class="col-sm-6">								
					<label>Telefone Fixo:</label>
					<input type="text"  name="Tel_1" id="Tel_1" value="<?php echo $dados['TEL1']; ?>"   class="form-control"  >
				</div>
				<div class="col-sm-6">								
					<label>Telefone Celular:</label>
					<input type="text"  name="Tel_2" id="Tel_2" class="form-control"value="<?php echo $dados['TEL2']; ?>"   >
				</div>						
				<div class="col-sm-6">								
					<label>CEP: </label>
					<input type="text" maxlength="20" name="CEP" id="CEP" placeholder="CEP" class="form-control" value="<?php echo $dados['CEP']; ?>"required>
				</div>
				<div class="col-sm-6">								
					<label>Numero e Complemento </label>
					<input type="text" maxlength='100' name="Complemento" id="Complemento" placeholder="Numero " class="form-control" value="<?php echo $dados['Complemento']; ?>" >
				</div>
				<div class="col-sm-12">								
					<label>Endereco: </label>
					<input type="text" maxlength='100' name="DS_Endereco" placeholder="Endereço" id="DS_Endereco" class="form-control" value="<?php echo $dados['address']; ?>"readonly="true">
				</div>				
				<div class="col-sm-12">								
					<label>Bairro </label>
					<input type="text" maxlength='100' name="DS_Bairro" id="DS_Bairro" class="form-control" value="<?php echo $dados['DS_Bairro']; ?>" >
				</div>
			</div>
			<br />
			<input type="button" name="next" class="next acao" value ="proximo"/>
			</fieldset>
			<fieldset>
			<div class="row">
				<div class="col-sm-12">								
					<label>Categoria</label>	
					<select class="form-control" name="Categoria" >
						<option value="ASSISTÊNCIA TÉCNICA EM CASA ">ASSISTÊNCIA TÉCNICA EM CASA</option>
						<option value="DIAGNÓSTICO/ORÇAMENTO">DIAGNÓSTICO/ORÇAMENTO</option>
						<option value="SERVIÇOS DE HARDWARE/SOFTWARE">SERVIÇOS DE HARDWARE/SOFTWARE</option>
						<option value="SERVIÇOS DE REDE">SERVIÇOS DE REDE</option>
						<option value="SERVIÇOS DE WINDOWS SERVER">SERVIÇOS DE WINDOWS SERVER</option>
						<option value="SERVIÇOS DE SERVIDOR LINUX">SERVIÇOS DE SERVIDOR LINUX</option>
						<option value="Outros">OUTROS</option>
					</select>
				</div>
				<div class="col-sm-12">								
					<label>Tipo de Serviço </label>
					<select class="form-control" required name="Tipo">						
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
						<option value="Compartilhamento de impressora em rede<">✔ Compartilhamento de impressora em rede</option>
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
				<div class="col-sm-12">					
					<label>Agendar para o dia  </label>
					<input type="text" class="form-control" name="Agendamento" id="Agendamento" placeholder="00/00/0000 as 00:00"/>
				</div>
				<div class="col-sm-6">	
					<label>Grau de urgência</label>
					<input type="number"  max="10" min="1" class="form-control"  value="1" name="GU">
				</div>								
				<div class="col-sm-6">					
				<label>Envio de arquivos</label>
					<input type="file" name="File" class="form-control">
				</div>	
				<div class="col-sm-12">										
				<label>Decrição do serviço</label>
					<textarea class="form-control"   rows="3"required name="Descricao"> 								
					</textarea>					
				</div>
			</div>
			<br />
			<input type="button" name="prev" class="prev acao" value ="anterior"/> 
			<input type="button" name="next" class="next acao" value ="proximo"/>
			</fieldset>
			<fieldset>
				<?php									
					$servername = "localhost";
					$username = "SistemaTH";
					$password = "14042015";
					$dbname = "SistemaTH";
					
					$conn = mysqli_connect($servername, $username, $password, $dbname);			
					$id = $_GET['id'];
					$result_prestadores = "select * from TB_Usuario where ID_Usuario = '$id'";
					$resultadado_prestadores = mysqli_query($conn, $result_prestadores);
					$rows_Prestadores = mysqli_fetch_assoc($resultadado_prestadores);
				?>
					<div style="display: none">	
						<input type="text" class="form-control" readonly="true" value="<?php echo $rows_Prestadores['Username'];?>" name="User_Prestador">
					</div>
				<div class="row">
					<div style="display: none">	
						<label>Codigo</label>
						<input type="text" class="form-control" readonly="true" value="<?php echo $rows_Prestadores['ID_Usuario'];?>" name="CodigoPrestador">
					</div>
					<div style="display: none">
						<input type="text" class="form-control" readonly="true" value="<?php echo $rows_Prestadores['Username'];?>" name="User_Prestador">
					</div>	
					<div class="col-sm-12">										
						<label>Nome do Prestador:</label>							
						<input type="text"  class="form-control" value="<?php echo $rows_Prestadores['name']; ?>"  readonly="true"  name="NMPrestador">
					</div>
					<div class="col-sm-6">										
						<label>Área</label>
						<input type="text" class="form-control"value="<?php echo $rows_Prestadores['DS_Area']; ?>"  readonly="true"  name="Area">
					</div>
					<div class="col-sm-6">										
						<label>Graduação</label>
						<input type="text" class="form-control"readonly="true"  value="<?php echo $rows_Prestadores['DS_Formacao']; ?>" name="Graduacao" >
					</div>						
					<div class="col-sm-6">										
						<label>Curso:</label>
						<input type="text" class="form-control"readonly="true" value="<?php echo $rows_Prestadores['Curso']; ?>" name="Curso" >
					</div>
					<div class="col-sm-6">										
						<label>Instituicao</label>
						<input type="text" class="form-control"readonly="true"  value="<?php echo $rows_Prestadores['DS_Insitiuicao']; ?>" name="Instituicao" >
					</div>									
					<div class="col-sm-6">										
						<label>Disponibilidade para atender fora:</label>
						<input type="text" class="form-control"readonly="true" value="<?php echo $rows_Prestadores['Disponibilidade']; ?>" >
					</div>
					<div class="col-sm-6">										
						<label>Nota Média de Atendimento:</label>
						<input type="text" name="NM_Usuario" class="form-control" 
						value="<?php $Consulta_Media="SELECT AVG(Q14) FROM avaliacao WHERE ID_Prestador = '$id' ";
		          		$resultado_Media = mysqli_query($conn,$Consulta_Media);//faço a requisição          		
						while($row = mysqli_fetch_array($resultado_Media)) {
						echo $row['AVG(Q14)'];
						}
						mysqli_close($conn); ?>" >		       							
					</div>
				</div>
				<br />
				<input type="button" name="prev" class="prev acao" value ="anterior"/> 
				<button class="btn btn-primary" type="submit">Solicitar</button>
			</fieldset>			
		</form>			
		</body>		
	</div>
</html>
