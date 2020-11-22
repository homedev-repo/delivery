<?php
$form = $this->Form->create('Pedidos');
$form .= $this->Form->hidden('Pedido.id');
echo $this->Html->tag('h1', 'Editar Pedido');
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
    $this->Form->input('Pedido.observacao', array(
        'type' => 'textarea', 
        'label' => array('text' => 'Observações do Pedido'),
        'div' => array('class' => 'form-group col-md-4'),
        'rows' => '3',
        'class' => 'form-control', 
        'disabled' => true,
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )));
$form .= $this->Html->div('form-row', 
    $this->Form->input('Pedido.estado_id', array(
        'type' => 'select', 
        'label' => array('text' => 'Estado'),
        'options' => $estado,
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control', 
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )));
 

    if($this->request->data['Estado']['tipo_estado'] == 'Em Preparação'){
    $form .= $this->Html->div('form-row', 
        $this->Form->input('Pedido.motoboy_id', array(
            'type' => 'select', 
            'label' => array('text' => 'Atribuir Ao Motoboy:'),
            'options' => $motoboy,
            'div' => array('class' => 'form-group col-md-4'),
            'class' => 'form-control', 
            'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )));

    }
    $form .= $this->Html->div('form-row ',
        $this->Html->div('form-check ',
            $this->Form->input('Observação', array(
                'legend' => false,
                'required' => false,
                'type' => 'checkbox',
                'class' => 'AbreOpcao form-check-input mb-2',
                'id' => 'Checkbox',
                'div' => false,
                'label' => array('class' => 'form-check-label mr-3 mb-2', 'text' => 'Adicionar Observações do Estabelecimento'),
                'error' => array('attributes' => array('class' => 'form-check-input mb-2 text-danger', 'for' => 'CredencialTipoI'))
            )
        ))
    ) .
    $this->Form->input('Pedido.observacao_estabelecimento', array(
        'type' => 'textarea', 
        'label' => array('text' => ''),
        'placeholder' => 'Adicionar Observação',
        'div' => array('class' => 'form-group col-md-8'),
        'rows' => '3',
        'id' =>  'campoObservacao',
        'class' => 'AbreObservacao form-control mb-2', 
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    ));
   
    

$form .= $this->Js->submit('Gravar', array('class' => 'btn btn-success', 'div' => false, 'update' => '#content'));
$form .= $this->Js->link('Voltar', '/pedidos', array('class' => 'btn btn-secondary ml-3', 'update' => '#content'));
$form .= $this->Form->end();
echo $form;


$this->Js->buffer("mostraCampoObservacao();");

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
echo $this->Html->script('projeto');
?>
