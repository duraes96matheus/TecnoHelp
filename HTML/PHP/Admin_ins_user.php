<!DOCTYPE >
<html>
	<head>
		<meta charset="utf-8">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
</html>
<body>
	<?php
		$servername = "localhost";
		$username = "SistemaTH";
		$password = "14042015";
		$dbname = "SistemaTH";
		
		$conn = mysqli_connect($servername, $username, $password, $dbname);	

		//$IMG_Prestador = filter_input(INPUT_POST, 'IMG_Prestador',FILTER_SANITIZE_STRING);
		$NM_Usuario= filter_input(INPUT_POST, 'NM_Usuario',FILTER_SANITIZE_STRING);
		$DT_Nascimento = filter_input(INPUT_POST, 'DT_Nascimento',FILTER_SANITIZE_STRING);
		$SEXO = filter_input(INPUT_POST, 'SEXO',FILTER_SANITIZE_STRING);
		$CPF = filter_input(INPUT_POST, 'CPF',FILTER_SANITIZE_STRING);
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
		$DT_Conclusao = filter_input(INPUT_POST, 'DT_Conclusao',FILTER_SANITIZE_STRING);
		$OBS = filter_input(INPUT_POST, 'OBS',FILTER_SANITIZE_STRING);
		$Disponibilidade = filter_input(INPUT_POST, 'Disponibilidade',FILTER_SANITIZE_STRING);
		$Complemento = filter_input(INPUT_POST, 'complemento',FILTER_SANITIZE_STRING);
		$Usuario = filter_input(INPUT_POST, 'Username',FILTER_SANITIZE_STRING);
		$pass = filter_input(INPUT_POST, 'Password',FILTER_SANITIZE_STRING);
		$TIPO = filter_input(INPUT_POST, 'Tipo',FILTER_SANITIZE_STRING);
	//	$Certificados = filter_input(INPUT_POST, 'Certificados',FILTER_SANITIZE_STRING);
	
		$sql1=mysqli_query($conn,"Select DS_Email from TB_Usuario where DS_Email ='$DS_Email' ");
		$sql2=mysqli_query($conn,"Select CPF from TB_Usuario where CPF ='$CPF' ");
		$sql3=mysqli_query($conn,"Select Username from TB_Usuario where Username ='$Usuario' ");
		$count1 = @mysqli_num_rows($sql1);
		$count2=@mysqli_num_rows($sql2);
		$count3=@mysqli_num_rows($sql3);
		
		
		
		if ($count1 ==1){
			echo "			
				<META HTTP-EQUIV=REFRESH CONTENT = '2;URL=..\AdminSystem.php'>
				<script type=\"text/javascript\">
					swal({
					  title: 'Email já cadastrado!',
					  icon: 'error',
					  button: 'OK!',
					});						
				</script>
			";					 
			exit;
			
		}
		elseif ($count2==1){
			echo "			
				<META HTTP-EQUIV=REFRESH CONTENT = '2;URL=..\AdminSystem.php'>
				<script type=\"text/javascript\">
					swal({
					  title: 'CPF já cadastrado!',
					  icon: 'error',
					  button: 'OK!',
					});						
				</script>
			";					 
			exit;
			}
		elseif ($count3 ==1) {
			echo "			
				<META HTTP-EQUIV=REFRESH CONTENT = '2;URL=..\AdminSystem.php'>
				<script type=\"text/javascript\">
					swal({
					  title: 'Nome de Usuário já ultilizado!',
					  icon: 'error',
					  button: 'OK!',
					});						
				</script>
			";					
			}		
		else {
			$sql = mysqli_query($conn, "INSERT INTO  TB_Usuario (name,DS_Email,
			DT_Nascimento,SEXO,CPF, TEL1, TEL2 ,CEP ,address,Complemento,
			DS_Bairro, DS_Cidade,DS_Area,DS_Formacao,Curso,Status,DS_Insitiuicao,
			DT_Conclusao,Disponibilidade,OBS,Username,Senha,type) 
			values ('$NM_Usuario','$DS_Email','$DT_Nascimento', '$SEXO', '$CPF',
			'$TEL1','$TEL2','$CEP','$DS_Endereco','$Complemento', '$DS_Bairro','$DS_Cidade',
			'$Area','$DS_Formacao','$Curso','$Status','$DS_Insitiuicao','$DT_Conclusao','$Disponibilidade',
			'$OBS','$Usuario','$pass','$TIPO')");
			echo "			
				<META HTTP-EQUIV=REFRESH CONTENT = '2;URL=..\AdminSystem.php'>
				<script type=\"text/javascript\">
					swal({
					  title: 'Cadastro efetuado com sucesso!',
					  icon: 'success',
					  button: 'OK!',
					});						
				</script>
			";		
		}		
	mysqli_close($conn);
	?>
</body>
