<?php
	$servername = "localhost";
	$username = "SistemaTH";
	$password = "14042015";
	$dbname = "SistemaTH";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	$ID = mysqli_real_escape_string($conn, $_POST['ID_Solicitacao']);
	$GU = mysqli_real_escape_string($conn, $_POST['GU']);
	$Categoria= mysqli_real_escape_string($conn, $_POST['Categoria']);
	$Tipo = mysqli_real_escape_string($conn, $_POST['Tipo']);
	$Agendamento = mysqli_real_escape_string($conn, $_POST['Agendamento']);
	$Des = mysqli_real_escape_string($conn, $_POST['Des']);
	
	//echo "$ID - $GU - $Categoria - $Tipo - $Agendamento - $Des";
	$result_prestadores = "UPDATE Solicitacoes SET GU='$GU', Categoria =  '$Categoria',Tipo='$Tipo', Agendamento='$Agendamento', Des='$Des' WHERE ID_Solicitacao = '$ID'";
	$resultadado_prestadores = mysqli_query($conn, $result_prestadores);	
 ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>

	<body> 
		<?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '1;URL=..\HistoricoAtivo.php'>
				<script>
					swal({
					  title: 'Alterada com Sucesso!',
					  icon: 'success',
					  button: 'OK!',
					});				
				</script> ";	
		}else{
			echo "			
				<META HTTP-EQUIV=REFRESH CONTENT = '1;URL=..\HistoricoAtivo.php'>
				<script type=\"text/javascript\">
					swal({
					  title: 'Tente outra hora!',
					  icon: 'error',
					  button: 'OK!',
					});						
				</script>
			";	
		}
		mysqli_close($conn);		
		?>
	</body>
</html>

