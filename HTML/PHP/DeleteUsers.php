<!DOCTYPE >
<html>
	<head>
		<meta charset="utf-8">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
</html>
<body>
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
		$conn = mysqli_connect($servername, $username, $password, $dbname);	
		$logado = $_SESSION['Username'];
		
		echo "$username";
		$motivo=filter_input(INPUT_POST, 'motivo',FILTER_SANITIZE_STRING);
		
		date_default_timezone_set('America/Sao_Paulo');	
		$data = date('d-m-Y');
		
		$sql =  "Insert into motivo(Motivo,Username,Data)values('$motivo','$username','$data') ";		
		$Inserir_Motivo = mysqli_query($conn,$sql);	
		
		$deleta =  "delete from  tb_usuario where Username = '$logado' ";		
		$deletar = mysqli_query($conn,$deleta);	
		
		if(mysqli_affected_rows($conn)){
			echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '1;URL=..\Index.php'>
			<script>
				swal({
				  title: 'Perfil excluido com sucesso!',
				  icon: 'success',
				  button: 'OK!',
				});				
			</script> ";	
		}	
	mysqli_close($conn);
	?>		
</body>

