<?php
$this->extend('/Common/form');
$formFields = $this->element('formCreate');

$this->assign('title', 'Produtos Por Tamanhos');

if (!empty($this->request->data[0]['Tamanho']['id'])){
    $formFields .= $this->Form->hidden('Tamanho.0.id', array('value' => $this->request->data[0]['Tamanho']['id']));
    $formFields .= $this->Form->hidden('Tamanho.0.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));
    $formFields .= $this->Form->hidden('Tamanho.0.produtotamanho_id', array('value' => $idProduto));
}
if (!empty($this->request->data[1]['Tamanho']['id'])){
    $formFields .= $this->Form->hidden('Tamanho.1.id', array('value' => $this->request->data[1]['Tamanho']['id']));
    $formFields .= $this->Form->hidden('Tamanho.1.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));
    $formFields .= $this->Form->hidden('Tamanho.1.produtotamanho_id', array('value' => $idProduto));
}

if (!empty($this->request->data[2]['Tamanho']['id'])){
    $formFields .= $this->Form->hidden('Tamanho.2.id', array('value' => $this->request->data[2]['Tamanho']['id']));
    $formFields .= $this->Form->hidden('Tamanho.2.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));
    $formFields .= $this->Form->hidden('Tamanho.2.produtotamanho_id', array('value' => $idProduto));
}

if (!empty($this->request->data[3]['Tamanho']['id'])){
    $formFields .= $this->Form->hidden('Tamanho.3.id', array('value' => $this->request->data[3]['Tamanho']['id']));
    $formFields .= $this->Form->hidden('Tamanho.3.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));
    $formFields .= $this->Form->hidden('Tamanho.3.produtotamanho_id', array('value' => $idProduto));
}

if (!empty($this->request->data[4]['Tamanho']['id'])){
    $formFields .= $this->Form->hidden('Tamanho.4.id', array('value' => $this->request->data[4]['Tamanho']['id']));
    $formFields .= $this->Form->hidden('Tamanho.4.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));
    $formFields .= $this->Form->hidden('Tamanho.4.produtotamanho_id', array('value' => $idProduto));
}

if (!empty($this->request->data[5]['Tamanho']['id'])){
    $formFields .= $this->Form->hidden('Tamanho.5.id', array('value' => $this->request->data[5]['Tamanho']['id']));
    $formFields .= $this->Form->hidden('Tamanho.5.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));
    $formFields .= $this->Form->hidden('Tamanho.5.produtotamanho_id', array('value' => $idProduto));
}


$formFields .= $this->Html->tag('h4', 'Tamanhos', array('class' => 'disabled mt-4'));
$formFields .= $this->Html->tag('hr');

$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Tamanho.tipo', array(
        'label' => array('text' => 'Tipo Selecionado'),
        'disabled' => true,
        'value' => $this->request->data[0]['Tipo']['descricao'],
        'div' => array('class' => 'form-group col-md-4'),
    ))
); 

$formFields .= $this->Html->div('form-row tamanho0ProdutosTamanhos', 
$this->Html->div('form-check form-check-inline',
    $this->Form->input('Tamanho.0.habilitar', array(
        'type' => 'checkbox',
        'class' => 'form-check-input mb-2',
        'id' => 'checkInput0',
        'div' => false,
        'label' => array('class' => 'form-check-label mr-3 mb-2'),
        'error' => array('attributes' => array('class' => 'form-check-input mb-2 text-danger'))
    )
    )) . 
    $this->Form->input('Tamanho.0.descricao', array(
        'label' => array('text' => 'Tamaho Cadastrado'),
        'id' => 'inputTamanho0ProdutosTamanhos',
        'disabled' => true,
        'value' => $this->request->data[0]['Tamanho']['descricao'],
        'div' => array('class' => 'form-group col-md-3'),
    )) . 
    $this->Form->input('Tamanho.0.preco_custo', array(
        'label' => array('text' => 'Preço de custo? *'),
        'div' => array('class' => 'form-group col-md-3'),
        'disabled' => true,
        'id' => 'inputTamanho0precocusto',
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'class' => 'form-control', 
        )
    ) . 
    $this->Form->input('Tamanho.0.preco_venda', array(
        'label' => array('text' => 'Preço de venda? *'),
        'div' => array('class' => 'form-group col-md-3'),
        'disabled' => true,
        'id' => 'inputTamanho0precovenda',
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'class' => 'form-control', 
    )) 
);
$formFields .= $this->Html->div('form-row tamanho1ProdutosTamanhos', 
$this->Html->div('form-check form-check-inline',
    $this->Form->input('Tamanho.1.habilitar', array(
        'legend' => false,
        'required' => false,
        'id' => 'checkInput1',
        'type' => 'checkbox',
        'class' => 'form-check-input mb-2',
        'div' => false,
        'label' => array('class' => 'form-check-label mr-3 mb-2'),
        'error' => array('attributes' => array('class' => 'form-check-input mb-2 text-danger'))
    )
    )) . 
    $this->Form->input('Tamanho.1.descricao', array(
        'label' => array('text' => 'Tamaho Cadastrado'),
        'id' => 'inputTamanho1ProdutosTamanhos',
        'disabled' => true,
        'value' => $this->request->data[1]['Tamanho']['descricao'],
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group col-md-3'),
    )) . 
    $this->Form->input('Tamanho.1.preco_custo', array(
        'label' => array('text' => 'Preço de custo? *'),
        'disabled' => true,
        'id' => 'inputTamanho1precocusto',
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'div' => array('class' => 'form-group col-md-3'),
        'class' => 'form-control', 
        )
    ) . 
    $this->Form->input('Tamanho.1.preco_venda', array(
        'label' => array('text' => 'Preço de venda? *'),
        'disabled' => true,
        'id' => 'inputTamanho1precovenda',
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'div' => array('class' => 'form-group col-md-3'),
        'class' => 'form-control', 
    )) 
);
$formFields .= $this->Html->div('form-row tamanho2ProdutosTamanhos', 
$this->Html->div('form-check form-check-inline',
    $this->Form->input('Tamanho.2.habilitar', array(
        'legend' => false,
        'required' => false,
        'id' => 'checkInput2',
        'type' => 'checkbox',
        'class' => 'form-check-input mb-2',
        'div' => false,
        'label' => array('class' => 'form-check-label mr-3 mb-2'),
        'error' => array('attributes' => array('class' => 'form-check-input mb-2 text-danger'))
    )
    )) . 
    $this->Form->input('Tamanho.2.descricao', array(
        'label' => array('text' => 'Tamaho Cadastrado'),
        'id' => 'inputTamanho2ProdutosTamanhos',
        'disabled' => true,
        'value' => $this->request->data[2]['Tamanho']['descricao'],
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group col-md-3'),
    )) . 
    $this->Form->input('Tamanho.2.preco_custo', array(
        'label' => array('text' => 'Preço de custo? *'),
        'disabled' => true,
        'id' => 'inputTamanho2precocusto',
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'div' => array('class' => 'form-group col-md-3'),
        'class' => 'form-control', 
        )
    ) . 
    $this->Form->input('Tamanho.2.preco_venda', array(
        'label' => array('text' => 'Preço de venda? *'),
        'disabled' => true,
        'id' => 'inputTamanho1precovenda',
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'div' => array('class' => 'form-group col-md-3'),
        'class' => 'form-control', 
    )) 
);
$formFields .= $this->Html->div('form-row tamanho3ProdutosTamanhos', 
$this->Html->div('form-check form-check-inline',
    $this->Form->input('Tamanho.3.habilitar', array(
        'legend' => false,
        'id' => 'checkInput3',
        'required' => false,
        'type' => 'checkbox',
        'class' => 'form-check-input mb-2',
        'div' => false,
        'label' => array('class' => 'form-check-label mr-3 mb-2'),
        'error' => array('attributes' => array('class' => 'form-check-input mb-2 text-danger'))
    )
    )) . 
    $this->Form->input('Tamanho.3.descricao', array(
        'label' => array('text' => 'Tamaho Cadastrado'),
        'disabled' => true,
        'value' => $this->request->data[3]['Tamanho']['descricao'],
        'id' => 'inputTamanho3ProdutosTamanhos',
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group col-md-3'),
    )) . 
    $this->Form->input('Tamanho.3.preco_custo', array(
        'label' => array('text' => 'Preço de custo? *'),
        'id' => 'inputTamanho3precocusto',
        'disabled' => true,
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'div' => array('class' => 'form-group col-md-3'),
        'class' => 'form-control', 
        )
    ) . 
    $this->Form->input('Tamanho.3.preco_venda', array(
        'label' => array('text' => 'Preço de venda? *'),
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'id' => 'inputTamanho3precovenda',
        'disabled' => true,
        'div' => array('class' => 'form-group col-md-3'),
        'class' => 'form-control', 
    )) 
);
$formFields .= $this->Html->div('form-row tamanho4ProdutosTamanhos', 
$this->Html->div('form-check form-check-inline',
    $this->Form->input('Tamanho.4.habilitar', array(
        'legend' => false,
        'required' => false,
        'id' => 'checkInput4',
        'type' => 'checkbox',
        'class' => 'form-check-input mb-2',
        'div' => false,
        'label' => array('class' => 'form-check-label mr-3 mb-2'),
        'error' => array('attributes' => array('class' => 'form-check-input mb-2 text-danger'))
    )
    )) . 
    $this->Form->input('Tamanho.4.descricao', array(
       'label' => array('text' => 'Tamaho Cadastrado'),
        'disabled' => true,
        'value' => $this->request->data[4]['Tamanho']['descricao'],
        'id' => 'inputTamanho4ProdutosTamanhos',
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group col-md-3'),
    )) . 
    $this->Form->input('Tamanho.4.preco_custo', array(
        'label' => array('text' => 'Preço de custo? *'),
        'disabled' => true,
        'id' => 'inputTamanho4precocusto',
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'div' => array('class' => 'form-group col-md-3'),
        'class' => 'form-control', 
        )
    ) . 
    $this->Form->input('Tamanho.4.preco_venda', array(
        'label' => array('text' => 'Preço de venda? *'),
        'disabled' => true,
        'id' => 'inputTamanho4precovenda',
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'div' => array('class' => 'form-group col-md-3'),
        'class' => 'form-control', 
    )) 
);
$formFields .= $this->Html->div('form-row tamanho5ProdutosTamanhos', 
$this->Html->div('form-check form-check-inline',
    $this->Form->input('Tamanho.5.habilitar', array(
        'legend' => false,
        'required' => false,
        'type' => 'checkbox',
        'id' => 'checkInput5',
        'class' => 'form-check-input mb-2',
        'div' => false,
        'label' => array('class' => 'form-check-label mr-3 mb-2'),
        'error' => array('attributes' => array('class' => 'form-check-input mb-2 text-danger'))
    )
    )) . 
    $this->Form->input('Tamanho.5.descricao', array(
       'label' => array('text' => 'Tamaho Cadastrado'),
        'disabled' => true,
        'value' => $this->request->data[5]['Tamanho']['descricao'],
        'id' => 'inputTamanho5ProdutosTamanhos',
        'placeholder' => array('text' => 'Ex: Pequena, Media, Grande'),
        'div' => array('class' => 'form-group col-md-3'),
    )) . 
    $this->Form->input('Tamanho.5.preco_custo', array(
        'label' => array('text' => 'Preço de custo? *'),
        'id' => 'inputTamanho5precocusto',
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'div' => array('class' => 'form-group col-md-3'),
        'class' => 'form-control', 
        )
    ) . 
    $this->Form->input('Tamanho.5.preco_venda', array(
        'label' => array('text' => 'Preço de venda? *'),
        'onkeypress'=>"$(this).mask('R$ 999.990,00')",
        'id' => 'inputTamanho5precovenda',
        'div' => array('class' => 'form-group col-md-3'),
        'class' => 'form-control', 
    )) 
);
$this->assign('formFields', $formFields);
?>

