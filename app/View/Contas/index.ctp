<?php
$this->extend('/Elements/index_contasAPagar');
$this->assign('title', 'Contas a Pagar');
$searchFields .= $this->Html->div('form-row',
    $this->Form->input('Conta.tipoconta', array(
        'placeholder' => 'Nome Conta', 
        'label' => array('class' => 'sr-only'),
        'class' => 'form-control col-md-6 mr-2',
        'div' => false          
    )) .
    $this->Form->input('Conta.situacao', array(
        'type' => 'select',
        'options' => array(
            '' => 'Todos',
            'Em Aberto' => 'Em Aberto',
            'Pago' => 'Pago'
        ),
        'required' => false,
        'label' => array('class' => 'sr-only'),
        'class' => 'form-control'
    ))
);
$this->assign('searchFields', $searchFields);

$imprimirContaButton = $this->Html->link($this->Html->tag('i', '', 
    array('class' => 'fas fa-print')), '/contas/impressaoRelatorioContas/', array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right mr-2',
        'title' => 'Impressão das Contas Cadastrados',
        'escape' => false,
        'target' => '_blank'
    )
);

$this->assign('imprimirContaButton', $imprimirContaButton);

$titulos = array(
    array($this->Paginator->sort('Conta.tipoconta', 'Conta') => array( 'width' => '15%', 'title' => 'Ordenar por Conta' )),
    array('Valor' => array('width' => '10%')),
    array('Data Vencimento' => array('width' => '16%')),
    array('Tel. Responsável' => array('width' => '16%')),
    array($this->Paginator->sort('Conta.situacao', 'Situação') => array( 'width' => '0%', 'title' => 'Ordenar por Situação' )),
);
    
    $tableHeaders = $this->Html->tableHeaders($titulos);
    $this->assign('tableHeaders', $tableHeaders);
    
    
    $detalhe = array();
    foreach ($contas as $conta) {
        $year = substr($conta['Conta']['data_vencimento'], 0, 4);
        $month = substr($conta['Conta']['data_vencimento'], 5, 2);
        $day = substr($conta['Conta']['data_vencimento'], 8, 2);
        $conta['Conta']['data_vencimento']  =  $day . '/' . $month . '/' . $year;
        $dataContaCliente = $conta['Conta']['data_vencimento'];
        
        $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger')), '/contas/delete/' . $conta['Conta']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ml-2',
            'escape' => false
        ));

        $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/contas/edit/' . $conta['Conta']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ml-2',
            'title' => 'Alterar',
            'escape' => false
        ));


        if ($conta['Conta']['situacao'] == 'Pago'){
            $colorTextSituacao = 'kt-badge kt-badge--success kt-badge--inline kt-badge--pill';
        } else {
            $colorTextSituacao = 'kt-badge kt-badge--warning kt-badge--inline kt-badge--pill';
        }

        $detalhe[] = array(        
            $conta['Conta']['tipoconta'],
            $conta['Conta']['valor'],
            $conta['Conta']['data_vencimento'],
            $conta['Conta']['telefone_responsavel'],
            $this->Html->tag('span', $conta['Conta']['situacao'], array('class' => $colorTextSituacao)),
            $excluir . $alterar
        );
    }

        $tableCells = $this->Html->tableCells($detalhe);
        $this->assign('tableCells', $tableCells);

?>

  


