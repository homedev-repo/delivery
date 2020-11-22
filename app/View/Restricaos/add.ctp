<?php
$this->extend('/Common/form');

$this->assign('title', 'Complementos');
$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('Complemento.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));
$formFields .= $this->Html->tag('h4', 'Restrição Alimentar', array('class' => 'disabled mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->tag('ul', '' .
$this->Html->tag('li', $this->Html->tag('a', 'PRODUTO',  array('class' =>'nav-link disabled')), array('class' =>'nav-item')).
$this->Html->tag('li', $this->Html->tag('a', 'CLASSIFICAÇÕES',  array('class' =>'nav-link active')), array('class' =>'nav-item')).
$this->Html->tag('li', $this->Html->tag('a', 'PROMOÇÕES',  array('class' =>'nav-link disabled')), array('class' =>'nav-item')),
    array('class'=>'nav nav-tabs')
);

$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Complemento.categoria_id', array(
        'label' => array('text' => 'Selecione a restrições'),
        'id' => 'selectTipo',
        'class' => 'form-control select2',
        'div' => array('class' => 'form-group col-md-4'),
        'id' => 'kt_select2_3',
        'name'=> "Restricoes",
        'multiple'=>"multiple",
        'type'=>"select",
        'type' => 'select',
        'options' => $restricoesAlimentar
    ))
);
$this->assign('formFields', $formFields);
