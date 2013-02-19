<?php
function addAdmin($nome, $senha, $tipo)
{
	$dados = array($nome, $senha);
	$sql = 	"select idAdmin from gerencia where nomeAdmin = ?";
	$query = conecta()->prepare($sql);
	$query->execute($dados);
		if($query->rowCount == 0)
		{
			$dados = array($nome, sha1($senha));
			$sql = "insert into gerencia(nomeAdmin, senhaAdmin, tipo) values(?,?,?)";
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
function loginAdmin($nome, $senha)
{
	$dados = array($nome, sha1($senha));
	$sql = "select idAdmin, nomeAdmin, tipoAdmin from gerencia where nomeAdmin = ? and senhaAdmin= ?";
	$query = conecta()->prepare($sql);
	$query->execute($dados);
		if($query->rowCount() == 1)
		{
			return 1;
		}else{
			return 0;
		}
}
function validaAdmin()
{
	if(empty($_SESSION['adminLog']))
	{
		header("LOCATION: index.php");
	}
}
function criaLogAdmin($id, $data, $horario, $ip)
{
	$sql = "insert into logAdmin(iAdmin, dataLogin, horarioLogin, ip) values(?,?,?,?)";
	$query = conecta()->prepare($sql);
	$query->execute($dados);
		if($query->rowCount() == 1)
		{
			return 1;
		}else{
			return 0;
		}
}
?>