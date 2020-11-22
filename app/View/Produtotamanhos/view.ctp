<?php
$this->extend('/Common/form');
$formFields = $this->element('formCreate');

$this->assign('title', 'Produtos Por Tamanhos');
$formFields .= $this->Form->hidden('Produtotamanho.id');
$formFields .= $this->Form->hidden('Produtotamanho.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));

$formFields .= $this->Form->input('Produtotamanho.foto_visualizacao1', array(
    'hidden' => true,
    'readonly' => true,
    'label' => array('text' => ''),
));

$formFields .= $this->Html->tag('h4', 'Editar Produto por Tamanho', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');

$formFields .= $this->Html->div('col-md-5',
    $this->Html->div('col-md-15',
        $this->Html->div('card tamanhoCard',
            $this->Html->image('/img/img_produto_por_tamanhos/' . $this->request->data['Produtotamanho']['foto_um'], array('class' => 'img-produto-tamanho', "disabled"))
        )
    )
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Produtotamanho.nome', array(
        'label' => array('text' => 'Nome *'),
        'div' => array('class' => 'form-group col-md-4 mt-4'),
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
$this->assign('formFields', $formFields);
?>

