<?php
	session_start();
	unset(
		$_SESSION['usuarioId'],
		$_SESSION['usuarioNome'],
		$_SESSION['usuarioNiveisAcessoId'] ,
	);
	
	$_SESSION['loginDeslogado'] = "Deslogado com Sucesso";
	header("Location: index.php");
?>