<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
  <?php
	session_start();
	include_once("../suporte/seguranca_01.php");
	include_once("../suporte/conexao/conexao.php");
	include("../suporte/header.php");
	seguranca_adm();
  
	$id_get = $_GET['id'];

	$result_user = "SELECT * FROM clientes WHERE id = $id_get";
	$resultado_user = mysqli_query($conn, $result_user);
	if(($resultado_user) AND ($resultado_user->num_rows != 0 )){
	while($row_user = mysqli_fetch_assoc($resultado_user)){
		?>
		<div class="container theme-showcase" role="main">
		<div class="page-header">
			<h1>Cliente : <?php echo $row_user['nome']; ?></h1>
		</div>
			
			<!-- Informaçoes do cliente -->			
<div class="container">
<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Informações do cliente</button>
<div id="demo" class="collapse">

	<table class="table">
		<?php
		echo "<thead><tr><th>Id Interno:</th><th>".$row_user['id']."</th><th>Id Externo:</th><th>".$row_user['id_int']."</th></tr></thead>";
		echo "<thead><tr><th>Nome:</th><th>".$row_user['nome']."</th></tr></thead>";
        echo "<thead><tr><th>Endereço:</th><th>".$row_user['endereco']."</th></tr></thead>";
        echo "<thead><tr><th>Contato:</th><th>".$row_user['contato']."</th></tr></thead>";
        echo "<thead><tr><th>Situaçao:</th><th>".$row_user['situacao']."</th></tr></thead>";
      	}
      	?>
	</table>
	  
</div></div><br>
 

			<!-- Informaçoes do Projeto -->
<div class="container">
<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo2">Informações do projeto</button>
<div id="demo2" class="collapse">

		<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nome projeto</th>
							<th>Tensao</th>
							<th>Modulos</th>
							<th>Potencia modulos</th>
                            <th>Inversor</th>
							<th>Concessionaria</th>
							<th>UC</th>
							<th>Tipo UC</th>
							<th>Observaçoes</th>
						</tr>
					</thead>
		
<?php
			$bus_pro = "SELECT * FROM projetos WHERE id_cliente = $id_get";
			$busca_projeto = mysqli_query($conn, $bus_pro);

			while($row_projeto = mysqli_fetch_assoc($busca_projeto)){
?>			<thead>
<?php
		  	echo "<td>".$row_projeto['id']."</td>";
		  	echo "<td>".$row_projeto['nome_projeto']."</td>";     
		  	echo "<td>".$row_projeto['tensao']."</td>";
		  	echo "<td>".$row_projeto['modulos']."</td>";
		  	echo "<td>".$row_projeto['potencia_modulos']."</td>";
		  	echo "<td>".$row_projeto['inversor']."</td>";     
		  	echo "<td>".$row_projeto['concessionaria']."</td>";      
		  	echo "<td>".$row_projeto['uc']."</td>";     
		  	echo "<td>".$row_projeto['tipo_uc']."</td>";     
		  	echo "<td>".$row_projeto['observacoes']."</td>";     
?>			</thead>
<?php	  	
			}
?>
	</table>
</div></div><br>
 

			<!-- Informaçoes Etapas -->
<div class="container">
<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo4">Informações das etapas</button>
<div id="demo4" class="collapse">
	
	<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Etapa</th>
							<th>Descrição</th>
							<th>Data Inicio</th>
							<th>Data fim</th>
                            <th>Estado</th>
						</tr>
					</thead>
		
<?php
			$bus_eta = "SELECT * FROM etapas WHERE id_cliente = $id_get";
			$busca_etapa = mysqli_query($conn, $bus_eta);

			while($row_etapa = mysqli_fetch_assoc($busca_etapa)){
?>			<thead>
<?php
		  	echo "<td>".$row_etapa['id']."</td>";
		  	echo "<td>".$row_etapa['etapa']."</td>";     
		  	echo "<td>".$row_etapa['descricao']."</td>";
		  	echo "<td>".$row_etapa['data_inicio']."</td>";
		  	echo "<td>".$row_etapa['data_fim']."</td>";
		  	echo "<td>".$row_etapa['estado']."</td>";     
?>			</thead>
<?php	  	
			}
?>
		</table>
</div></div><br>
 	
			
			<!-- Informaçoes dos Anexos  -->
<div class="container">
<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3">Anexos do cliente</button>
<div id="demo3" class="collapse">
	
	ANEXOS:
	<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nome do arquivo</th>
						</tr>
					</thead>
		
		  	<?php
		  	//Inicia a parte de consulta de imagens
			$bus_doc = "SELECT * FROM documentos WHERE id_cliente = $id_get";
			$busca_documento = mysqli_query($conn, $bus_doc);

			while($row_etapa = mysqli_fetch_assoc($busca_documento)){
?><thead><?php
	echo "<td>".$row_etapa['id']."</td>";
	echo "<td><a href='https://carlosmaderal.com/adm/cadastro/upload/".$row_etapa['caminho']."'>".$row_etapa['caminho']."</a></td>";  
?></thead><?php	  	
			}}
			?>
		</table>
	
			
</div></div><br>
 
		
	
		
		
		</div>
<?php
include("../suporte/footer.php");
?>

  
</body>
</html>
