<?php
function addDep($nome, $descr)
{
$dados = array($nome);
$sql = "select idDep from departamentos where departamento = ?";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 0)
	{
	$dados = array($nome, $descr);
	$sql = "insert into departamentos (departamento, legenda) values(?,?)";
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
function listaDep()
{
$sql = "select idDep, departamento, legenda from departamentos";
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
		return $dados;
		}
}
function delDep($dep)
{
$dados = array($dep);
$sql = "select idDep from departamentos where idDep = ?";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 1)
	{
	$sql = "delete from departamentos where idDep = ?";
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