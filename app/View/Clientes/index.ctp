<?php
$this->extend('/Elements/indexClientes');
$this->assign('title', 'Clientes');

$searchFields .= $this->Html->div('form-row',
    $this->Form->input('Cliente.nomeCpf', array(
        'placeholder' => 'CPF ou Nome', 
        'label' => array('class' => 'sr-only'),
        'class' => 'form-control col-md-6 mr-2',
        'div' => false          
    )) .
    $this->Form->input('Cliente.situacao_id', array(
        'type' => 'select',
        'options' => array(
            '' => 'Todos',
            '1' => 'Ativos',
            '2' => 'Bloqueados'
        ),
        'required' => false,
        'label' => array('class' => 'sr-only'),
        'class' => 'form-control'
    ))
);
$this->assign('searchFields', $searchFields);

$imprimirClientesButton = $this->Html->link($this->Html->tag('i', '', 
    array('class' => 'fas fa-print')), '/clientes/impressaoRelatorioClientes/', array(
        'update' => '#content', 
        'class' => 'btn btn-secondary float-right mr-2 hint--left',
        'aria-label'=>"Impressão dos Clientes",
        'escape' => false,
        'target' => '_blank'
    )
);

$this->assign('imprimirClientesButton', $imprimirClientesButton);


$titulos = array(
    array($this->Paginator->sort('Cliente.nome', 'Nome') => array('width' => '0%', 'class'=>"hint--bottom", 'aria-label'=>"Ordenar por Nome")),
    array('CPF' => array('width' => '20%')),
    array($this->Paginator->sort('Cliente.situacao_id', 'Situações') => array('width' => '0%', 'class'=>"hint--bottom", 'aria-label'=>"Ordenar por Situações")),
    array('', array('escape' => false)) => array('width' => '0%')
);

$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

    $detalhe = array();
    foreach ($clientes as $cliente) {
        $colorTextSituacao = '';
        $ClienteView = $this->Js->link($cliente['Cliente']['nome'], '/clientes/view/' . $cliente['Cliente']['id'], array('update' => '#content'));
        $bloquear = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/clientes/edit/' . $cliente['Cliente']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ml-2',
            'title' => 'Situação',
            'escape' => false
        ));

        if (empty($cliente['Cliente']['situacao_id'])){
            $cliente['Cliente']['situacao_id'] = 1;
            $cliente['Situacao']['nome'] = 'Ativo';
        } 

        if ($cliente['Situacao']['nome'] == 'Ativo'){
            $colorTextSituacao = 'kt-badge  kt-badge--success kt-badge--inline kt-badge--pill';
        } else {
            $colorTextSituacao = 'kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill';
        }
        
        $classTooltipBotao = 'hint--top float-right mr-2';
        $classTooltipView = 'hint--top';
        $textoTooltipView = 'Visualizar';
        $textoTooltipbloquear = 'Situação';
        $bloquear = $this->Html->tag('span', $bloquear, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipbloquear));
        $detalhe[] = array(     
        $this->Html->tag('span', $ClienteView, array('class' => $classTooltipView, 'aria-label'=> $textoTooltipView)),
        $cliente['Cliente']['cpf'],
        $this->Html->tag('span', $cliente['Situacao']['nome'], array('class' => $colorTextSituacao)),
        $bloquear
    );
}

$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);

?>    
   

  


