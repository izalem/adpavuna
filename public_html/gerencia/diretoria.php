<?php
session_start();
require('../../funcoes/fconn.php');
require('../../funcoes/fdiretoria.php');
require('../../funcoes/fcripto.php');
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<title>Diretoria</title>
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
		&nbsp
		</div>
			<div id="content">
				<div id="conteudo">
				<h2>Diretoria:</h2>
				<p><a href="editdir.php">Configurar Página</a></p>
				</div>
					<div class="conteudo">
					<?php
					$dados = mostraDir();
					if(is_array($dados))
					{
						for($i = 0; $i < count($dados); $i++)
						{
						$row = $dados[$i];
						echo'<p>Presidente: '.$row['presidente'].'</p>';
						echo'<p>Vice-Presidente: '.$row['vicepresidente'].'</p>';
						echo'<p>Secretário: '.$row['secretario'].'</p>';
						echo'<p>Tesoureiro: '.$row['tesoureiro'].'</p>';
						echo'<p><a href="deldir.php?evento='.$row['idDiretoria'].'">Excluir</a></p>';
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