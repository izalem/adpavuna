<?php
function select($table, $campos, $values='', $crit='')
{
if(is_array($campos))
{
$campos = implode(',', $campos);
}
$sql = "select $campos from $table";

echo $sql;
$query = conecta()->prepare($sql);
$query->execute($dados);
	if($query->rowCount() == 0)
	{
	return 0;
	}else{
			while($row = $query->fetch(PDO::FETCH_ASSOC))
			{
			$lista[] = $row;
			}
			return $lista;
		}
}
?>