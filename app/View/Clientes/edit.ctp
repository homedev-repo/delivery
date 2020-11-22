<?php

$this->extend('/Common/form');
$this->assign('title', 'Clientes');
$formFields .= $this->Form->hidden('Cliente.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));

$formFields .= $this->element('formCreate');
$formFields .= $this->Form->hidden('Cliente.id');
$formFields .= $this->Html->tag('h4', 'Situação', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row ',
    $this->Html->div('col-md-6 form-group',
   
        $this->Html->div('form-check form-check-inline',
            $this->Form->input('Cliente.situacao_id', array(
                'legend' => false,
                'required' => false,
                'type' => 'radio',
                'options' => array('1' => 'Ativo', '2' => 'Bloqueado'),
                'class' => 'form-check-input mb-2',
                'div' => false,
                'label' => array('class' => 'AbreOpcao form-check-label mr-3 mb-2'),
                'error' => array('attributes' => array('class' => 'form-check-input mb-2 text-danger'))
            )
        ))
    )
);

$formFields .= $this->Html->div('form-row',
    $this->Form->input('Cliente.justificativa', array(
        'label' => array('text' => 'Justificativa'),
        'div' => array('class' => 'form-group Justificativa col-md-6'),
        'type' => 'textarea',
    ))
);

$this->assign('formFields', $formFields);