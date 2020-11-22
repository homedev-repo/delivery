<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');

$formFields .= $this->Form->hidden('Cupom.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));

$this->assign('title', 'Cupons');
$formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'disabled mt-4'));

$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div(
    'form-row',
    $this->Form->input('Cupom.numero_cupom', array(
        'label' => array('text' => 'Codigo do Cupom'),
        'div' => array('class' => 'form-group col-md-3'),
    )) .
        $this->Form->input('Cupom.situacao', array(
            'label' => array('text' => 'Situação'),
            'div' => array('class' => 'form-group col-md-3  offset-1'),
            'type' => 'select',
            'options' => array(
                '1' => 'Ativo',
                '2' => 'Desativado',
            )
        ))
);
$formFields .= $this->Html->div(
    'form-row',
    $this->Form->input('Cupom.total_desconto', array(
        'label' => array('text' => 'Desconto R$'),
        'div' => array('class' => 'form-group col-md-3'),
        'placeholder' => 'R$',
        'data-inputmask' => "'mask': '99,99', 'greedy' : false"
    )) .
        $this->Form->input('Cupom.validade', array(
            'label' => array('text' => 'Data Validade'),
            'div' => array('class' => 'form-group col-md-3  offset-1'),
            'class' => 'form-control',
            'error' => array('attributes' => array('class' => 'invalid-feedback')),
            'data-inputmask' => "'mask': '99/99/9999', 'greedy' : false"
        ))
);

$formFields .= $this->Html->div(
    'form-row ',
    $this->Html->div(
        'col-md-6 form-group ocultaDiv',
        $this->Html->para('h5', 'Atribuir cupom a um cliente ?') .
            $this->Html->div(
                'form-check form-check-inline',
                $this->Form->input(
                    'Cupom.atribuir_cupom',
                    array(
                        'legend' => false,
                        'required' => false,
                        'type' => 'radio',
                        'options' => array('Sim' => 'Sim', 'Não' => 'Não'),
                        'class' => 'form-check-input mb-2',
                        'div' => false,
                        'label' => array('class' => 'AbreOpcao form-check-label mr-3 mb-2'),
                        'error' => array('attributes' => array('class' => 'form-check-input mb-2 text-danger'))
                    )
                )
            )
    )
);

$formFields .= $this->Html->div(
    'form-row',
    $this->Form->input('Cupom.cliente_id', array(
        'label' => array('text' => 'Cliente'),
        'div' => array('class' => ' form-group col-md-3'),
        'id' => 'CupomCliente',
        'empty' => '-- Selecione o cliente --',
        'type' => 'select',
        'options' => $clientes
    ))
);
$this->assign('formFields', $formFields);
