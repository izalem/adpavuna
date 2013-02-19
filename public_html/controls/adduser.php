<?php
$nome = strip_tags($_POST['nome']);
$sobrenome = strip_tags($_POST['sobrenome']);
$email = strip_tags($_POST['email']);
$senha = strip_tags($_POST['senha']);
$dia = doubleval($_POST['dia']);
$mes = doubleval($_POST['mes']);
$ano = doubleval($_POST['ano']);
$sexo = strip_tags($_POST['sexo']);
if(empty($nome))
{
	echo'Por favor, informe seu nome';
	exit;
}
	if(strlen($nome) > 30)
	{
		$nome = substr($nome, 0, 30);
	}
if(empty($sobrenome) and strlen($sobrenome) < 3)
{
	echo'Seu sobrenome é necessário';
	exit;
}	
	if(strlen($sobrenome) > 80)
	{
		$sobrenome = substr($sobrenome, 0, 80);
	}
require('../../funcoes/fconn.php');
require('../../funcoes/fvalidar.php');
require('../../funcoes/fuser.php');
if(empty($email))
{
	echo'É necessário  um e-mail';
	exit;
}
	if(validaEmail($email) == false)
	{
		echo'E-mail informado não é válido';
		exit;
	}
if(empty($senha))
{
	echo'Você necessita de uma senha';
	exit;
}	
	if(strlen($senha) < 8)
	{
		echo'Sua senha deve ter no mínimo 8 caracteres';
		exit;
	}
		if(validaSenha($senha) == false)
		{
			echo'Sua senha deve ter letras e números';
			exit;
		}
if ($sexo != 'Feminino' and $sexo != 'Masculino') 
{
	echo'Selecione seu sexo';
	exit;
}
	if(! checkdate($mes, $dia, $ano))
	{
		echo'Data de nascimento não  informada ou inválida';
		exit;
	}
$dataNasc = $ano.'-'.$mes.'-'.$dia;
$add =addUser($nome, $sobrenome, $email, $senha, $dataNasc, $sexo);
switch($add)
{
	case 0:
	echo'Não foi possível criar sua conta neste momento';
	break;
	case 0.5:
	echo'E-mail já utilizado por outra conta';
	break;
	case 1:
	echo'Conta criada com sucesso';
	break;
}
?>	