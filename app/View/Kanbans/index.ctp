<?php
echo $this->Html->css('Metronic/kanban.css');
echo $this->element('header');
?>
<html lang="PT-BR">

<body>
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="alert alert-light alert-elevate" role="alert">
      <div class="alert-icon alert-icon-top"><i style="width: 50px; height: 50px;" class="fas fa-info-circle kt-font-brand"></i></div>
      <div class="alert-text">
        <p>
          <p><b>O que é o método Kanban ?</b></p>
          Dessa forma, se sabe quais tarefas precisam ser feitas, estão sendo feitas e as que foram concluídas, melhorar as realizações de tarefas, auxiliar na conclusão de demandas.
        </p>
      </div>
    </div>
    <section class="kanban-board">
      <h2 class="section-title"><span>Kanban ❤</span></h2>
      <div class="row">
        <div class="card col-sm " style="width: 27rem;">
          <div class="card-header info">
            <h4> A Fazer</h4>
          </div>
          <div class="scrollable">

            <ul class="list-group list-group-flush">
              <li class="list-group-item"><?php echo $this->element('tabelaKanbanSituacao1'); ?> </li>

            </ul>
          </div>
        </div>

        <div class="card col-sm" style="width: 27rem;">
          <div class="card-header warning">
            <h4>Fazendo</h4>
          </div>
          <div class="scrollable">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><?php echo $this->element('tabelaKanbanSituacao2'); ?> </li>
            </ul>
          </div>
        </div>

        <div class="card col-sm" style="width: 27rem;">
          <div class="card-header success">
            <h4>Feito</h4>
          </div>
          <div class="scrollable">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><?php echo $this->element('tabelaKanbanSituacao3'); ?> </li>
            </ul>
          </div>
        </div>
      </div>
      <br>
      <div class="timeline-board" style="padding:0 20px 0 20px;">
        <div class="board">
        </div>
      </div>
    </section>
    <div>
    </div>
</body>

</html>