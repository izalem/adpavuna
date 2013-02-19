<?php
require('../funcoes/fconn.php');
require('../funcoes/fcripto.php');
require('../funcoes/fpastoral.php');
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
				<div class="devocionalhome">
				<?php
					$dados = devocionalHome();
					if(is_array($dados))
					{
						for($i = 0; $i < count($dados); $i++)
						{
						$row = $dados[$i];
						$id= $row['idPost'];
						echo'<p class="titulo">'.$row['titulo'].'</p>';
						$post = explode(' ', $row['post']);
						
						}
								for($z= 0; $z <= 20; $z++)
								{ 	
								echo nl2br($post[$z]).' ';
								}
						echo'<a href="devocional.php?post='.confundeSessao($id).'">Ler +</a></p>';	
					}
				?>
				</div>
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