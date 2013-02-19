<?php
session_start();
$album = doubleval($_GET['album']);
if(empty($album))
{
header("LOCATION: albuns.php");
exit;
}
$_SESSION['album'] = $album;
?>
<form action="controls/addfoto.php" method="post" enctype="multipart/form-data">
<p><label for="img">Selecione uma Imagem: </label><input type="file" name="img" id="img" /></p>
<input type="submit" value="Adicionar Foto" />
</form> 