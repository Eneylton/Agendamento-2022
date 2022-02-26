<?php 

require __DIR__.'../../../vendor/autoload.php';



$alertaCadastro = '';

define('TITLE','Editar Alunos');
define('BRAND','Alunos');

use App\Entidy\Aluno;
use App\Session\Login;


Login::requireLogin();



if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$value = Aluno:: getID('*','alunos',$_GET['id'],null,null);


if(!$value instanceof Aluno){
    header('location: index.php?status=error');

    exit;
}



if(isset($_GET['nome'])){
    
    $value->nome = $_GET['nome'];
    $value->categoria_id = $_GET['categoria_id'];
    $value-> atualizar();

    header('location: aluno-list.php?status=edit');

    exit;
}


