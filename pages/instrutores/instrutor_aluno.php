<?php 

require __DIR__.'../../../vendor/autoload.php';

define('TITLE','Novo Usuário');
define('BRAND','Cadastrar Usuário');

use App\Entidy\Aluno;
use App\Entidy\Usuario_aluno;
use App\Session\Login;

$usuariologado = Login:: getUsuarioLogado();

$usuario = $usuariologado['id'];

Login::requireLogin();

if(isset($_GET['id'])){

        foreach ($_GET['id'] as $id) {

            $res = Usuario_aluno ::getUsauriAlunoID('*','usuarios_has_alunos',$id,null,null);
            
            if($res instanceof Usuario_aluno){
                $res->alunos_id = $id;
                $res->atualizar();
            
            }else{
                $result = Aluno ::getID('*','alunos',$id,null,null);
                $result->status = 1;
                $result->atualizar();

                $item = new Usuario_aluno;
                $item->usuarios_id = $usuario;
                $item->alunos_id =  $id;
                $item->cadastar();

            }

           
            
           
        }

        header('location: aluno-list.php?status=success');
        exit;
    }

include __DIR__.'../../../includes/layout/header.php';
include __DIR__.'../../../includes/layout/top.php';
include __DIR__.'../../../includes/layout/menu.php';
include __DIR__.'../../../includes/layout/content.php';
include __DIR__.'../../../includes/usuario/usuario-form-insert.php';
include __DIR__.'../../../includes/layout/footer.php';