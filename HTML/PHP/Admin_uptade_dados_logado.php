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
	    if(!$conn){
			echo "		
				<script type=\"text/javascript\">
					swal({
					  title: 'Tente outra hora!',
					  icon: 'error',
					  button: 'OK!',
					});						
				</script>";
			}else{
			echo "
				<script>
					swal({
					  title: 'Conexao OK! Usufrua',
					  icon: 'success',
					  button: 'OK!',
					});				
				</script> ";	
		}
			
		$DS_Email = filter_input(INPUT_POST, 'DS_Email_Admin',FILTER_SANITIZE_EMAIL);
		$TEL1 = filter_input(INPUT_POST, 'Tel_1_Admin',FILTER_SANITIZE_STRING);
		$TEL2 = filter_input(INPUT_POST, 'Tel_2_Admin',FILTER_SANITIZE_STRING);
		$CEP = filter_input(INPUT_POST, 'CEP_Admin',FILTER_SANITIZE_STRING);
		$DS_Endereco = filter_input(INPUT_POST, 'DS_Endereco_Admin',FILTER_SANITIZE_STRING);
		$DS_Bairro = filter_input(INPUT_POST, 'DS_Bairro_Admin',FILTER_SANITIZE_STRING);
		$DS_Cidade = filter_input(INPUT_POST, 'DS_Cidade_Admin',FILTER_SANITIZE_STRING);
		$Complemento = filter_input(INPUT_POST, 'complemento_Admin',FILTER_SANITIZE_STRING);
		$pass = filter_input(INPUT_POST, 'Senha_Admin',FILTER_SANITIZE_STRING);
		$id = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING);

		$sql = mysqli_query($conn,"UPDATE tb_usuario SET DS_Email='$DS_Email',TEL1='$TEL1',TEL2='$TEL2',CEP='$CEP',
		address='$DS_Endereco',Complemento='$Complemento',DS_Bairro='$DS_Bairro',DS_Cidade='$DS_Cidade',Senha='$pass' WHERE ID_Usuario ='$id';");
		 if(!$sql){
			echo "			
				<META HTTP-EQUIV=REFRESH CONTENT = '01;URL=..\AdminSystem.php'>
				<script type=\"text/javascript\">
					swal({
					  title: 'Tente outra hora!',
					  icon: 'error',
					  button: 'OK!',
					});						
				</script>
			";	
			}else{
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '01;URL=..\AdminSystem.php'>
				<script>
					swal({
					  title: 'Dados editados com sucesso!',
					  icon: 'success',
					  button: 'OK!',
					});				
				</script> ";
				}
		mysqli_close($conn);
			
	?>
	</body>
</html>
