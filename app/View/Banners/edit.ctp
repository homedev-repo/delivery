
<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');
$this->assign('title', 'Banners');

$formFields .= $this->Form->hidden('Banner.id');
$formFields .= $this->Form->hidden('Banner.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));

$formFields .= $this->Html->tag('h4', 'Editar Banner', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('col-md-5',
    $this->Html->div('col-md-15',
        $this->Html->div('card tamanhoCard',
            $this->Html->image('/img/img_Banner/' . $this->request->data['Banner']['foto_um'], array('class' => 'img-produto-tamanho', "disabled"))
        ) .
        $botaoAlterarImagem = $this->Html->link('Alterar Imagem', '#', array(
            'class' => 'tamanhoBotaoCampanha AlterarFotoUm card-img-top btn btn-light'
        ))
    ) .
    $this->Form->input('Banner.foto_um', array(
        'required' => false,
        'label' => array('text' => 'Alterar Imagem', 'class' =>'input input-file ', 'for' => 'file'),
        'div' => array('class' => 'desabilita button alterarImagem-div', 'text' => 'Insira uma imagem'),
        'class' => 'form-control  form-control-md form-group upload-input-desabilitar alterarImagem-div',
        'type' => 'file',
    ))
);

$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Banner.nome', array(
        'label' => array('text' => 'Nome'),
        'div' => array('class' => 'form-group col-md-3'),
    )) .
    $this->Form->input('Banner.acao_id', array(
        'label' => array('text' => 'Ação do Clique na imagem'),
        'div' => array('class' => 'form-group col-md-4 offset-md-2'),
        'class' => 'form-control', 
        'type' => 'select',
        'options' => array(
            '1' => 'Não executar nenhuma ação',
            '2' => 'Abrir um Produto',
        )
    ))
);

$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Banner.produto_id', array(
        'label' => array('text' => 'Produto'),
        'empty' => '-- Selecione o produto --',
        'type' => 'select',
        'options' => $Produto,
        'div' => array('class' => 'AbreOpcaoProduto form-group col-md-3'),
    ))
);
$this->assign('formFields', $formFields);
?>


