<?php
function addPastoral($titulo, $post)
{
$data = date('Y-m-d');
$dados = array($titulo, $post);
$sql = "select idPost from devocionais where titulo = ? and post = ?";
$query = conecta()->prepare($sql);
$query ->execute($dados);
	if($query->rowCount() == 0)
	{
		$dados = array($titulo, $post, $data);
		$sql = "insert into devocionais(titulo, post, dataPost) values(?,?,?)";
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
function listaDevocional()
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
$sql = "select idPost, titulo, dataPost, post from devocionais order by idPost desc limit $inicio, $limite";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 0)
	{
	echo'<p>Não há pedidos de oração</p>';
	}else{
			while($row = $query ->fetch(PDO::FETCH_ASSOC))
			{
			echo'<div class="departamentos">';
			echo'<p class="titulo">'.$row['titulo'].'</p>';
			$post = explode(' ', $row['post']);
				echo'<p>';	
				for($i = 0; $i <= 20; $i++)
				{
				echo $post[$i].' ';
				}
				echo'... <a href="mensagempastoral.php?post='.$row['idPost'].'">Ler Nais</a></p>';	
			echo'<p>Data Postagem: '.invertData($row['dataPost']).'</p>';
			$script = $_SERVER['PHP_SELF'];
				if($script == '/gerencia/devocional.php')
				{
				echo'<p><a href="controls/deldevocional.php?post='.$row['idPost'].'">Apagar Postagem</a></p>';
				}
			echo'</div>';	
			}
		// aqui crio os links da paginação	
		$sql = "select count(*) as total from devocionais";
		$query = conecta()->prepare($sql);
		$query->execute($dados);
			$row = $query->fetch(PDO::FETCH_ASSOC);
			$rpp = ceil($row['total'] / $limite);
			if($pagina < $rpp)
			{
			echo'<p><a class="pagination" href="devocional.php?pag='.($pagina + 1).'">Proxima</a></p>';
			}	
			
		}
}
function delPastoral($id)
{
$dados = array($id);
$sql = "select idPost from pPastoral where idPost = ?";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 1)
	{
	$sql = "delete from pPastoral where idPost = ?";
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
function devocionalHome()
{
$sql ="select idPost, titulo, post from devocionais order by rand() limit 1 ";
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
?>