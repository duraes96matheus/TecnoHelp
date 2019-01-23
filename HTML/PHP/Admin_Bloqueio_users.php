<!DOCTYPE >
<html>
	<head>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	<body>
		<?php
			session_start();
			
			$servername = "localhost";
			$username = "SistemaTH";
			$password = "14042015";
			$dbname = "SistemaTH";
			
			$conn = mysqli_connect($servername, $username, $password, $dbname);	
			
			date_default_timezone_set('America/Sao_Paulo');	
			$data = date('d-m-Y');
			$status = filter_input(INPUT_POST, 'Status',FILTER_SANITIZE_STRING);
			$Motivo = filter_input(INPUT_POST, 'Motivo',FILTER_SANITIZE_STRING);
			$CPF_Bloqueado = filter_input(INPUT_POST, 'CPF_Bloqueado',FILTER_SANITIZE_STRING);
			$Email_Bloqueado = filter_input(INPUT_POST, 'Email_Bloqueado',FILTER_SANITIZE_STRING);
			$Administrador = filter_input(INPUT_POST, 'Administrador',FILTER_SANITIZE_STRING);
			
			//echo "$data,$status,$Motivo,$CPF_Bloqueado,$Email_Bloqueado,$Administrador";
			
			$sql = mysqli_query($conn, "INSERT INTO usuarios_bloqueados(Administrador,Motivo,CPF,Email,Data) 
			VALUES ('$Administrador','$Motivo','$CPF_Bloqueado','$Email_Bloqueado','$data')");
			
			if(!$sql){
			echo "			
				<META HTTP-EQUIV=REFRESH CONTENT = '4;URL=..\AdminSystem.php'>
				<script type=\"text/javascript\">
					swal({
					  title: 'Tente Novamente',
					  icon: 'error',
					  button: 'OK!',
					});						
				</script>
			";					
			}else{
				echo "			
				<META HTTP-EQUIV=REFRESH CONTENT = '4;URL=..\AdminSystem.php'>
				<script type=\"text/javascript\">
					swal({
					  title: 'Bloqueado com Sucesso!',
					  icon: 'success',
					  button: 'OK!',
					});						
				</script>
			";				
			}
		?>
	</body>
</html>
