<?php 

require __DIR__.'../../../vendor/autoload.php';

define('TITLE','Novo Instrutor');
define('BRAND','Instrutor');

use App\Entidy\Instrutor;
use App\Entidy\Usuario;
use App\Session\Login;

$alertaLogin  = '';
$alertaCadastro = '';

$usuariologado = Login:: getUsuarioLogado();

$usuario = $usuariologado['id'];

Login::requireLogin();


if(isset($_POST['nome'])){


        $item = new Instrutor;

        $item->nome           = $_POST['nome'];
        $item->email          = $_POST['email'];
        $item->senha          = $_POST['senha'];
        $item->categoria_id   = $_POST['categoria_id'];
        $item->veiculo_id     = $_POST['veiculo_id'];
        $item->acessos_id     = $_POST['acesso_id'];
        $item->cargos_id      = $_POST['cargo_id'];
        $item->usuarios_id    = $usuario;
        $item->cadastar();

        header('location: instrutor-list.php?status=success');
        exit;
    }

include __DIR__.'../../../includes/layout/header.php';
include __DIR__.'../../../includes/layout/top.php';
include __DIR__.'../../../includes/layout/menu.php';
include __DIR__.'../../../includes/layout/content.php';
include __DIR__.'../../../includes/usuario/usuario-form-insert.php';
include __DIR__.'../../../includes/layout/footer.php';