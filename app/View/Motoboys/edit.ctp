<?php

$this->extend('/Common/form');
$this->assign('title', 'Motoboys');
$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('Motoboy.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));
$formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Form->hidden('Motoboy.id');
$formFields .= $this->Html->div('form-row ',
    $this->Html->div('col-md-6 form-group',
        $this->Html->para('h5', 'Motoboy Terceirizado ?') .
        $this->Html->div('form-check form-check-inline',
            $this->Form->input('Motoboy.terceirizada', array(
                'legend' => false,
                'required' => false,
                'type' => 'radio',
                'options' => array('Sim' => 'Sim', 'Não' => 'Não'),
                'class' => 'form-check-input mb-2',
                'div' => false,
                'label' => array('class' => 'AbreOpcao form-check-label mr-3 mb-2'),
                'error' => array('attributes' => array('class' => 'form-check-input mb-2 text-danger'))
            )
        ))
    )
);
$formFields .= $this->Html->div('form-row',
    $this->Form->input('Motoboy.nome_empresa_terceirizada', array(
        'label' => array('text' => 'Nome Empresa'),
        'div' => array('class' => 'motoboyTerceirizado form-group col-md-3'),
    )) .
    $this->Form->input('Motoboy.cnpj_empresa_terceirizada', array(
        'label' => array('text' => 'CNPJ Empresa'),
        'div' => array('class' => ' motoboyTerceirizado form-group col-md-3 offset-md-3'),
        'placeholder'=>'Ex: 1234567891011',
        'data-inputmask' => "'mask': '9', 'repeat': 14, 'greedy' : false",

    ))
);
$formFields .= $this->Html->div('form-row',
    $this->Form->input('Motoboy.nome_motoboy', array(
        'label' => array('text' => 'Nome'),
        'div' => array('class' => 'Tercerizado form-group col-md-3'),
    )) .
    $this->Form->input('Motoboy.cpf', array(
        'label' => array('text' => 'CPF'),
        'div' => array('class' => 'Tercerizado form-group col-md-3 offset-md-3 offset-mr-4'),
        'data-inputmask' => "'mask': '9', 'repeat': 11, 'greedy' : false",
    ))
);
$formFields .= $this->Html->div('form-row',
    $this->Form->input('Motoboy.cnh', array(
        'label' => array('text' => 'CNH'),
        'div' => array('class' => 'Tercerizado form-group col-md-3'),
        'data-inputmask' => "'mask': '*', 'repeat': 11, 'greedy' : false"
    )) .
    $this->Form->input('Motoboy.data_nascimento', array(
        'label' => array('text' => 'Data Nascimento'),
        'div' => array('class' => 'Tercerizado form-group col-md-3 offset-md-3 offset-mr-4'),
        'data-inputmask' => "'mask': '99/99/9999', 'greedy' : false"
    ))
);
$formFields .= $this->Html->div('form row',
    $this->Form->input('Motoboy.rendimento', array(
        'label' => array('text' => 'Forma de Rendimento'),
        'div' => array('class' => 'Tercerizado form-group col-md-3'),
        'type' => 'select',
        'options' => array(
            'Pagamento de diária' => 'Pagamento de diária',
            'Pagamento por entrega' => 'Pagamento por entrega',
            'Pagamento mensal' => 'Pagamento mensal',
        )
    )) . 
    $this->Form->input('Motoboy.valor_pago', array(
        'label' => array('text' => 'Valor pago ao Motoboy'),
        'div' => array('class' => 'Tercerizado form-group offset-md-3 col-md-3'),
    ))
);

$formFields .= $this->Html->div('form-row',$this->Html->tag('h4', 'Dados Veículo', array('class' => ' Tercerizado mt-4')));
$formFields .= $this->Html->tag('hr');

$formFields .= $this->Html->div('form-row',
    $this->Form->input('Motoboy.placa', array(
        'label' => array('text' => 'Placa Veículo (Opcional)'),
        'div' => array('class' => 'Tercerizado form-group col-md-3'),
        'data-inputmask' => "'mask': 'AAA9*99', 'greedy' : false",
    )) .
    $this->Form->input('Motoboy.modelo_moto', array(
        'label' => array('text' => 'Modelo Veículo (Opcional)'),
        'div' => array('class' => 'Tercerizado form-group col-md-3 offset-md-3 offset-mr-4'),
    ))
);

$this->assign('formFields', $formFields);
?>