<?php
require('../funcoes/fconn.php');
require('../funcoes/ftestemunhos.php');
require('../funcoes/fcripto.php');
require('../funcoes/fvalidar.php');
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<title>Assembléia de Deus em Pavuna Uma igreja que cuida da família</title>
<meta charset="utf-8" />
<script type="text/javascript" src="js/jquery.js"></script>
<meta name="author" content="izalem Nascimento" />
<meta name="keywords" content="igreja, assembléia de deus, pavuna" />
<meta name="description" content="Site da igreja evangélica assembléia de Deus em pavuna e suas congregações" />
<link rel="stylesheet" href="css/estilo.css" type="text/css" />
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
				<div id="conteudo">
				<h2>Testemunhos:</h2>
				<p>Veja o que Deus tem realizado na vida daquele que crê</p>
				<form action="controls/addtestemunho.php" method="post">
				<p><label for="nome">Seu Nome: </label><input type="text" name="nome" id="nome" /></p>
				<p><label for="email">Seu E-mail:</label><input type="text" name="email" id="email" /></p>
				<p><label for="post">Conte seu testemunho:</label><textarea cols="30" rows="3" name="post" id="post"></textarea></p>
				<input type="submit" value="Postar" />
				</form>
				</div>
				<?php
				listaTestemunhos();
				?>
					
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