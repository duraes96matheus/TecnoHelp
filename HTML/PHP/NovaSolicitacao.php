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
		$IDSolicitante=filter_input(INPUT_POST,'ID_solicitante',FILTER_SANITIZE_NUMBER_INT);	
		$responsavel = filter_input(INPUT_POST,'Responsavel',FILTER_SANITIZE_STRING);
		$User = filter_input(INPUT_POST,'Username',FILTER_SANITIZE_STRING);	
		$NomeSolicitante = filter_input(INPUT_POST, 'Nome',FILTER_SANITIZE_STRING);
		$EmailSolicitante = filter_input(INPUT_POST, 'DS_Email',FILTER_SANITIZE_STRING);
		$Tel1Solicitante = filter_input(INPUT_POST, 'Tel_1',FILTER_SANITIZE_STRING);
		$TEl2Solicitante = filter_input(INPUT_POST, 'Tel_2',FILTER_SANITIZE_STRING);
		$Cep = filter_input(INPUT_POST, 'CEP',FILTER_SANITIZE_STRING);
		$Endereco =filter_input(INPUT_POST, 'DS_Endereco',FILTER_SANITIZE_STRING);
		$complemeto =filter_input(INPUT_POST, 'Complemento',FILTER_SANITIZE_STRING);
		$Bairro =filter_input(INPUT_POST, 'DS_Bairro',FILTER_SANITIZE_STRING);	
		$Categoria = filter_input(INPUT_POST, 'Categoria',FILTER_SANITIZE_STRING);
		$tipo = filter_input(INPUT_POST, 'Tipo',FILTER_SANITIZE_STRING);
		$GU= filter_input(INPUT_POST, 'GU',FILTER_SANITIZE_STRING);	
		$Agendamento = filter_input(INPUT_POST, 'Agendamento',FILTER_SANITIZE_STRING);
		$Des =filter_input(INPUT_POST, 'Descricao',FILTER_SANITIZE_STRING);	
		$CDPrestador= filter_input(INPUT_POST, 'CodigoPrestador',FILTER_SANITIZE_STRING);
		$user_Prestador = filter_input(INPUT_POST, 'User_Prestador',FILTER_SANITIZE_STRING);
		$NMPrestador= filter_input(INPUT_POST, 'NMPrestador',FILTER_SANITIZE_STRING);	
		$Area= filter_input(INPUT_POST, 'Area',FILTER_SANITIZE_STRING);
		$Graduacao= filter_input(INPUT_POST, 'Graduacao',FILTER_SANITIZE_STRING);	
		$Curso= filter_input(INPUT_POST, 'Curso',FILTER_SANITIZE_STRING);
		$User_Prestador = filter_input(INPUT_POST, 'User_Prestador',FILTER_SANITIZE_STRING);
		date_default_timezone_set('America/Sao_Paulo');	
		$data = date('d-m-Y');
	  	$hora = date('H:i');
		
		//echo "$IDSolicitante<br />,$responsavel<br />,$User<br />,$NomeSolicitante<br />,$EmailSolicitante<br />,$Tel1Solicitante<br />
		//,$TEl2Solicitante<br />,$Cep<br />,$Endereco<br />,$complemeto,<br />$Bairro,<br />$Categoria,<br />$tipo,<br />$GU,<br />$Agendamento,
	//	<br />$Des,<br />$CDPrestador<br />,$user_Prestador<br />,$NMPrestador<br />,$Area<br />,$Graduacao<br />,$Curso<br />,$data<br />
	//	$hora";
		
		
		
		$status ="Pendente";
		$ativo ="01";
				
		$sql = mysqli_query($conn,"INSERT INTO solicitacoes(CD_Prestador, ID_Solicitante, Responsavel, User_Solicitante,
		NM_Solicitante, EmailSolicitante, Tel1Solicitante, TEl2Solicitante, Cep, Endereco, Complemento,	Bairro, Categoria, 
		Tipo, GU, Agendamento,Des, NM_Prestador, Area, Graduacao, Curso, Data, Hora,status,User_Prestador,Ativo) values ('$CDPrestador','$IDSolicitante','$responsavel',
		'$User','$NomeSolicitante','$EmailSolicitante','$Tel1Solicitante','$TEl2Solicitante','$Cep','$Endereco','$complemeto','$Bairro',
		'$Categoria','$tipo','$GU','$Agendamento','$Des','$NMPrestador','$Area','$Graduacao','$Curso','$data','$hora','$status','$User_Prestador','$ativo')");		
			if(!$sql){
		    echo "			
				<META HTTP-EQUIV=REFRESH CONTENT = '3;URL=..\Pesquisa.php'>
				<script type=\"text/javascript\">
					swal({
					  title: 'Tente novamente !',
					  icon: 'error',
					  button: 'OK!',
					});						
				</script>
			";		
			}else{
				echo "			
				<META HTTP-EQUIV=REFRESH CONTENT = '2;URL=..\HistoricoAtivo.php'>
				<script type=\"text/javascript\">
					swal({
					  title: 'Solicitação efetuada com sucesso!',
					  icon: 'success',
					  button: 'OK!',
					});						
				</script>
				";						 
				}
	mysqli_close($conn);
	?>
	</body>
</html>

