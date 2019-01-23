<!DOCTYPE >
	<head>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</head>
<?php 
	session_start();	

	$servername = "localhost";
	$username = "SistemaTH";
	$password = "14042015";
	$dbname = "SistemaTH";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if((!isset ($_SESSION['Username']) == true) and (!isset ($_SESSION['senha']) == true))//Validando a sessão
	{
		unset($_SESSION['Username']);// salvando
		unset($_SESSION['senha']); 
		header('location:Index.php');
	}		 
	$logado = $_SESSION['Username']; // armazendando
	$result_Usuario = "SELECT type FROM TB_Usuario where Username = '$logado';"; // função Consulta
	$resultado_Usuario = mysqli_query($conn, $result_Usuario);	
	
	$row_usuario_logado=mysqli_fetch_array($resultado_Usuario);
	$tipo=$row_usuario_logado['type'];
	
	if($tipo!='Administrador'){
		echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '4;URL=http://127.0.0.1:8080/TecnoHelp/HTML/Index.php'>
			<script>
				swal({
				  title: 'Você não é um administrador Vaza!!!!!!!',
				  icon: 'error',
				  button: 'OK!',
			});				
		</script> ";			
		}		
	$result_Usuarios = "SELECT * FROM TB_Usuario where type != 'Administrador' "; // função Consulta
	$resultado_Usuarios = mysqli_query($conn, $result_Usuarios);
	
	$result_Solicitacoes = "SELECT * FROM Solicitacoes "; // função Consulta
	$resultado_Solicitacoes = mysqli_query($conn, $result_Solicitacoes);
	
	$result_Reportacoes = "SELECT * FROM TB_Reportacao "; // função Consulta
	$resultado_Reportacoes = mysqli_query($conn, $result_Reportacoes);
	
	$result_Contatos = "SELECT * FROM TB_Contatos "; // função Consulta
	$resultado_Contatos= mysqli_query($conn, $result_Contatos);
	
	$result_Exclusoes = "SELECT * FROM motivo"; // função Consulta
	$resultado_Exclusoes = mysqli_query($conn, $result_Exclusoes);	
	
	$result_Usuario_logado = "SELECT * FROM TB_Usuario where Username = '$logado';"; // função Consulta
	$resultado_Usuario_logado = mysqli_query($conn, $result_Usuario_logado);
	
	$result_avaliacoes = "select * from Avaliacao";
	$resultado_avaliacoes =mysqli_query($conn,$result_avaliacoes);
	
	mysqli_close($conn);
				
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>		
		<title>TecnoHelp - A tecnologia criando soluções</title>
		<script type="text/javascript" src="JS/Bloqueio.js"></script>
		<meta charset="utf-8">		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="">
		<meta name="author" content="Matheus">
		<link rel="shortcut icon" href="IMG/network.png">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">	
		<link href="CSS/bootstrap.min.css"  rel="stylesheet" type="text/css"/>
		<script src="JS/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
		<script src="JS/jquery.mask.min.js" type="text/javascript"></script>
		<script src="JS/bootstrap.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="CSS/jquery.dataTables.min.css">
		<script src="JS/jquery.dataTables.min.js"></script>
		<script src="JS/bootstrap-notify.min.js" type="text/javascript"></script>	
		<link href="CSS/fonts.googleapis.css" type="text/css" rel="stylesheet">
		<script type="text/javascript" src="JS/StylePages.js"></script> 		
		<link rel="stylesheet" href="CSS/StylePages.css" type="text/css"/>
		<link href="CSS/StyleAdmin.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="JS/personalizado.js"></script>
		<style type="text/css">
   			.modal .modal-dialog { width: 80%; } 
		</style>
		<script>
			$(document).ready( function () {
			$('#listar').DataTable();
		} );			
		</script>
		<script>
			function AbrirInfo () {
				swal({
				  title: "Atenção",
				  text: "Em caso de cadastro de Prestadores, os dados acadêmicos são inseridos pelo próprio usuário, basta ele logar-se e ir ao Editar Dados!",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				    swal("Agora é só cadastrar!", {
				      icon: "success",
				    });
				  } else {
				    swal("Agora é só cadastrar!");
				  }
				});			  
			}
		</script>					
	</head>					
	<div id="all" align="center" class="grid align center-block">
		<body>
		<div class="menu"> <span></span> </div>
			<nav id="nav">
				<ul class="main">
					<div class="container">
  						<div class="navbar-header">
     						<a class="navbar-brand pull-right"><img src="http://www.imagenswhatsapp.blog.br/wp-content/uploads/2017/08/Imagens-para-perfil.jpg" 
     							width="150" height="100" class="avatar img-circle img-thumbnail"/></a>
     					</div>
     				</div>
					<li><a href="#" data-toggle="modal" data-target="#EditarDados">Editar Perfil</a></li>
					<li><a href="#" data-toggle="modal" data-target="#Usuarios">Usuários Cadastrados</a></li>
					<li><a href="#" data-toggle="modal" data-target="#Solicitacoes">Solicitações</a></li>
					<li><a href="#" data-toggle="modal" data-target="#Reportacoes">Reportações recebidas</a></li>
					<li><a href="#" data-toggle="modal" data-target="#Contatos">Contatos Recebidos</a></li>
					<li><a href="#" data-toggle="modal" data-target="#Exclusoes">Exclusões de Perfis</a></li>
					<li><a href="#" data-toggle="modal" data-target="#Des1">Avaliações</a></li>
					<li><a href="#" data-toggle="modal" data-target="#Des2">Bloquear cadastro</a></li>
					<li><a target="_blank" href="http://127.0.0.1:8080/eds-modules/phpmyadmin470x180821171516/">Acessar Banco</a></li>
					<a class="nav-link" href="PHP/Deslogar.php">Deslogar<span class="sr-only">(current)</span></a>
				</ul>
			</nav>
		<div class="overlay">	
		</div>
		<script>
			$('.menu, .overlay').click(function () {
				$('.menu').toggleClass('clicked');			
				$('#nav').toggleClass('show');			
			});
		</script>		
		<!--Inicio dos modals -->
		<div class="modal fade" id="EditarDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  <div class="modal-dialog  modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle" align="center">Atualizar Dados </h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      <?php	while($row_usuario_logado = mysqli_fetch_assoc($resultado_Usuario_logado)){ ?>
		      	<form action="PHP/Admin_uptade_dados_logado.php" method="post" enctype="multipart/form-data" name="Atualizardados">
		      	<div class="container">
		      		<div class="row"> 
		      			<div style="display: none;">
							<input type="text" name="id"  value="<?php echo $row_usuario_logado['ID_Usuario']; ?>"    maxlength="255" class="form-control" required minlength="5"  readonly="true" >
						</div>
				      	<div class="col">
							<label>Imagem de Perfil:</label>
							<input type="file" name="IMG_Usuario_Admin" class="form-control" />
						</div>
						<div class="col">
							<label>Nome Completo: </label> 
							<input type="text" name="NM_Usuario_Admin"  value="<?php echo $row_usuario_logado['name']; ?>"   maxlength="255" class="form-control" required minlength="5"  readonly="true" >
						</div>
					</div>
					<br />
					<div class="row">
						<div class="col">													
							<label>Data de Nascimento:</label>
							<input type="text" name="DT_Nascimento_Admin" id="DT_Nascimento_Admin"   value="<?php echo $row_usuario_logado['DT_Nascimento']; ?>"  placeholder="Data de Nascimento"  class="form-control" required readonly="true" >
						</div>
						<div class="col">								
							<label>Sexo: </label>
							<input type="text" name="DT_Nascimento_Admin" id="Sexo_Admin"   value="<?php echo $row_usuario_logado['SEXO']; ?>"  placeholder="Data de Nascimento"  class="form-control" required readonly="true" >
						</div>
						<div class="col"> 								
							<label>CPF: </label>		
							<input type="text" name="CPF_Admin" id="CPF_Admin" placeholder="CPF" value="<?php echo $row_usuario_logado['CPF']; ?>" class="form-control" required minlength="14" readonly="true">
						</div>
					</div>						
					<div class="form-group">
						<label>Email: </label>
						<input type="email" maxlength='155' name="DS_Email_Admin" id="DS_Email_Admin" maxlength="100" value="<?php echo $row_usuario_logado['DS_Email']; ?>" placeholder="Email" class="form-control"required>
					</div>
					<div class="row">
						<div class="col">
							<label>Telefone 1: </label>
							<input type="text" name="Tel_1_Admin" maxlength="20" id="Tel_1_Admin" placeholder="Telefone Fixo_Admin"  value="<?php echo $row_usuario_logado['TEL1']; ?>"class="form-control" required minlength="12">
						</div>
						<div class="col">
							<label>Telefone 2: </label>
							<input type="text"  name="Tel_2_Admin" maxlength="20" id="Tel_2_Admin" value="<?php echo $row_usuario_logado['TEL2']; ?>" placeholder="Telefone Celular"class="form-control" required minlength="12"> 
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label>CEP: </label>
							<input type="text" maxlength="20" name="CEP_Admin" id="CEP_Admin" placeholder="CEP" value="<?php echo $row_usuario_logado['CEP']; ?>" class="form-control" required>
						</div>
						<div class="col">											
							<label>Endereco: </label>
							<input type="text" maxlength='100' name="DS_Endereco_Admin" value="<?php echo $row_usuario_logado['address']; ?>" placeholder="Endereço" id="DS_Endereco_Admin" class="form-control" readonly="true">
						</div>
						<div class="col">											
							<label>Numero e Complemento </label>
							<input type="text" maxlength='100' name="complemento_Admin" id="complemento_Admin" placeholder="Numero " value="<?php echo $row_usuario_logado['Complemento']; ?>" class="form-control" >
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">						
							<label>Bairro: </label>
							<input type="text" maxlength='100' name="DS_Bairro_Admin" id="DS_Bairro_Admin" value="<?php echo $row_usuario_logado['DS_Bairro']; ?>"placeholder="Bairro"class="form-control" >
						</div>
						<div class="col-sm-6">								
							<label>Cidade: </label>							
							<input type="text" maxlength="255" value="<?php echo $row_usuario_logado['DS_Cidade']; ?>" name="DS_Cidade_Admin" id="DS_Cidade_Admin" placeholder="Cidade" class="form-control" >
						</div>
						<div class="col-sm-6">								
							<label>Usuario: </label>							
							<input type="text" maxlength="255" value="<?php echo $row_usuario_logado['Username']; ?>" name="Usuario_Admin" id="Usuario_Admin" placeholder="Cidade" class="form-control">
						</div>
						<div class="col-sm-6">								
							<label>Senha: </label>							
							<input type="password" maxlength="255" value="<?php echo $row_usuario_logado['Senha']; ?>" name="Senha_Admin" id="Senha_Admin" placeholder="Senha" class="form-control" >
						</div>
					</div>
			  	</div>
			  	<?php } ?>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		        <button type="submit" class="btn btn-primary">Salvar</button>
		      </form>
		      </div>
		    </div>
		  </div>
		</div>
		<div class="modal fade" id="Usuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Tabela de Usuários</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
			      <table class="table table-bordred table-striped" id="listar" class="display" style="width:100%">
					<thead class="">
							<tr>
							<th >Nome</th>
							<th >Cep</th>
							<th >Telefone Fixo</th>
							<th >Tipo</th>
							<th >Localização</th>
							<th >Ações</th>		
						</tr>
					</thead>
					<tbody>
						<?php while($rows_Usuarios = mysqli_fetch_assoc($resultado_Usuarios)){ ?>

							<tr>
								<td align="center"><?php echo $rows_Usuarios['name']; ?></td>
								<td align="center"><?php echo $rows_Usuarios['CEP']; ?></td>
								<td align="center"><?php echo $rows_Usuarios['TEL1']; ?></td>
								<td align="center"><?php echo $rows_Usuarios['type']; ?></td>
								<td align="center"><?php echo $rows_Usuarios['DS_Bairro']; ?></td>
								<td align="center">
									<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#EditarDados_Usuarios<?php echo $rows_Usuarios['ID_Usuario']; ?>">visualizar</button>
		                        </td>
							</tr>
							<div class="modal fade" id="EditarDados_Usuarios<?php echo $rows_Usuarios['ID_Usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
							  <div class="modal-dialog  modal-lg" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalLongTitle" align="center">Atualizar Dados </h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      	<form action="PHP/Admin_uptade_user.php" method="post" enctype="multipart/form-data" name="Atualizardados">
							      	<div class="container">
							      		<div class="row"> 
							      			<div style="display: none;">
												<input type="text" name="id"  value="<?php echo $rows_Usuarios['ID_Usuario']; ?>"   maxlength="255" class="form-control" required minlength="5"  >
											</div>
									      	<div class="col-sm-3">
												<label>Tipo</label>
												<select class="form-control" name="Tipo">
													<option><?php echo $rows_Usuarios['type']; ?></option>
													<option value="Administrador">Administrador</option>													
													<option value="Solicitante">Solicitante</option>													
													<option value="Prestador">Prestador</option>													
												</select>
											</div>
											<div class="col-sm-9">
												<label>Nome Completo: </label> 
												<input type="text" name="NM_Usuario"  value="<?php echo $rows_Usuarios['name']; ?>"   maxlength="255" class="form-control" required minlength="5"   >
											</div>
										</div>
										<br />
										<div class="row">
										<div class="col">													
											<label>Data de Nascimento:</label>
											<input type="text" name="DT_Nascimento"  value="<?php echo $rows_Usuarios['DT_Nascimento']; ?>"  placeholder="Data de Nascimento"  class="form-control" required  >
										</div>
										<div class="col">								
											<label>Sexo: </label>
											<input type="text" name="SEXO"  value="<?php echo $rows_Usuarios['SEXO']; ?>"  placeholder="Data de Nascimento"  class="form-control" required  >
										</div>
										<div class="col"> 								
											<label>CPF: </label>		
											<input type="text" name="CPF"  placeholder="CPF" value="<?php echo $rows_Usuarios['CPF']; ?>" class="form-control" required minlength="14">
										</div>
										</div>						
										<div class="form-group">
											<label>Email: </label>
											<input type="email" maxlength='155' name="DS_Email"  maxlength="100" value="<?php echo $rows_Usuarios['DS_Email']; ?>" placeholder="Email" class="form-control"required>
										</div>
										<div class="row">
											<div class="col">
												<label>Telefone 1: </label>
												<input type="text" name="Tel_1" maxlength="20"  placeholder="Telefone Fixo"  value="<?php echo $rows_Usuarios['TEL1']; ?>"class="form-control" required minlength="12">
											</div>
											<div class="col">
												<label>Telefone 2: </label>
												<input type="text"  name="Tel_2" maxlength="20" value="<?php echo $rows_Usuarios['TEL2']; ?>" placeholder="Telefone Celular"class="form-control" required minlength="12"> 
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<label>CEP: </label>
												<input type="text" maxlength="20" name="CEP"  placeholder="CEP" value="<?php echo $rows_Usuarios['CEP']; ?>" class="form-control" required>
											</div>
											<div class="col-sm-5">											
												<label>Endereco: </label>
												<input type="text" maxlength='100' name="DS_Endereco" value="<?php echo $rows_Usuarios['address']; ?>" placeholder="Endereço"  class="form-control" readonly="true">
											</div>
											<div class="col-sm-3">											
												<label>Complemento </label>
												<input type="text" maxlength='100' name="complemento" placeholder="Numero " value="<?php echo $rows_Usuarios['Complemento']; ?>" class="form-control" >
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">						
												<label>Bairro: </label>
												<input type="text" maxlength='100' name="DS_Bairro" value="<?php echo $rows_Usuarios['DS_Bairro']; ?>"placeholder="Bairro"class="form-control" >
											</div>
											<div class="col-sm-6">								
												<label>Cidade: </label>							
												<input type="text" maxlength="255" value="<?php echo $rows_Usuarios['DS_Cidade']; ?>" name="DS_Cidade" placeholder="Cidade" class="form-control" >
											</div>
											<div class="col-sm-6">								
												<label>Usuario: </label>							
												<input type="text" maxlength="255" value="<?php echo $rows_Usuarios['Username']; ?>" name="Usuario"  placeholder="Cidade" class="form-control">
											</div>
											<div class="col-sm-6">								
												<label>Senha: </label>							
												<input type="text" maxlength="255" value="<?php echo $rows_Usuarios['Senha']; ?>" name="Senha"  placeholder="Senha" class="form-control" >
											</div>
										<?php 
											$Direcionamento = $rows_Usuarios['type'];
											if ($Direcionamento == 'Prestador') { ?>		
										<div id="DadosPrestador" class="col-sm-6">								
										<label>Prestador para a área da:</label>
											<select name="DS_Area"  class="form-control" value="<?php echo $rows_Usuarios['DS_Area']; ?>">
												<option><?php echo $rows_Usuarios['DS_Area']; ?></option>
												<option>Informatica</option>
												<option>Eletrônica</option>
												<option>Ambas</option>
											</select>
										</div>
										<div class="col-sm-6">								
											<label>Formação Acadêmica:</label>						
												<select name="DS_Formacao" class="form-control">
													<option><?php echo $rows_Usuarios['DS_Formacao']; ?></option>
													<option value="Tecnico">Técnico</option>
													<option value="Bacharelado">Bacharelado</option>
													<option value="Especialização">Especialização</option>
													<option value="Mestrado">Mestrado</option>
													<option value="Doutorado">Doutorado</option>
													<option value="Outros">Outros</option>											
												</select>
											</div>
											<div class="col-sm-8">								
												<label>Curso:</label>
												<input type="text" name="Curso" placeholder="Curso" class="form-control" value="<?php echo $rows_Usuarios['Curso']; ?>"required/>
											</div>
											<div class="col-sm-4">								
												<label>Status: </label>							
													<select name="Status"class="form-control"    >
														<option><?php echo $rows_Usuarios['Status']; ?></option>
														<option value="Concluído">Concuído</option>
														<option value="Cursando">Cursando</option>
														<option value="Interrompido">Interrompido</option>
														<option value="Outros">Outros</option>
												</select>
											</div>
											<div class="col-sm-9">								
												<label>Instituição de ensino</label>
												<input type="text" maxlength="100" name="DS_Instituicao" value="<?php echo $rows_Usuarios['DS_Insitiuicao']; ?>" placeholder="Etec Zona Leste" class="form-control"/>
											</div>
											<div class="col-sm-3">								
												<label>Conclusão/Previsão</label>
												<input type="text" name="DT_Conclusao"   value="<?php echo $rows_Usuarios['DT_Conclusao']; ?>"class="form-control"/>
											</div>											
											<br />
										  </div>											
										<?php } ?>	
										<br />
										</div>
								        <div class="modal-footer">
								        <button type="submit" class="btn btn-primary">Salvar</button>
								        </form>
								       		<?php echo  "<a href='PHP/Admin_delete_user.php?id=" . $rows_Usuarios['ID_Usuario'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar</a><br><hr>";?>
								       </div>
								      </div>
								  	</div>
							      </div>
							    </div>
							  </div>
							</div>
							<div class="modal fade" id="novo_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
							<div class="modal-dialog  modal-lg" role="document">
								<div class="modal-content">
								 <div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle" align="center">Criação de novo usuario </h5>
									  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									      <span aria-hidden="true">&times;</span>
									        </button>
										      </div>
											  <div class="modal-body">
											  <form action="PHP/Admin_ins_user.php" method="post">
											  <div class="row">
											  	<div class="col-sm-3">
													<label>Imagem de Perfil:</label>
													<input type="file" name="IMG_Usuario"  class="form-control" />
												</div>
											  	<div class="col-sm-9">
													<label>Nome Completo: </label> 
													<input type="text" name="NM_Usuario"  placeholder="Nome" maxlength="255" class="form-control" required minlength="5" >
												</div>
											  	<div class="col-sm-4">
													<label>Data de Nascimento:</label>
													<input type="text" name="DT_Nascimento" placeholder="Data de Nascimento" class="form-control" required >
												</div>
											  	<div class="col-sm-4">
													<label>Sexo: </label>
													<select name="SEXO"  class="form-control">
														<option value="Masculino">Masculino</option>
														<option value="Feminino">Feminino</option>
													</select>
												</div>
											  	<div class="col-sm-4">
													<label>CPF: </label>		
													<input type="text" name="CPF" placeholder="CPF" required size="12" maxlength="20" class="form-control" required minlength="14" >														
												</div>
											   </div>
											   <div class="row">											
											  	<div class="col-sm-8">
													<label>Email: </label>
													<input type="email" maxlength='155' name="DS_Email"  maxlength="100" placeholder="Email" class="form-control" required>
												</div>
											  	<div class="col-sm-4">
													<label>Telefone 1: </label>
													<input type="text"  name="Tel_1"   placeholder="Telefone Fixo" class="form-control" required minlength="12">
												</div>				
											  	<div class="col-sm-4">
													<label>Telefone 2: </label>
													<input type="text"  name="Tel_2"   placeholder="Telefone Celular"class="form-control" required minlength="13" >
												</div>
											  	<div class="col-sm-4">
													<label>CEP: </label>
													<input type="text" maxlength="20" name="CEP"  placeholder="CEP" class="form-control"  required>
												</div>
											  	<div class="col-sm-4">
													<label>Numero e Complemento </label>
													<input type="text" maxlength='100' name="Complemento" placeholder="Complemento" class="form-control" >
												</div>											  													
											  	<div class="col-sm-6">
													<label>Bairro: </label>
													<input type="text" maxlength='100' name="DS_Bairro" placeholder="Bairro"class="form-control" >
												</div>
											  	<div class="col-sm-6">
													<label>Cidade: </label>							
													<input type="text" maxlength="255" name="DS_Cidade"  placeholder="Cidade" class="form-control"  >
												</div>
												<div class="col-sm-12">
													<label>Endereco: </label>
													<input type="text" maxlength='100' name="DS_Endereco" placeholder="Endereço" class="form-control" >
												</div>											  
											  	<div class="col-sm-4">
													<label>Usuario </label>							
													<input type="text" name="Username"  class="form-control" maxlength="20"/>
												</div>						
											  	<div class="col-sm-4">
													<label>Senha: </label>							
													<input type="password" maxlength="20" name="Password" class="form-control" required >
												</div>
												<div class="col-sm-4">
													<label>Tipo de Usuario</label>
													<select class="form-control" name="Tipo">
														<option value="Administrador">Administrador</option>
														<option value="Prestador">Prestador</option>
														<option value="Solicitante">Solicitante</option>
													</select>
											  </div>													     
										      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
								        <button type="submit" class="btn btn-primary">Salvar</button>
								      </form>
							      </div>
							    </div>
							 </div>
							</div>	
						<?php } ?>
					</tbody>
					<tfoot>
				      <tr>
					    <th >Nome</th>
						<th >Cep</th>
						<th >Telefone Fixo</th>
						<th >Tipo</th>
						<th >Localização</th>
						<th >Ações</th>		 
				      </tr>
			       </tfoot>	
		    	</table>		       
		      </div>		      
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#novo_usuario" onclick="AbrirInfo()">Novo Usuario</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		        <button type="button" class="btn btn-primary">Salvar</button>
		      </div>
		    </div>
		  </div>
		</div>			
		<script>
			$(document).ready( function () {
			$('#tb_solicitacoes').DataTable();
		} );			
		</script>	
		<div class="modal fade" id="Solicitacoes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Solicitações</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<table class="table table-bordred table-striped" id="tb_solicitacoes" class="display" style="width:100%">
					<thead class="">
							<tr>
							<th >ID</th>
							<th >Data</th>
							<th >Solicitante</th>
							<th >Prestador</th>
							<th >Urgência</th>
							<th >Ações</th>		
						</tr>
					</thead>
					<tbody>
						<?php while($rows_Solicitacoes = mysqli_fetch_assoc($resultado_Solicitacoes)){ ?>

							<tr>
								<td align="center"><?php echo $rows_Solicitacoes['ID_Solicitacao']; ?></td>
								<td align="center"><?php echo $rows_Solicitacoes['Data']; ?></td>
								<td align="center"><?php echo $rows_Solicitacoes['NM_Solicitante']; ?></td>
								<td align="center"><?php echo $rows_Solicitacoes['NM_Prestador']; ?></td>
								<td align="center"><?php echo $rows_Solicitacoes['GU']; ?></td>
								<td align="center">
								<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#EditarDados_Solicitacoes<?php echo $rows_Solicitacoes['ID_Solicitacao']; ?>">visualizar</button>		                        </td>
							</tr>
							<div class="modal fade" id="EditarDados_Solicitacoes<?php echo $rows_Solicitacoes['ID_Solicitacao']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
							  <div class="modal-dialog modal-lg " role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							      	<style>
							      		#EditarDados_Solicitacoes{
							      			height: 1200px;
							      		}
							      	</style>
							        <h5 class="modal-title" id="exampleModalLongTitle" align="center">Solicitação de N°<?php echo $rows_Solicitacoes['ID_Solicitacao']; ?> </h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      	<form action="PHP/Admin_Uptade_Solicitacao.php" method="post" enctype="multipart/form-data" name="Atualizardados">
							      	<div class="container">
							      		<div class="row"> 
							      			<div style="display: none;">
												<input type="text"value="<?php echo $rows_Solicitacoes['ID_Solicitacao']; ?>"    class="form-control"   >
											</div>
										<div class="col-sm-6">													
											<label>Nome do Prestador</label>
											<input type="text"  value="<?php echo $rows_Solicitacoes['NM_Prestador']; ?>"   class="form-control"  >
										</div>
										<div class="col-sm-6">													
											<label>Nome do Solicitante</label> 
											<input type="text" value="<?php echo $rows_Solicitacoes['NM_Solicitante']; ?>"   class="form-control" >
										</div>
										<br />
										<div class="col-sm-4">													
											<label>Tipo</label>
											<input type="text" value="<?php echo $rows_Solicitacoes['Tipo']; ?>" class="form-control" >
										</div>
										<div class="col-sm-4">													
											<label>Categoria</label>
											<input type="text" class="form-control"  value="<?php echo $rows_Solicitacoes['Categoria']; ?>">
										</div>
										<div class="col-sm-4">													
											<label>Data </label>		
											<input type="text" value="<?php echo $rows_Solicitacoes['Data']; ?>" class="form-control">
										</div>
										<div class="col-sm-12">													
											<label>Resposta </label>
											<input type="text"  value="<?php echo $rows_Solicitacoes['Resposta']; ?>" class="form-control" > 
										</div>						
										<div class="col-sm-6">													
											<label>Hora </label>
											<input type="email" value="<?php echo $rows_Solicitacoes['Hora']; ?>"  class="form-control">
										</div>
										<div class="col-sm-6">													
											<label>Status</label>
											<input type="text" value="<?php echo $rows_Solicitacoes['Status']; ?>"class="form-control" >
										</div>											
										</div>
										<div class="row">
											<div class="col-sm-4">
												<label>Data e Hora Sug.</label>
												<input type="text" value="<?php echo $rows_Solicitacoes['DTHRSugerida']; ?>" class="form-control" >
											</div>
											<div class="col-sm-5">											
												<label>Forma de Cobrança</label>
												<input type="text" value="<?php echo $rows_Solicitacoes['FormadeCobranca']; ?>" class="form-control" >
											</div>
											<div class="col-sm-3">											
												<label>Valor </label>
												<input type="text" maxlength='100' value="<?php echo $rows_Solicitacoes['Valor']; ?>" class="form-control" >
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">						
												<label>Descriçao </label>
												<input type="text" maxlength='100' value="<?php echo $rows_Solicitacoes['Des']; ?>" class="form-control" >
											</div>
											<div class="col-sm-6">								
												<label>Contato do Solicitante</label>							
												<input type="text" maxlength="255" value="<?php echo $rows_Solicitacoes['Tel1Solicitante']; ?>"  class="form-control" >
											</div>																				
										<br />
											</div>
									        <div class="modal-footer">
									        <button type="submit" class="btn btn-primary">Salvar</button>
								        </form>
								       		<?php echo  "<a href='PHP/Admin_delete_Solicitacao.php?id=" . $rows_Solicitacoes['ID_Solicitacao'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar</a><br><hr>";?>
								       </div>
								      </div>
								  	</div>
							      </div>
							   </div>
							 </div>
						<?php } ?>
					</tbody>
					<tfoot>
				        <tr>
					     <th >ID</th>
					     <th >Data</th>
						 <th >Solicitante</th>
						 <th >Prestador</th>
						<th >Urgência</th>
						<th >Ações</th>	 
				        </tr>
			       </tfoot>	
		    	</table>	
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		      </div>
		    </div>
		  </div>
		</div>
		<script>
			$(document).ready( function () {
			$('#tb_reportacoes').DataTable();
		} );			
		</script>	
		<div class="modal fade" id="Reportacoes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		      	<style>
		      		#Reportacoes {
						height: 40000px;
		      		}
		      	</style>
		        <h5 class="modal-title" id="exampleModalLongTitle">Reportações</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<table class="table table-bordred table-striped" id="tb_reportacoes" class="display" style="width:100%">
					<thead class="">
							<tr>
							<th >Tipo</th>
							<th >Urgência</th>
							<th>Mensagem</th>
							<th >Contato</th>
							<th >Ações</th>		
						</tr>
					</thead>
					<tbody>
						<?php while($rows_Reportacoes = mysqli_fetch_assoc($resultado_Reportacoes)){ ?>

							<tr>
								<td align="center"><?php echo $rows_Reportacoes['Tipo_Contato']; ?></td>
								<td align="center"><?php echo $rows_Reportacoes['G_Urgencia']; ?></td>
								<td width="200" align="center"><?php echo $rows_Reportacoes['DS_Msg']; ?></td>
								<td align="center"><?php echo $rows_Reportacoes['Telefone_Contato']; ?></td>
								<td align="center">
								<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Exibir_reportacoes<?php echo $rows_Reportacoes['ID_Reportacao']; ?>">visualizar</button		                        </td>
							</tr>
							<div class="modal fade" id="Exibir_reportacoes<?php echo $rows_Reportacoes['ID_Reportacao']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
							  <div class="modal-dialog modal-lg " role="document">
							    <div class="modal-content">
							      <div class="modal-header">							      	
							        <h5 class="modal-title" id="exampleModalLongTitle" align="center">Contato de n°<?php echo $rows_Reportacoes['ID_Reportacao']; ?></h5>
							       	
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      	<form action="#" method="post" enctype="multipart/form-data" name="">
							      	<div class="container">
							      		<div class="row"> 
							      			<div style="display: none;">
												<input type="text" name="id_resposta"  value="<?php echo $rows_Reportacoes['ID_Reportacao']; ?>"    class="form-control">
											</div>									      	
												<label>Nome</label> 
												<input type="text" value="<?php echo $rows_Reportacoes['DS_Nome']; ?>"    class="form-control">
											</div>
										</div>
										<br />
									<div class="row">
										<div class="col-sm-6">													
											<label>Email</label>
											<input type="text"  value="<?php echo $rows_Reportacoes['DS_Email']; ?>"    class="form-control">
										</div>
										<div class="col-sm-4">													
											<label>Contato</label>
											<input type="text"  value="<?php echo $rows_Reportacoes['Telefone_Contato']; ?>"   class="form-control"   >
										</div>
										<div class="col-sm-2">													
											<label>Urgência </label>		
											<input type="text" value="<?php echo $rows_Reportacoes['G_Urgencia']; ?>" class="form-control" >
										</div>															
									</div>
									<div class="row">
											<div class="col-sm-4">
												<label>Tipo </label>
												<input type="text" value="<?php echo $rows_Reportacoes['Tipo_Contato']; ?>"  class="form-control">
											</div>
											<div class="col-sm-8">
												<label>Arquivos Recebidos </label>
												<input type="file"  value="<?php echo $rows_Reportacoes['Arquivos']; ?>" class="form-control" > 
											</div>
										</div>
									<br />
										<div class="form-group">
											<textarea  class="form-control">
												<?php echo $rows_Reportacoes['DS_Msg']; ?>
											</textarea>												
										</div>	
										</div>								
									    <div class="modal-footer">
									    <button type="submit" class="btn btn-primary">Salvar</button>
								        	</form>
								       		<?php echo  "<a href='PHP/Admin_delete_Reportacao.php?id=" . $rows_Reportacoes['ID_Reportacao'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar</a><br><hr>";?>
								       </div>
								      </div>
								  	</div>
							      </div>
							   </div>
							 </div>
						<?php } ?>
					</tbody>
					<tfoot>
				        <tr>
				         <th >Tipo</th>
					     <th >Urgência</th>
						 <th >Mensagem</th>
						 <th >Contato</th>
						 <th >Ações</th>	 
				        </tr>
			       </tfoot>	
		    	</table>		       
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		      </div>
		    </div>
		  </div>
		</div>
		<script>
			$(document).ready( function () {
			$('#tb_contatos').DataTable();
		} );			
		</script>
		<div class="modal fade" id="Contatos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <table class="table table-bordred table-striped" id="tb_contatos" class="display" style="width:100%">
					<thead class="">
							<tr>
							<th>Tipo</th>
							<th>Nome</th>
							<th >Mensagem</th>
							<th >Contato</th>
							<th >Ações</th>		
						</tr>
					</thead>
					<tbody>
						<?php while($rows_Contatos = mysqli_fetch_assoc($resultado_Contatos)){ ?>

							<tr>
								<td align="center"><?php echo $rows_Contatos['TIPO']; ?></td>
								<td align="center"><?php echo $rows_Contatos['DS_Nome']; ?></td>
								<td align="center"><?php echo $rows_Contatos['DS_Msg']; ?></td>								
								<td align="center"><?php echo $rows_Contatos['Tel_Contato']; ?></td>
								<td align="center">
									<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Exibir_Contatos<?php echo $rows_Contatos['ID']; ?>">visualizar</button>
		                        </td>
							</tr>
							<div class="modal fade" id="Exibir_Contatos<?php echo $rows_Contatos['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
							  <div class="modal-dialog modal-lg " role="document">
							    <div class="modal-content">
							      <div class="modal-header">							      	
							        <h5 class="modal-title" id="exampleModalLongTitle" align="center">Contato de n°<?php echo $rows_Contatos['ID']; ?></h5>
							       	
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      	<form action="#" method="post" enctype="multipart/form-data" name="">
							      	<div class="container">
							      		<div class="row"> 
							      			<div style="display: none;">
												<input type="text" name="id"  value="<?php echo $rows_Contatos['ID']; ?>" class="form-control" >
											</div>									      	
												<label>Nome</label> 
												<input type="text" value="<?php echo $rows_Contatos['DS_Nome']; ?>" class="form-control">
											</div>
										</div>
										<br />
									<div class="row">
										<div class="col-sm-7">													
											<label>Email</label>
											<input type="text"  value="<?php echo $rows_Contatos['DS_Email']; ?>" class="form-control"   >
										</div>
										<div class="col-sm-5">													
											<label>Contato</label>
											<input type="text"  value="<?php echo $rows_Contatos['Tel_Contato']; ?>" class="form-control"   >
										</div>																								
									</div>
									<div class="row">
										<div class="col-sm-6">
											<label>Tipo </label>
											<input type="text" value="<?php echo $rows_Contatos['TIPO']; ?>"  class="form-control">
										</div>
										<div class="col-sm-6">													
											<label>Urgência </label>		
											<input type="text" value="<?php echo $rows_Contatos['GU']; ?>" class="form-control">
										</div>												
										</div>
									<br />
										<div class="form-group">
											<textarea  class="form-control"  >
												<?php echo $rows_Contatos['DS_Msg']; ?>
											</textarea>												
										</div>	
										</div>								
									    <div class="modal-footer">
									    <button type="submit" class="btn btn-primary">Salvar</button>
								        	</form>
								       		<?php echo  "<a href='PHP/Admin_delete_Reportacao.php?id=" . $rows_Contatos['ID'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar</a><br><hr>";?>
								       </div>
							      </div>
							 	</div>
							</div>
						<?php } ?>
					</tbody>
					<tfoot>
				        <tr>
					     <th >Tipo</th>
							<th >Nome</th>
							<th >Mensagem</th>
							<th >Contato</th>
							<th >Ações</th>	 
				        </tr>
			       </tfoot>	
		    	</table>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		      </div>
		    </div>
		  </div>
		</div>
		<script>
			$(document).ready( function () {
			$('#tb_exclusao').DataTable();
		} );			
		</script>			
		<div class="modal fade" id="Exclusoes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <table class="table table-bordred table-striped" id="tb_exclusao" class="display" style="width:100%">
					<thead class="">
							<tr>
							<th>Numero</th>
							<th>Motivo</th>
							<th >Data</th>
							<th >Usuario</th>
						</tr>
					</thead>
					<tbody>
						<?php while($rows_Exclusoes = mysqli_fetch_assoc($resultado_Exclusoes)){ ?>

							<tr>
								<td align="center"><?php echo $rows_Exclusoes['ID']; ?></td>
								<td align="center"><?php echo $rows_Exclusoes['Motivo']; ?></td>
								<td align="center"><?php echo $rows_Exclusoes['Data']; ?></td>								
								<td align="center"><?php echo $rows_Exclusoes['Username']; ?></td>							
							</tr>
							<div class="modal fade" id="myModal<?php echo $rows_Prestadores['ID_Usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title text-center" id="myModalLabel"></h4>
									</div>
									<div class="modal-body">
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</tbody>
					<tfoot>
				        <tr>
							<th>Numero</th>
							<th>Motivo</th>
							<th >Data</th>
							<th >Usuario</th> 						 
				        </tr>
			       </tfoot>	
		    	</table>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		      </div>
		    </div>
		  </div>
		</div>
		<script>
			$(document).ready( function () {
			$('#Avaliacao').DataTable();
		} );			
		</script>	
		<div class="modal fade" id="Des1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<table class="table table-striped" id="Avaliacao" class="display" style="width:100%">
					<thead class="">
						<tr>
						  <th>ID Prestador</th>
						  <th>ID Solicitação</th>
						  <th >Nota Final</th>
					      <th >Data</th>
					      <th>Ver mais</th> 
						</tr>
					</thead>
					<tbody>
						<?php while($rows_avaliacoes = mysqli_fetch_assoc($resultado_avaliacoes)){ ?>

							<tr>
								<td align="center"><?php echo $rows_avaliacoes['ID_Prestador']; ?></td>
								<td align="center"><?php echo $rows_avaliacoes['ID_SOLICITACAO']; ?></td>
								<td align="center"><?php echo $rows_avaliacoes['Q14']; ?></td>								
								<td align="center"><?php echo $rows_avaliacoes['Data']; ?></td>
								<td>
									<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#Exibir_Avalicoes<?php echo $rows_avaliacoes['ID_Avaliacao']; ?>">Ver mais</button>	
								</td>							
							</tr>
							<div class="modal fade" id="myModal<?php echo $rows_avaliacoes['ID_Avaliacao']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title text-center" id="myModalLabel"></h4>
									</div>
									<div class="modal-body">
									</div>
								</div>
							</div>
						</div>
						<div class="modal fade" id="Exibir_Avalicoes<?php echo $rows_avaliacoes['ID_Avaliacao']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
							  <div class="modal-dialog modal-lg " role="document">
							    <div class="modal-content">
							      <div class="modal-header">							      	
							        <h5 class="modal-title" id="exampleModalLongTitle" align="center">Avaliação de N°<?php echo $rows_avaliacoes['ID_Avaliacao']; ?></h5>
							       	
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <div class="modal-body">
							      	<form action="#" method="post" enctype="multipart/form-data" name="">
							      	<div class="container">							      		
										<div class="row">							      											      	
											<label>Prestador:</label> 
											<input type="text" value="<?php echo $rows_avaliacoes['User_Prestador']; ?>" class="form-control">
										</div>
										<div class="row">
											<div class="col-sm-4">													
												<label>Data:</label>
												<input type="text"  value="<?php echo $rows_avaliacoes['Data']; ?>" class="form-control"   >
											</div>
											<div class="col-sm-4">													
												<label>ID do Solicitante:</label>
												<input type="text"  value="<?php echo $rows_avaliacoes['ID_Solicitante']; ?>" class="form-control"   >
											</div>					
											<div class="col-sm-4">
												<label>Solução do Problema: </label>
												<input type="text" value="<?php echo $rows_avaliacoes['Q1']; ?>"  class="form-control">
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">													
												<label>Prontidão aten. telefone: </label>		
												<input type="text" value="<?php echo $rows_avaliacoes['Q2']; ?>" class="form-control">
											</div>									
											<div class="col-sm-4">
												<label>Profissionalismo: </label>
												<input type="text" value="<?php echo $rows_avaliacoes['Q3']; ?>"  class="form-control">
											</div>
											<div class="col-sm-4">													
												<label>Assistência: </label>		
												<input type="text" value="<?php echo $rows_avaliacoes['Q4']; ?>" class="form-control">
											</div>
										</div>
										<div class="row">									
											<div class="col-sm-4">
												<label>Facilidade em contatar: </label>
												<input type="text" value="<?php echo $rows_avaliacoes['Q5']; ?>"  class="form-control">
											</div>
											<div class="col-sm-4">													
												<label>Resposta no E-Mail: </label>		
												<input type="text" value="<?php echo $rows_avaliacoes['Q6']; ?>" class="form-control">
											</div>									
											<div class="col-sm-4">
												<label>Avaliação geral: </label>
												<input type="text" value="<?php echo $rows_avaliacoes['Q7']; ?>"  class="form-control">
											</div>
										</div>
										<div class="row">
											<div class="col-sm-4">													
												<label>Recomendaria: </label>		
												<input type="text" value="<?php echo $rows_avaliacoes['Q8']; ?>" class="form-control">
											</div>										
											<div class="col-sm-4">
												<label>Foi experiente? </label>
												<input type="text" value="<?php echo $rows_avaliacoes['Q9']; ?>"  class="form-control">
											</div>										
											<div class="col-sm-4">													
												<label>Foi paciente?</label>		
												<input type="text" value="<?php echo $rows_avaliacoes['Q10']; ?>" class="form-control">
											</div>	
										</div>
										<div class="row">								
											<div class="col-sm-6">
												<label>Foi simpático? </label>
												<input type="text" value="<?php echo $rows_avaliacoes['Q11']; ?>"  class="form-control">
											</div>
											<div class="col-sm-6">													
												<label>Foi responsável?</label>		
												<input type="text" value="<?php echo $rows_avaliacoes['Q12']; ?>" class="form-control">
											</div>												
										</div>
										<div class="row">
											<div class="col-sm-6" >
												<label>Pontos a melhorar:</label>	
												<input type="text" value="<?php echo $rows_avaliacoes['Q13']; ?>" class="form-control">
											</div>									
											<div class="col-sm-6" >
												<label>Nota Final</label>		
												<input type="text" value="<?php echo $rows_avaliacoes['Q14']; ?>" class="form-control">
											</div>									
										</div>										
										</div>								
									    <div class="modal-footer">
									    <button type="submit" class="btn btn-primary">Salvar</button>
								        	</form>
								       		<?php echo  "<a href='PHP/Admin_delete_Avaliacao.php?id=" . $rows_avaliacoes['ID_Avaliacao'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar</a><br><hr>";?>
								       </div>
							      </div>
							 	</div>
							</div>
						<?php } ?>
					</tbody>
					<tfoot>
				        <tr>
						  <th>ID Prestador</th>
						  <th>ID Solicitação</th>
						  <th >Nota Final</th>
					      <th >Data</th>
					      <th>Ver mais</th> 
				        </tr>
			       </tfoot>	
		    	</table>		     		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		      </div>
		    </div>
		  </div>
		</div>
		<div class="modal fade" id="Des2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<form action="PHP/Admin_Bloqueio_users.php" method="post">
			      	<div class="row">
			      		<div class="col-sm-6">
			      		<label>O usuario estar:</label>
			     	 		<select class="form-control" name="Status">
			      				<option value="1">Já cadastrado</option>
			      				<option value="2">Ainda não foi cadastrado</option>
			      			</select>
			     	 	</div>
			     	 	<div class="col-sm-6">
			      			<label>Qual o motivo</label>
			     	 		<input type="text"  required="" class="form-control"  maxlength="100" name="Motivo" />
			     	 	</div>
			     	 </div>
			     	 <div class="row">
			     	 	<div class="col-sm-6">
			      			<label>CPF</label>
			     	 		<input type="text" name="CPF_Bloqueado"  required="" class="form-control" placeholder="Preencha desta forma(999.999.999-99)" maxlength="14" />
			     	 	</div>
			     	 	<div class="col-sm-6">
			      			<label>Email</label>
			     	 		<input type="email" required="" maxlength="105" class="form-control" name="Email_Bloqueado">
			     	 	</div>
					</div>
					<div class="row">
			     	 	<div class="col-sm-12">
			     	 		<label class="form-control" style="color: red;">Caso o usuario já esteja cadastrado o perfil dele será excluído,e ele ficara bloqueado para um novo cadastro</label>
			     	 	</div>
			     	 	<div style="display: none;">
			      			<label>Email</label>
			     	 		<input type="text" value="<?php echo  $logado ?>" name="Administrador" >
			     	 	</div>		 		     	 		 
			      	</div>
				</div>
		      <div class="modal-footer">
		      	<button type="submit" class="btn btn-danger">Bloquear</button>
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			  </form>
		      </div>
		    </div>
		  </div>
		</div>
		<br /><br /><br /><br /><br /><br />
		<div class="col-md-offset-4 col-md-4">
  				<div class="box1">
    			<img src="IMG/Logo.png" style="width: 70%; height: 15%;" class="img-circle img-thumbnail">
        		<br /> <br />     
		          <h3>TecnoHelp</h2>
		        <h4 style="color:#A9ABA6">{ A Tecnologia criando soluções }</h4>
				</div>
  			</div>
		</div>
		<div id="particles"></div>
		<svg id="svg-source" height="0" version="1.1" 
		  xmlns="http://www.w3.org/2000/svg" style="position:absolute; margin-left: -100%" 
		  xmlns:xlink="http://www.w3.org/1999/xlink">
		</body>
		<p align="center" >
			
			&copy; Copyright  by Matheus
		</p>
	</div>	
