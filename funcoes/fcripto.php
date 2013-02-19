<?php
function confundesessao($n)
{
$n = (($n * 33) + 120000198)*(44);
return($n);
}
function desconfundesessao($n)
{
$n = (($n / 44) - 120000198) / (33);
return($n);
}
function InvertData($data)
{
$dia = substr($data, 8,2);
$mes = substr($data, 5, 2);
$ano = substr($data, 0, 4);
$data = $dia.'/'.$mes.'/'.$ano;
return $data;
} 
function redirect($pagina)
{
	if($pagina)
	{
	header("LOCATION: $pagina");
	exit;
	}
}
?>