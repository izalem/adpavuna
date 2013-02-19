<?php
require('../../../funcoes/fcripto.php');
$dep = doubleval(desconfundeSessao($_GET['dep']));
if(! is_numeric($dep) and $dep < 1)
{
echo'Desculpe, ocorreu um erro no sistema';
exit;
}
require('../../../funcoes/fconn.php');
require('../../../funcoes/fdep.php');
$del = delDep($dep);
switch($del)
{
case 0:
echo'Não foi possível realizar sua solicitação';
break;
case 0.5:
echo'Departamento não encontrado';
break;
case 1: 
echo'Solicitação realizada com sucesso';
break;
}
?>			