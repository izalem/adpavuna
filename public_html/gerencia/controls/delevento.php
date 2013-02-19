<?php
require('../../../funcoes/fcripto.php');
$evento = doubleval(desconfundeSessao($_GET['evento']));
if(! is_numeric($evento) and $evento < 1)
{
echo'Desculpe, ocorreu um erro no sistema';
exit;
}
require('../../../funcoes/fconn.php');
require('../../../funcoes/feventos.php');
$del = delEvento($evento);
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