<?php
function addBio($post, $img)
{
$dados = array($post, $img);
$sql = "select idBio from bioPastor limit 1 ";
$query = conecta()->prepare($sql);
$query ->execute($dados);
	if($query->rowCount() == 0)
	{
	$sql = "insert into bioPastor (biografia, imgPastor) values(?,?)";
	$query = conecta()->prepare($sql);
	$query->execute($dados);
		if($query->rowCount() == 1)
		{
		return 1;
		}else{
			return 0;
			}
	}else{
		while($row = $query->fetch(PDO::FETCH_ASSOC))
		{
		$id = $row['idBio'];
		}
		$dados = array($post, $id);
		$sql = "update bioPastor set biografia = ? where idBio = ?";
		$query = conecta()->prepare($sql);
		$query->execute($dados);
			if($query->rowCount() == 1)
			{
			return 1;
			}else{
				return 0;
				}
		}
}
function mostraBio()
{
$sql = "select idBio, biografia, imgPastor from bioPastor limit 1";
$query = conecta()->prepare($sql);
$query ->execute($dados);
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