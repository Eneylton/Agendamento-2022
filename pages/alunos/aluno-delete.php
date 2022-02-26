<?php 

require __DIR__.'../../../vendor/autoload.php';

use \App\Entidy\Aluno;
use   \App\Session\Login;

Login::requireLogin();

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$value = Aluno::getID('*','alunos',$_GET['id'],null,null);

if(!$value instanceof Aluno){
    header('location: index.php?status=error');

    exit;
}



if(!isset($_POST['excluir'])){
    
 
    $value->excluir();

    header('location: aluno-list.php?status=del');

    exit;
}

