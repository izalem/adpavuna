<?php
session_start();
require('../funcoes/fconn.php');
require('../funcoes/feventos.php');
require('../funcoes/fcripto.php');
require('../funcoes/fvalidar.php');
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
				<h2>Agenda da Igreja</h2>
				</div>
					<div class="conteudo">
					<?php
					$mes = date('m');
					$dados = listaEventos($mes);
					if(is_array($dados))
					{
						echo'<div class="eventos">';
						for($i = 0; $i < count($dados); $i++)
						{
						$row = $dados[$i];
						echo'<p>'.$row['evento'].'</p>';
						echo'<p>Data: '.invertData($row['dataEvento']). ' Ás '.$row['horario'].'</p>';
						echo'<p>Local: '.$row['localEvento'].'</p>';
						}
						echo'</div>';
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