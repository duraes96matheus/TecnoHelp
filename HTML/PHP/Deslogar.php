<!DOCTYPE >
<html>
	<head>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
	<body>
	<?php
		if((!isset ($_SESSION['Username']) == true) and (!isset ($_SESSION['senha']) == true)){    // se você possui algum cookie relacionado com o login deve ser removido
	  {
	 	session_start();
		
	    session_destroy();
		echo "	
			<META HTTP-EQUIV=REFRESH CONTENT = '2;URL=..\Index.php'>
				<script type=\"text/javascript\">
					swal({
					  title: 'Até Logo!',
					  icon: 'success',
					});						
				</script>
			";			
	    exit();
		}	
	  }	
	mysqli_close($conn);
	?>
	</body>
</html>
