<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card card-purple">
               <form action="./agendar-insert.php" method="get">

                  <div class="card-header">
                     <div class="col-12">

                        <button type="submit" class="btn btn-danger float-right"> <i class="fas fa-calendar"></i>&nbsp;&nbsp; AGENDAR</button>

                     </div>



                  </div>



                  <?php

                  use App\Entidy\Marcacao;

                  if (isset($_GET['id']) or is_numeric($_GET['id'])) {

                     $id_aluno = $_GET['id'];
                  }

                  $data_agendada = 0;
                  $marcado = "";
                  $checked = "";
                  $data_marcada = "";
                  $hora_marcada = "";
                  $cor = "";
                  $idhora = 0;


                  require_once("funcao.php");

                  $resultado = '';
                  $tabela = '';
                  $colunas = '';
                  $contador = 0;
                  $data1 = 0;
                  $id = 0;
                  $id_agendado = 0;

                  date_default_timezone_set('America/Sao_Paulo');

                  $monthTime = getMes();

                  $mes = date('m ', $monthTime);

                  switch ($mes) {

                     case 1:
                        $mes = "JANEIRO";
                        break;
                     case 2:
                        $mes = "FEVEREIRO";
                        break;
                     case 3:
                        $mes = "MARÇO";
                        break;
                     case 4:
                        $mes = "ABRIL";
                        break;
                     case 5:
                        $mes = "MAIO";
                        break;
                     case 6:
                        $mes = "JUNHO";
                        break;
                     case 7:
                        $mes = "JULHO";
                        break;
                     case 8:
                        $mes = "AGOSTO";
                        break;
                     case 9:
                        $mes = "SETEMBRO";
                        break;
                     case 10:
                        $mes = "OUTUBRO";
                        break;
                     case 11:
                        $mes = "NOVEMBRO";
                        break;
                     case 12:
                        $mes = "DEZEMBRO";
                        break;
                  }

                  $resultado .= '<header>



<a class="btn btn-secondary" href="calendario-list.php?id=' . $id_aluno . '&month=' . anteriorMes($monthTime) . '"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; &nbsp; ANTERIOR</a>

<h1>' . $mes . '</h1>

<a class="btn btn-secondary" href="calendario-list.php?id=' . $id_aluno . '&month=' . proximoMes($monthTime) . '"> PROXIMO &nbsp; &nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></a>

</header>';

                  $startDate = strtotime('last sunday', $monthTime);
                  $tabela .= '<input type="hidden" name="id_aluno" value="' . $id_aluno . '">';
                  $tabela .= '<table class="table">
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
                  for ($row = 0; $row < 6; $row++) {

                     $tabela .= '<tr style="text-align: center;">';

                     for ($col = 0; $col < 7; $col++) {

                        if (date('Y-m', $startDate) !== date('Y-m', $monthTime)) {

                           $tabela .= '<td class="opacidade">';
                        } else {

                           $tabela .= '<td>';
                        }

                        $mesAno = date('Y-m', $startDate);

                        $dia = date('d', $startDate);

                        $data = ($mesAno . '-' . $dia);

                        $tabela .= '<h4><span class="badge badge-pill badge-secondary">' . $dia . '</span></h4>';

                        foreach ($listar as $item) {

                           $marcado = "color:#000";
                           $checked = "";
                           $idhora =  0;

                           $contador += 1;
                           $id = $item->id;
                           $data_agendada = $data;

                           $buscarHora = Marcacao::getContadorID('*', 'marcacao', $contador, null, null);
                          
                           if ($buscarHora != false) {

                              $data_marcada = $buscarHora->data;
                              $hora_marcada = $buscarHora->horario_id;
   

                              if ($data_marcada == $data_agendada) {

                                 if ($id == $hora_marcada) {

                                    $idContator =   $contador;
                                    $marcado = "text-decoration:line-through;color:#ff0000;font-size:17px";
                                    $checked = "checked";
                                 }
                              }
                           }

                           $tabela .= '
                           <div class="icheck-red ">

                           <input type="checkbox" value="' . $data . '  ' . $id . '    ' . $contador . '" name="id[]" id="[' . $contador . ']" ' . $checked . ' >
                           <label style="' . $marcado . '" for="[' . $contador . ']">   ' . date('H:i ', strtotime($item->hora)) . '</label>
                           
                           </div>';
                        }

                        $tabela .= '</td>';

                        $startDate = strtotime("+1 day", $startDate);
                     }

                     $tabela .= '</tr>';
                  }

                  $tabela .= '</tbody>
                     </table>';

                  ?>

                  <?= $resultado ?>
                  <?= $tabela ?>


               </form>
            </div>

         </div>

      </div>

   </div>

</section>