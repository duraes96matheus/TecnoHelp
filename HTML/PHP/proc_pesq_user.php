<?php
	$servername = "sistemath.mysql.uhserver.com ";
	$username = "matheus3";
	$password = "*{4acc211f}*";
	$dbname = "sistemath";
				
	$conn = mysqli_connect($servername, $username, $password, $dbname);	
	
	//Receber a requisão da pesquisa 
	$requestData= $_REQUEST;
	
	
	//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
	$columns = array( 
		0 =>'ID_Usuario', 
		1 => 'name',
		2 => 'DS_Area',
		3 => 'DS_Bairro',
		4 => 'Curso',
		5 =>'Status'
		
		
	);
	
	//Obtendo registros de número total sem qualquer pesquisa
	$result_user = "SELECT * FROM TB_Usuario where type='Prestador'";
	$resultado_user =mysqli_query($conn, $result_user);
	$qnt_linhas = mysqli_num_rows($resultado_user);
	
	//Obter os dados a serem apresentados
	$result_usuarios = "SELECT * FROM TB_Usuario WHERE 1=1 and type='Prestador'";
	if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
		$result_usuarios.=" AND ( ID_Usuario LIKE '".$requestData['search']['value']."%' "; 
		$result_usuarios.=" OR name LIKE '".$requestData['search']['value']."%' ";	   
		$result_usuarios.=" OR DS_Area LIKE '".$requestData['search']['value']."%' ";
		$result_usuarios.=" OR DS_Bairro LIKE '".$requestData['search']['value']."%' )";
		$result_usuarios.=" OR Curso LIKE '".$requestData['search']['value']."%' )";
		$result_usuarios.=" OR Status LIKE '".$requestData['search']['value']."%' )";
		
		
	}
	
	$resultado_usuarios=mysqli_query($conn, $result_usuarios);
	$totalFiltered = mysqli_num_rows($resultado_usuarios);
	//Ordenar o resultado
	$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$resultado_usuarios=mysqli_query($conn, $result_usuarios);
	
	// Ler e criar o array de dados
	$dados = array();
	while( $row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {  
		$dado = array(); 
		
    	$php1212= "<a href='http://127.0.0.1:8080/TecnoHelp/HTML/ExibicaodePerfis.php'>Acessar Perfil</a>";	
	
		$dado[] = $row_usuarios["ID_Usuario"];
		$dado[] = $row_usuarios["name"];
		$dado[] = $row_usuarios["DS_Area"];
		$dado[] = $row_usuarios["DS_Bairro"];	
		$dado[] = $row_usuarios["Curso"];
		$dado[] = $row_usuarios["Status"];
		$dado[]=$php1212;	
		$dados[] = $dado;
	}
	
	
	//Cria o array de informações a serem retornadas para o Javascript
	$json_data = array(
		"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
		"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
		"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
		"data" => $dados   //Array de dados completo dos dados retornados da tabela 
	);
	
	echo json_encode($json_data);
		function fechar(){
			mysqli_close($this->$conn);
			return;
		}  //enviar dados como formato json	
?>