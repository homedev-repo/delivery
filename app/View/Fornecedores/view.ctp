<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('Fornecedore.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));

$this->assign('title', 'Fornecedores');
$formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'disabled mt-4'));

$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Fornecedore.nome', array(
    'label' => array('text' => 'Nome *'),
    'div' => array('class' => 'form-group col-md-3'),
    )) . 
    $this->Form->input('Fornecedore.responsavel', array(
        'label' => array('text' => 'Responsável *'),
        'div' => array('class' => 'form-group col-md-3  offset-2'),
        ))
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Fornecedore.email', array(
    'label' => array('text' => 'E-mail *'),
    'div' => array('class' => 'form-group col-md-3'),
    )) . 
    $this->Form->input('Fornecedore.cnpj', array(
        'label' => array('text' => 'CNPJ *'),
        'div' => array('class' => 'form-group col-md-3  offset-2'),
        ))
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Fornecedore.telefone', array(
    'label' => array('text' => 'Telefone *'),
    'div' => array('class' => 'form-group col-md-3'),
    )) . 
    $this->Form->input('Fornecedore.fax', array(
        'label' => array('text' => 'Fax'),
        'div' => array('class' => 'form-group col-md-3  offset-2'),
        ))
);

$formFields .= $this->Html->tag('h4', 'Dados Endereço', array('class' => 'disabled mt-4'));

$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Fornecedore.cep', array(
    'label' => array('text' => 'CEP'),
    'div' => array('class' => 'form-group col-md-3'),
    'class' => 'form-control Cep',
    )) . 
    $this->Form->input('Fornecedore.endereco', array(
        'label' => array('text' => 'Endereço'),
        'div' => array('class' => 'form-group col-md-3  offset-2'),
        'class' => 'form-control Rua',
        ))
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Fornecedore.cidade', array(
    'label' => array('text' => 'Cidade'),
    'div' => array('class' => 'form-group col-md-3'),
    'class' => 'form-control Cidade',
    )) . 
    $this->Form->input('Fornecedore.bairro', array(
        'label' => array('text' => 'Bairro'),
        'div' => array('class' => 'form-group col-md-3  offset-2'),
        'class' => 'form-control  Bairro',
        ))
);


echo $this->Html->script('projeto');
$this->assign('formFields', $formFields);