<?php
	function seguranca_adm(){
		if((empty($_SESSION['usuarioId'])) || (empty($_SESSION['usuarioNiveisAcessoId']))){		
			$_SESSION['loginErro'] = "Área restrita 1- ";
			header("Location: index.php");
		}else{
			if($_SESSION['usuarioNiveisAcessoId'] != "1"){
				$_SESSION['loginErro'] = "Área restrita 2 - ";
				header("Location: index.php");
			}
		}
	}
?>