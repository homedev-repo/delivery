<?php

$this->extend('/Common/form');

$this->assign('title',  'Tipos e Tamanhos');
$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('Tipo.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));

$formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'disabled mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Tipo.descricao', array(
    'label' => array('text' => 'Tipo'),
    'placeholder' => array('text' => 'Ex: Milk Shake, Pizza, Lanche, Açai'),
    'div' => array('class' => 'form-group col-md-3'),
    ))
);

$formFields .= $this->Html->tag('h4', 'Tamanhos', array('class' => 'disabled mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row criarCloneDescricao', 
    $this->Form->input('Tamanho.0.descricao', array(
        'label' => array('text' => 'Qual seria o tamanho ?'),
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group col-md-3'),
    )) 
);

$formFields .= $this->Html->div('form-row tamanho1View', 
    $this->Form->input('Tamanho.1.descricao', array(
        'label' => false,
        'id' => 'inputTamanho1View',
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group input-group col-md-3'),
    )) 
);

$formFields .= $this->Html->div('form-row tamanho2View', 
    $this->Form->input('Tamanho.2.descricao', array(
        'label' => false,
        'id' => 'inputTamanho2View',
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group input-group col-md-3'),
    )) 
);

$formFields .= $this->Html->div('form-row tamanho3View', 
    $this->Form->input('Tamanho.3.descricao', array(
        'label' => false,
        'id' => 'inputTamanho3View',
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group input-group col-md-3'),
    )) 
);

$formFields .= $this->Html->div('form-row tamanho4View', 
    $this->Form->input('Tamanho.4.descricao', array(
        'label' => false,
        'id' => 'inputTamanho4View',
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group input-group col-md-3'),
    ))
);

$formFields .= $this->Html->div('form-row tamanho5View', 
    $this->Form->input('Tamanho.5.descricao', array(
        'label' => false,
        'id' => 'inputTamanho5View',
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group input-group col-md-3'),
    ))
);

$this->assign('formFields', $formFields);
?>