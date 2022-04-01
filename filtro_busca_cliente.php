<?php
//Incluir a conexão com banco de dados
include_once 'suporte/conexao/conexao.php';

$usuarios = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

//Pesquisar no banco de dados nome do usuario referente a palavra digitada
$result_user = "SELECT * FROM clientes WHERE nome LIKE '%$usuarios%' LIMIT 20";
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