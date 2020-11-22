<?php
$this->extend('/Elements/indexTipos');

$this->assign('title', 'Tipos e Tamanhos');

$searchFields .= $this->Html->div('form-row',
$this->Form->input('Tipo.descricao', array(
    'placeholder' => 'Pesquisar por Tipo', 
    'label' => array('class' => 'sr-only'),
    'class' => 'form-control col-md-11 mr-2',
    'div' => false          
))
);
$this->assign('searchFields', $searchFields);

$titulos = array(
    array($this->Paginator->sort('Tipo.descricao', 'Tipo') => array('width' => '0%', 'class'=>"hint--bottom", 'aria-label'=>"Ordenar por Tipo")),    
    array('', array('escape' => false)) => array('width' => '0%')
   );
   
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

   $detalhe = array();
   foreach ($tipos as $tipo) {
    $tipoView = $this->Js->link($tipo['Tipo']['descricao'], '/tipos/view/' . $tipo['Tipo']['id'], array('update' => '#content'));

    $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger')), '/tipos/delete/' . $tipo['Tipo']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'escape' => false
    ));

    $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/tipos/edit/' . $tipo['Tipo']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'title' => 'Alterar',
        'escape' => false
    ));

    $classTooltipBotao = 'hint--top float-right mr-2';
    $classTooltipView = 'hint--top';
    $textoTooltipView = 'Visualizar';
    $textoTooltipAlterar = 'Alterar';
    $textoTooltipExcluir = 'Excluir';
    $textoTooltipEmail = 'E-mail';
    $excluir = $this->Html->tag('span', $excluir, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipExcluir));
    $alterar = $this->Html->tag('span', $alterar, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipAlterar));
    $envioDeEmail = $this->Html->tag('span', $envioDeEmail, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipEmail));

    $detalhe[] = array(        
    $this->Html->tag('span', $tipoView, array('class' => $classTooltipView, 'aria-label'=> $textoTooltipView)),
    $excluir . ' ' .  $alterar
    );
}

$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);
