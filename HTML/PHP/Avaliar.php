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
		
		$ID_Prestador= filter_input(INPUT_POST, 'ID_Prestador',FILTER_SANITIZE_STRING);
		$ID_Solicitante= filter_input(INPUT_POST, 'ID_Solicitante',FILTER_SANITIZE_STRING);
		$ID_Solicitacao= filter_input(INPUT_POST, 'ID_Solicitacao',FILTER_SANITIZE_STRING);	
		$NM_Prestador = filter_input(INPUT_POST, 'NM_Prestador',FILTER_SANITIZE_STRING);	
		$avaliacao1 = filter_input(INPUT_POST, 'A',FILTER_SANITIZE_STRING);
		$avaliacao2 = filter_input(INPUT_POST, 'B',FILTER_SANITIZE_STRING);
		$avaliacao3 = filter_input(INPUT_POST, 'C',FILTER_SANITIZE_STRING);
		$avaliacao4 = filter_input(INPUT_POST, 'D',FILTER_SANITIZE_STRING);
		$avaliacao5 = filter_input(INPUT_POST, 'E',FILTER_SANITIZE_STRING);
		$avaliacao6 = filter_input(INPUT_POST, 'F',FILTER_SANITIZE_STRING);
		$avaliacao7 = filter_input(INPUT_POST, 'G',FILTER_SANITIZE_STRING);
		$avaliacao8 = filter_input(INPUT_POST, 'H',FILTER_SANITIZE_STRING);
		$avaliacao9 = filter_input(INPUT_POST, 'I',FILTER_SANITIZE_STRING);
		$avaliacao10 = filter_input(INPUT_POST, 'J',FILTER_SANITIZE_STRING);
		$avaliacao11 = filter_input(INPUT_POST, 'K',FILTER_SANITIZE_STRING);
		$avaliacao12 = filter_input(INPUT_POST, 'L',FILTER_SANITIZE_STRING);
		$avaliacao13= filter_input(INPUT_POST, 'M',FILTER_SANITIZE_STRING);
		$avaliacao14 = filter_input(INPUT_POST, 'N',FILTER_SANITIZE_STRING);
		date_default_timezone_set('America/Sao_Paulo');	
		$data = date('d-m-Y');			
		
	//	echo "$ID_Prestador-$ID_Solicitacao-$ID_Solicitante-$avaliacao1-$avaliacao2-$avaliacao3-$avaliacao4-$avaliacao5-$avaliacao6-$avaliacao7-$avaliacao8-$avaliacao9-$avaliacao10-$avaliacao11-
	//	$avaliacao12-$avaliacao13-$avaliacao14-$data";	
		
		$sql = mysqli_query($conn, "INSERT INTO avaliacao(ID_Prestador, ID_Solicitante,ID_SOLICITACAO ,User_Prestador,Data, Q1, Q2,Q3, Q4, Q5, Q6, Q7, Q8, Q9, 
		Q10, Q11,Q12, Q13, Q14)	VALUES ('$ID_Prestador','$ID_Solicitante','$ID_Solicitacao','$NM_Prestador','$data','$avaliacao1','$avaliacao2',
		'$avaliacao3','$avaliacao4','$avaliacao5','$avaliacao6','$avaliacao7','$avaliacao8','$avaliacao9','$avaliacao10','$avaliacao11','$avaliacao12',
		'$avaliacao13','$avaliacao14')");	
	
		$result_Solicitacoes = "UPDATE Solicitacoes set Ativo ='00' where ID_Solicitacao = '$ID_Solicitacao'";
		$resultadado_Solicitacoes = mysqli_query($conn, $result_Solicitacoes);			
		
			if(!$sql){
				echo "			
				<META HTTP-EQUIV=REFRESH CONTENT = '1;URL=..\HistoricoAtivo.php'>
				<script type=\"text/javascript\">
					swal({
					  title: 'Tente outra hora!',
					  icon: 'error',
					  button: 'OK!',
					});						
				</script>";				
			}else{
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '1;URL=..\HistoricoAtivo.php'>
				<script>
					swal({
					  title: 'Avaliada com Sucesso!',
					  icon: 'success',
					  button: 'OK!',
					});				
				</script> ";				 
				}
		mysqli_close($conn);
						
		?>
	</body>
</html>
