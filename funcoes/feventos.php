<?php
function addEvento($evento, $data, $horario, $local = 'Templo local')
{
$dados = array($evento, $data, $horario, $local);
$sql = "select idEvento from eventos where evento = ? and dataEvento = ? and horario = ? and localEvento =?";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 0)
	{
	$sql ="insert into eventos(evento, dataEvento, horario, localEvento) values(?,?,?,?)";
	$query = conecta()->prepare($sql);
	$query->execute($dados);
		if($query->rowCount() == 1)
		{
		return 1;
		}else{
			return 0;
			}
	}else{
		return 0.5;
		}
}
function listaEventos($mes)
{
$ano = date('Y');
$dados = array($mes, $ano);
$sql = "select idEvento, evento, horario, dataEvento, localEvento from eventos where MONTH(dataEvento) = ? and YEAR(dataEvento) = ?";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 0)
	{
	return 0;
	}else{
			while($row = $query->fetch(PDO::FETCH_ASSOC))
			{
			$lista[] = $row;
			}
		return $lista;
		}
}
function delEvento($id)
{
$dados = array($id);
$sql = "select idEvento from eventos where idEvento = ?";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 1)
	{
	$sql = "delete from eventos where idEvento = ?";
	$query = conecta()->prepare($sql);
	$query->execute($dados);
		if($query->rowCount() == 1)
		{
		return 1;
		}else{
			return 0;
			}
	}else{
		return 0.5;
		}
}
?>