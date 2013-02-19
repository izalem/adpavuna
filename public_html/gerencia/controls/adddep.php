<?php
$dep = strip_tags($_POST['dep']);
$legenda = strip_tags($_POST['legenda']);
if(empty($dep))
{
echo'Digite o nome do Departamento';
exit;
}
	if(strlen($dep) > 80)
	{
	$dep = substr($dep, 0, 80);
	}
if(empty($legenda))
{
echo'Descreva o departamento';
exit;
}
require('../../../funcoes/fconn.php');
require('../../../funcoes/fdep.php');
$add = addDep($dep,$legenda);
switch($add)
{
case 0:
echo'Não foi possível cadastrar o departamento neste momento';
break;
case 0.5:
echo'Departamento já cadastrado';
break;
case 1:
echo'Departamento cadastrado com sucesso';
break;
}
?>			