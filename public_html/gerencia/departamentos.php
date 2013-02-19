<?php
session_start();
require('../../funcoes/fconn.php');
require('../../funcoes/fdep.php');
require('../../funcoes/fcripto.php');
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<title>Departamentos e Ministérios</title>
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
				<h2>Departemantos e Ministérios</h2>
				<p><a href="newdep.php">Adicionar Novo</a></p>
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
							for($i = 0; $i < count($dados); $i++)
							{
							$row = $dados[$i];
							echo'<p>'.$row['departamento'].'</p>';
							echo'<p>'.$row['legenda'].'</p>';
							echo'<p><a href="controls/deldep.php?dep='.confundeSessao($row['idDep']).'">Excluir Departamento</a></p>';
							}
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