<?php
function addPedido($nome, $email)
{
$data = date('Y-m-d');
$dados = array($email, $data);
$sql = "select idPedido from conselhos where email =? and dataPedido = ?";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query ->rowCount() == 0)
	{
	$dados = array($nome, $email, $data);
	$sql = "insert into conselhos (autor, email, dataPedido) values(?,?,?)";
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
function listaConselho()
{
$limite = 10;
$pagina = doubleval($_GET['pag']);
if($pagina)
{
$pagina = $pagina;
}else{
	$pagina = 1;
       }
$inicio = ($pagina * $limite) - $limite;
$sql = "select idPedido, autor, dataPedido from conselhos order by dataPedido desc limit $inicio, $limite";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 0)
	{
	echo'<p>Não há pedidos de oração</p>';
	}else{
			while($row = $query ->fetch(PDO::FETCH_ASSOC))
			{
			echo'<p>'.$row['autor'].'</p>';
			echo'<p>'.$row['email'].'</p>';
			echo'<p>Data Pedido: '.invertData($row['dataPost']).'</p>';
			$script = $_SERVER['PHP_SELF'];
				if($script == '/gerencia/conselho.php')
				{
				echo'<p><a href="controls/upconselho.php?post='.$row['idPedido'].'">Marcar Aconselhamento</a></p>';
				}
			}
		// aqui crio os links da paginação	
		$sql = "select count(*) as total from conselhos";
		$query = conecta()->prepare($sql);
		$query->execute($dados);
			$row = $query->fetch(PDO::FETCH_ASSOC);
			$rpp = ceil($row['total'] / $limite);
			if($pagina < $rpp)
			{
			echo'<p><a class="pagination" href="conselhos.php?pag='.($pagina + 1).'">Proxima</a></p>';
			}	
			
		}
}
function marcaData($id, $data, $horario)
{
$dados = array($id);
$sql = "select idPedido from conselho where idPedido = ?";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 1)
	{
	$dados = array($data, $horario, $id);
	$sql = "update conselhos set marcadoPara = ?, horario = ? where idPedido = ?";
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