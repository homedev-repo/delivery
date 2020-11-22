<?php
$this->extend('/Elements/index');

$this->assign('title', 'Adicionais e Complementos');

$searchFields .= $this->Html->div('form-row',
$this->Form->input('Complemento.nome', array(
    'placeholder' => 'Nome', 
    'label' => array('class' => 'sr-only'),
    'class' => 'form-control col-md-11 mr-2',
    'div' => false,
    'type' =>'text'   
))
);
$this->assign('searchFields', $searchFields);


$titulos = array(
    array($this->Paginator->sort('Complemento.nome', 'Tipo') => array('width' => '25%',)),
    array('Preço de Custo' => array('width' => '15%')),
    array('Preço de Venda' => array('width' => '15%')), 
    array('' => array('width' => '18%'))
);
   
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

$detalhe = array();

foreach ($complementos as $complemento) {
    $complementoView = $this->Js->link($complemento['Complemento']['nome'], '/complementos/view/' . $complemento['Complemento']['nome'], array('update' => '#content'));
    $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger')), '/complementos/delete/' . $complemento['Complemento']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'escape' => false
    ));

    $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/complementos/edit/' . $complemento['Complemento']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'title' => 'Alterar',
        'escape' => false
    ));

    $classTooltipBotao = 'hint--top float-right mr-2';
    $textoTooltipAlterar = 'Alterar';
    $textoTooltipExcluir = 'Excluir';
    $excluir = $this->Html->tag('span', $excluir, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipExcluir));
    $alterar = $this->Html->tag('span', $alterar, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipAlterar));
    $detalhe[] = array(        
    $complemento['Complemento']['nome'],
    $complemento['Complemento']['preco_custo'],
    $complemento['Complemento']['preco_venda'],
    $excluir . ' ' .  $alterar
    );
}

$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);
