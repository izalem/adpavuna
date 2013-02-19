<?php
$album = doubleval($_GET['album']);
if(empty($album) and $album < 1)
{
echo'Ocorreu um erro no sistema';
exit;
}
require('../../../funcoes/fconn.php');
require('../../../funcoes/fimagens.php');
$add = delAlbum($album);
switch($add)
{
case 0:
echo'Não foi possível relizar sua solicitação ';
break;
case 0.5:
echo'Álbum não encontrado';
break;
case 1:
echo 'Solicitação realizada com sucesso';
break;
}
?>