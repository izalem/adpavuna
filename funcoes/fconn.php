<?php
function conecta()
{
$bd = new PDO("mysql:host=localhost;dbname=adpavuna", "root", "vkmj3cvir+-");
return $bd; 
}
?>