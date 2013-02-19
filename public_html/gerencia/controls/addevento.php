<?php
$evento = strip_tags($_POST['evento']);
$dia = doubleval($_POST['dia']);
$mes = doubleval($_POST['mes']);
$ano = doubleval($_POST['ano']);
$horas = doubleval($_POST['horas']);
$minutos = doubleval($_POST['minutos']);
$local = strip_tags($_POST['local']);
if(empty($evento) and strlen($evento) < 5)
{
echo'Você não informou um evento';
exit;
}
	if(strlen($evento) < 100)
	{
	$evento = substr($evento, 0, 100);
	}
if(! checkdate($mes, $dia, $ano))
{
echo'Data do evento não informada ou inválida';
exit;
}
	if(empty($horas) and $horas < 1 or empty($minutos) and $minutos < 1)
	{
	echo'Informe o horário do evento';
	exit;
	}
		if($horas > 23 and $minutos > 59)
		{
		echo'Horário informado não é válido';
		exit;
		}
$horas = $horas.':'.$minutos.':00';
$data = $ano.'-'.$mes.'-'.$dia;
require('../../../funcoes/fconn.php');
require('../../../funcoes/feventos.php');
$add = addEvento($evento, $data, $horas);
switch($add)
{
case 0:
echo'Não foi possível publicar o evento neste momento';
break;
case 0.5:
echo'Evento já publicado';
break;
case 1:
echo'Evento publicado com sucesso';
break;
}
?>		