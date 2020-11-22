<?php
    $this->extend('/Elements/indexMotoboy');

    $this->assign('title', 'Motoboys');

    $searchFields .= $this->Html->div('form-row',
    $this->Form->input('Motoboy.nomeCpf', array(
        'placeholder' => 'Nome, CPF ou Empresa', 
        'label' => array('class' => 'sr-only'),
        'class' => 'form-control col-md-11 mr-2',
        'div' => false          
    ))
);
    $this->assign('searchFields', $searchFields);

    $titulos = array(
        array($this->Paginator->sort('Motoboy.nome_motoboy', 'Nome') => array( 'width' => '10%', 'class'=>"hint--bottom", 'aria-label'=>"Ordenar por Custo")),
        array('CPF' => array('width' => '0%')),
        array('Empresa' => array( 'width' => '0%',)),
        array('Terceirizado' => array( 'width' => '0%',)),
    );
    
    $tableHeaders = $this->Html->tableHeaders($titulos);
    $this->assign('tableHeaders', $tableHeaders);
    
    $detalhe = array();
    foreach ($motoboys as $motoboy) {
        $motoboyView = $this->Js->link($motoboy['Motoboy']['nome_motoboy'], '/motoboys/view/' . $motoboy['Motoboy']['id'], array('update' => '#content'));
        $empresaView = $this->Js->link($motoboy['Motoboy']['nome_empresa_terceirizada'], '/motoboys/view/' . $motoboy['Motoboy']['id'], array('update' => '#content'));
  
        $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger')), '/motoboys/delete/' . $motoboy['Motoboy']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ml-2',
            'escape' => false
        ));

        $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/motoboys/edit/' . $motoboy['Motoboy']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ml-2',
            'title' => 'Alterar',
            'escape' => false
        ));

        if ($motoboy['Motoboy']['terceirizada'] == 'Sim'){
            $colorTextSituacao = 'kt-badge kt-badge--success kt-badge--inline kt-badge--pill';
        } else {
            $colorTextSituacao = 'kt-badge kt-badge--warning kt-badge--inline kt-badge--pill';
        }

        $classTooltipBotao = 'hint--top float-right mr-2';
        $classTooltipView = 'hint--top';
        $textoTooltipView = 'Visualizar';
        $textoTooltipAlterar = 'Alterar';
        $textoTooltipExcluir = 'Excluir';
        $excluir = $this->Html->tag('span', $excluir, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipExcluir));
        $alterar = $this->Html->tag('span', $alterar, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipAlterar));
        $detalhe[] = array(     
            $this->Html->tag('span', $motoboyView, array('class' => $classTooltipView, 'aria-label'=> $textoTooltipView)),
            $motoboy['Motoboy']['cpf'],
            $this->Html->tag('span', $empresaView, array('class' => $classTooltipView, 'aria-label'=> $textoTooltipView)),
            $this->Html->tag('span', $motoboy['Motoboy']['terceirizada'], array('class' => $colorTextSituacao)),
            $excluir . ' ' . $alterar
        );
    }

    $tableCells = $this->Html->tableCells($detalhe);
    $this->assign('tableCells', $tableCells);
?> 

