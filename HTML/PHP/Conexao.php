<!DOCTYPE >
<html>
	<head>
		<meta charset="utf-8">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	<body>
		<?php
	
		class Banco {
	 	private $host = "localhost";
		private $user = "SistemaTH";
		private $password ="14042015";
		private $dbname ="SistemaTH";
		public $con;
		
		
		function conecta(){
        $this->con = @mysqli_connect($this->host,$this->user,$this->password, $this->dbname);
        if(!$this->con){
      		echo "			
				<script type=\"text/javascript\">
					swal({
					  title: 'Problemas com a conexão!',
					  icon: 'error',
					  button: 'OK!',
					});						
				</script>";	
	        }
	    }	
	// método responsável para fechar a conexão
	function fechar(){
		@mysqli_close($this->con);
		return;
	}
	function sqlstring($string,$texto){
		$resultado = @mysqli_query($this->con, $string);
		if (!$resultado) {
			echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br /><br />';
			die('<b>Query Inválida:</b>' . @mysqli_error($mysql->con));			 
		} else {
		echo "<script>
			alert('Dados enviados com sucesso!');
			</script>";
			header('Refresh: 1;url= javascript:history.back()');				
			 
		}
		$this->fechar(); // chama o método que fecha a conexão
		return;
	}
	function sqlDeletar($string,$texto){
		$resultado = @mysqli_query($this->con, $string);
		if (!$resultado) {
			echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br /><br />';
			die('<b>Query Inválida:</b>' . @mysqli_error($mysql->con)); 
		} else {
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '1;URL=..\Index.php'>
			<script>
				swal({
				  title: 'Perfil excluido com sucesso!',
				  icon: 'success',
				  button: 'OK!',
				});				
		</script> ";			 
		}
		$this->fechar(); // chama o método que fecha a conexão
		return;
	}
	

	function sqlValidar($string,$caminho){
		// executando instrução SQL
		$resultado = @mysqli_query($this->con, $string);
		if (!$resultado) {
			echo "			
				<META HTTP-EQUIV=REFRESH CONTENT = '1;URL=..\Index.php'>
				<script type=\"text/javascript\">
					swal({
					  title: 'Problemas com a conexao!',
					  icon: 'error',
					  button: 'OK!',
					});						
				</script>";
					
		} else {
			$num = @mysqli_num_rows($resultado);
			if ($num==0){
			echo "			
				<META HTTP-EQUIV=REFRESH CONTENT = '1;URL=..\Index.php'>
				<script type=\"text/javascript\">
					swal({
					  title: 'Usuario ou Senha Inválidos!',
					  icon: 'error',
					  button: 'OK!',
					});						
				</script>
			";				 
			exit;		
			}else{
				$dados=@mysqli_fetch_array($resultado);
			}
		} 
		$this->fechar(); // chama o método que fecha a conexão
		return $dados;
	}
		function sqlquery($string,$caminho){
		// executando instrução SQL
		$resultado = @mysqli_query($this->con, $string);
		if (!$resultado) {
			echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br /><br />';
			die('<b>Query Inválida:</b>' . @mysqli_error($this->con)); 
		} else {
			$num = @mysqli_num_rows($resultado);
			if ($num==0){
			echo "			
				<META HTTP-EQUIV=REFRESH CONTENT = '1;'>
				<script type=\"text/javascript\">
					swal({
					  title: 'Nem um registro!',
					  icon: 'error',
					  button: 'OK!',
					});						
				</script>";
					
			}else{
				$dados=mysqli_fetch_array($resultado);
			}
		} 
		$this->fechar(); // chama o método que fecha a conexão
		return $dados;
		}
	}
?>
	</body>

</html>


   