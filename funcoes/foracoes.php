<?php
function addPedido($nome, $email, $post)
{
$data = date('Y-m-d');
$dados = array($email, $post);
$sql = "select idPedido from pedidosOracao where email = ? and post = ?";
$query = conecta()->prepare($sql);
$query ->execute($dados);
	if($query->rowCount() == 0)
	{
		$dados = array($nome, $email, $post, $data, 0);
		$sql = "insert into pedidosOracao(autor, email, post, dataPost, liberado) values(?,?,?,?,?)";
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
function listaPedidos()
{
$limite = 2;
$pagina = doubleval($_GET['pag']);
if($pagina)
{
$pagina = $pagina;
}else{
	$pagina = 1;
       }
$inicio = ($pagina * $limite) - $limite;
$sql = "select idPedido, autor, dataPost, post from pedidosOracao order by idPedido desc limit $inicio, $limite";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 0)
	{
	echo'<p>Não há pedidos de oração</p>';
	}else{
			while($row = $query ->fetch(PDO::FETCH_ASSOC))
			{
			echo'<p>'.$row['post'].'</p>';
			echo'<p>'.$row['autor'].'</p>';
			echo'<p>Autor: '.invertData($row['dataPost']).'</p>';
			}
		// aqui crio os links da paginação	
		$sql = "select count(*) as total from pedidosOracao";
		$query = conecta()->prepare($sql);
		$query->execute($dados);
			$row = $query->fetch(PDO::FETCH_ASSOC);
			$rpp = ceil($row['total'] / $limite);
			if($pagina < $rpp)
			{
			echo'<p><a class="pagination" href="pedidosoracao.php?pag='.($pagina + 1).'">Proxima</a></p>';
			}	
			
		}
}
function aprovaPedido($id)
{
$sql = "update pedidosOracao set liberado = ? where idPedido = ?";
$query = conecta()->prepare($sql);
$query ->prepare($sql);
	if($query->rowCount() == 1)
	{
	return 1;
	}else{
		return 0;
		}
}
?>