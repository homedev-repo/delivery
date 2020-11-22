
<?php

$detalhe = array();
foreach ($kanBanFazendo as $kanBans) {
    $deleteLink = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-times-circle text-danger')), '/kanbans/delete/' . $kanBans['Kanban']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-5',
        'title' => 'Excluir',
        'escape' => false
    ));
    $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/kanbans/edit/' . $kanBans['Kanban']['id'], array(
        'update' => '#content',
        'class' => ' btn btn-secondary float-right ml-2',
        'title' => 'Alterar',
        'escape' => false
    ));

    $tarefa = $kanBans['Kanban']['tarefa'];
    $quebraString = wordwrap($tarefa, 16, "<br />\n", true);
    $detalhe[] = array(
        $quebraString,
        $alterar . ' ' . ' ' . $deleteLink
    );
}
$tableCells = $this->Html->tableCells($detalhe);
$table = $this->Html->tag('table',  $tableCells, array('class' => 'table'));

if ($tableCells == '<tr></tr>') {
    $table = $this->Html->div(
        'nenhum-item mb-3',
        $this->Html->tag('h5', 'Nenhuma Tarefa Cadastrada', array('class' => 'text-muted mt-5 mb-5 text-center'))
    );
}
echo $table;
