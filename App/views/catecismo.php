<?php

echo '<pre>';
var_dump($_SESSION['result']);

$_SESSION['result'] = '';
echo  'depois da limpeza:';
var_dump($_SESSION['result']);