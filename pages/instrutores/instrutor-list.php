<?php
require __DIR__ . '../../../vendor/autoload.php';

use App\Db\Pagination;
use App\Entidy\Acesso;
use App\Entidy\Cargo;
use App\Entidy\Instrutor;
use App\Entidy\Categoria;
use App\Entidy\Veiculo;
use App\Session\Login;

define('TITLE','Lista de Instrutor');
define('BRAND','Instrutor');


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

$qtd = Instrutor:: getQtd($where);

$pagination = new Pagination($qtd, $_GET['pagina'] ?? 1, 1500);

$listar = Instrutor::getList(' i.id AS id,
i.categoria_id AS categoria_id,
i.veiculo_id AS veiculo_id,
i.cargos_id AS cargos_id,
i.acessos_id AS acessos_id,
i.nome AS instrutor,
i.email AS email,
i.senha AS senha,
c.nome AS categoria,
v.nome AS veiculo',
                                                   
' instrutor AS i
INNER JOIN
categoria AS c ON (c.id = i.categoria_id)
INNER JOIN
usuarios AS u ON (u.id = i.usuarios_id)
INNER JOIN
veiculo AS v ON (v.id = i.veiculo_id)
INNER JOIN
acessos AS a ON (a.id = i.acessos_id)
INNER JOIN
cargos AS cg ON (cg.id = i.cargos_id)',$where. $and.'usuarios_id='.$usuario, 'i.nome ASC',$pagination->getLimit());

$categorias = Categoria ::getList('*','categoria',null,'nome asc');
$veiculos   = Veiculo ::getList('*','veiculo',null,'nome asc');
$acessos    = Acesso ::getList('*','acessos',null,'nivel asc');
$cargos     = Cargo ::getList('*','cargos',null,'nome asc');

include __DIR__ . '../../../includes/layout/header.php';
include __DIR__ . '../../../includes/layout/top.php';
include __DIR__ . '../../../includes/layout/menu.php';
include __DIR__ . '../../../includes/layout/content.php';
include __DIR__ . '../../../includes/instrutor/instrutor-form-list.php';
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
        $('#veiculo_id').val(data[3]);
        $('#cargos_id').val(data[4]);
        $('#acessos_id').val(data[5]);
        $('#email').val(data[6]);
        $('#instrutor').val(data[7]);
        $('#categoria').val(data[8]);
        $('#veiculo').val(data[9]);
       
    });
});
</script>
