<?php
$this->extend('/Common/form');

$this->assign('title', 'Cadastro Tipos e Tamanhos');
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
$formFields .= $this->Html->div('form-row criarCloneDescricao', 
    $this->Form->input('Tamanho.0.descricao', array(
        'label' => array('text' => 'Qual seria o tamanho ?'),
        'id' => 'inputTamanho0',
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group col-md-3'),
    )) 
);

$formFields .= $this->Html->div('form-row tamanho1', 
    $this->Form->input('Tamanho.1.descricao', array(
        'label' => false,
        'id' => 'inputTamanho1',
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group input-group col-md-3'),
    )) . 
    $this->Html->div('input-group-btn tamanho1', 
    $this->Form->button(
        $this->Html->tag('i', '', array('class' => 'far fa-trash-alt')),
        array(
            'escape' => false,
            'class' => 'btn btn-danger fechaInput1 hint--right',
            'aria-label'=>"Excluir tamanho.",
        ))

    )
);

$formFields .= $this->Html->div('form-row tamanho2', 
    $this->Form->input('Tamanho.2.descricao', array(
        'label' => false,
        'id' => 'inputTamanho2',
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group input-group col-md-3'),
    )) . 
    $this->Html->div('input-group-btn', 
    $this->Form->button(
        $this->Html->tag('i', '', array('class' => 'far fa-trash-alt')),
        array(
            'escape' => false,
            'class' => 'btn btn-danger fechaInput2 hint--right',
            'aria-label'=>"Excluir tamanho.",
        ))

    )
);

$formFields .= $this->Html->div('form-row tamanho3', 
    $this->Form->input('Tamanho.3.descricao', array(
        'label' => false,
        'id' => 'inputTamanho3',
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group input-group col-md-3'),
    )) . 
    $this->Html->div('input-group-btn', 
    $this->Form->button(
        $this->Html->tag('i', '', array('class' => 'far fa-trash-alt')),
        array(
            'escape' => false,
            'class' => 'btn btn-danger fechaInput3 hint--right',
            'aria-label'=>"Excluir tamanho.",
        ))

    )
);

$formFields .= $this->Html->div('form-row tamanho4', 
    $this->Form->input('Tamanho.4.descricao', array(
        'label' => false,
        'id' => 'inputTamanho4',
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group input-group col-md-3'),
    )) . 
    $this->Html->div('input-group-btn', 
    $this->Form->button(
        $this->Html->tag('i', '', array('class' => 'far fa-trash-alt')),
        array(
            'escape' => false,
            'class' => 'btn btn-danger fechaInput4 hint--right',
            'aria-label'=>"Excluir tamanho.",
        ))

    )
);

$formFields .= $this->Html->div('form-row tamanho5', 
    $this->Form->input('Tamanho.5.descricao', array(
        'label' => false,
        'id' => 'inputTamanho5',
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group input-group col-md-3'),
    )) . 
    $this->Html->div('input-group-btn', 
    $this->Form->button(
        $this->Html->tag('i', '', array('class' => 'far fa-trash-alt')),
        array(
            'escape' => false,
            'class' => 'btn btn-danger fechaInput5 hint--right',
            'aria-label'=>"Excluir tamanho.",
        ))

    )
);

$formFields .= $this->Html->div('form-row', 
    $this->Form->button(
        $this->Html->tag('i', '',  array('class' => 'fas fa-plus')) . 
        '&nbsp;' . ' ' . "Adicionar Novos Tamanhos ?",
        array(
            'escape' => false,
            'class' => 'btn btn-secondary float-left mr-2',
            'type' => 'button',
            'id' => 'novoTamanho', 
        )
    )
);

$this->assign('formFields', $formFields);
