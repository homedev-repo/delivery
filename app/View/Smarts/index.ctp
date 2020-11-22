<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">RELATÓRIOS</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">GRÁFICOS</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


    <h4>Regiões</h4>
    <hr>
    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <?php
            echo $this->Html->link('1. Regiões Atendidas', '/clientes/relatorioRegioesAtendidas', array(
              'escape' => false,
              'class' => 'btn btn-link h5'

            ));
            ?>
          </h5>
        </div>
      </div>
    </div>


    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <?php
            echo $this->Html->link('2. Regiões Mais Vendidas', '/pedidos/relatorioRegioes', array(
              'escape' => false,
              'class' => 'btn btn-link h5'

            ));
            ?>
          </h5>
        </div>
      </div>
    </div>


    <h4>Produtos</h4>
    <hr>
    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <?php
            echo $this->Html->link('1. Produtos Mais Vendidos', '/pedidos/relatorioRegioes', array(
              'escape' => false,
              'class' => 'btn btn-link h5'

            ));
            ?>
          </h5>
        </div>
      </div>
    </div>


    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <?php
            echo $this->Html->link('2. Produtos Menos Vendidos', '/pedidos/relatorioRegioes', array(
              'escape' => false,
              'class' => 'btn btn-link h5'

            ));
            ?>
          </h5>
        </div>
      </div>
    </div>



    <h4>Clientes</h4>
    <hr>
    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <?php
            echo $this->Html->link('1. Total de Clientes', '/clientes/relatorioSmartTotalClientes', array(
              'escape' => false,
              'class' => 'btn btn-link h5'

            ));
            ?>
          </h5>
        </div>
      </div>
    </div>


    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <?php
            echo $this->Html->link('2. Clientes que não compram a 1 Mês', '/clientes/relatorioSmartTotalClientes', array(
              'escape' => false,
              'class' => 'btn btn-link h5'

            ));
            ?>
          </h5>
        </div>
      </div>
    </div>

    <h4>Aniversariantes</h4>
    <hr>
    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <?php
            echo $this->Html->link('1. Aniversariantes do mês (Cliente)', '/clientes/relatorioSmartTotalClientes', array(
              'escape' => false,
              'class' => 'btn btn-link h5'

            ));
            ?>
          </h5>
        </div>
      </div>
    </div>

    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <?php
            echo $this->Html->link('2. Aniversariantes do mês (Usuários Sistema)', '/clientes/relatorioSmartTotalClientes', array(
              'escape' => false,
              'class' => 'btn btn-link h5'

            ));
            ?>
          </h5>
        </div>
      </div>
    </div>


    <h4>Faturamento</h4>
    <hr>
    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <?php
            echo $this->Html->link('1. Faturamento do Dia', '/pedidos/relatorioSmartTotalClientes', array(
              'escape' => false,
              'class' => 'btn btn-link h5'

            ));
            ?>
          </h5>
        </div>
      </div>
    </div>


    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <?php
            echo $this->Html->link('2. Faturamento da Semana', '/pedidos/relatorioSmartTotalClientes', array(
              'escape' => false,
              'class' => 'btn btn-link h5'

            ));
            ?>
          </h5>
        </div>
      </div>
    </div>

    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <?php
            echo $this->Html->link('3. Lucro Atual (Gastos cadastrados + Desperdício Cadastrados - Lucro dos Pedidos)', '/pedidos/relatorioSmartTotalClientes', array(
              'escape' => false,
              'class' => 'btn btn-link h5'

            ));
            ?>
          </h5>
        </div>
      </div>
    </div>

    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <?php
            echo $this->Html->link('4. Lucro de Pedidos por Mês', '/pedidos/relatorioSmartTotalClientes', array(
              'escape' => false,
              'class' => 'btn btn-link h5'

            ));
            ?>
          </h5>
        </div>
      </div>
    </div>


    <h4>Anual</h4>
    <hr>
    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <?php
            echo $this->Html->link('1. Relatório Anual', '/pedidos/relatorioSmartTotalClientes', array(
              'escape' => false,
              'class' => 'btn btn-link h5'

            ));
            ?>
          </h5>
        </div>
      </div>
    </div>

    <h4>Mês</h4>
    <hr>
    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <?php
            echo $this->Html->link('1. Relatório do Mês', '/pedidos/relatorioSmartTotalClientes', array(
              'escape' => false,
              'class' => 'btn btn-link h5'

            ));
            ?>
          </h5>
        </div>
      </div>
    </div>

    <h4>Entregadores</h4>
    <hr>
    <div id="accordion">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h5 class="mb-0">
            <?php
            echo $this->Html->link('1. Desempenho de Entregadores no Mês', '/pedidos/relatorioSmartTotalClientes', array(
              'escape' => false,
              'class' => 'btn btn-link h5'

            ));
            ?>
          </h5>
        </div>
      </div>
    </div>



  </div>
  <!--FimDivAcordion-->







  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">tEXT2</div>
</div>