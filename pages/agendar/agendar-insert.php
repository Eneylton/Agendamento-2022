<?php 

require __DIR__.'../../../vendor/autoload.php';

use App\Session\Login;

$alertaLogin  = '';
$alertaCadastro = '';

$usuariologado = Login:: getUsuarioLogado();

$usuario = $usuariologado['id'];

Login::requireLogin();

$id = 0;
$data = 0;

if(isset($_GET['id'])){
       

    foreach ($_GET['id'] as $result) {
        
        $id = substr($result,0, 2);
        intval($id);
        $data = substr($result, 2, 15);

    }

        // header('location: cargo-list.php?status=success');
        // exit;
    }
  

include __DIR__.'../../../includes/layout/header.php';
include __DIR__.'../../../includes/layout/top.php';
include __DIR__.'../../../includes/layout/menu.php';
include __DIR__.'../../../includes/layout/content.php';
include __DIR__.'../../../includes/usuario/usuario-form-insert.php';
include __DIR__.'../../../includes/layout/footer.php';