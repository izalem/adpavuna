<?php
session_start();
require('../../../funcoes/fconn.php');
require('../../../funcoes/fimagens.php');
$img = $_FILES['img'];
$album = $_SESSION['album'];
if(!is_numeric($album))
{
$album = '';
}
if(! verificaImagem($img))
{
echo'Selecione uma imagem';
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
	$upload = uploadImagem($img, $pasta, ' ');
	$add = addFoto($album, $upload[1]);
	if($add == 1)
	{
	require('../../../funcoes/WideImage.php');
	$img = WideImage::loadFromFile($upload[0]);
	$img = $img->resize(400, 300, 'inside');
	$img->saveToFile($upload[0]);
	echo'Imagem carregada com sucesso';
	}else{
		unlink($upload[0]);
		echo'Não foi possível carregar a imagem';
		}
?>