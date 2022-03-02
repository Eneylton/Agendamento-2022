<?php

require __DIR__ . '../../../vendor/autoload.php';

use App\Entidy\Aluno;

$dados = "";
$contador = 0;
$status = 0;

$id = filter_input(INPUT_GET, "id_cat", FILTER_SANITIZE_NUMBER_INT);

$listar = Aluno::getList('*', 'alunos',$id, null, null);

if(isset($_POST['aluno'])){

}else{

    $dados .= '<div class="row">';
    $dados .= '<input type="hidden" name="id" value="'.$id.'">';

foreach ($listar as $item) {

    switch ($item->status) {
        case '1':
            $status = "checked";
            break;
            
            default:
            $status = "";
            break;
    }
            
    $contador += 1;

    $dados .='<div class="col-4">
    <div class="icheck-navy ">

    <input type="checkbox" value="' . $item->id . '" name="aluno[]" id="[' . $contador. ']" '.$status.'>
    <label for="[' . $contador . ']">'.$item->nome.'</label>
    </div> 


    </div>';

}
        $retorna = ['erro' => false, 'dados' => $dados];

        echo json_encode($retorna);



}


?>