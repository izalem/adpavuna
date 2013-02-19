<?php
function addCulto($dia, $horas, $culto, $igreja)
{
$dados = array($dia, $horas, $igreja);
$sql = "select idCulto from cultos where dia = ? and horario = ? and iIgreja = ?";
$query = conecta()->prepare($sql);
$query ->execute($dados);
	if($query->rowCount() == 0)
	{
	$dados = array($dia, $horas, $culto, $igreja);
	$sql = "insert into cultos(dia, horario, culto, iIgreja) values(?,?,?,?)";
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
function listaCultos($igreja)
{
$dados = array($igreja);
$sql = "select idCulto, dia, culto, horario from cultos where iIgreja = ?";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 0)
	{
	return 0;
	}else{
			while($row = $query->fetch(PDO::FETCH_ASSOC))
			{
			$dados[] = $row;
			}
		}
}
function delCulto($id, $igreja)
{
$dados = array($id, $igreja);
$sql = "select idCulto from cultos where idCulto = ? and iIgreja = ?";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 1)
	{
	$sql = "delete from cultos where idCulto = ? and iIgreja = ?";
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