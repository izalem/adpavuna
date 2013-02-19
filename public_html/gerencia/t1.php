<?php
$start = microtime(true);
while($i < 1000)
{
$url = curl_init('http://adpavuna/devocional.php');
curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($url);
curl_close($url);
echo $result;
$i++;
}
$fim = microtime(true);
$tempo = ($fim - $start);
echo'<p>Executado em '.$tempo.'</p>';
?>