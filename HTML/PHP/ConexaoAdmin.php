<!DOCTYPE >
<html>
	<head>
		<meta charset="utf-8">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>	
	</head>
	<body>
	<?php
		class banco {
			function conectar(){
			$servername = "localhost";
			$username = "SistemaTH";
			$password = "14042015";
			$dbname = "SistemaTH";
			
			$conn = mysqli_connect($servername, $username, $password, $dbname);	
				
				if(!$conn){
					echo "			
					<script type=\"text/javascript\">
						swal({
						  title: 'Problemas com a conexão!',
						  icon: 'error',
						  button: 'OK!',
						});						
					</script>";		        
				}
				else{
					echo "
					<script>
						swal({
						  title: 'Conexao OK!',
					 	 icon: 'success',
					 	 button: 'OK!',
						});				
					</script> ";	
				}
			}
		}
	?>	
	</body>
</html>
