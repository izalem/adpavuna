<?php
function addIgreja($endereco, $bairro, $cidade, $uf, $tipo)
{
$dados = array($endereco, $bairro);
$sql = "select idIgreja from igrejas where endereco = ? and bairro = ?";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query ->rowCount() == 0)
	{
	$dados = array($endereco, $bairro, $cidade, $uf, $tipo);
	$sql = "insert into igrejas(endereco, bairro, cidade, uf, tipo) values(?,?,?,?,?)";
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
function listaIgrejas()
{
$sql = "select idIgreja, endereco, bairro, cidade, uf, tipo from igrejas  order by tipo";
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
?>