<?php
session_start();
$token = sha1(uniqid(time()));
$_SESSION['token'] = $token;
require('../../funcoes/fconn.php');
require('../../funcoes/fadmin.php');
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<title>Acessar painel de controle</title>
<link rel="stylesheet" href="../css/estilo.css" />
<meta charset="utf-8" />
<script type="text/javascript" src="../js/jquery.js"></script></head>
</head>
<body>
<div id="main_header">
	<div id="header">
		<div id="logo">
		<h1><img src="../imagens/site/logo.png"></h1>
		<p>Painel Administrátivo</p>
		</div>
	</div>
</div>
<div id="main_nav">
	<div id="nav">
	&nbsp
	</div>
</div>
<div id="main_body">
	<div id="body">
		<div id="left">
		&nbsp
		</div>
			<div id="content">
				<div id="conteudo">
				<h2>Acesso ao sistema:</h2>
				<form action="controls/logadmin.php" method="post">
				<p><label for="admin">Admin: </label><input type="text" name="admin" id="admin" /></p> 
				<p><label for="passadmin">Senha: </label><input type="password" name="passadmin" id="passadmin" /></p>
				<input type="hidden" name="token" id="token" value="<?php $token;?>" />
				<input type="submit" value="Entrar" />
				</form>
					</div>
				</div>	
				
	<div class="clear">&nbsp</div>
	</div>
</div>
<div id="main_footer">
	<div id="footer">
	&nbsp
	</div>
</div>
</body>
</html>	