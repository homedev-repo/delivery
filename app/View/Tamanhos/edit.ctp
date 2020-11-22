<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');

$formFields .= $this->Form->hidden('Tamanho.id');
$formFields .= $this->Form->hidden('Tamanho.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));
$this->assign('title', 'Tamanhos');
$disabled = true;
if ($this->request->data['Tamanho']['habilitar'] == 1) {
    $disabled = false;
}
$formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'disabled mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row', 
$this->Html->div('form-check form-check-inline',
$this->Form->input('Tamanho.habilitar', array(
    'required' => false,
    'type' => 'checkbox',
    'label' => 'Habilitar',
    'hiddenField' => 'N',
    'class' => 'form-check-input',
    'div' => false,
))) . 
    $this->Form->input('Tamanho.descricao', array(
        'label' => array('text' => 'Tamaho Cadastrado'),
        'disabled' => true,
        'div' => array('class' => 'form-group col-md-3'),
    )) . 
    $this->Form->input('Tamanho.preco_custo', array(
        'label' => array('text' => 'Preço de custo? *'),
        'div' => array('class' => 'form-group col-md-3'),
        'disabled' => $disabled,
        'id' => 'inputTamanhoprecocustoEditTamanho',
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'class' => 'form-control', 
        )
    ) . 
    $this->Form->input('Tamanho.preco_venda', array(
        'label' => array('text' => 'Preço de venda? *'),
        'div' => array('class' => 'form-group col-md-3'),
        'disabled' => $disabled,
        'id' => 'inputTamanhoprecovendaEditTamanho',
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'class' => 'form-control', 
    )) 
);


$this->assign('formFields', $formFields);
