<?php

$this->extend('/Elements/form_estabelecimento');

$this->assign('title', 'Estabelecimento');
$formFields = $this->Form->create('Estabelecimento', array(
    'enctype' => 'multipart/form-data'
));

$formFields .= $this->Form->hidden('Estabelecimento.id');

$formFields .= $this->Form->input('Estabelecimento.foto_visualizacao', array(
    'hidden' => true,
    'readonly' => true,
    'label' => array('text' => ''),
));
$formFields .= $this->Html->div('col-md-5',
    $this->Html->div('col-md-9',
        $this->Html->div('card tamanhoCard',
            $this->Html->image('/img/img_Brasao/' . $this->request->data['Estabelecimento']['foto_visualizacao'], array('class' => 'img-brasao-tamanho', "disabled"))
        ) .
        $botaoAlterarImagem = $this->Html->link('Alterar Imagem', '#', array(
            'class' => 'tamanhoBotaoCampanha AlterarFotoUm card-img-top btn btn-light'
        ))
    ) .
    $this->Form->input('Estabelecimento.brasao', array(
        'required' => false,
        'label' => array('text' => 'Alterar Imagem', 'class' =>'input input-file ', 'for' => 'file'),
        'div' => array('class' => 'desabilita button alterarImagem-div', 'text' => 'Insira uma imagem'),
        'class' => 'form-control  form-control-md form-group upload-input-desabilitar alterarImagem-div',
        'type' => 'file',
    ))
);

$this->assign('formFields', $formFields);

?>