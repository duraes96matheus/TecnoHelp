<!DOCTYPE html>
<html lang="pt-br">
		<?php 
		session_start();
		include_once ('PHP\Conexao.php');
		$mysql = new Banco();
		$mysql->conecta();
		$id = $_GET['id'];
				
		if((!isset ($_SESSION['Username']) == true) and (!isset ($_SESSION['senha']) == true))
		{
		  unset($_SESSION['Username']);
		  unset($_SESSION['senha']);
		  unset($_SESSION['Prestador']);
		  header('location:Index.php');
		}
		{
		$logado = $_SESSION['Username'];						
		$sqlconsulta =  "select * from TB_Usuario where ID_Usuario = '$id'";					
		$dados = $mysql->sqlquery($sqlconsulta,'PagePrestador.php');
		$Direcionamento= $dados['type'];
		$id = $dados['ID_Usuario'];	
		}					
		?>
<!------ Include the above in your HEAD tag ---------->
	<head>
		<meta charset="utf-8">
		<title>Perfil Completo</title>
		<link rel="shortcut icon" href="IMG/network.png">			
		<link href="CSS/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="JS/bootstrap.min.js" type="text/javascript"></script>
		<script src="JS/jquery-3.3.1.js" type="text/javascript"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="CSS/bootstrap.min.3.3.7.css" type="text/css">
		<script type="text/javascript" src="JS/jquery-3.3.1.js"></script>
		<script src="JS/bootstrap.min.3.37.js" type="text/javascript"></script>
		<script>
		$(document).ready(function() {   
		  var readURL = function(input) {
		      if (input.files && input.files[0]) {
		          var reader = new FileReader();
		          reader.onload = function (e) {
		              $('.avatar').attr('src', e.target.result);
		          }    
		          reader.readAsDataURL(input.files[0]);
		      }
		  }
		  $(".file-upload").on('change', function(){
		      readURL(this);
		  });
		});
		  </script>
		  <style>
			body{
				background: url(IMG/Exclusao.jpg);
				
			}
			label{
				color: #00FFFF;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 20px;		
			}
		</style>
	</head>
	<br />
	<div class="container bootstrap snippet">
	    <div class="row">
	  		<div class="col-sm-10"><h1 style="color: #E8C800;"><?php echo $dados['name'];?></h1></div>
	    	<div class="col-sm-2"><img="pull-right"><img title="profile image" class="img-circle img-responsive" src="IMG/Logo.png"></img></div>
	    </div>
    	<div class="row">
  			<div class="col-sm-3">
  	        <div class="text-center">
        <img src="IMG/download.png" class="avatar img-circle img-thumbnail" alt="avatar" style="width: 80%; height: 80%;">     
        </div></hr><br>          
          <ul class="list-group">
            <li class="list-group-item text-muted">Historico <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Serviços Prestados</strong></span> 
            <?php 
	           
				$servername = "localhost";
				$username = "SistemaTH";
				$password = "14042015";
				$dbname = "SistemaTH";				
				$conn = mysqli_connect($servername, $username, $password, $dbname);				 			
				
				$Consulta_Atendimento = "SELECT COUNT(*) FROM avaliacao WHERE ID_Prestador = '$id'"; // crio a string
          		$resultado_Atendimento = mysqli_query($conn,$Consulta_Atendimento);//faço a requisição
				$count = mysqli_fetch_array($resultado_Atendimento); //crio uma variavel contendo o resultado
				echo $count[0];//e exibo na tela
				
			 ?>
           </li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Nota Média</strong></span>
       			<?php 
       			$Consulta_Media="SELECT AVG(Q14) FROM avaliacao WHERE ID_Prestador = '$id' ";
          		$resultado_Media = mysqli_query($conn,$Consulta_Media);//faço a requisição          		
				while($row = mysqli_fetch_array($resultado_Media)) {
				echo $row['AVG(Q14)'];
				}
				mysqli_close($conn);				
				?>	

            </li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Idade</strong></span>

			</li>
          </ul>        
        </div><!--/col-3-->
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home"style="color: #FFD700;">Contato </a></li>
                <li><a data-toggle="tab" href="#messages" style="color: #FFD700;">Localização</a></li>
                <li><a data-toggle="tab" href="#settings" style="color:#FFD700;">Formação</a></li>
              </ul>              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                  <form class="form" action="" method="Get" id="registrationForm">
                      <div class="form-group">                          
                          <div class="col-xs-12">
                              <label for="first_name"><h4>Nome Completo</h4></label>
                              <input type="text" value="<?php echo $dados['name']; ?>"class="form-control" name="NM_Prestador" readonly="true"  >
                          </div>
                      </div>
                      <div class="form-group">                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Codigo</h4></label>
                              <input type="text" class="form-control" name="last_name"value="<?php echo $dados['ID_Usuario']; ?>"  readonly="true" >
                          </div>
                      </div>          
                      <div class="form-group">                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Celular</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $dados['TEL2']; ?>" readonly="true" >
                          </div>
                      </div>          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Fixo</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $dados['TEL1']; ?>" readonly="true" >
                          </div>
                      </div>
                      <div class="form-group">                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email"value="<?php echo $dados['DS_Email']; ?>" readonly="true" >
                          </div>
                      </div>                    
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                        		<a href="FormulariodeSolicitacao.php?id=<?php echo $dados['ID_Usuario']; ?>" class="btn btn-success">Solicitar</i></a>                              
                        		<a href="Pesquisa.php"  class="btn btn-primary" >Voltar</i></a>           
                            </div>
                      </div>              
              <hr>              
             </div><!--/tab-pane-->
             <div class="tab-pane" id="messages">               
               <h2></h2>               
               <hr>
                  <form class="form"  methd="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Logadouro</h4></label>
                              <input type="text" class="form-control" value="<?php echo $dados['address']; ?>" readonly="true" >
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Complemento</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $dados['Complemento']; ?>" readonly="true">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Bairro</h4></label>
                              <input type="text" class="form-control" value="<?php echo $dados['DS_Bairro']; ?>" readonly="true">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>CEP</h4></label>
                              <input type="text" class="form-control" value="<?php echo $dados['CEP']; ?>" readonly="true">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Area</h4></label>
                              <input type="email" class="form-control" value="<?php echo $dados['DS_Cidade']; ?>" readonly="true">
                          </div>
                      </div>
                      
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                        		<a href="FormulariodeSolicitacao.php?id=<?php echo $dados['ID_Usuario']; ?>" class="btn btn-success">Solicitar</i></a>                              
                        		<a href="Pesquisa.php"  class="btn btn-primary" >Voltar</i></a>              
                            </div>
                      </div>               
             </div><!--/tab-pane-->
             <div class="tab-pane" id="settings">           	
                  <hr>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Area</h4></label>
                              <input type="text" class="form-control" value="<?php echo $dados['DS_Area']; ?>" readonly="true">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Formacao</h4></label>
                              <input type="text" class="form-control" value="<?php echo $dados['DS_Formacao']; ?>" readonly="true">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Curso </h4></label>
                              <input type="text" class="form-control" value="<?php echo $dados['Curso']; ?>" readonly="true">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Status</h4></label>
                              <input type="text" class="form-control"value="<?php echo $dados['Status']; ?>" readonly="true">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Instituição de Ensino</h4></label>
                              <input type="email" class="form-control" value="<?php echo $dados['DS_Insitiuicao']; ?>" readonly="true">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Certificados</h4></label>
                              <input type="file" class="form-control" value="<?php echo $dados['Certificados']; ?>" readonly="true">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Disponibilidade para atender fora</h4></label>
                              <input type="text" class="form-control" value="<?php echo $dados['Disponibilidade']; ?>" readonly="true">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Observações</h4></label>
                              <input type="text" class="form-control"value="<?php echo $dados['OBS']; ?>" readonly="true">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                        		<a href="FormulariodeSolicitacao.php?id=<?php echo $dados['ID_Usuario']; ?>" class="btn btn-success">Solicitar</i></a>                              
                        		<a href="Pesquisa.php"  class="btn btn-primary" >Voltar</i></a>            
                            </div>
                      </div>
              	</form>
              </div>               
              </div>
          </div>
        </div>
    </div>
</html>  
                  