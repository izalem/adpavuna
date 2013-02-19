<?php
session_start();
require('../../funcoes/fconn.php');
require('../../funcoes/fbio.php');
require('../../funcoes/fcripto.php');
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<title>História da Igreja</title>
<link rel="stylesheet" href="../css/estilo.css" />
<meta charset="utf-8" />
<script type="text/javascript" src="../js/jquery.js"></script></head>
</head>
<body>
<div id="main_header">
	<div id="header">
		<div id="logo">
		<h1>Painel Administrátivo</h1>
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
				<h2>Biográfia Pastoral</h2>
				</div>
					<div class="conteudo">
					<?php
					$dados = mostraBio();
					if(is_array($dados))
					{
						for($i = 0; $i < count($dados); $i++)
						{
						$row = $dados[$i];
						}
					}
					?>
					<form action="controls/editbio.php" method="post" enctype="multipart/form-data">
					<p><label for="post">Biográfia Pastoral:</label><textarea cols="30" rows="10" name="post" id="post"><?php echo $row['biografia'];?></textarea></p>
					<p><label for="img">Imagem do Pastor: </label><input type="file" name="img" id="img" /></p>
					<input type="submit" value="Editar" />
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