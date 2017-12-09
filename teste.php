<?php

require_once 'includes'.DIRECTORY_SEPARATOR.'config.php';

//Carrega um usuário
$root = new Usuario();
$root->loadbyId(1);
echo $root;




?>