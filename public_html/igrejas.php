<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<title>Assembléia de Deus em Pavuna Uma igreja que cuida da família</title>
<meta charset="utf-8" />
<script type="text/javascript" src="js/jquery.js"></script>
<meta name="author" content="izalem Nascimento" />
<meta name="keywords" content="igreja, assembléia de deus, pavuna" />
<meta name="description" content="Site da igreja evangélica assembléia de Deus em pavuna e suas congregações" />
<script type="text/javascript">
$(document).ready(function(){
	$('li.nav ul.subnav').hide();	
		$('li.nav').mouseover(function(){
		$('ul.subnav').show();
		});
			$('li.nav').mouseout(function(){
			$('ul.subnav').hide();
			});
})
</script>
<link rel="stylesheet" href="css/estilo.css" type="text/css" />
</head>
<body>
<div id="main_header">
	<div id="header">
		<div id="logo">
		<h1><img src="imagens/site/logo.png" /></h1>
		</div>
	</div>
</div>
<div id="main_nav">
	<div id="nav">
	<?php
	require('nav.php');
	?>
	</div>
</div>
<div id="main_body">
	<div id="body">
		<div id="left">
		<?php require('navvert.php')?>
		</div>
			<div id="content">
			<h2>Nossas Congregações</h2>
			<div class="conteudo">
			<p class="titulo">Congregação Bangu</p>
			<p>Rua Castro Alves, 203 Bangu</p>
			<p class="titulo">Congregação Curicica</p>
			<p>Rua Castro Alves, 203 Bangu</p>
			<p class="titulo">Congregação Cosmos</p>
			<p>Rua Castro Alves, 203 Bangu</p>
			</div>
		<div class="clear"></div>
	</div>
</div>	
<div id="main_footer">		
	<div id="footer">
	<?php
	require('footer.php');
	?>
	</div>
</div>
</body>
</html>	