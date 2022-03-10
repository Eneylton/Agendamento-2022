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
$id_contador = 0;
$id = 0;
$data_id = 0;

if (isset($_GET['id'])) {

    foreach ($_GET['id'] as $result) {

        $id = substr($result, 12, -5);
        $data = substr($result, 0, 10);
        $id_contador = substr($result, -3);

        $marca = Marcacao::getContadorID('*', 'marcacao', $id_contador, null, null);

        if ($marca == false) {

            $item = new Marcacao;
            $item->data       = $data;
            $item->status     = 1;
            $item->alunos_id  = $_GET['id_aluno'];
            $item->horario_id = $id;
            $item->contador_id = $id_contador;
            $item->cadastar();

        } else {

            $marca->status = 1;
            $marca->atualizar();
        }


    }

    header('location: calendario-list.php?id=' . $_GET['id_aluno']);
    exit;
}
