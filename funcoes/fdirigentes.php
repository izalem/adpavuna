<?php
function addPastor($nome, $senha, $igreja)
{
$dados = array($nome, $igreja);
$sql = "select idPastor from dirigentes where nomePastor = ? and iIgreja = ?";
$query = conecta()->prepare($sql);
$query ->execute($dados);
	if($query->rowCount() == 0)
	{
	$dados = array($nome, sha1($senha), $igreja);
	$sql = "insert into dirigentes(nomePastor, senhaPastor, iIgreja) values(?,?,?)";
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
function atualizaSenha($sec, $senha, $nsenha)
{
$dados = array($sec, $senha);
$sql = "select idPastor from dirigentes where idPastor = ? and senhaPastor = ?";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 1)
	{
	$dados = array($nsenha, $senha);
	$sql = "update dirigentes Set senhaPastor = ? where idPastor = ?";
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
function listaPastor()
{
$dados = array($igreja);
$sql = "select idPastor, nomePastor, bairro, tipo from dirigentes Inner Join igrejas on dirigentes.iIgreja = igrejas.idIgreja ";
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
function logaPastor($nome, $senha)
{
$dados = array($nome, sha1($senha));
$sql = "select nomePastor, senhaPastor, iIgreja, tipo, idPastor  from dirigentes Inner Join igrejas On dirigentes.iIgreja = igrejas.idIgreja where nomePastor = ? and senhaPastor = ?";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 1)
	{
		while($row = $query->fetch(PDO::FETCH_ASSOC))
		{
		$igreja = $row['iIgreja'];
		$pastor = $row['nomePastor'];
		$tipo = $row['tipo'];
		$id = $row['idPastor'];
		}
		return array($id, $pastor, $igreja, $tipo);
	}else{
		return 0;
		}
}
?>