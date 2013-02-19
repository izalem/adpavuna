<?php
$post = strip_tags($_POST['post']);
if(empty($post) and strlen($post) < 50)
{
echo'Seu texto está muito curto';
exit;
}
require('../../../funcoes/fimagens.php');
require('../../../funcoes/fconn.php');
require('../../../funcoes/fbio.php');
$img = $_FILES['img'];
if(! verificaImagem($img))
{
echo'Selecione uma imagem do pastor';
exit;
}
$size = (1024 * 1024 * 2);
	if(! verificaSize($img, $size))
	{
	echo'Imagem muito grande';
	exit;
	}
		$ext = array('jpg', 'gif', 'png');
		if(verificaExtensao($img, $ext))
		{
		echo'O arquivo carregado não é uma imagem válida';
		exit;
		}
$pasta = '../../imagens/';
$upload = uploadImagem($img, $pasta, 'pastor');	
$add = addBio($post, $upload[1]);
if($add == 1)
{
require('../../../funcoes/WideImage.php');
$img = WideImage::loadFromFile($upload[0]);
$img = $img->resize(200, 200, 'inside');
$img->saveToFile($upload[0]);
echo'Página publicada com sucesso';
}else{
	unlink($upload[0]);
	echo'Não foi possível publicar a página neste momento';
	}


?>