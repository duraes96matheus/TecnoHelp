<?php
	$servername = "localhost";
	$username = "SistemaTH";
	$password = "14042015";
	$dbname = "SistemaTH";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
				
	
	//Receber a requisão da pesquisa 
	$requestData= $_REQUEST;
	
	
	//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
	$columns = array( 
		0 =>'ID_Solicitacao', 
		1 => 'NMPrestador',
		2 => 'Data',
		3 => 'Hora',
		4 => 'GU',
		5 =>'Categoria',
		6 =>'tipo'
		
		
	);
	
	//Obtendo registros de número total sem qualquer pesquisa
	$result_user = " SELECT * FROM solicitacoes";
	$resultado_user =mysqli_query($conn, $result_user);
	$qnt_linhas = mysqli_num_rows($resultado_user);
	
	//Obter os dados a serem apresentados
	$result_usuarios = "SELECT * FROM solicitacoes WHERE 1=1";
	if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
		$result_usuarios.=" AND ( ID_Solicitacao LIKE '".$requestData['search']['value']."%' "; 
		$result_usuarios.=" OR NMPrestador LIKE '".$requestData['search']['value']."%' ";	   
		$result_usuarios.=" OR Data LIKE '".$requestData['search']['value']."%' ";
		$result_usuarios.=" OR Hora LIKE '".$requestData['search']['value']."%' )";
		$result_usuarios.=" OR GU LIKE '".$requestData['search']['value']."%' )";
		$result_usuarios.=" OR Categoria LIKE '".$requestData['search']['value']."%' )";
		$result_usuarios.=" OR tipo LIKE '".$requestData['search']['value']."%' )";
		
		
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
	
		$dado[] = $row_usuarios["ID_Solicitacao"];
		$dado[] = $row_usuarios["NMPrestador"];
		$dado[] = $row_usuarios["Data"];
		$dado[] = $row_usuarios["Hora"];	
		$dado[] = $row_usuarios["GU"];
		$dado[] = $row_usuarios["Categoria"];
		$dado[]= $row_usuarios["tipo"];	
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