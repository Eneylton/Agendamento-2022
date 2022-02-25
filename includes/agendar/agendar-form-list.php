<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card card-purple" >
             <form action="./agendar-insert.php" method="get">

<?php

require_once("funcao.php");

$resultado ='';
$tabela ='';
$colunas = '';
$contador = 0;
$data1 = 0;

date_default_timezone_set('America/Sao_Paulo');

$monthTime = getMes();

$mes = date('m ',$monthTime  );

switch ($mes){
 
    case 1: $mes = "JANEIRO"; break;
    case 2: $mes = "FEVEREIRO"; break;
    case 3: $mes = "MARÇO"; break;
    case 4: $mes = "ABRIL"; break;
    case 5: $mes = "MAIO"; break;
    case 6: $mes = "JUNHO"; break;
    case 7: $mes = "JULHO"; break;
    case 8: $mes = "AGOSTO"; break;
    case 9: $mes = "SETEMBRO"; break;
    case 10: $mes = "OUTUBRO"; break;
    case 11: $mes = "NOVEMBRO"; break;
    case 12: $mes = "DEZEMBRO"; break;
     
    }

    $resultado .='<header>
    <button type="submit" class="btn btn-primary">Atualizar
    </button>
    

    <a class="btn btn-success" href="?month='.anteriorMes($monthTime).'">ANTERIOR</a>
    
    <h1>'.$mes.'</h1>
   
    <a class="btn btn-success" href="?month='.proximoMes($monthTime).'">PROXIMO</a>
    
    </header>';

    $startDate = strtotime('last sunday',$monthTime);

    $tabela .='<table class="table">
    <thead>
            <tr style="text-align: center;">
            <th>DOM</th>
            <th>SEG</th>
            <th>TER</th>
            <th>QUA</th>
            <th>QUI</th>
            <th>SEX</th>
            <th>SAB</th>
            </tr>
            </thead>
        <tbody>';
        for($row =0; $row < 6; $row++){

         

         $tabela .='<tr style="text-align: center;">';
          
                    for($col = 0; $col < 7; $col++){

                     if(date('Y-m',$startDate) !== date('Y-m',$monthTime)){

                        $tabela.='<td class="opacidade">';
                        
                    }else{

                     $tabela.='<td>';

                    }

                  

                    $mesAno = date('Y-m',$startDate);
                    $dia = date('j',$startDate);
                    
                    $data = ($mesAno.'-'.$dia);
    
                    $tabela.='<h4>' .$dia.'</h4>';

                    
                    foreach ($horarios as $item) {

                     $data1 = $data; 

                       $contador += 1;

                     $tabela .='
                     <div class="icheck-red ">
                     
                     <input type="checkbox" value="' . $item->hora . '" name="id[]" id="[' . $contador. ']">
                     <label for="[' . $contador . ']">'.date('H:i ', strtotime($item->hora)).'</label>
                     </div>

                     <input type="hidden" name="data" value="'.$data.'">
                     
                     ';
                  
               }
                    
                    $tabela.='</td>';
    
                    $startDate = strtotime("+1 day", $startDate);
                    }

         $tabela .='</tr>';

         }
         
       $tabela .= '</tbody>
      </table>
    ';




?>



<?= $resultado ?>
<?= $tabela ?>


               </form>
            </div>

         </div>

      </div>

   </div>

</section>