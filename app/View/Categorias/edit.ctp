<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('Categoria.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));

$this->assign('title', 'Categoria');
$formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'disabled mt-4'));

$formFields .= $this->Html->tag('hr');
$formFields .= $this->Form->hidden('Categoria.id');
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Categoria.tipo_categoria', array(
    'label' => array('text' => 'Nome'),
    'div' => array('class' => 'form-group col-md-3'),
    ))
);

echo $this->Html->script('projeto');
$this->assign('formFields', $formFields);
?>