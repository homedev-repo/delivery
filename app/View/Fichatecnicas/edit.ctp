<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('Fichatecnica.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));
$formFields .= $this->Form->hidden('Fichatecnica.id');

$this->assign('title', 'Ficha Técnica ');
$formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'disabled mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Fichatecnica.nome_preparacao', array(
    'label' => array('text' => 'Nome da Preparação *'),
    'div' => array('class' => 'form-group col-md-3'),
    'class' => 'form-control',
    'placeholder' => 'Ex: Pão com ovo'
    )) . 
    $this->Form->input('Fichatecnica.produto_id', array(
        'label' => array('text' => 'Produto *'),
        'div' => array('class' => 'form-group col-md-3 offset-2'),
        'type' => 'select',
        'empty' => '-- Selecione o Produto --',
        'options' => $produtos
    ))
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Fichatecnica.data_alteracao', array(
        'label' => array('text' => 'Data da ultima Alteração *'),
        'div' => array('class' => 'form-group col-md-3'),
        'data-inputmask' => "'mask': '99/99/9999', 'greedy' : false"
    )) .
    $this->Form->input('Fichatecnica.usuario_id', array(
        'label' => array('text' => 'Responsável *'),
        'div' => array('class' => 'form-group col-md-3 offset-2'),
        'type' => 'select',
        'class' => 'form-control',
        'empty' => '-- Selecione o Responsável --',
        'options' => $usuariosCadastrados
    ))
);
$formFields .= $this->Html->div('form-row', 

$this->Form->input('Fichatecnica.rendimento', array(
    'label' => array('text' => 'Rendimento *'),
    'div' => array('class' => 'form-group col-md-3'),
    'placeholder' => array('Ex: 1 Porção (Individual)'),
))
);
$formFields .= $this->Html->tag('h4', 'Itens', array('class' => 'disabled mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Js->link($this->Html->tag('i', '', array('class' => 'fas fa-plus')) .
' Ver Mais Itens',
'#',
array(
    'class' => 'btn btn-secondary mt-4',
    'escape' => false,
    'id' => 'mostraItens'
)
);
$formFields .= $this->Html->div('form-row mt-4', 
    $this->Form->input('Fichatecnica.medidas', array(
        'label' => array('text' => 'Medidas *'),
        'div' => array('class' => 'form-group col-md-2'),
        'class' => 'form-control',
        'placeholder' => '02 Unid.'
    )) .
    $this->Form->input('Fichatecnica.itens', array(
        'label' => array('text' => 'Itens *'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
        'placeholder' => 'Ovos de galinha'
    )) . 
    $this->Form->input('Fichatecnica.marca', array(
        'label' => array('text' => 'Marca *'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
        'placeholder' => 'Genérico'
    )) . 
    $this->Form->input('Fichatecnica.valor_unitario', array(
        'label' => array('text' => 'Valor Unitario *'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
        'placeholder' => 'R$ 0,50'
    )) . 
    $this->Form->input('Fichatecnica.valor_total', array(
        'label' => array('text' => 'Valor Total *'),
        'div' => array('class' => 'form-group col-md-1 '),
        'class' => 'form-control',
        'placeholder' => 'R$ 1,00'
    )) 
);

$formFields .= $this->Html->div('form-row hiddenDiv',
    $this->Form->input('Fichatecnica.medidas_2', array(
        'label' => array('text' => 'Medidas'),
        'div' => array('class' => 'form-group col-md-2'),
        'class' => 'form-control',
        
    )) .
    $this->Form->input('Fichatecnica.itens_2', array(
        'label' => array('text' => 'Itens'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
    )) . 
    $this->Form->input('Fichatecnica.marca_2', array(
        'label' => array('text' => 'Marca'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
    )) . 
    $this->Form->input('Fichatecnica.valor_unitario_2', array(
        'label' => array('text' => 'Valor Unitario'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
    )) . 
    $this->Form->input('Fichatecnica.valor_total_2', array(
        'label' => array('text' => 'Valor Total'),
        'div' => array('class' => 'form-group col-md-1 '),
        'class' => 'form-control',
    )) 
);

$formFields .= $this->Html->div('form-row hiddenDiv', 
    $this->Form->input('Fichatecnica.medidas_3', array(
        'label' => array('text' => 'Medidas'),
        'div' => array('class' => 'form-group col-md-2'),
        'class' => 'form-control',
    )) .
    $this->Form->input('Fichatecnica.itens_3', array(
        'label' => array('text' => 'Itens'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
    )) . 
    $this->Form->input('Fichatecnica.marca_3', array(
        'label' => array('text' => 'Marca'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
    )) . 
    $this->Form->input('Fichatecnica.valor_unitario_3', array(
        'label' => array('text' => 'Valor Unitario'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
    )) . 
    $this->Form->input('Fichatecnica.valor_total_3', array(
        'label' => array('text' => 'Valor Total'),
        'div' => array('class' => 'form-group col-md-1 '),
        'class' => 'form-control',
    )) 
);

$formFields .= $this->Html->div('form-row hiddenDiv', 
    $this->Form->input('Fichatecnica.medidas_4', array(
        'label' => array('text' => 'Medidas'),
        'div' => array('class' => 'form-group col-md-2'),
        'class' => 'form-control',
    )) .
    $this->Form->input('Fichatecnica.itens_4', array(
        'label' => array('text' => 'Itens'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
    )) . 
    $this->Form->input('Fichatecnica.marca_4', array(
        'label' => array('text' => 'Marca'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
    )) . 
    $this->Form->input('Fichatecnica.valor_unitario_4', array(
        'label' => array('text' => 'Valor Unitario'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
    )) . 
    $this->Form->input('Fichatecnica.valor_total_4', array(
        'label' => array('text' => 'Valor Total'),
        'div' => array('class' => 'form-group col-md-1 '),
        'class' => 'form-control',
    )) 
);

$formFields .= $this->Html->div('form-row hiddenDiv', 
    $this->Form->input('Fichatecnica.medidas_5', array(
        'label' => array('text' => 'Medidas'),
        'div' => array('class' => 'form-group col-md-2'),
        'class' => 'form-control',
    )) .
    $this->Form->input('Fichatecnica.itens_5', array(
        'label' => array('text' => 'Itens'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
    )) . 
    $this->Form->input('Fichatecnica.marca_5', array(
        'label' => array('text' => 'Marca '),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
    )) . 
    $this->Form->input('Fichatecnica.valor_unitario_5', array(
        'label' => array('text' => 'Valor Unitario'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
    )) . 
    $this->Form->input('Fichatecnica.valor_total_5', array(
        'label' => array('text' => 'Valor Total'),
        'div' => array('class' => 'form-group col-md-1 '),
        'class' => 'form-control',
    )) 
);

$formFields .= $this->Html->div('form-row hiddenDiv', 
    $this->Form->input('Fichatecnica.medidas_6', array(
        'label' => array('text' => 'Medidas'),
        'div' => array('class' => 'form-group col-md-2'),
        'class' => 'form-control',
    )) .
    $this->Form->input('Fichatecnica.itens_6', array(
        'label' => array('text' => 'Itens'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
    )) . 
    $this->Form->input('Fichatecnica.marca_6', array(
        'label' => array('text' => 'Marca'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
    )) . 
    $this->Form->input('Fichatecnica.valor_unitario_6', array(
        'label' => array('text' => 'Valor Unitario'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
    )) . 
    $this->Form->input('Fichatecnica.valor_total_6', array(
        'label' => array('text' => 'Valor Total'),
        'div' => array('class' => 'form-group col-md-1 '),
        'class' => 'form-control',
    )) 
);

$formFields .= $this->Html->div('form-row hiddenDiv', 
    $this->Form->input('Fichatecnica.medidas_7', array(
        'label' => array('text' => 'Medidas'),
        'div' => array('class' => 'form-group col-md-2'),
        'class' => 'form-control',
    )) .
    $this->Form->input('Fichatecnica.itens_7', array(
        'label' => array('text' => 'Itens'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
    )) . 
    $this->Form->input('Fichatecnica.marca_7', array(
        'label' => array('text' => 'Marca'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
    )) . 
    $this->Form->input('Fichatecnica.valor_unitario_7', array(
        'label' => array('text' => 'Valor Unitario'),
        'div' => array('class' => 'form-group col-md-2 offset'),
        'class' => 'form-control',
    )) . 
    $this->Form->input('Fichatecnica.valor_total_7', array(
        'label' => array('text' => 'Valor Total'),
        'div' => array('class' => 'form-group col-md-1 '),
        'class' => 'form-control',
    )) 
);
$formFields .= $this->Html->tag('h4', 'Preparação', array('class' => 'disabled mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Fichatecnica.modo_preparo', array(
    'label' => array('text' => 'Modo de Preparo *'),
    'div' => array('class' => 'form-group col-md-9'),
    'class' => 'form-control',
    'type' => 'textarea',
    'placeholder' => 'Ex: Fitrar o ovo com azeite para não grudar...'
    )) 
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Fichatecnica.observacao', array(
    'label' => array('text' => 'Observações *'),
    'div' => array('class' => 'form-group col-md-9'),
    'class' => 'form-control',
    'type' => 'textarea',
    'placeholder' => 'Ex: Cuidar da temperatura para não queimar os ovos...'
    )) 
);

$this->assign('formFields', $formFields);
?>