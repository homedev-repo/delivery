<?php
$this->extend('/Elements/index_fichatecnica');
$this->assign('title', 'Ficha Técnica');
$searchFields .= $this->Html->div('form-row',
    $this->Form->input('Fichatecnica.nome_preparacao', array(
        'placeholder' => 'Nome Preparação', 
        'label' => array('class' => 'sr-only'),
        'class' => 'form-control col-md-11 mr-2',
        'div' => false          
    ))
);
$this->assign('searchFields', $searchFields);

$titulos = array(
    array($this->Paginator->sort('Fichatecnica.nome_preparacao', 'Preparação') => array( 'width' => '0%', 'class'=>"hint--bottom", 'aria-label'=>"Ordenar por Nome" )),
    );
    
    $tableHeaders = $this->Html->tableHeaders($titulos);
    $this->assign('tableHeaders', $tableHeaders);
    
    $detalhe = array();
    foreach ($fichatecnicas as $fichatecnica) {
        $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger')), '/fichatecnicas/delete/' . $fichatecnica['Fichatecnica']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ml-2',
            'escape' => false
        ));

        $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/fichatecnicas/edit/' . $fichatecnica['Fichatecnica']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ml-2',
            'title' => 'Alterar',
            'escape' => false
        ));
        $impressao = $this->Html->link($this->Html->tag('i', '', 
        array('class' => 'fas fa-print')), '/fichatecnicas/impressaoFichaTecnica/' . $fichatecnica['Fichatecnica']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right mr-2 hint--left',
            'aria-label'=>"Impressão Ficha Técnica",
            'escape' => false,
            'target' => '_blank'
            )
        );

        $classTooltip = 'hint--top float-right mr-2';
        $textoTooltipView = 'Visualizar';
        $textoTooltipAlterar = 'Alterar';
        $textoTooltipExcluir = 'Excluir';
        $excluir = $this->Html->tag('span', $excluir, array('class' => $classTooltip, 'aria-label'=> $textoTooltipExcluir));
        $alterar = $this->Html->tag('span', $alterar, array('class' => $classTooltip, 'aria-label'=> $textoTooltipAlterar));
        $detalhe[] = array(        
            $fichatecnica['Fichatecnica']['nome_preparacao'],
            $excluir . $alterar . $impressao
        );
    }
        $tableCells = $this->Html->tableCells($detalhe);
        $this->assign('tableCells', $tableCells);
