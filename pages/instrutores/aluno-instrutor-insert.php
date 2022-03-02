<?php 

require __DIR__.'../../../vendor/autoload.php';

use App\Entidy\Aluno;
use App\Entidy\Instrutor;
use App\Entidy\InstrutorAluno;
use App\Session\Login;

$usuariologado = Login:: getUsuarioLogado();

$usuario = $usuariologado['id'];
$id_instrutor = 0;
$cod = 0;

Login::requireLogin();

    foreach ($_POST['aluno'] as $aluno) {

        $result = Instrutor ::getID('*','instrutor',$_POST['id'],null,null);

        $id_instrutor = $result->id;

        $cod = intval($id_instrutor);
       
        $instrutores = InstrutorAluno:: getAlunosID('*','instrutor_alunos',$aluno,null,null);
        
        if($instrutores instanceof InstrutorAluno){
           
            echo "";
            
        }else{

            $edit = Aluno:: getID('*','alunos',$aluno,null,null);
            $edit->status = 1;
            $edit->atualizar();

            $item = new InstrutorAluno;

            $item->instrutor_id      = $id_instrutor;
            $item->alunos_id         = $aluno;
            $item->cadastar();

       
    
        }

    }

    header('location: instrutor-list.php?');
    exit;

