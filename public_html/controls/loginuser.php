<?php
session_start();
$email = strip_tags($_POST['login']);
$senha = strip_tags($_POST['senha']);
if(strcasecmp($_POST['token'], $_SESSION['token'] != 0)
{
	echo'Ocorreu um erro no sistema';
	exit;
}
	if(empty($email))
	{
		echo'E-mail não informado';
		exit;
	}
		if(empty($senha))
		{
			echo'Informe sua senha';
			exit;
		}
require('../../funcoes/fconn.php');
require('../../funcoes/fuser.php');
$loga = logiUser($email, $senha);
if($loga == 0)
{
	echo'E-mail ou senha incorretos';
}else{
		if(is_array($loga))
		{
			$_SESSION['userLog'] == $loga[0];
			$_SESSION['nomeUser'] == $loga[1];
			header("LOCATION: home.php");
		}
}		
?>