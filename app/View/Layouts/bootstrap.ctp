
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="manifest" href="manifest.json">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Vayron</title>
  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <?php 
    echo $this->Html->css('nucleo.css');
    echo $this->Html->css('simplebarMenu.css');
    echo $this->Html->css('all.min.css');
    echo $this->Html->css('argon.css');
    echo $this->Html->css('icon.css');
    echo $this->Html->css('projeto.css');
?>


<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
    </script>

</head>
<body>
<div class="modal"></div>
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="scroll" data-simplebar>
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
     
<!-- Collapse -->
<div class="collapse navbar-collapse" id="sidenav-collapse-main">
  <?php echo $this->Html->image('/img/vayron.png', array('class' => 'img-tamanho'));
  ?>
   <!-- hr traço -->
   <hr class="my-3">
        <!-- Navigation -->
      <ul class="navbar-nav">
        <li class="nav-item">
      <div class="scrollbar" id="style-2">
      <div class="force-overflow"></div>
      </div>         
      <?php 
  echo $this->Html->link($this->Html->tag('span',  '&#xe88a; ', array('class' => 'material-icons text-primary')) . 'Dashboard','/dashboards', array('class' => 'nav-link', 'escape' => false));
  ?>
  <?php 
  echo $this->Html->link($this->Html->tag('span',  '&#xe7f7;', array('class' => 'material-icons color-notificacoes')) . 'Notificações','/notificacoes/add', array('class' => 'nav-link', 'escape' => false));
  ?>
 <?php 
 echo $this->Html->link($this->Html->tag('span',  '	&#xe8bc;', array('class' => 'material-icons text-primary')) . 'Gerenciar Pedidos','/pedidos', array('class' => 'nav-link', 'escape' => false));
  ?>
   <?php 
 echo $this->Html->link($this->Html->tag('span',  '&#xe227;', array('class' => 'material-icons text-cancelados')) . 'Cupom de Descontos','/cupoms', array('class' => 'nav-link', 'escape' => false));
  ?>
 <?php 
 echo $this->Html->link($this->Html->tag('span',  '&#xe87f;', array('class' => 'material-icons text-primary' )) . 'Estados Ped.','/estados', array('class' => 'nav-link', 'escape' => false));
  ?>
 
 <?php
  echo $this->Html->link($this->Html->tag('span',  '&#xe7fe;', array('class' => 'material-icons text-yellow')) . 'Clientes','/clientes', array('class' => 'nav-link', 'escape' => false));
  ?>
  <?php
   echo $this->Html->link($this->Html->tag('span',  '&#xe893;', array('class' => 'material-icons text-info')) . 'Categorias','/categorias', array('class' => 'nav-link', 'escape' => false));
  ?>
  <?php
   echo $this->Html->link($this->Html->tag('span',  '&#xe56c;', array('class' => 'material-icons text-info')) . 'Produtos','/produtos', array('class' => 'nav-link', 'escape' => false));
  ?>
  <?php 
  echo $this->Html->link($this->Html->tag('span',  '&#xe561;	', array('class' => 'material-icons text-suporte')) . 'Produtos em Promoção','/Promocaos', array('class' => 'nav-link', 'escape' => false));
  ?>
  <?php 
  echo $this->Html->link($this->Html->tag('span',  '&#xe91b;', array('class' => 'material-icons text-info')) . 'MotoBoy','/motoboys', array('class' => 'nav-link', 'escape' => false));
  ?>
  <?php
   echo $this->Html->link($this->Html->tag('span',  '&#xe7fd;', array('class' => 'material-icons text-primary' )) . 'Cadastrar Usuarios','/usuarios', array('class' => 'nav-link', 'escape' => false));
  ?>
   <?php
    echo $this->Html->link($this->Html->tag('span',  '&#xe87f;', array('class' => 'material-icons text-primary' )) . 'FeedBacks','/usuarios', array('class' => 'nav-link', 'escape' => false));
  ?>

          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Administrativo</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
          <?php echo $this->Html->link($this->Html->tag('span',  '&#xe30f;', array('class' => 'material-icons text-primary' )) . 'Smart','/smarts', array('class' => 'nav-link', 'escape' => false));
          ?>
          <?php echo $this->Html->link($this->Html->tag('span',  '&#xe7fd;', array('class' => 'material-icons text-primary' )) . 'Cadastrar Usuario','/usuarios', array('class' => 'nav-link', 'escape' => false));
          ?>
        <?php echo $this->Html->link($this->Html->tag('span',  '&#xe01d;', array('class' => 'material-icons text-primary' )) . 'Rel. Produto Mais Vendido','/usuarios', array('class' => 'nav-link', 'escape' => false));
          ?> 
           <?php echo $this->Html->link($this->Html->tag('span',  '&#xe01d;', array('class' => 'material-icons text-primary' )) . 'Rel. Qtd. Clientes Cadastrados','/usuarios', array('class' => 'nav-link', 'escape' => false));
          ?> 
            <?php echo $this->Html->link($this->Html->tag('span',  '&#xe01d;', array('class' => 'material-icons text-primary' )) . 'Rel. Produto em Estoque','/usuarios', array('class' => 'nav-link', 'escape' => false));
          ?> 
          <?php echo $this->Html->link($this->Html->tag('span',  '&#xe01d;', array('class' => 'material-icons text-primary' )) . 'Rel. Produto Mais Visitado','/usuarios', array('class' => 'nav-link', 'escape' => false));
          ?>
            </a>
          </li>
        </ul>
      </div>
  </nav>
