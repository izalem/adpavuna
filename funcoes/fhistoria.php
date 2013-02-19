<?php
function addHistoria($post)
{
$dados = array($post);
$sql = "select idHistoria from historia limit 1 ";
$query = conecta()->prepare($sql);
$query ->execute($dados);
	if($query->rowCount() == 0)
	{
	$sql = "insert into historia (post) values(?)";
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
		$id = $row['idHistoria'];
		}
		$dados = array($post, $id);
		$sql = "update historia set post = ? where idHistoria = ?";
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
function mostraHistoria()
{
$sql = "select idHistoria, post from historia limit 1";
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