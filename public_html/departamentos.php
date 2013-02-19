<?php
session_start();
require('../funcoes/fconn.php');
require('../funcoes/fdep.php');
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<title>Departamentos e Ministérios</title>
<link rel="stylesheet" href="css/estilo.css" />
<meta charset="utf-8" />
<script type="text/javascript" src="js/jquery.js"></script>
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
				<h2>Departamentos e Ministérios</h2>
				</div>
					<div class="conteudo">
				<?php
				$dados = listaDep();
				if($dados == 0)
				{
				echo'Nenhum departamento cadastrado';
				}else{
						if(is_array($dados))
						{
							echo'<div class="departamentos">';
							for($i = 0; $i < count($dados); $i++)
							{
							$row = $dados[$i];
							echo'<div class="dep">';
							echo'<p class="titulo">'.$row['departamento'].'</p>';
							echo'<p>'.$row['legenda'].'</p>';
							echo'</div>';
							}
							echo'</div>';
						}
					}
				?>
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