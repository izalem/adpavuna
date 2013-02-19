<?php
function criaAlbum($nome)
{
$dados = array($nome);
$sql = "select idAlbum from albuns where album = ?"; 
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 0)
	{
	$dados = array($nome);
	$sql = "insert into albuns(album) values(?)";
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
function listaAlbum()
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
$sql = "select idAlbum, album from albuns order by idAlbum desc limit $inicio, $limite";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 0)
	{
	echo'<p>Nenhum álbum para ser exibido</p>';
	}else{
			echo'<div class="album">';
			while($row = $query ->fetch(PDO::FETCH_ASSOC))
			{
			echo'<p>'.$row['album'].'</p>';
			$script = $_SERVER['PHP_SELF'];
				if($script == '/gerencia/albuns.php')
				{
				echo'<p><a href="newfoto.php?album='.$row['idAlbum'].'">Add Foto</a> <a href="controls/delalbum.php?album='.$row['idAlbum'].'">Excluir Álbum</a></p>';
				}
			}
			echo'</div>';
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
function delAlbum($id)
{
$dados = array($id);
$sql = "select idAlbum from albuns where idAlbum = ?";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 1)
	{
	$sql = "delete from albuns where idAlbum = ?";
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
function verificaImagem($img)
{
	if(!$img['tmp_name'])
	{
	return false;
	}else{
		return true;
		}
}
function verificaSize($img, $size)
{
	if($img['size'] > $size)
	{
	return false;
	}else{
		return true;
		}
}
function verificaExtensao($img, $ext)
{
	$imagem = strtolower($img['name']);
	$extensao = end(explode('.', $imagem));
	if(array_search($extensao, $ext) == false)
	{
	return false;
	}else{
		return true;
		}
}
function uploadImagem($img, $path, $name)
{
if(empty($name))
{
$name = sha1(uniqid(time())).'.jpg';
}else{
	$name .= '.jpg';
	}	
$path = $path.$name; 
	if(file_exists($path))
	{
	unlink($path);
	}
	if(move_uploaded_file($img['tmp_name'], $path))
	{
	return array($path, $name);
	}else{
		return false;
		}
}
function addFoto($album, $foto)
{
$dados = array($album, $foto);
$sql = "insert into fotos(iAlbum, caminho) values(?,?)";
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 1)
	{
	return 1;
	}else{
		return 0;
		}
}
function galeria($id)
{
$dados = array($id);
$sql = "select idFoto, caminho from fotos where iAlbum = ?";
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