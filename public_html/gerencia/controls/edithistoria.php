<?php
$post = strip_tags($_POST['post']);
if(empty($post) and strlen($post) < 50)
{
echo'Seu texto está muito curto';
exit;
}
require('../../../funcoes/fconn.php');
require('../../../funcoes/fhistoria.php');
$add = addHistoria($post);
if($add == 0)
{
echo'Não foi possível publicar a página neste momento';
}else{
	echo'Página publicada com sucesso';
	}
?>