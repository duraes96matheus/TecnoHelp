<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
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
		$tipo = $dados['type'];
		if($tipo=='Administrador'){
			echo "<script>
				swal({
				  title: 'Bem Vindo $logado!',
				  icon: 'success',
				  button: 'OK!',
			});				
			</script> ";			
		}		
		elseif($tipo!='Prestador'){
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '4;URL=Index.php'>
			<script>
				swal({
				  title: 'Você não é um Prestador!',
				  icon: 'error',
				  button: 'OK!',
			});				
		</script> ";			
		}
		else {
			echo "<script>
			swal({
				  title: 'Bem vindo(a) $logado ',
				  icon: 'success',
				  button: 'OK!',
			});	
		</script>";
		}						
		?>
	<head>
		<title>TecnoHelp - A tecnologia criando soluções</title>
		<script type="text/javascript" src="JS/Bloqueio.js"></script>
		<link rel="shortcut icon" href="IMG/network.png">
		<meta charset="utf-8">		
		<meta name="description" content="">
		<meta name="author" content="Matheus">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">	
		<link href="CSS/bootstrap.min.css"  rel="stylesheet" type="text/css"/>
		<script src="JS/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
		<script src="JS/jquery.mask.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap.min.js" type="text/javascript"></script>
		<link href="CSS/styleindexprestador.css" type="text/css" rel="stylesheet">
		<script src="JS/bootstrap-notify.min.js" type="text/javascript"></script>	
		<link href="CSS/fonts.googleapis.css" type="text/css" rel="stylesheet">		
		<script type="text/javascript" src="JS/StylePages.js"></script> 		
		<link rel="stylesheet" href="CSS/StylePages.css" type="text/css"/>		
	</head>
		<body>				
			<div id="all" align="center" style="margin-left: 20px; margin-right: 20px; margin-top: 0px;">
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					<a class="navbar-brand" href="#">TecnoHelp</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
						</button>				
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
						<a class="nav-link">Bem vindo(a) <?php echo $dados['name']; ?> <span class="sr-only">(current)</span></a>
						</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Meu Perfil
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="EditarDados.php">Editar Dados</a>
						<a class="dropdown-item" href="Exclusao.php">Excluir Perfil</a>          
					</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Solicitar
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="Pesquisa.php">Pesquisar</a>
						<a class="dropdown-item" href="PesquisaMaps.php">Pesquisa via Mapa</a>
						</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Verificar Solicitações
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="HistoricoAtivo.php">Realizadas</a>
 						<a class="dropdown-item" href="VerificarSolicitacoes.php">Recebidas</a>
						<a class="dropdown-item" href="Historico.php">Histórico de atendimento</a>				                  
						</div>
						</li>      				     
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Fale Conosco
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="Contatar.php">Contatar</a>
						<a class="dropdown-item" href="ReportarErros.php">Reportar Erros</a>          
						</div>						
					</li> 
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
						<a class="nav-link" href="PHP/Deslogar.php">Deslogar<span class="sr-only">(current)</span></a>
					</li>
					 
				</ul>   
				</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
			</form>
			</div>
		</nav>
			<br />
		<br />
		<br />
		<div>
	   		<div class="col-md-offset-4 col-md-4">
  				<div class="box1">
    			<img src="IMG/Logo.png" style="width: 40%; height: 40%;" class="img-circle img-thumbnail">
        		<br /> <br />     
		          <h3>TecnoHelp</h3>			       
		        <h4 style="color:#A9ABA6">{ A Tecnologia criando soluções }</h4>
				</div>
  			</div>
		</div>
		<div id="particles"></div>
		<svg id="svg-source" height="0" version="1.1" 
		  xmlns="http://www.w3.org/2000/svg" style="position:absolute; margin-left: -100%" 
		  xmlns:xlink="http://www.w3.org/1999/xlink">
</html>							
</html>
						