<?php

$this->extend('/Common/form');

$this->assign('title', 'Alterar Tipos e Tamanhos');
$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('Tipo.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));
$formFields .= $this->Form->hidden('Tipo.id');
$formFields .= $this->Form->hidden('Tamanho.0.id', array('value' => $this->request->data['Tamanho'][0]['id']));
$formFields .= $this->Form->hidden('Tamanho.1.id', array('value' => $this->request->data['Tamanho'][1]['id']));
$formFields .= $this->Form->hidden('Tamanho.2.id', array('value' => $this->request->data['Tamanho'][2]['id']));
$formFields .= $this->Form->hidden('Tamanho.3.id', array('value' => $this->request->data['Tamanho'][3]['id']));
$formFields .= $this->Form->hidden('Tamanho.4.id', array('value' => $this->request->data['Tamanho'][4]['id']));
$formFields .= $this->Form->hidden('Tamanho.5.id', array('value' => $this->request->data['Tamanho'][5]['id']));

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
$formFields .= $this->Html->div('form-row ', 
    $this->Form->input('Tamanho.0.descricao', array(
        'label' => array('text' => 'Qual seria o tamanho ?'),
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group col-md-3'),
    )) 
);

$formFields .= $this->Html->div('form-row tamanho1Edit', 
    $this->Form->input('Tamanho.1.descricao', array(
        'label' => false,
        'id' => 'inputTamanho1Edit',
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group input-group col-md-3'),
    )) . 
    $this->Html->div('input-group-btn', 
    $this->Js->link($this->Html->tag('i', '', array('class' => 'far fa-trash-alt')), '/tamanhos/delete/' . $this->request->data['Tamanho'][1]['id'], array(
        'escape' => false,
        'class' => 'btn btn-danger fechaInput1Edit',
    ))

    )
);

$formFields .= $this->Html->div('form-row tamanho2Edit', 
    $this->Form->input('Tamanho.2.descricao', array(
        'label' => false,
        'id' => 'inputTamanho2Edit',
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group input-group col-md-3'),
    )) . 
    $this->Html->div('input-group-btn', 
    $this->Js->link($this->Html->tag('i', '', array('class' => 'far fa-trash-alt')), '/tamanhos/delete/' . $this->request->data['Tamanho'][2]['id'], array(
        'escape' => false,
        'class' => 'btn btn-danger fechaInput2Edit',
        'title' => 'Excluir Tamanho',
    ))
    )
);

$formFields .= $this->Html->div('form-row tamanho3Edit', 
    $this->Form->input('Tamanho.3.descricao', array(
        'label' => false,
        'id' => 'inputTamanho3Edit',
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group input-group col-md-3'),
    )) . 
    $this->Html->div('input-group-btn', 
    $this->Js->link($this->Html->tag('i', '', array('class' => 'far fa-trash-alt')), '/tamanhos/delete/' . $this->request->data['Tamanho'][3]['id'], array(
        'escape' => false,
        'class' => 'btn btn-danger fechaInput3Edit',
        'title' => 'Excluir Tamanho',
    ))
    )

);

$formFields .= $this->Html->div('form-row tamanho4Edit', 
    $this->Form->input('Tamanho.4.descricao', array(
        'label' => false,
        'id' => 'inputTamanho4Edit',
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group input-group col-md-3'),
    )) . 
    $this->Html->div('input-group-btn', 
    $this->Js->link($this->Html->tag('i', '', array('class' => 'far fa-trash-alt')), '/tamanhos/delete/' . $this->request->data['Tamanho'][4]['id'], array(
        'escape' => false,
        'class' => 'btn btn-danger fechaInput4Edit',
        'title' => 'Excluir Tamanho',
    ))
    )
);

$formFields .= $this->Html->div('form-row tamanho5Edit', 
    $this->Form->input('Tamanho.5.descricao', array(
        'label' => false,
        'id' => 'inputTamanho5Edit',
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group input-group col-md-3'),
    )) . 
    $this->Html->div('input-group-btn', 
    $this->Js->link($this->Html->tag('i', '', array('class' => 'far fa-trash-alt')), '/tamanhos/delete/' . $this->request->data['Tamanho'][4]['id'], array(
        'escape' => false,
        'class' => 'btn btn-danger fechaInput5Edit',
        'title' => 'Excluir Tamanho',
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
            'id' => 'novoTamanhoEdit', 
        )
    )
);

$this->assign('formFields', $formFields);
?>