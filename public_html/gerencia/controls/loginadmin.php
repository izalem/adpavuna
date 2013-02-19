<?php
session_start();
$admin = strip_tags($_POST['admin']);
$pass = strip_tags($_POST['passadmin']);
if(strcasecmp($_SESSION['token'], $_POST['token'] != 0)
{
echo'Não foi possível acessar o sistema';
exit;
}
if(empty($admin))
{
echo'login não informado';
exit;
}
	if(empty($pass))
	{
	echo'Senha não informada';
	exit;
	}
require('../../../funcoes/fconn.php');	
require('../../../funcoes/fadmin.php');
$loga = loginAdmin($nome, $senha);
if($loga == 0)
{
echo'Dados incorretos';
}else{
		if(is_array($loga))
		{
		$_SESSION['admin'] = $loga[0];
		$_SESSION['tipoAdmin'] = $loga[2];
		$_SESSION['nomeAdmin'] = $loga[1];
		header("LOCATION: home.php");
		}
	}
?>	