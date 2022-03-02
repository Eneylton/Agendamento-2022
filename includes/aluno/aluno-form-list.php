<?php

$list = '';
$checked = 0;
$texto = 0;
$linha = 0;

$resultados = '';

foreach ($listar as $item) {

   switch ($item->status) {
      case '1':
         $checked = "checked";
         $texto = 'style="text-decoration:line-through;color:#ff0000;font-size:20px"';
         $linha ="";
         
         break;
      
      default:
          $checked = "";
          $texto ="";
          $linha= 'class="badge badge-secondary"';
         break;
   }

   

   $resultados .= '<tr>
                      <td style="display:none">' . $item->id . '</td>
                      <td style="display:none">' . $item->nome . '</td>
                      <td style="display:none">' . $item->categoria_id . '</td>
                      <td><div class="icheck-indigo">
                      <input type="checkbox" value="' . $item->id . '" name="id[]" id="[' . $item->id . ']" '.$checked .'>
                      <label for="[' . $item->id . ']"></label>
                      </div></td>
                      <td '.$texto.'><h2><span '.$linha.'>' . $item->nome . '</span><h2/></td>
                      <td>' . $item->categoria . '</td>
                    
                      <td style="text-align: center;">
                        
                      
                      <button type="submit" class="btn btn-success editbtn" > <i class="fas fa-paint-brush"></i> </button>
                      &nbsp;

                       <a href="aluno-delete.php?id=' . $item->id . '">
                       <button type="button" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
                       </a>


                      </td>
                      </tr>

                      ';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                     <td colspan="4" class="text-center" > Nenhuma Vaga Encontrada !!!!! </td>
                                                     </tr>';


unset($_GET['status']);
unset($_GET['pagina']);
$gets = http_build_query($_GET);

//PAGINAÇÂO

$paginacao = '';
$paginas = $pagination->getPages();

foreach ($paginas as $key => $pagina) {
   $class = $pagina['atual'] ? 'btn-primary' : 'btn-secondary';
   $paginacao .= '<a href="?pagina=' . $pagina['pagina'] . '&' . $gets . '">

                  <button type="button" class="btn ' . $class . '">' . $pagina['pagina'] . '</button>
                  </a>';
}

?>

<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card card-purple">
               <div class="card-header">

                  <form method="get">
                     <div class="row ">
                        <div class="col-4">

                           <label>Buscar por Nível</label>
                           <input type="text" class="form-control" name="buscar" value="<?= $buscar ?>" >

                        </div>


                        <div class="col d-flex align-items-end">
                           <button type="submit" class="btn btn-warning" name="">
                              <i class="fas fa-search"></i>

                              Pesquisar

                           </button>

                        </div>


                     </div>

                  </form>
               </div>

               <div class="table-responsive">
                  
                     <table class="table table-bordered table-dark table-bordered table-hover table-striped">
                        <thead>
                           <tr>
                              <td colspan="4">
                                 <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#modal-default"> <i class="fas fa-plus"></i> &nbsp; Nova</button>
                                 
                              </td>
                           </tr>
                           <tr>
                              <th style="text-align: center; width:20px">
                                 <div class="icheck-warning d-inline">
                                    <input type="checkbox" id="select-all">
                                    <label for="select-all">
                                    </label>
                                 </div>

                              </th>
                              <th> ALUNO</th>
                              <th> CATEGORIA</th>

                              <th style="text-align: center; width:200px"> AÇÃO </th>
                           </tr>
                        </thead>
                        <tbody>
                           <?= $resultados ?>
                        </tbody>

                     </table>
            

               </div>


            </div>

         </div>

      </div>

   </div>

</section>

<?= $paginacao ?>


<div class="modal fade" id="modal-default">
   <div class="modal-dialog">
      <div class="modal-content bg-light">
         <form action="./aluno-insert.php" method="post">

            <div class="modal-header">
               <h4 class="modal-title">Novo aluno
               </h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label>Nome</label>
                  <input type="text" class="form-control" name="nome" required>
               </div>

               <div class="form-group">
                  <label>Categoria</label>
                  <select class="form-control select" style="width: 100%;" name="categoria_id" required>
                     <option value=""> Selecione uma categoria </option>
                     <?php

                     foreach ($categorias as $item) {
                        echo '<option value="' . $item->id . '">' . $item->nome . '</option>';
                     }
                     ?>

                  </select>
               </div>
            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
               <button type="submit" class="btn btn-primary">Salvar</button>
            </div>

         </form>

      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>

<!-- EDITAR -->

<div class="modal fade" id="editmodal">
   <div class="modal-dialog">
      <form action="./aluno-edit.php" method="get">
         <div class="modal-content bg-light">
            <div class="modal-header">
               <h4 class="modal-title">Editar
               </h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <input type="hidden" name="id" id="id">
               <div class="form-group">
                  <label>aluno</label>
                  <input type="text" class="form-control" name="nome" id="nome" required>
               </div>

               <div class="form-group">
                  <label>Categoria</label>
                  <select class="form-control select" style="width: 100%;" name="categoria_id" id="categoria_id" required>

                     <?php

                     foreach ($categorias as $item) {
                        echo '<option value="' . $item->id . '">' . $item->nome . '</option>';
                     }
                     ?>

                  </select>
               </div>

            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
               <button type="submit" class="btn btn-primary">Salvar
               </button>
            </div>
         </div>
      </form>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>