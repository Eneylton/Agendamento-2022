<?php 

require __DIR__.'../../../vendor/autoload.php';

use App\Entidy\Marcacao;
use App\Session\Login;

$alertaLogin  = '';
$alertaCadastro = '';

$usuariologado = Login:: getUsuarioLogado();

$usuario = $usuariologado['id'];

Login::requireLogin();

$id_aluno = 0;
$data = 0;
$id_hora = 0;

if(isset($_GET['id'])){
       
    foreach ($_GET['id'] as $result) {

        $id_hora = substr($result,0, 2);
        $data = substr($result, 2, 10);
        $id_aluno = substr($result, 12, 15);

        //$alunoMarcado =  Marcacao:: getAlunoMarcado('*','marcacao',$id_aluno,null,null);

            $item = new Marcacao;
            $item->data       = $data;
            $item->status     = 1;
            $item->alunos_id  = $id_aluno;
            $item->horario_id = $id_hora;
            $item->cadastar();
        
           header('location: calendario-list.php?id='.$id_aluno.'&status=success');
           exit;
    }

   
    }
  

