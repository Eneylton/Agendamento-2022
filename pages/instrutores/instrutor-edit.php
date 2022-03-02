<?php 

require __DIR__.'../../../vendor/autoload.php';



$alertaCadastro = '';

define('TITLE','Editar Alunos');
define('BRAND','Alunos');

use App\Entidy\Instrutor;
use App\Session\Login;


Login::requireLogin();



if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
 
    header('location: index.php?status=error');

    exit;
}

$item = Instrutor:: getID('*','instrutor',$_GET['id'],null,null);


if(!$item instanceof Instrutor){
    header('location: index.php?status=error');

    exit;
}

if(isset($_GET['nome'])){
    
    $item->nome           = $_GET['nome'];
    $item->email          = $_GET['email'];
    $item->senha          = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $item->categoria_id   = $_GET['categoria_id'];
    $item->veiculo_id     = $_GET['veiculo_id'];
  
    $item-> atualizar();

    header('location: instrutor-list.php?status=edit');

    exit;
}


