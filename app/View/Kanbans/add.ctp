<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');

$formFields .= $this->Form->hidden('Kanban.id');
$formFields .= $this->Form->hidden('Kanban.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));

$this->assign('title', 'Adicionar Tarefa');
$formFields .= $this->Html->tag('h4', 'Dados ', array('class' => 'disabled mt-4'));

$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row', 
$this->Form->input('Kanban.tarefa', array(
    'label' => array('text' => 'Tarefa'),
    'type' => 'textarea',
    'div' => array('class' => 'form-group col-md-4'),
))
);
$formFields .= $this->Html->div('form-row', 
$this->Form->input('Kanban.situacao_id', array(
    'label' => array('text' => 'Situação'),
    'div' => array('class' => 'form-group col-md-4'),
    'type' => 'select',
    'options' => array(
        '1' => 'A Fazer',
        '2' => 'Fazendo',
        '3' => 'Feito'
    )
)) 
);

$this->assign('formFields', $formFields);
?>
