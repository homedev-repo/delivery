<?php
$form = $this->Form->create('Pedidos');
$form .= $this->Form->hidden('Pedido.id');
echo $this->Html->tag('h1', 'Visualizar Pedido');
echo $this->Html->tag('hr');
$form .= $this->Html->div('form-row', 

$this->Form->input('Pedido.numero_pedido', array(
    'required' => false,
    'label' => array('text' => 'Numero Do Pedido'),
    'div' => array('class' => 'form-group col-md-2'),
    'class' => 'form-control', 
    'disabled' => true,
    'error' => array('attributes' => array('class' => 'invalid-feedback'))
))
);

$form .= $this->Html->div('form-row', 
$this->Form->input('Cliente.nome', array(
    'required' => false,
    'label' => array('text' => 'Nome'),
    'div' => array('class' => 'form-group col-md-3'),
    'class' => 'form-control',
    'disabled' => true,
    'error' => array('attributes' => array('class' => 'invalid-feedback'))
)) .
$this->Form->input('Cliente.telefone_celular', array(
    'required' => false,
    'label' => array('text' => 'Telefone Celular'),
    'div' => array('class' => 'form-group col-md-3'),
    'class' => 'form-control',
    'disabled' => true,
    'error' => array('attributes' => array('class' => 'invalid-feedback'))
)) .
$this->Form->input('Cliente.telefone_residencial', array(
    'required' => false,
    'label' => array('text' => 'Telefone Residencial'),
    'div' => array('class' => 'form-group col-md-3'),
    'class' => 'form-control',
    'disabled' => true,
    'error' => array('attributes' => array('class' => 'invalid-feedback'))
))
);
$form .= $this->Html->div('form-row', 
$this->Form->input('Cliente.cpf', array(
    'label' => array('text' => 'CPF'),
    'div' => array('class' => 'form-group col-md-3'),
    'class' => 'form-control', 
    'disabled' => true,
    'error' => array('attributes' => array('class' => 'invalid-feedback'))
)) 
);
$form .= $this->Html->div('form-row', 
$this->Form->input('Cliente.endereco', array(
    'label' => array('text' => 'Endereço'),
    'div' => array('class' => 'form-group col-md-4'),
    'class' => 'form-control', 
    'disabled' => true,
    'error' => array('attributes' => array('class' => 'invalid-feedback'))
)) .
$this->Form->input('Cliente.bairro', array(
    'label' => array('text' => 'Bairro'),
    'div' => array('class' => 'form-group col-md-3'),
    'class' => 'form-control', 
    'disabled' => true,
    'error' => array('attributes' => array('class' => 'invalid-feedback'))
)) .
$this->Form->input('Cliente.numero', array(
    'label' => array('text' => 'Número'),
    'div' => array('class' => 'form-group col-md-2'),
    'class' => 'form-control', 
    'disabled' => true,
    'error' => array('attributes' => array('class' => 'invalid-feedback'))
))
);
$form .= $this->Html->div('form-row', 
$this->Form->input('Cliente.cep', array(
    'label' => array('text' => 'CEP'),
    'div' => array('class' => 'form-group col-md-3'),
    'class' => 'form-control', 
    'disabled' => true,
    'error' => array('attributes' => array('class' => 'invalid-feedback'))
)) . 
$this->Form->input('Cliente.complemento', array(
    'label' => array('text' => 'Complemento'),
    'div' => array('class' => 'form-group col-md-4'),
    'class' => 'form-control', 
    'disabled' => true,
    'error' => array('attributes' => array('class' => 'invalid-feedback'))
)) .
$this->Form->input('Pagamento.tipo_pagamento', array(
    'type' => 'text', 
    'label' => array('text' => 'Tipo Pagamento'),
    'div' => array('class' => 'form-group col-md-2'),
    'class' => 'form-control', 
    'disabled' => true,
    'error' => array('attributes' => array('class' => 'invalid-feedback'))
)) 
);
$form .= $this->Html->div('form-row', 
$this->Form->input('Pedido.cupomdeDesconto', array(
    'label' => array('text' => 'Cupom de Desconto'),
    'div' => array('class' => 'form-group col-md-3'),
    'class' => 'form-control', 
    'disabled' => true,
    'error' => array('attributes' => array('class' => 'invalid-feedback'))
)));
$form .= $this->Html->div('form-row', 
    $this->Form->input('Estado.tipo_estado', array(
        'label' => array('text' => 'Estado'),
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control', 
        'disabled' => true,
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )));
  
    if($this->request->data['Estado']['tipo_estado'] == 'Em Preparação'){
    $form .= $this->Html->div('form-row', 
        $this->Form->input('Motoboy.nome_motoboy', array(
        'disabled' => true,
        'label' => array('text' => 'Motoboy Responsável'),
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control', 
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )));
    }
    $form .= $this->Html->div('form-row',
    $this->Form->input('Pedido.observacao_estabelecimento', array(
        'disabled' => true,
        'type' => 'textarea', 
        'label' => array('text' => 'Observação do Estabelecimento'),
        'div' => array('class' => 'form-group col-md-8'),
        'rows' => '3',
        'class' => 'AbreObservacao form-control mb-2', 
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )));

$form .= $this->Js->link('Voltar', '/pedidos', array('class' => 'btn btn-secondary ml-3', 'update' => '#content'));
$form .= $this->Form->end();
echo $form;
if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>