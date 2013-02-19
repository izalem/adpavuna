<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<title>Publicar Evento</title>
<meta charset="utf-8" />
<head>
</body>
<form action="controls/addevento.php" method="post">
<p><label for="evento">Evento: </label><input type="text" name="evento" id="evento" /></p>
<p><label for="data">Data do Evento:</label>
<select name="dia" id="dia">
<option value="">Dia</option>
<?php
for($i = 1; $i <= 31; $i++)
{
echo'<option value="'.$i.'">'.$i.'</option>';
}
?></select>
<select name="mes" id="mes">
<option value="">Mês</option>
<?php
for($i = 1; $i <= 12; $i++)
{
echo'<option value="'.$i.'">'.$i.'</option>';
}
?></select>
<select name="ano" id="ano">
<option value="">Ano</option>
<?php
for($i = date('Y'); $i <= date('Y')+1; $i++)
{
echo'<option value="'.$i.'">'.$i.'</option>';
}
?></select></p>
<p><label for="horas">Horário:</label>
<select name="horas" id="horas">
<option value="">horas</option>
<?php
for($i = 1; $i < 24; $i++)
{
echo'<option value="'.$i.'">'.$i.'</option>';
}
?></select><select name="minutos" id="minutos">
<option value="">Minutos</option>
<?php
for($i = 1; $i < 24; $i++)
{
echo'<option value="'.$i.'">'.$i.'</option>';
}
?></select></p>
<p><label for="local">Local do evento: </label><input type="text" name="local" id="local" /></p>
<input type="submit" value="Publicar" />
</form>
</body>