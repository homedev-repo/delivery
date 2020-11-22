<?php
$this->extend('/Common/form');
$formFields = $this->element('formCreate');

$this->assign('title', 'Produtos');
$formFields .= $this->Form->hidden('Produto.id');
$formFields .= $this->Form->hidden('Produto.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));

$formFields .= $this->Form->input('Produto.foto_visualizacao1', array(
    'hidden' => true,
    'readonly' => true,
    'label' => array('text' => ''),
));

$formFields .= $this->Html->tag('h4', 'Editar Produto', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');

$formFields .= $this->Html->div('col-md-5',
    $this->Html->div('col-md-15',
        $this->Html->div('card tamanhoCard',
            $this->Html->image('/img/img_produtos/' . $this->request->data['Produto']['foto_visualizacao1'], array('class' => 'img-produto-tamanho', "disabled"))
        ) .
        $botaoAlterarImagem = $this->Html->link('Alterar Imagem', '#', array(
            'class' => 'tamanhoBotaoCampanha AlterarFotoUm card-img-top btn btn-light'
        ))
    ) .
    $this->Form->input('Produto.foto_um', array(
        'required' => false,
        'label' => array('text' => 'Alterar Imagem', 'class' =>'input input-file ', 'for' => 'file'),
        'div' => array('class' => 'desabilita button alterarImagem-div', 'text' => 'Insira uma imagem'),
        'class' => 'form-control  form-control-md form-group upload-input-desabilitar alterarImagem-div',
        'type' => 'file',
    ))
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Produto.nome', array(
        'label' => array('text' => 'Nome *'),
        'div' => array('class' => 'form-group col-md-4'),
    ))
);


$formFields .= $this->Html->div('form-row', 
$this->Form->input('Produto.custo_produto', array(
    'label' => array('text' => 'Custo do Produto *'),
    'id' => 'labelProduto',
    'type'=>"number",
    'pattern'=>"[0-9]+([,\.][0-9]+)?",
    'min'=>"0",
    'step'=> "any",
    'placeholder' => 'Ex: 150,00',
    'aria-label'=>"Ordenar por Cupom",
    'div' => array('class' => 'form-group col-md-4 sec-hover')
    )) . 
    $this->Form->input('Produto.categoria_id', array(
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
    $this->Form->input('Produto.valor', array(
        'label' => array('text' => 'Valor *'),
        'id' => 'MascaraReais',
        'type'=>"number",
        'pattern'=>"[0-9]+([,\.][0-9]+)?",
        'min'=>"0",
        'step'=> "any",
        'placeholder' => 'Ex: 150,00',
        'div' => array('class' => 'desabilita form-group col-md-4'),
    )) .
    $this->Form->input('Produto.desabilitar', array(
        'label' => array('text' => 'Desabilitar Produto no Aplicativo? *',),
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
    $this->Form->input('Produto.descricao', array(
        'label' => array('text' => 'Descrição'),
        'type'=>"textarea",
        'placeholder' => 'Descrição do Produto',
        'div' => array('class' => 'form-group col-md-10'),
    ))
); 

$this->assign('formFields', $formFields);
?>

