<!DOCTYPE >
<html>
	<head>
		<meta charset="utf-8">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	<body>
		<?php
	// incluindo a conexao e definindo apenas uma vez
	$servername = "localhost";
	$username = "SistemaTH";
	$password = "14042015";
	$dbname = "SistemaTH";
			
	$conn = mysqli_connect($servername, $username, $password, $dbname);	
	//Recuperando os valores inseridos no form
		
	$Tipo = filter_input(INPUT_POST, 'Tipo',FILTER_SANITIZE_STRING);
	$Nome= filter_input(INPUT_POST, 'Nome',FILTER_SANITIZE_STRING);
	$Email = filter_input(INPUT_POST, 'Email',FILTER_SANITIZE_EMAIL);
	$Tel = filter_input(INPUT_POST, 'Tel',FILTER_SANITIZE_STRING);
	$GU = filter_input(INPUT_POST, 'GU',FILTER_SANITIZE_NUMBER_INT);
	$MSG = filter_input(INPUT_POST, 'MSG',FILTER_SANITIZE_STRING);		
	/*	echo "$Nome <br>";
		echo "$Email <br>";
		echo "$Tipo <br>";
		echo "$Tel <br>";		
		echo "$GU <br>";	
		echo "$MSG <br>";	*/
		
	$sql = mysqli_query($conn,"insert into TB_Contatos (TIPO, DS_Nome, DS_Email ,Tel_Contato,GU,DS_Msg )
	 values ('$Tipo','$Nome','$Email','$Tel','$GU','$MSG')") ;
	 if(!$sql){
	    echo "			
			<META HTTP-EQUIV=REFRESH CONTENT = '1;URL=..\Contatar.php'>
			<script type=\"text/javascript\">
				swal({
				  title: 'Não foi possível contatar !',
				  icon: 'error',
				  button: 'OK!',
				});						
			</script>
			";	
		}else{
			echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '1;URL=..\Contatar.php'>
			<script>
				swal({
				  title: 'Contato realizado sucesso!',
				  icon: 'success',
				  button: 'OK!',
				});				
			</script> ";
				 
			}
		mysqli_close($conn);
		?>
	</body>
</html>
