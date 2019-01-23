<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>TecnoHelp - A tecnologia criando soluções</title>
		<meta charset="utf-8">		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Matheus">
		<link rel="shortcut icon" href="IMG/network.png">			
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">	
		<link rel="stylesheet" type="text/css" href="CSS/StyleHome.css"> 
		<link href="CSS/bootstrap.min.css"  rel="stylesheet" type="text/css"/>
		<script src="JS/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
		<script src="JS/jquery.mask.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap-notify.min.js" type="text/javascript"></script>	
		<script src="JS/Validacoes.js" type="text/javascript"></script>
		<link href="CSS/Styleindex.css" type="text/css" rel="stylesheet">
		<link href="CSS/fonts.googleapis.css" type="text/css" rel="stylesheet">
	</head>						
		<body style="margin-left: 20px; margin-right: 20px;">				
			<div id="all" align="center">
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				  <a class="navbar-brand" href="Index.php">TecnoHelp</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>				
				  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				    <ul class="navbar-nav mr-auto">
				      <li class="nav-item active">
				        <a class="nav-link" href="Index.php">Home <span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item active">
				        <a class="nav-link" href="Sobre.html">Sobre <span class="sr-only">(current)</span></a>
				      </li>				      
				      <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				         Cadastre-se
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="Cadastro-Prestadores.html">Desejo Ser um prestador</a>
				          <a class="dropdown-item" href="Cadastro-Solicitantes.html">Quero ser um solicitante</a>          
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
				    </ul>
				    <form class="form-inline my-2 my-lg-0">
				      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
				      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
				    </form>
				  </div>
				</nav>							
				<body class="align">					
					<div class="grid">										
						<form  method="post" class="form login" action="PHP/Autenticar.php" > 
							<div class="form__field">
								<label for="Username"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg><span class="hidden">Username</span></label>
								<input  id="Username" type="text" name="Username" maxlength="20" class="form__input" placeholder="Username" required>
							</div>
							<div class="form__field">
								<label for="Senha"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock"></use></svg><span class="hidden">Senha</span></label>
								<input id="password" type="password" name="password" placeholder="Senha" maxlength="20" class="form__input" required>
							</div>
							<div class="form__field">
								<input type="submit" value="Logar">
							</div>
						</form>
						<p class="text--center"><a href="Recuperacaodesenha.html"> Esqueci minha senha</a></p>
					</div>    
				<svg xmlns="http://www.w3.org/2000/svg" class="icons"><symbol id="arrow-right" viewBox="0 0 1792 1792"><path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"/></symbol><symbol id="lock" viewBox="0 0 1792 1792"><path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z"/></symbol><symbol id="user" viewBox="0 0 1792 1792"><path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z"/></symbol></svg>
			</body>
		</div>				
	</body>
</html>

