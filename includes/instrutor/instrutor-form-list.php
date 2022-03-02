<?php

$resultados = '';

foreach ($listar as $item) {

   $resultados .= '<tr>
<td style="display:none">' . $item->id . '</td>
<td style="display:none">' . $item->nome . '</td>
<td style="display:none">' . $item->categoria_id . '</td>
<td style="display:none">' . $item->veiculo_id . '</td>
<td style="display:none">' . $item->cargos_id . '</td>
<td style="display:none">' . $item->acessos_id . '</td>
<td style="display:none">' . $item->email . '</td>
<td style="display:none">' . $item->instrutor . '</td>
<td style="display:none">' . $item->categoria . '</td>
<td style="display:none">' . $item->veiculo . '</td>

<td><h3><span class="badge badge-pill badge-secondary">' . $item->instrutor . '</span><h3/></td>
<td><h3><span class="badge badge-pill badge-secondary">' . $item->email .     '</span><h3/></td>
<td><h3><span class="badge badge-pill badge-secondary">' . $item->veiculo .   '</span><h3/></td>
<td><h3><span class="badge badge-pill badge-secondary">' . $item->categoria . '</span><h3/></td>

<td style="text-align: center;width:300px">

<button class="btn btn-default btn-sm" onclick="listarAlunos(' . $item->id . ')"><i class="fas fa-users"></i>&nbsp Add Alunos</button>
&nbsp;
<button type="submit" class="btn btn-success editbtn" > <i class="fas fa-paint-brush"></i> </button>
&nbsp;

<a href="instrutor-delete.php?id=' . $item->id . '">
<button type="button" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
</a>


</td>
</tr>

';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                              <td colspan="5" class="text-center" > Nenhuma instrutor Encontrada !!!!! </td>
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

                           <label>Buscar por instrutor</label>
                           <input type="text" class="form-control" name="buscar" value="<?= $buscar ?>">

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

                  <table class="table table-bordered table-dark table-bordered table-hover table-striped" >
                     <thead>
                        <tr>
                           <td colspan="5">
                              <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#modal-default"> <i class="fas fa-plus"></i> &nbsp; Nova</button>
                              <button type="submit" name="submit" class="btn btn-flat btn-warning float-right">Adicionar alunos &nbsp; <i class="fas fa-chevron-right"></i></button>
                           </td>
                        </tr>
                        <tr>

                           <th>INSTRUTOR</th>
                           <th>EMAIL</th>
                           <th> VEICULO</th>
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
   <div class="modal-dialog modal-lg">
      <div class="modal-content bg-light">
         <form action="./instrutor-insert.php" method="post">

            <div class="modal-header">
               <h4 class="modal-title">Novo instrutor
               </h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>

            <div class="modal-body">

               <div class="row">

                  <div class="col-6">

                     <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" required >
                     </div>

                  </div>
                  <div class="col-6">

                     <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email">
                     </div>

                  </div>
                  <div class="col-6">
                     <div class="form-group">
                        <label>Login</label>
                        <input type="text" class="form-control">
                     </div>

                  </div>
                  <div class="col-6">

                     <div class="form-group">
                        <label>Senha</label>
                        <input type="password" class="form-control" name="senha" required>
                     </div>

                  </div>
                  <div class="col-6">

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
                  <div class="col-6">

                     <div class="form-group">
                        <label>Veículos</label>
                        <select class="form-control select" style="width: 100%;" name="veiculo_id" required>
                           <option value=""> Selecione um veículo </option>
                           <?php

                           foreach ($veiculos as $item) {
                              echo '<option value="' . $item->id . '">' . $item->nome . '</option>';
                           }
                           ?>

                        </select>
                     </div>

                  </div>
                  <div class="col-6">

                     <div class="form-group">
                        <label>Acessos</label>
                        <select class="form-control select" style="width: 100%;" name="acesso_id" required>
                           <option value=""> Selecione um acesso</option>
                           <?php

                           foreach ($acessos as $item) {
                              echo '<option value="' . $item->id . '">' . $item->nivel . '</option>';
                           }
                           ?>

                        </select>
                     </div>

                  </div>
                  <div class="col-6">

                     <div class="form-group">
                        <label>Cargos</label>
                        <select class="form-control select" style="width: 100%;" name="cargo_id" required>
                           <option value=""> Selecione um cargo</option>
                           <?php

                           foreach ($cargos as $item) {
                              echo '<option value="' . $item->id . '">' . $item->nome . '</option>';
                           }
                           ?>

                        </select>
                     </div>

                  </div>
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
   <div class="modal-dialog modal-lg">
      <form action="./instrutor-edit.php" method="get">
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

               <div class="row">

                  <div class="col-6">

                     <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" id="instrutor" required>
                     </div>

                  </div>
                  <div class="col-6">

                     <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" id="email">
                     </div>

                  </div>
                  <div class="col-6">
                     <div class="form-group">
                        <label>Login</label>
                        <input type="text" class="form-control">
                     </div>

                  </div>
                  <div class="col-6">

                     <div class="form-group">
                        <label>Senha</label>
                        <input type="password" class="form-control" name="senha" id="senha" required>
                     </div>

                  </div>
                  <div class="col-6">

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
                  <div class="col-6">

                     <div class="form-group">
                        <label>Veículos</label>
                        <select class="form-control select" style="width: 100%;" name="veiculo_id" id="veiculo_id" required>

                           <?php

                           foreach ($veiculos as $item) {
                              echo '<option value="' . $item->id . '">' . $item->nome . '</option>';
                           }
                           ?>

                        </select>
                     </div>

                  </div>
                 
                 
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


<div class="modal fade" id="listarAlunosModal">
   <div class="modal-dialog modal-lg">

      <form id="insert-alunos-form">

         <div class="modal-content bg-light">
            <div class="modal-header">
               <h4 class="modal-title">Alunos
               </h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <label for="">LISTA ALUNOS</label>

               <span id="msgAlert"></span>

               <div class="col-12">
                  <span class="listar-alunos"></span>
               </div>


            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
               <input type="submit" class="btn btn-primary" id="insert-aluno-btn" value="Adicionar" >
               
            </div>
         </div>
      </form>

      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>