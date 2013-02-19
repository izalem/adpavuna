<?php
function addTestemunho($nome, $email, $post)
{
$data = date('Y-m-d');
$dados = array($email, $post);
$sql = "select idTestemunho from testemunhos where email = ? and post = ?";
$query = conecta()->prepare($sql);
$query ->execute($dados);
	if($query->rowCount() == 0)
	{
		$dados = array($nome, $email, $post, $data, 0);
		$sql = "insert into testemunhos(autor, email, post, dataPost, liberado) values(?,?,?,?,?)";
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
function listaTestemunhos()
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
$sql = "select idPost, autor, dataPost, post from testemunhos order by idPost desc limit $inicio, $limite";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 0)
	{
	echo'<p>Não há testemunhos publicados</p>';
	}else{
			while($row = $query ->fetch(PDO::FETCH_ASSOC))
			{
			echo'<div class="result">';
			echo'<p>'.$row['post'].'</p>';
			echo'<p>'.$row['autor'].'</p>';
			echo'<p>Autor: '.invertData($row['dataPost']).'</p>';
			echo'</div>';
			}
		// aqui crio os links da paginação	
		$sql = "select count(*) as total from testemunhos";
		$query = conecta()->prepare($sql);
		$query->execute($dados);
			$row = $query->fetch(PDO::FETCH_ASSOC);
			$rpp = ceil($row['total'] / $limite);
			if($pagina < $rpp)
			{
			echo'<p><a class="pagination" href="testemunhos.php?pag='.($pagina + 1).'">Proxima</a></p>';
			}	
			
		}
}
function aprovaTestemunhos($id)
{
$sql = "update testemunhos set liberado = ? where idTestemunhos = ?";
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