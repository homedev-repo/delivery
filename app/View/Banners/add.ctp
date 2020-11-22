<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');
$this->assign('title', 'Banners');


$formFields .= $this->Form->hidden('Banner.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));

$formFields .= $this->Html->tag('h4', 'Adicionar Banner', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Banner.foto_um', array(
        'label' => array('text' => 'Imagem',),
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control imagem-produto form-control-sm InputUpload',
        'type' => 'file'
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
    $this->Form->input('Banner.endereco_link', array(
        'label' => array('text' => 'Endereço URL'),
        'div' => array('class' => 'AbreOpcaoLink form-group col-md-3'),
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


