<?php
require __DIR__ . '../../../vendor/autoload.php';

use App\Db\Pagination;
use App\Entidy\Agendar;
use App\Entidy\Aluno;
use App\Session\Login;

define('TITLE','Agendamento');
define('BRAND','Agendamento');
Login::requireLogin();

$usuariologado = Login:: getUsuarioLogado();

$usuario = $usuariologado['id'];

Login::requireLogin();

$buscar = filter_input(INPUT_GET, 'buscar', FILTER_UNSAFE_RAW);

if($buscar == null){

    $and = "";

}else{

    $and = " AND";

}   

$condicoes = [
    strlen($buscar) ? 'id LIKE "%'.str_replace(' ','%',$buscar).'%" or 
                       nome LIKE "%'.str_replace(' ','%',$buscar).'%"' : null
];

$condicoes = array_filter($condicoes);

$where = implode(' AND ', $condicoes);

$qtd = Agendar:: getQtd($where);

$pagination = new Pagination($qtd, $_GET['pagina'] ?? 1, 1000);

$listar = Aluno::getList('ia.id as id,
a.nome as aluno,
a.id as id_aluno,
c.nome as categoria',' instrutor_alunos AS ia
INNER JOIN
instrutor AS i ON (ia.instrutor_id = i.id)
INNER JOIN
alunos AS a ON (ia.alunos_id = a.id)
INNER JOIN
categoria AS c ON (c.id = a.categoria_id)',$where. $and.'usuarios_id='.$usuario, 'a.nome ASC',$pagination->getLimit());

include __DIR__ . '../../../includes/layout/header.php';
include __DIR__ . '../../../includes/layout/top.php';
include __DIR__ . '../../../includes/layout/menu.php';
include __DIR__ . '../../../includes/layout/content.php';
include __DIR__ . '../../../includes/agendar/agendar-form-list.php';
include __DIR__ . '../../../includes/layout/footer.php';

?>
6y
<script>
$(document).ready(function(){
    $('.editbtn').on('click', function(){
        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        $('#id').val(data[0]);
        $('#nome').val(data[1]);
       
    });
});
</script>
