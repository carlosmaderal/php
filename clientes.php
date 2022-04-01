  <?php
	session_start();
	include_once("suporte/seguranca_01.php");
	include_once("suporte/conexao/conexao.php");
	include("suporte/header.php");
	seguranca_adm();
	
?>

	<div class="container theme-showcase" role="main">
		<div class="page-header">
			<h1>Clientes</h1>
          
	<form method="POST" id="form-pesquisa" action="">
        	<label>Pesquisar: </label>
			<input type="text" name="pesquisa" id="pesquisa" placeholder="Digite o nome do cliente">
    </form>
          
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Id externo</th>
							<th>Nome</th>
							<th>Situação</th>
							<th>Venda</th>
							<th>Projeto</th>
                            <th>Frete</th>
							<th>Instalação</th>
                            <th>Ações</th>
						</tr>
					</thead>
		
		<tbody class="resultado">
		<?php

$usuarios = "";

//Pesquisar no banco de dados nome do usuario referente a palavra digitada
$result_user = "SELECT * FROM clientes ORDER BY id DESC LIMIT 20";
$resultado_user = mysqli_query($conn, $result_user);

if(($resultado_user) AND ($resultado_user->num_rows != 0 )){
	while($row_user = mysqli_fetch_assoc($resultado_user)){
      $id = $row_user['id'];
      	echo "<tr>";
		echo "<td>".$id."</td>";
      	echo "<td>".$row_user['id_int']."</td>";
        echo "<td>".$row_user['nome']."</td>";
        echo "<td>".$row_user['situacao']."</td>";
      if($row_user['venda'] == 1){echo '<td>&#9989;</td>';} else{echo '<td>&#10060;</td>';}
      if($row_user['projeto'] == 1){echo '<td>&#9989;</td>';} else{echo '<td>&#10060;</td>';}
      if($row_user['frete'] == 1){echo '<td>&#9989;</td>';} else{echo '<td>&#10060;</td>';}
      if($row_user['instalacao'] == 1){echo '<td>&#9989;</td>';} else{echo '<td>&#10060;</td>';}
      echo "<td>
<a href='cliente/visualizar.php?id=".$id."'><button type='button' class='btn btn-xs btn-primary'>Visualizar</button></a>
<a href='cliente/modificar.php?id=".$id."'><button type='button' class='btn btn-xs btn-warning'>Editar</button></a>
<a href='cliente/deletar.php?id=".$id."'><button type='button' class='btn btn-xs btn-danger'>Apagar</button></a>";
      
      echo "</tr>";
 
	}
}else{
	echo "Nenhum cadastro encontrado ...";
}
        ?>
		</tbody>
						             
					
				</table>
			</div>
		</div>
	</div>
<?php
include("suporte/footer.php");
?>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script type="text/javascript" src="filtro_busca_cliente.js"></script>
