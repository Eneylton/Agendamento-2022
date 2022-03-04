<?php

require __DIR__ . '../../../vendor/autoload.php';

use App\Entidy\Marcacao;
use App\Session\Login;

$alertaLogin  = '';
$alertaCadastro = '';

$usuariologado = Login::getUsuarioLogado();

$usuario = $usuariologado['id'];

Login::requireLogin();

$id_aluno = 0;
$data = 0;
$id_hora = 0;
$id = 0;

if (isset($_GET['id'])) {

    foreach ($_GET['id'] as $result) {

            $data = substr($result, 0, 10);
            $id = substr($result, 10, 27);

            $item = new Marcacao;
            $item->data       = $data;
            $item->status     = 1;
            $item->alunos_id  = $_GET['id_aluno'];
            $item->horario_id = $id;
            $item->cadastar();

        
       
    }


    header('location: calendario-list.php?id=' . $_GET['id_aluno'] . '&status=success');
    exit;
}
