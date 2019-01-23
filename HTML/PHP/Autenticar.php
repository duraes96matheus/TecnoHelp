<?php 	
	
	session_start();
	include_once ('Conexao.php');
	$mysql = new Banco();
	$mysql->conecta();					
	
	$Username =filter_input(INPUT_POST,'Username',FILTER_SANITIZE_STRING);
	$Senha =filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
			
/*	echo "$Username<br>";
	echo "$Senha";	*/

	$sqlconsulta =  "select ID_Usuario,type from TB_Usuario where Username ='$Username' and Senha='$Senha';";			
	$dados = $mysql->sqlValidar($sqlconsulta,'Autenticar.php');
	
	$Direcionamento = $dados['type']; 
	$UsuarioLogado= $dados['ID_Usuario'];	
		
	if($Direcionamento=='Solicitante'){
		 $_SESSION['Username'] = $Username;
		 $_SESSION['Password'] = $Senha;			
   		 header('Location: ..\PageSolicitante.php');		
	}
	else if($Direcionamento=='Prestador'){
		$_SESSION['Username'] = $Username;
		$_SESSION['Password'] = $Senha;				
		header('Location: ..\PagePrestador.php');	
	
	}
	else if($Direcionamento=='Administrador'){
		$_SESSION['Username'] = $Username;
		$_SESSION['Password'] = $Senha;
		$_SESSION['type'] = $Tipo;
		header('Location: ..\AdminSystem.php');	
		
	}
	mysqli_close($conn);
	
?>	
	