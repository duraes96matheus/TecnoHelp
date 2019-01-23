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
			
		
		$id=$_GET['id'];
		
		$result_solicitacao = "DELETE FROM Avaliacao WHERE ID_Avaliacao='$id'";
		$resultado_solicitacao = mysqli_query($conn, $result_solicitacao);
		
		if(!$resultado_solicitacao){
			echo "<META HTTP-EQUIV=REFRESH CONTENT = '2;URL=..\AdminSystem.php'>
				<script type=\"text/javascript\">
					swal({
					  title: 'Error!',
					  icon: 'error',
					  button: 'OK!',
					});						
				</script>";
		}
		else{
			echo "<META HTTP-EQUIV=REFRESH CONTENT = '2;URL=..\AdminSystem.php'>
				<script type=\"text/javascript\">
					swal({
					  title: 'Excluido com Êxito!',
					  icon: 'success',
					  button: 'OK!',
					});						
				</script>";
		}
			
	?>
	</body>
</html>