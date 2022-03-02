<?php 

require __DIR__.'../../../vendor/autoload.php';

use \App\Entidy\Instrutor;
use   \App\Session\Login;

Login::requireLogin();

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$value = Instrutor::getID('*','instrutor',$_GET['id'],null,null);

if(!$value instanceof Instrutor){
    header('location: index.php?status=error');

    exit;
}



if(!isset($_POST['excluir'])){
    
 
    $value->excluir();

    header('location: instrutor-list.php?status=del');

    exit;
}

