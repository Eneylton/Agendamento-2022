<?php 

require __DIR__.'../../../vendor/autoload.php';

define('TITLE','Novo Usuário');
define('BRAND','Cadastrar Usuário');

use App\Entidy\Aluno;
use App\Session\Login;

$alertaLogin  = '';
$alertaCadastro = '';

$usuariologado = Login:: getUsuarioLogado();

$usuario = $usuariologado['id'];

Login::requireLogin();


if(isset($_POST['nome'])){

        $item = new Aluno;
        $item->nome = $_POST['nome'];
        $item->categoria_id = $_POST['categoria_id'];
        $item->status = 0;
        $item->cadastar();

        header('location: aluno-list.php?status=success');
        exit;
    }

include __DIR__.'../../../includes/layout/header.php';
include __DIR__.'../../../includes/layout/top.php';
include __DIR__.'../../../includes/layout/menu.php';
include __DIR__.'../../../includes/layout/content.php';
include __DIR__.'../../../includes/usuario/usuario-form-insert.php';
include __DIR__.'../../../includes/layout/footer.php';