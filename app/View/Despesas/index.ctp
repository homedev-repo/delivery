<?php
$this->extend('/Elements/index_despesas');
$this->assign('title', 'Despesas');
$searchFields .= $this->Html->div('form-row',
    $this->Form->input('Despesa.custo', array(
        'placeholder' => 'Despesa', 
        'label' => array('class' => 'sr-only'),
        'class' => 'form-control col-md-6 mr-2',
        'div' => false          
    )) .
    $this->Form->input('Despesa.categoriadespesa_id', array(
        'type' => 'select',
        'empty' => 'Todos',
        'options' => $categoriaDespesas,
        'required' => false,
        'label' => array('class' => 'sr-only'),
        'class' => 'form-control'
    ))
);

$this->assign('searchFields', $searchFields);

$imprimir = $this->Html->link($this->Html->tag('i', '', 
    array('class' => 'fas fa-print')), '/Despesas/impressaoRelatorioDespesa/', array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right mr-2 hint--left',
        'aria-label'=>"Impressão das Despesas Cadastrado",
        'escape' => false,
        'target' => '_blank'
    )
);

$this->assign('imprimir', $imprimir);

$titulos = array(
    array($this->Paginator->sort('Despesa.custo', 'Custo') => array( 'width' => '25%', 'class'=>"hint--bottom", 'aria-label'=>"Ordenar por Custo")),
    array('Valor' => array('width' => '0%')),
    array('Categoria' => array( 'width' => '0%',)),
    array($this->Paginator->sort('Despesa.data_vencimento', 'Vencimento') => array( 'width' => '0%', 'class'=>"hint--bottom", 'aria-label'=>"Ordenar por Vencimento")),
);
    
    
    $tableHeaders = $this->Html->tableHeaders($titulos);
    $this->assign('tableHeaders', $tableHeaders);
    
    
    $detalhe = array();
    foreach ($despesas as $despesa) {
        $year = substr($despesa['Despesa']['data_vencimento'], 0, 4);
        $month = substr($despesa['Despesa']['data_vencimento'], 5, 2);
        $day = substr($despesa['Despesa']['data_vencimento'], 8, 2);
        $despesa['Despesa']['data_vencimento']  =  $day . '/' . $month . '/' . $year;
        $dataVencimentoFormatada = $despesa['Despesa']['data_vencimento'];

        $view = $this->Js->link($despesa['Despesa']['custo'], '/despesas/view/' . $despesa['Despesa']['id'], array('update' => '#content'));

        $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger')), '/despesas/delete/' . $despesa['Despesa']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ml-2',
            'escape' => false
        ));

        $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/despesas/edit/' . $despesa['Despesa']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ml-2',
            'escape' => false
        ));

    
        if($dataVencimentoFormatada == '//'){
            $dataVencimentoFormatada = 'NENHUMA DATA CADASTRADA';
            $colorTextSituacao = 'kt-badge kt-badge--warning kt-badge--inline kt-badge--pill';
        }else {
            $colorTextSituacao = '';
        }

        $classTooltipBotao = 'hint--top float-right mr-2';
        $classTooltipView = 'hint--top';
        $textoTooltipView = 'Visualizar';
        $textoTooltipAlterar = 'Alterar';
        $textoTooltipExcluir = 'Excluir';
        $excluir = $this->Html->tag('span', $excluir, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipExcluir));
        $alterar = $this->Html->tag('span', $alterar, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipAlterar));
        $detalhe[] = array(        
            $this->Html->tag('span', $view, array('class' => $classTooltipView, 'aria-label'=> $textoTooltipView)),
            str_replace(array(",","."),array(".",","), $despesa['Despesa']['valor']),
            $despesa['Categoriadespesa']['categoria'],
            $this->Html->tag('span', $dataVencimentoFormatada, array('class' => $colorTextSituacao)),
            $excluir . ' ' .  $alterar 
        );
    }
        $tableCells = $this->Html->tableCells($detalhe);
        $this->assign('tableCells', $tableCells);
?>

  


