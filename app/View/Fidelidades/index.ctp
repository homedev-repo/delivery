<?php
$this->extend('/Elements/index_fidelidade');
$this->assign('title', 'Programa de Fidelidade');
$searchFields .= $this->Html->div('form-row',
    $this->Form->input('Fidelidade.nome', array(
        'placeholder' => 'Nome', 
        'label' => array('class' => 'sr-only'),
        'class' => 'form-control col-md-11 mr-2',
        'div' => false          
    ))
);
$this->assign('searchFields', $searchFields);

$titulos = array(
    array($this->Paginator->sort('Fidelidade.nome', 'Nome') => array( 'width' => '15%', 'title' => 'Ordenar por Nome' )),
    array('Prêmio' => array('width' => '25%')),
    array('Recompensa' => array('width' => '25%')));
    
    $tableHeaders = $this->Html->tableHeaders($titulos);
    $this->assign('tableHeaders', $tableHeaders);
    
    $detalhe = array();
    foreach ($fidelidades as $fidelidade) {

        $fidelidadeView = $this->Js->link($fidelidade['Fidelidade']['nome'], '/fidelidades/view/' . $fidelidade['Fidelidade']['id'], array('update' => '#content'));

        $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger')), '/fidelidades/delete/' . $fidelidade['Fidelidade']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ml-2',
            'escape' => false
        ));

        $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/fidelidades/edit/' . $fidelidade['Fidelidade']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ml-2',
            'title' => 'Alterar',
            'escape' => false
        ));

        $detalhe[] = array(        
            $fidelidadeView,
            $fidelidade['Premio']['nome'],
            $fidelidade['Recompensa']['nome'],
            $excluir . ' ' . $alterar
        );
    }
        $tableCells = $this->Html->tableCells($detalhe);
        $this->assign('tableCells', $tableCells);
