<?php
require __DIR__ . '../../../vendor/autoload.php';

use App\Db\Pagination;
use App\Entidy\Aluno;
use App\Entidy\Categoria;
use App\Session\Login;

define('TITLE','Lista de Alunos');
define('BRAND','Alunos');


Login::requireLogin();


$buscar = filter_input(INPUT_GET, 'buscar', FILTER_UNSAFE_RAW);

$condicoes = [
    strlen($buscar) ? 'id LIKE "%'.str_replace(' ','%',$buscar).'%" or 
                       nome LIKE "%'.str_replace(' ','%',$buscar).'%"' : null
];

$condicoes = array_filter($condicoes);

$where = implode(' AND ', $condicoes);

$qtd = Aluno:: getQtd($where);

$pagination = new Pagination($qtd, $_GET['pagina'] ?? 1, 1500);

$listar = Aluno::getList(' al.id,al.status as status,
cat.id as categoria_id,
cat.nome as categoria,
al.nome',' alunos AS al
INNER JOIN
categoria AS cat ON (al.categoria_id = cat.id)',$where, 'al.nome ASC',$pagination->getLimit());

$categorias = Categoria ::getList('*','categoria',null,'nome asc');

include __DIR__ . '../../../includes/layout/header.php';
include __DIR__ . '../../../includes/layout/top.php';
include __DIR__ . '../../../includes/layout/menu.php';
include __DIR__ . '../../../includes/layout/content.php';
include __DIR__ . '../../../includes/aluno/aluno-form-list.php';
include __DIR__ . '../../../includes/layout/footer.php';

?>

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
        $('#categoria_id').val(data[2]);
       
    });
});
</script>
