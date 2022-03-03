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

        $id_aluno = substr($result, 14, 2);
        $id_hora = substr($result, 0, 2);
        $data = substr($result, 3, 10);
        $id = substr($result, 17, 16);

        if($id != false){
               
            $editar = Marcacao::getID('*', 'marcacao', $id, null, null);
            $editar->status = 1;
            $editar->atualizar();

        }else{

            $item = new Marcacao;
            $item->data       = $data;
            $item->status     = 1;
            $item->alunos_id  = $id_aluno;
            $item->horario_id = $id_hora;
            $item->cadastar();

        }
       
    }


    header('location: calendario-list.php?id=' . $id_aluno . '&status=success');
    exit;
}
