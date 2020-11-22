<?php
$this->extend('/Common/form');
$this->assign('title', 'Fidelidade');
$formFields = $this->element('formCreate');

$formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'disabled mt-4'));
$formFields .= $this->Form->hidden('Fidelidade.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));

$formFields .= $this->Html->tag('hr');
$formFields .= $this->Form->hidden('Fidelidade.id');
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Fidelidade.nome', array(
        'label' => array('text' => 'Nome'),
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control', 
        'placeholder' => 'Meu programa de Fidelidade'
    ))
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Fidelidade.premio_id', array(
        'label' => array('text' => 'O que é preciso para Ganhar?'),
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control', 
        'type' => 'select',
        'empty' => '-- Selecione a Situação --',
        'options' => array(
            '1' => 'Comprar X vezes no aplicativo',
            '2' => 'Gastar X valor em um pedido',
        )
    ))
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Fidelidade.comprarx_vezes', array(
        'label' => array('text' => 'Comprar quantas vezes?'),
        'div' => array('class' => 'form-group col-md-2'),
        'class' => 'form-control', 
        'id' => 'comprarXVezes',
        'type' => 'number',
        'placeholder' => '10'
    ))
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Fidelidade.gastarx_vezes', array(
        'label' => array('text' => 'Gastar quantas vezes acima De ?'),
        'div' => array('class' => 'form-group col-md-2 gastarXVezes'),
        'class' => 'form-control', 
        'id' => 'mascaraDinheiro2',
        'placeholder' => 'R$ 150,00'
    ))
);

$iconeWinner = $this->Html->tag('span', '', array('class' => 'fas fa-trophy', 'style'=>"color: #e5bb23;"));
$formFields .= $this->Html->tag('h4', 'Prêmio' . ' ' .  $iconeWinner , array('class' => 'mt-4'));
$this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt'));
$formFields .= $this->Html->tag('hr');

$formFields .= $this->Form->hidden('Fidelidade.id');
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Fidelidade.recompensa_id', array(
        'label' => array('text' => 'Qual tipo de Recompensa seu cliente vai ganhar?'),
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control', 
        'type' => 'select',
        'empty' => '-- Selecione a Recompensa --',
        'options' => array(
            '1' => 'Porcentagem de desconto  na compra',
            '2' => 'Desconto de X R$ na compra',
        )
    ))
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Fidelidade.porcentagem_desconto', array(
        'label' => array('text' => 'Porcentagem De R$ % ?'),
        'div' => array('class' => 'form-group col-md-2'),
        'class' => 'form-control', 
        'id' => 'comprarXVezes',
        'type' => 'number',
        'id' => 'porcentagemDesconto',
        'placeholder' => '5 %'
    ))

);
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Fidelidade.compra_desconto', array(
        'label' => array('text' => 'Desconto De R$ ?'),
        'div' => array('class' => 'form-group col-md-2 compraDesconto'),
        'class' => 'form-control', 
        'id' => 'mascaraDinheiro',
        'placeholder' => 'R$ 150,00'
    ))
);
$this->assign('formFields', $formFields);
?>
