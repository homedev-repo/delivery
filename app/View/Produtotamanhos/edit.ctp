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

$formFields .= $this->Html->tag('h4', 'Editar Produto Por Tamanho', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');

$formFields .= $this->Html->div('col-md-5',
    $this->Html->div('col-md-15',
        $this->Html->div('card tamanhoCard',
            $this->Html->image('/img/img_produto_por_tamanhos/' . $this->request->data['Produtotamanho']['foto_visualizacao1'], array('class' => 'img-produto-tamanho', "disabled"))
        ) .
        $botaoAlterarImagem = $this->Html->link('Alterar Imagem', '#', array(
            'class' => 'tamanhoBotaoCampanha AlterarFotoUm card-img-top btn btn-light'
        ))
    ) .
    $this->Form->input('Produtotamanho.foto_um', array(
        'required' => false,
        'label' => array('text' => 'Alterar Imagem', 'class' =>'input input-file ', 'for' => 'file'),
        'div' => array('class' => 'desabilita button alterarImagem-div', 'text' => 'Insira uma imagem'),
        'class' => 'form-control  form-control-md form-group upload-input-desabilitar alterarImagem-div',
        'type' => 'file',
    ))
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Produtotamanho.nome', array(
        'label' => array('text' => 'Nome *'),
        'div' => array('class' => 'form-group col-md-4'),
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

if (!empty($this->request->data['Tamanho'])) {
    $formFields .= $this->Html->tag('hr');
    $formFields .= $this->Html->tag('h5', 'Tamanhos Cadastrados Do Tipo:' . ' ' . $this->request->data['Tipo']['descricao'], array('class' => 'mt-4 mb-4'));
}
$acordion = '';
$idProduto = $this->request->data['Produtotamanho']['id'];
foreach ($findTiposETamanhosEdit as $tamanho) {
    $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/tamanhos/edit/' .  $tamanho['Tamanho']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'title' => 'Alterar',
        'escape' => false
    ));
    $alterar = $this->Html->tag('span', $alterar, array('class' => 'hint--top float-right mr-2', 'aria-label'=> 'Alterar'));
    $iconeWinner = $this->Html->tag('span', '', array('class' => 'fas fa-star', 'style'=>"color: #e5bb23;"));
    if($tamanho['Tamanho']['habilitar'] == "1" && $tamanho['Tamanho']['produtotamanho_id'] = $idProduto) {
        $textProdutoHabilitado = $this->Html->tag('', '(Tamanho habilitado para esse Produto)' . ' ' .  $iconeWinner , array('class' => 'mt-4'));
    } else {
        $textProdutoHabilitado = '(Desabilitado)';
    }
    $acordion .= $this->Html->div('card',
        $this->Html->div('card-header',
            $this->Html->tag('h2',
                $alterar .
                $this->Form->button(
                    $this->Html->tag('span', 'Tamanho: ' . ' '. $tamanho['Tamanho']['descricao'] . ' ' .  $textProdutoHabilitado, array('class' => 'ml-4')) ,
                    array(
                        'class' => 'btn btn-link',
                        'type' => 'button',
                        'data-toggle' => 'collapse',
                        'data-target' => '#collapse' . $tamanho['Tamanho']['id'],
                        'aria-expanded' => false,
                        'aria-controls' => 'collapse' . $tamanho['Tamanho']['id'],
                    )
                ),
                array('class' => 'mb-0')
            ),
            array('id' => 'heading' . $tamanho['Tamanho']['id'])
    ) .
    $this->Html->div('collapse',
        $this->Html->div('card-body',
            $this->Html->div('form-row',
                $this->Form->input('Tamanho.preco_custo', array(
                    'div' => array('class' => 'form-group col-sm-6 col-md-4 col-lg-3'),
                    'label' => array('text' => 'Preço de Custo'),
                    'disabled' => true,
                    'value' => $tamanho['Tamanho']['preco_custo'],
                )) .
                $this->Form->input('Tamanho.preco_venda', array(
                    'required' => false,
                    'div' => array('class' => 'form-group form-group col-sm-6 col-md-4 col-lg-3'),
                    'class' => 'form-control uppercase', 
                    'label' => array('text' => 'Preço de Venda'),
                    'disabled' => true,
                    'error' => array('attributes' => array('class' => 'invalid-feedback')),
                    'value' => $tamanho['Tamanho']['preco_venda']
                ))
            )
        ),
        array(
            'id' => 'collapse' . $tamanho['Tamanho']['id'],
            'aria-labelledby' => 'heading' . $tamanho['Tamanho']['id'],
            'data-parent' => '#accordion'
        )
    ) 
    );
    $form = '';
}

$formFields .= $this->Html->div('accordion', 
    $acordion,
    array('id' => 'accordion')
);
$this->assign('formFields', $formFields);
?>

