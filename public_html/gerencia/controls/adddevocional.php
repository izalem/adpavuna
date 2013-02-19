<?php
$dep = strip_tags($_POST['dep']);
$legenda = strip_tags($_POST['legenda']);
if(empty($dep))
{
echo'Sua postagem não possui título';
exit;
}
	if(strlen($dep) > 80)
	{
	echo'Título muito grande';
	exit;
	}
if(empty($legenda))
{
echo'Sua mensagem está em banco ou é muito curta';
exit;
}
require('../../../funcoes/fconn.php');
require('../../../funcoes/fpastoral.php');
$add = addPastoral($dep, $legenda);
switch($add)
{
case 0:
echo'Não foi possível publicar sua mensagem neste momento';
break;
case 0.5:
echo'Mensagem  já publicada';
break;
case 1:
echo'Mensagem publicada com sucesso';
break;
}
?>			