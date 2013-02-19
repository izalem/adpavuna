<?php
$nome = strip_tags($_POST['album']);
if(empty($nome))
{
echo'O álbum precisa de um nome';
exit;
}
	if(strlen($nome) > 100)
	{
	echo'Nome do álbum miuto grande';
	exit;
	}
require('../../../funcoes/fconn.php');
require('../../../funcoes/fimagens.php');
$add = criaAlbum($nome);
switch($add)
{
case 0:
echo'Não foi possível criar o álbum neste momento';
break;
case 0.5:
echo'Já existe um álbum com o mesmo nome';
break;
case 1:
echo 2;
break;
}
?>	