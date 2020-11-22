<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');
$this->assign('title', 'Cadastro de Produtos');

$formFields .= $this->Form->hidden('Produto.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));

$formFields .= $this->Html->tag('h4', 'Adicionar Produto', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
/*
$formFields .= $this->Html->tag('ul', '' .
    $this->Html->tag('li', $this->Html->tag('a', 'PRODUTO',  array('class' =>'nav-link active')), array('class' =>'nav-item')).
    $this->Html->tag('li', $this->Html->tag('a', 'CLASSIFICAÇÕES',  array('class' =>'nav-link disabled')), array('class' =>'nav-item')).
    $this->Html->tag('li', $this->Html->tag('a', 'PROMOÇÕES',  array('class' =>'nav-link disabled')), array('class' =>'nav-item')),
    array('class'=>'nav nav-tabs wizard')
);
*/

$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Produto.foto_um', array(
        'label' => array('text' => 'Imagem Do Produto *',),
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control imagem-produto form-control-sm InputUpload',
        'type' => 'file'
    )) . 
    $this->Form->input('Produto.nome', array(
        'label' => array('text' => 'Nome *'),
        'div' => array('class' => 'form-group col-md-4 offset-md-2'),
    ))
);

$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Produto.custo_produto', array(
        'label' => array('text' => 'Custo do Produto *'),
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'div' => array('class' => 'form-group col-md-4 sec-hover')
    )) . 
    $this->Form->input('Produto.categoria_id', array(
        'label' => array('text' => 'Categoria *'),
        'div' => array('class' => 'form-group col-md-4 offset-md-2'),
        'class' => 'form-control', 
        'type' => 'select',
        'options' => $categorias
    ))
); 

$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Produto.valor', array(
        'label' => array('text' => 'Valor *'),
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'placeholder' => 'Ex: 150,00',
        'div' => array('class' => 'desabilita form-group col-md-4'),
    ))
);
$formFields .= $this->Html->tag('h4', 'Promoções', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row ',
    $this->Html->div('col-md-6 form-group',
        $this->Html->para('h5', 'Produto em promoção ?') .
        $this->Html->div('form-check form-check-inline',
            $this->Form->input('Produto.promocao', array(
                'legend' => false,
                'required' => false,
                'type' => 'radio',
                'options' => array('Sim' => 'Sim', 'Nao' => 'Não'),
                'class' => 'form-check-input mb-2',
                'div' => false,
                'label' => array('class' => ' produtoPromocao form-check-label mr-3 mb-2'),
                'error' => array('attributes' => array('class' => 'form-check-input mb-2 text-danger'))
            )
        ))
    )
);

$formFields .=  $this->Html->div('form-row', 
    $this->Form->input('Produto.valor_promocao', array(
        'label' => array('text' => 'Valor Promocional ?'),
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'class' => 'form-control bordaLabel',
        'placeholder' => 'Ex: 150,00',
        'div' => array('class' => 'valor_promocao form-group col-md-4'),
    ))
);
$formFields .= $this->Html->tag('h4', 'Complementos', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row ',
    $this->Html->div('col-md-6 form-group',
        $this->Html->para('h5', 'Este produto contém complementos ?') .
        $this->Html->div('form-check form-check-inline',
            $this->Form->input('Produto.contem_complementos', array(
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
    )
);

$formFields .= $this->Html->div('form-row ',
    $this->Html->div('col-md-6 form-group',
        $this->Html->para('h5', 'Dseja controlar ESTOQUE deste produto ?') .
        $this->Html->div('form-check form-check-inline produtoComplementos',
            $this->Form->input('Produto.controlar_estoque', array(
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
    )
);

$formFields .=  $this->Html->div('form-row', 
    $this->Form->input('Produto.quantidade_inicial', array(
        'label' => array('text' => 'Quantidade inicial deste produto(ENTRADA) ?'),
        'type' => 'number',
        'class' => 'form-control bordaLabel',
        'div' => array('class' => 'quantidade_inicial form-group col-md-4'),
    ))
);

$formFields .=  $this->Html->div('form-row', 
    $this->Form->input('Produto.descricao', array(
        'label' => array('text' => 'Descrição'),
        'type'=>"textarea",
        'placeholder' => 'Descrição do Produto',
        'div' => array('class' => 'form-group col-md-10'),
    ))
);



$this->assign('formFields', $formFields);
?>
