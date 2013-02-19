<?php
session_start();
require('../../funcoes/fconn.php');
require('../../funcoes/feventos.php');
require('../../funcoes/fcripto.php');
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<title>Eventos</title>
<link rel="stylesheet" href="../css/estilo.css" />
<meta charset="utf-8" />
<script type="text/javascript" src="../js/jquery.js"></script></head>
</head>
<body>
<div id="main_header">
	<div id="header">
		<div id="logo">
		<h1>Painel Administrátivo Eventos</h1>
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
		<?php
		require('navadmin.php');
		?>
		</div>
			<div id="content">
				<div id="conteudo">
				<h2>Eventos:</h2>
				<p><a href="newevento.php">Novo Evento</a></p>
				</div>
					<div class="conteudo">
					<?php
					$mes = date('m');
					$dados = listaEventos($mes);
					if(is_array($dados))
					{
						for($i = 0; $i < count($dados); $i++)
						{
						$row = $dados[$i];
						echo'<p>'.$row['evento'].'</p>';
						echo'<p><a href="deleventos.php?evento='.$row['idEvento'].'">Apagar Evento</a></p>';
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