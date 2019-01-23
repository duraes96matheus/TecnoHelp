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
		
		$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	//	echo "$id";
		if(!empty($id)){
			$result_solicitacao = "DELETE FROM Solicitacoes WHERE ID_Solicitacao='$id'";
			$resultado_solicitacao = mysqli_query($conn, $result_solicitacao);
			 if(!$resultado_solicitacao){
				echo "			
					<META HTTP-EQUIV=REFRESH CONTENT = '1;URL=..\HistoricoAtivo.php'>
					<script type=\"text/javascript\">
						swal({
						  title: 'Tente Outra Hora!',
						  icon: 'error',
						  button: 'OK!',
						});						
					</script>
				";	
				}else{
					echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '1;URL=..\HistoricoAtivo.php'>
					<script>
						swal({
						  title: 'Excluído com Sucesso!',
						  icon: 'success',
						  button: 'OK!',
						});				
					</script> ";
					}
			mysqli_close($conn);
	}
	?>
	</body>
</html>