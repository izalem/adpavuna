<?php
function addUser($nome, $sobrenome, $email, $senha, $dataNasc, $sexo)
{
	$dados = array($email);
	$sql = "select idUser from users where emailUser = ?";
	$query = conecta()->prepare($sql);
	$query->execute($dados);
		if($query->rowCount() == 0)
		{
			$dados = array($nome, $sobrenome, $email, sha1($senha), $dataNasc, $sexo, 0);
			$sql = "insert into users (nomeUser, sobrenomeUser, emailUser, senhaUser, dataNasc, sexoUser, statusUser) values(?,?,?,?,?,?,?)";
			$query = conecta()->prepare($sql);
			$query->execute($dados);
				if($query->rowCount()== 1)
				{
					return 1;
				}else{
					return 0;
				}
		}else{
			return 0.5;
		}

}
function loginUser($email, $senha)
{
	$dados = array($email, $senha);
	$sql = "select idUser, nomeUser from users where emailUser = ? and senhaUser =? ";
	$query = conecta()->prepare($sql);
	$query->execute($dados);
		if($query->rowCount() == 1)
		{
			while($row = $query->fetch(PDO::FETCH_ASSOC))
			{
				$id = $row['idUser'];
				$nome = $row['nomeUser'];
			}
			return array($id, $nome);
		}else{
			return 0;
		}	
}
function validaUser($user, $nome)
{
	$dados = array($user, $nome);
	$sql = "select idUser, nomeUser from users where idUser = ? and nomeUser = ?";
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