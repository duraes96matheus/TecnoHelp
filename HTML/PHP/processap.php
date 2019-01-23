<?php
	session_start();
	$servername = "localhost";
	$username = "SistemaTH";
	$password = "14042015";
	$dbname = "SistemaTH";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	$Valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);
	$FC = filter_input(INPUT_POST, 'FormadeCobranca', FILTER_SANITIZE_STRING);
	$Resp = filter_input(INPUT_POST, 'Resposta', FILTER_SANITIZE_STRING);
	$DTHR = filter_input(INPUT_POST, 'Agendamento', FILTER_SANITIZE_STRING);
	$Status = filter_input(INPUT_POST, 'Status', FILTER_SANITIZE_STRING);
	$id =  filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
	
	//echo "$id - $Valor - $FC - $Resp - $Status- $DTHR" ;

	$result_Solicitacoes = "UPDATE Solicitacoes set Status ='$Status',Resposta ='$Resp',DTHRSugerida='$DTHR',FormadeCobranca='$FC',Valor='$Valor' WHERE ID_Solicitacao='$id'";
	$resultado_Solicitacoes = mysqli_query($conn, $result_Solicitacoes);

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
				<META HTTP-EQUIV=REFRESH CONTENT = '1;URL= ..\VerificarSolicitacoes.php'>
				<script>
					swal({
					  title: 'Respondida com Sucesso!',
					  icon: 'success',
					  button: 'OK!',
					});				
				</script> ";	
			}else{
				echo "			
				<META HTTP-EQUIV=REFRESH CONTENT = '1;URL= ..\VerificarSolicitacoes.php'>
				<script type=\"text/javascript\">
					swal({
					  title: 'Ocorreu um erro tente outra hora!',
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

