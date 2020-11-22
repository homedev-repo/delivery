<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');

$formFields .= $this->Form->hidden('Cupom.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));

$this->assign('title', 'Facebook');
$formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'disabled mt-4'));

$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div(
    'form-row',
    $this->Form->input('Facebook', array(
        'label' => array('text' => 'O que você precisa fazer?'),
        'div' => array('class' => ' form-group col-md-3'),
        'empty' => '-- Selecione a Opção --',
        'type' => 'select',
        'options' => array(
            '1' => 'Publicar um Produto',
            '2' => 'Postar um endereço de link (URL)',
        )
    ))
);
/*
$formFields .= $this->Js->link($this->Html->tag('i', '', array('class' => 'fas fa-undo')) .
    ' Get Infofo',
    '#',
    array(
        'class' => 'btn btn-secondary mt-4',
        'onclick' => 'getInfo()',
        'escape' => false,
        'update' => '#content'
    )
);

$formFields .= $this->Js->link($this->Html->tag('i', '', array('class' => 'fas fa-undo')) .
    ' Postar',
    '#',
    array(
        'class' => 'btn btn-secondary mt-4',
        'onclick' => 'post()',
        'escape' => false,
        'update' => '#content'
    )
);

$formFields .= $this->Js->link($this->Html->tag('i', '', array('class' => 'fab fa-facebook-square')) .
    'Logar na conta do Facebook',
    '#',
    array(
        'class' => 'btn btn-secondary mt-4',
        'onclick' => 'login()',
        'escape' => false,
        'update' => '#content'
    )
);
*/
$this->assign('formFields', $formFields);
