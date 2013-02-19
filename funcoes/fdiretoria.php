<?php
function editDiretoria($pres, $vice, $secre, $tesou)
{
$dados = array($pres, $vice, $secre, $tesou);
$sql = "select idDiretoria from diretoria limit 1";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 0)
	{
	$sql = "insert into diretoria (presidente, vicepresidente, secretario, tesoureiro) values(?,?,?,?)";
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
			$id = $row['idDiretoria'];
			}
			$dados = array($pres, $vice, $secre, $tesou, $id);
			$sql = "update diretoria set presidente = ?, vicepresidente=?, secretario=?, tesoureiro=? where idDiretoria=?";
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
function mostraDir()
{
$sql = "select idDiretoria, presidente, vicePresidente, secretario, tesoureiro from diretoria limit 1";
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