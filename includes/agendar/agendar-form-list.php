<?php

$colunas = '';

foreach ($horarios as $item) {

      $colunas .='<div class="col-2" style="text-align: center;">
         <div class="icheck-orange ">
         <input type="checkbox" value="'.$item->id.'" name="id[]" id="['.$item->id.']">
         <label for="['.$item->id.']">'.$item->hora.'</label>
         </div>
      
      </div>';
   
}

?>

<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card card-purple" >
               <form method="get">

                  <div class="card-body">
                  <div class="row">
                     
                     
                    <?= $colunas ?>

                  </div>
                  </div>

               </form>
            </div>

         </div>

      </div>

   </div>

</section>