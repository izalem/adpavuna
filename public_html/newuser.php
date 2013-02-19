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
				<h2>Participar</h2>
				<p>Ao cadastrar-se em nosso site, você terá uma maior interação com nossa igreja.</p>
				<p>Podendo enviar e receber mensagens de membros, pedir oração, contar um testemunho e muito mais.</p>
				<p>Preencha o formulário abaixo e crie sua conta.</p>
				</div>
					<div class="conteudo">
					<form action="controls/adduser.php" method="post">
					<p><label for="nome">Seu nome:</label><input type="text" name="nome" id="nome" /></p> 
					<p><label for="sobrenome">Sobrenome:</label><input type="text" name="sobrenome" id="sobrenome" /></p>
					<p><label for="email">E-mail:</label><input type="text" name="email" id="email" /></p>
					<p><label for="senha">Senha:</label><input type="password" name="senha" id="senha" /></p>
					<p><label for="sexo">Sexo: </label><input type="radio" name="sexo" value="Feminino" />Feminino <input type="radio" name="sexo" value="Masculino" />Masculino</p>
					<p><label for="datanasc">Data de Nascimento: </label>
					<select name="dia" id="dia">
					<option value="">Dia</option>
					<?php
					for($i = 1; $i <= 31; $i++)
					{
						echo'<option value="'.$i.'">'.$i.'</option>';
					}
					?>
					</select>
					<select name="mes" id="mes">
					<option value="">Mês</option>
					<?php
					for($i = 1; $i <= 12; $i++)
					{
						echo'<option value="'.$i.'">'.$i.'</option>';
					}
					?>
					</select>
					<select name="ano" id="ano">
					<option value="">Ano</option>
					<?php
					for($i = 1935; $i <= (date('Y')-14); $i++)
					{
						echo'<option value="'.$i.'">'.$i.'</option>';
					}
					?>
					</select></p>
					<input type="text" name="oculto" id="oculto" style="display: none" />
					<input type="submit" value="Criar Conta" />
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