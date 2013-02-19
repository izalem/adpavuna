<?php
function criaAlbum($nome, $label)
{
$dados = array($nome);
$sql = "select idAlbum from albuns where album = ?";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 0)
	{
	$dados = array($nome, $label);
	$sql = "insert into albuns(album, descricao) values(?,?)";
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
function listaAlbuns()
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
$sql = "select idAlbum, album, descricao from albuns order by idAlbum desc limit $inicio, $limite";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 0)
	{
	echo'<p>Não há álbum criado</p>';
	}else{
			while($row = $query ->fetch(PDO::FETCH_ASSOC))
			{
			echo'<div class="albuns">';
			echo'<p>'.$row['album'].'</p>';
			echo'<p>'.$row['descricao'].'</p>';
			echo'</div>';
			}
		// aqui crio os links da paginação	
		$sql = "select count(*) as total from albuns";
		$query = conecta()->prepare($sql);
		$query->execute($dados);
			$row = $query->fetch(PDO::FETCH_ASSOC);
			$rpp = ceil($row['total'] / $limite);
			if($pagina < $rpp)
			{
			echo'<p><a class="pagination" href="albuns.php?pag='.($pagina + 1).'">Proxima</a></p>';
			}	
			
		}
}