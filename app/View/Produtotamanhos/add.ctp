<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');
$this->assign('title', 'Produtos Por Tamanho');

$formFields .= $this->Form->hidden('Produtotamanho.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));
$formFields .= $this->Html->tag('h4', 'Adicionar Produto', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Produtotamanho.foto_um', array(
        'label' => array('text' => 'Imagem Do Produto *',),
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control imagem-produto form-control-sm InputUpload',
        'type' => 'file'
        )) . 
    $this->Form->input('Produtotamanho.nome', array(
        'label' => array('text' => 'Nome *'),
        'div' => array('class' => 'form-group col-md-4 offset-md-2'),
    ))
);


$formFields .= $this->Html->div('form-row', 
$this->Form->input('Produtotamanho.custo_produto', array(
    'label' => array('text' => 'Custo do Produto *'),
    'id' => 'labelProduto',
    'onkeypress'=>"$(this).mask('R$ 999.990,00')",
    'placeholder' => 'Ex: 150.00',
    'aria-label'=>"Ordenar por Cupom",
    'div' => array('class' => 'form-group col-md-4 sec-hover')
    )) . 
    $this->Form->input('Produtotamanho.categoria_id', array(
        'label' => array('text' => 'Categoria *'),
        'div' => array('class' => 'form-group col-md-4 offset-md-2'),
        'class' => 'form-control', 
        'empty' => '-- Selecione a categoria --',
        'type' => 'select',
        'options' => $categorias
    ))
);

$formFields .= $this->Html->div('form-row', 
$this->element('mensagemAlertaPassarCursor')
);


$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Produtotamanho.valor', array(
        'label' => array('text' => 'Valor *'),
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'placeholder' => 'Ex: 150.00',
        'div' => array('class' => 'desabilita form-group col-md-4'),
    )) . 
    $this->Form->input('Produtotamanho.desabilitar', array(
        'label' => array('text' => 'Desabilitar Produto no Aplicativo? *'),
        'div' => array('class' => 'form-group col-md-4 offset-md-2'),
        'class' => 'form-control', 
        'empty' => '-- Selecione a Opção --',
        'type' => 'select',
        'options' => array(
            '1' => 'Não',
            '2' => 'Sim',
        )
    )) 
);

$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Produtotamanho.tipo_id', array(
        'label' => array('text' => 'Tipo'),
        'id' => 'selectTipo',
        'div' => array('class' => 'form-group col-md-4 '),
        'type'=>"select",
        'empty' => '-- Selecione o Tipo --',
        'type' => 'select',
        'options' => $tipos
    ))
); 

$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Produtotamanho.descricao', array(
        'label' => array('text' => 'Descrição'),
        'type'=>"textarea",
        'placeholder' => 'Descrição do Produto',
        'div' => array('class' => 'form-group col-md-10'),
    ))
); 
$formFields .= $this->Html->tag('h4', 'Adicionais e Complementos', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
$this->assign('formFields', $formFields);
?>


