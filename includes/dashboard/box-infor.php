<?php

use App\Session\Login;

$usuariologado = Login::getUsuarioLogado();

$acesso = $usuariologado['acessos_id'];

?>

<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info" style="display:<?php

                                                    switch ($acesso) {
                                                      case '2':
                                                        echo "";
                                                        break;
                                                      case '3':
                                                        echo "none";
                                                        break;
                                                      case '4':
                                                        echo "none";
                                                        break;

                                                      default:
                                                        echo "";
                                                        break;
                                                    }

                                                    ?>">
        <div class="inner">
          <h3>150</h3>

          <p>Minhas Entregas</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning" style="display:<?php

                                                        switch ($acesso) {
                                                          case '2':
                                                            echo "none";
                                                            break;
                                                          case '3':
                                                            echo "";
                                                            break;
                                                          case '4':
                                                            echo "none";
                                                            break;

                                                          default:
                                                            echo "";
                                                            break;
                                                        }

                                                        ?>">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>

          <p>Bounce Rate</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-gray" style="display:<?php

                                                    switch ($acesso) {
                                                      case '2':
                                                        echo "none";
                                                        break;
                                                      case '3':
                                                        echo "none";
                                                        break;
                                                      case '4':
                                                        echo "none";
                                                        break;

                                                      default:
                                                        echo "";
                                                        break;
                                                    }

                                                    ?>">
        <div class="inner">
          <h3>44</h3>

          <p>User Registrations</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-dark" style="display:<?php

                                                    switch ($acesso) {
                                                      case '2':
                                                        echo "";
                                                        break;
                                                      case '3':
                                                        echo "";
                                                        break;
                                                      case '4':
                                                        echo "";
                                                        break;

                                                      default:
                                                        echo "";
                                                        break;
                                                    }

                                                    ?>">
        <div class="inner">
          <h3>65</h3>

          <p>Unique Visitors</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

  </div>
</div>