<?php
require('../funcoes/fconn.php');
require('../fdados.php');
$table = 'devocionais';
$campos = array('idPost', 'titulo');
$values = array('1');
$lis = select($table, $campos, $values);
var_dump($lis);
?>