<?php
$this->extend('/Common/form');

$this->assign('title', 'Complementos');
$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('Complemento.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));


$formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'disabled mt-4'));
$formFields .= $this->Html->tag('hr');

$formFields .= $this->Html->tag('ul', '' .
    $this->Html->tag('li', $this->Html->tag('a', 'PRODUTO',  array('class' =>'nav-link disabled')), array('class' =>'nav-item')).
    $this->Html->tag('li', $this->Html->tag('a', 'COMPLEMENTOS',  array('class' =>'nav-link active')), array('class' =>'nav-item')),
    array('class'=>'nav nav-tabs')
);

$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Complemento.nome_complemento', array(
    'label' => array('text' => 'Nome *'),
    'placeholder' => array('text' => 'Ex: Bacon'),
    'div' => array('class' => 'form-group col-md-5'),
    ))
);

$formFields .= $this->Html->div('form-row',
    $this->Form->input('Complemento.preco_custo', array(
        'label' => array('text' => 'Preço de Custo'),
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'placeholder' => array('text' => 'Digite o preço de custo.'),
        'div' => array('class' => 'form-group col-md-4'),
    )) . 
    $this->Form->input('Complemento.preco_venda', array(
        'label' => array('text' => 'Preço de Venda'),
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'placeholder' => array('text' => 'Digite o preço de custo.'),
        'div' => array('class' => 'form-group col-md-4 offset-md-2'),
    ))
);

$formFields .= $this->Html->div('form-row', 
$this->Html->div('col-md-6 form-group',
    $this->Html->para('h5', 'Controlar estoque ?') .
        $this->Html->div('form-check form-check-inline',
            $this->Form->input('Complemento.controlar_estoque', array(
                'legend' => false,
                'required' => false,
                'type' => 'radio',
                'options' => array('Sim' => 'Sim', 'Nao' => 'Não'),
                'class' => 'form-check-input mb-2',
                'div' => false,
                'label' => array('class' => 'form-check-label mr-3 mb-2'),
                'error' => array('attributes' => array('class' => 'form-check-input mb-2 text-danger'))
            )
        ))
    ) .
    $this->Form->input('Complemento.categoria_id', array(
        'label' => array('text' => 'Categorias'),
        'id' => 'selectTipo',
        'class' => ' offset-md-2 form-control select2',
        'div' => array('class' => 'form-group col-md-4'),
        'id' => 'kt_select2_3',
        'name'=> "Categoria",
        'multiple'=>"multiple",
        'type'=>"select",
        'empty' => '-- Selecione o Tipo --',
        'type' => 'select',
        'options' => $categorias
    ))
);

$this->assign('formFields', $formFields);
