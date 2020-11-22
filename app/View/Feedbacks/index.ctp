<?php
$this->extend('/Elements/indexFeedback');
$this->assign('title', 'FeedBacks');
$searchFields .= $this->Html->div('form-row',
$this->Form->input('Pedido.numero_pedido', array(
    'placeholder' => 'N° Pedido', 
    'label' => array('class' => 'sr-only'),
    'class' => 'form-control col-md-11 mr-2',
    'div' => false          
))
);
$this->assign('searchFields', $searchFields);

$titulos = array(
    array($this->Paginator->sort('Pedido.numero_pedido', 'Pedido') => array( 'width' => '28%',  'class'=>"hint--bottom", 'aria-label'=>"Ordenar por Pedido" )),
    array('Feedback' => array( 'width' => '0%' )),
    array($this->Paginator->sort( '', '', array('escape' => false)) => array('width' => '0'))
);
    
    $tableHeaders = $this->Html->tableHeaders($titulos);
    $this->assign('tableHeaders', $tableHeaders);

    $detalhe = array();
    foreach ($feedbacks as $feedback) {
        $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger')), '/feedbacks/delete/' . $feedback['Feedback']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ml-2',
            'escape' => false
        ));


        if($feedback['Pedido']['feedback'] == NULL || ''){
            $feedback['Pedido']['feedback'] = 'SEM FEEDBACK';
            $colorTextSituacao = 'kt-badge kt-badge--warning kt-badge--inline kt-badge--pill';
        }
        else{
            $colorTextSituacao = '';
        }

        $detalhe[] = array(        
            $feedback['Pedido']['numero_pedido'],
            $this->Html->tag('span', $feedback['Pedido']['feedback'], array('class' => $colorTextSituacao))
        );
    }
        $tableCells = $this->Html->tableCells($detalhe);
        $this->assign('tableCells', $tableCells);
?>