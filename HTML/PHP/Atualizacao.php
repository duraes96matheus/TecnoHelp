<!DOCTYPE >
<html>
	<head>
		<meta charset="utf-8">
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
		if((!isset ($_SESSION['Username']) == true) and (!isset ($_SESSION['senha']) == true))
		{
		  unset($_SESSION['Username']);
		  unset($_SESSION['senha']);
		  header('location:Index.php');
		  }		 
		$logado = $_SESSION['Username'];
		
		
		$DS_Email = filter_input(INPUT_POST, 'DS_Email',FILTER_SANITIZE_EMAIL);
		$TEL1 = filter_input(INPUT_POST, 'Tel_1',FILTER_SANITIZE_STRING);
		$TEL2 = filter_input(INPUT_POST, 'Tel_2',FILTER_SANITIZE_STRING);
		$CEP = filter_input(INPUT_POST, 'CEP',FILTER_SANITIZE_STRING);
		$DS_Endereco = filter_input(INPUT_POST, 'DS_Endereco',FILTER_SANITIZE_STRING);
		$DS_Bairro = filter_input(INPUT_POST, 'DS_Bairro',FILTER_SANITIZE_STRING);
		$DS_Cidade = filter_input(INPUT_POST, 'DS_Cidade',FILTER_SANITIZE_STRING);
		$Area = filter_input(INPUT_POST, 'DS_Area',FILTER_SANITIZE_STRING);			
		$DS_Formacao = filter_input(INPUT_POST, 'DS_Formacao',FILTER_SANITIZE_STRING);
		$Curso= filter_input(INPUT_POST, 'Curso',FILTER_SANITIZE_STRING);
		$Status = filter_input(INPUT_POST, 'Status',FILTER_SANITIZE_STRING);
		$DS_Insitiuicao = filter_input(INPUT_POST, 'DS_Instituicao',FILTER_SANITIZE_STRING);
		$Conclusao = filter_input(INPUT_POST, 'DT_Conclusao',FILTER_SANITIZE_STRING);
		$OBS = filter_input(INPUT_POST, 'OBS',FILTER_SANITIZE_STRING);
		$Disponibilidade = filter_input(INPUT_POST, 'Disponibilidade',FILTER_SANITIZE_STRING);
		$Complemento = filter_input(INPUT_POST, 'complemento',FILTER_SANITIZE_STRING);
		$pass = filter_input(INPUT_POST, 'Password',FILTER_SANITIZE_STRING);
		//echo "$Complemento";

		$sql = mysqli_query($conn,"UPDATE tb_usuario SET DS_Email='$DS_Email',TEL1='$TEL1',TEL2='$TEL2',CEP='$CEP',
		address='$DS_Endereco',Complemento='$Complemento',DS_Bairro='$DS_Bairro',DS_Cidade='$DS_Cidade',DS_Area='$Area',
		DS_Formacao='$DS_Formacao',Curso='$Curso',Status='$Status',DS_Insitiuicao='$DS_Insitiuicao',DT_Conclusao='$Conclusao',
		Disponibilidade='$Disponibilidade',OBS='$OBS',Senha='$pass' WHERE Username ='$logado';");
		 if(!$sql){
			echo "			
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=..\EditarDados.php'>
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=..\EditarDados.php'>
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
	
		
		
		