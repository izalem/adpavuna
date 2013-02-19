<?php
$nome = strip_tags($_POST['nome']);
$email = strip_tags($_POST['email']);
$post = strip_tags($_POST['post']);
if(empty($nome) and strlen($nome) < 3)
{
echo'Seu nome é necessário';
exit;
}
require('../../funcoes/fvalidar.php');
	if(empty($email))
	{
	echo'Informe seu e-mail';
	exit;
	}
		if(validaEmail($email) == false)
		{
		echo'E-mail inválido';
		exit;
		}
if(empty($post))
{
echo'Você não digitou seu pedido';
exit;
}
	if(strlen($post) < 20)
	{
	echo'Desculpe-nos, mas sua postagem está muito curta';
	exit;
	}
		$npost = explode(' ', $post);
		for($i = 0; $i < count($npost); $i++)
		{
			if(strlen($npost[$i]) > 20)
			{
			$npost[$i] = substr($npost[$i], 0, 20);
			}
		$post = implode(' ', $npost);	
		}
require('../../funcoes/fconn.php');
require('../../funcoes/ftestemunhos.php');
$add = addTestemunho($nome, $email, $post);
if($add == 0)
{
echo'Não foi possível adicionar seu testemunho neste momento<br/>Tente mais tarde';
}elseif($add == 0.5){
	echo'Voce já enviou este mesmo pedido';
	}else{
		echo'Seu testemunho foi cadastrado com sucesso<br />A Deus toda glória';
		}
?>