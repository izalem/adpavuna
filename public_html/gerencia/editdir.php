<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<title>Editar Diretoria</title>
<meta charset="utf-8" />
<?php
require('../../funcoes/fconn.php');
require('../../funcoes/fdiretoria.php');
?>
</head>
<body>
<form action="controls/adddiretoria.php" method="post">
<?php
$dados = mostraDir();
	if(is_array($dados))
	{
		for($i = 0; $i < count($dados); $i++)
		{
		$row = $dados[$i];
		$pres = $row['presidente'];
		$vice = $row['vicePresidente'];
		$secr = $row['secretario'];
		$tesou = $row['tesoureiro'];
		}
	}
?>	
<p><label for="presidente">Presidente: </label><input type="text" name="presidente" id="presidente" value="<?php echo $pres;?>" /></p>
<p><label for="vice">Vice-Presidente: </label><input type="text" name="vice" id="vice" value="<?php echo $vice;?>"/></p>
<p><label for="secretario">Secretário: </label><input type="text" name="secretario" id="secretario" value="<?php echo $secr;?>"/></p>
<p><label for="tesoureiro">Tesoureiro: </label><input type="text" name="tesoureiro" id="tesoureiro" value="<?php echo $tesou;?>"/></p>
<input type="submit" value="Editar" />
</form>
</body>
</html>