</div>
</div>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Dashboard</a>
       
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
        <button type="button" class="btn btn-primary">
  <span>Notificações</span>
  <span class="badge badge-white">4</span>
</button>
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                 <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Jessica TO AQUIJones</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="./examples/profile.html" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <?php 
  echo $this->Html->link($this->Html->tag('span',  '&#xe88a; ', array('class' => 'material-icons text-primary')) . 'Sair','/sair', array('class' => 'dropdown-item', 'escape' => false));
  ?>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Qtd. Produtos</h5>
                      
                      <span class="h2 font-weight-bold mb-0"><?php  echo $Produto ?></span>
                      
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                      <?php echo $this->Html->link($this->Html->tag('span',  '&#xe854; ', array('class' => 'material-icons text-branco')) . '','/ators', array('class' => 'nav-link', 'escape' => false));
  ?>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                 
             
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Qtd. MotoBoy</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $motoBoy ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                      <?php echo $this->Html->link($this->Html->tag('span',  '	&#xe91b;', array('class' => 'material-icons text-branco')) . '','/ators', array('class' => 'nav-link', 'escape' => false));?>
                     
                      </div>
                    </div>
                  </div>
            
            
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0"> Pedidos</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $Pedido ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                      <?php echo $this->Html->link($this->Html->tag('span',  '&#xe8bc;', array('class' => 'material-icons text-branco')) . '','/ators', array('class' => 'nav-link', 'escape' => false));?>
                     
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                  
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Usuarios</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $Usuario ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                      <?php echo $this->Html->link($this->Html->tag('span',  '&#xe7fe;', array('class' => 'material-icons text-branco')) . '','/ators', array('class' => 'nav-link', 'escape' => false));?>
                     
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                 
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div id="chart_div" style="width: 900px; height: 500px;"></div>
          <div class="card bg-gradient-default shadow">
            <div class="card-header bg-transparent">

              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                  <h2 class="text-white mb-0">Sales value</h2>
                </div>
                <div class="col">
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">Month</span>
                        <span class="d-md-none">M</span>
                      </a>
                    </li>
                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                        <span class="d-none d-md-block">Week</span>
                        <span class="d-md-none">W</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <canvas id="chart-sales" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                  <h2 class="mb-0">Total orders</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <canvas id="chart-orders" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Page visits</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Page name</th>
                    <th scope="col">Visitors</th>
                    <th scope="col">Unique users</th>
                    <th scope="col">Bounce rate</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      /argon/
                    </th>
                    <td>
                      4,569
                    </td>
                    <td>
                      340
                    </td>
                    <td>
                      <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /argon/index.html
                    </th>
                    <td>
                      3,985
                    </td>
                    <td>
                      319
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /argon/charts.html
                    </th>
                    <td>
                      3,513
                    </td>
                    <td>
                      294
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /argon/tables.html
                    </th>
                    <td>
                      2,050
                    </td>
                    <td>
                      147
                    </td>
                    <td>
                      <i class="fas fa-arrow-up text-success mr-3"></i> 50,87%
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /argon/profile.html
                    </th>
                    <td>
                      1,795
                    </td>
                    <td>
                      190
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Social traffic</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Referral</th>
                    <th scope="col">Visitors</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      Facebook
                    </th>
                    <td>
                      1,480
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">60%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Facebook
                    </th>
                    <td>
                      5,480
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">70%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Google
                    </th>
                    <td>
                      4,807
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">80%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Instagram
                    </th>
                    <td>
                      3,678
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">75%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      twitter
                    </th>
                    <td>
                      2,645
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">30%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Footer -->
      <footer class="footer">
        
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
 
  <?php 
  
  echo $this->Html->script('jquery-3.4.1.min');
  echo $this->Html->script('siplebarMenu.js');
  echo $this->Html->script('loading.js');
  echo $this->Html->script('bootstrap.bundle.min.js');
  echo $this->Html->script('Chart.extension.js');
  echo $this->Html->script('argon.js');
  echo $this->Html->script('pages.js');
  echo $this->Js->writeBuffer();
  ?>
    </body>

</html>