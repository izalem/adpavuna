<?php
$presidente = strip_tags($_POST['presidente']);
$vice = strip_tags($_POST['vice']);
$secr = strip_tags($_POST['secretario']);
$tesou = strip_tags($_POST['tesoureiro']);
if(empty($presidente))
{
echo'Informe o nome do Presidente';
exit;
}
	if(empty($vice))
	{
	echo'Informe o nome do vice-presidente';
	exit;
	}
		if(empty($sec))
		{
		$sec = '';
		}
			if(empty($tesou))
			{
			$tesou = '';
			}
require('../../../funcoes/fconn.php');
require('../../../funcoes/fdiretoria.php');
$add = editDiretoria($presidente, $vice, $secr, $tesou);
switch($add)
{
case 0:
echo'Não foi possível editar a diretoria neste momento';
break;
case 1:
echo'Cadastro realizado com sucesso';
break;
}
?>