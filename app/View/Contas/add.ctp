<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('Conta.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));

$this->assign('title', 'Adicionar Conta');
$formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'disabled mt-4'));

$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Conta.tipoconta', array(
    'label' => array('text' => 'Tipo de Conta *'),
    'div' => array('class' => 'form-group col-md-3'),
    )) . 
    $this->Form->input('Conta.valor', array(
        'label' => array('text' => 'Valor'),
        'div' => array('class' => 'form-group col-md-3 offset-2'),

    ))
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Conta.data_vencimento', array(
    'label' => array('text' => 'Data Vencimento *'),
    'div' => array('class' => 'form-group col-md-3'),
    'data-inputmask' => "'mask': '99/99/9999', 'greedy' : false"

    )) . 
    $this->Form->input('Conta.situacao', array(
        'label' => array('text' => 'Situação *'),
        'div' => array('class' => 'form-group col-md-3 offset-md-2'),
        'class' => 'form-control', 
        'type' => 'select',
        'options' => array(
            'Em Aberto' => 'Em Aberto',
            'Pago' => 'Pago',
        )
    ))
);

$this->assign('formFields', $formFields);
?>