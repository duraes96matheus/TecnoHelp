<!DOCTYPE >
<html>
	<head>
		<meta charset="utf-8">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	<body>
	<?php
		$servername = "localhost";
		$username = "SistemaTH";
		$password = "14042015";
		$dbname = "SistemaTH";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
			
		$Tipo = filter_input(INPUT_POST, 'Tipo',FILTER_SANITIZE_STRING);
		$Nome= filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_STRING);
		$Email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);
		$Tel = filter_input(INPUT_POST, 'Tel',FILTER_SANITIZE_STRING);
		$GU = filter_input(INPUT_POST, 'GU',FILTER_SANITIZE_NUMBER_INT);
		$MSG = filter_input(INPUT_POST, 'MSG',FILTER_SANITIZE_STRING);	
		/*$Arquivo = isset($_FILES['Arquivo'])?$_FILES['Arquivo']:""; 
				if(isset($_FILES['Arquivo'])){
					$nome = $Arquivo['name'];
					move_uploaded_file($_FILES['Arquivo']['tmp_name'],'imagens/' . $nome);*/
						
		/*	echo "$Nome <br>";
			echo "$Email <br>";
			echo "$Tipo <br>";
			echo "$Tel <br>";		
			echo "$GU <br>";	
			echo "$MSG <br>";	*/
			
		$sql = mysqli_query($conn,"insert into TB_Reportacao (DS_Nome,DS_Email,Telefone_Contato,G_Urgencia,Tipo_Contato,DS_Msg) 
		values ('$Nome','$Email','$Tel','$GU','$Tipo','$MSG')" );
		 if(!$sql){
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '1;URL=..\ReportarErros.php'>
				<script>
					swal({
					  title: 'Tente outra hora!',
					  icon: 'error',
					  button: 'OK!',
					});				
				</script> ";	
				}
				else{			
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '1;URL=..\ReportarErros.php'>
				<script>
					swal({
					  title: 'Reportação efetuado com Sucesso!',
					  icon: 'success',
					  button: 'OK!',
					});				
				</script> ";	
					 
				}
			mysqli_close($conn);			
		?>
	</body>
</html>
