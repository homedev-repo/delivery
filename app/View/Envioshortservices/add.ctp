<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('Envioshortservice.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));
$formFields .= $this->Form->hidden('Envioshortservice.quantidade_numeroespecifico');
$formFields .= $this->Form->hidden('Envioshortservice.quantidade_todosclientes');

$this->assign('title', 'Envio de SMS');
$iconeWinner = $this->Html->tag('span', '', array('class' => 'fas fa-sms', 'style'=>"color: #fa716bfa"));
$formFields .= $this->Html->tag('h4', 'Dados SMS' . ' ' .  $iconeWinner , array('class' => 'mt-4'));
$this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div(
    'form-row ',
    $this->Html->div(
        'col-md-6 form-group',
        $this->Html->para('h5', 'Forma de envio ?') .
            $this->Html->div(
                'form-check form-check-inline',
                $this->Form->input(
                    'Envioshortservice.forma',
                    array(
                        'legend' => false,
                        'required' => false,
                        'type' => 'radio',
                        'options' => array('enderecoEspecifico' => 'Número específico ', 'TodosClientes' => 'Envio para todos Clientes'),
                        'class' => 'form-check-input mb-2',
                        'div' => false,
                        'label' => array('class' => ' form-check-label mr-3 mb-2'),
                        'error' => array('attributes' => array('class' => 'form-check-input mb-2 text-danger'))
                    )
                )
            )
    )
);

$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Envioshortservice.para', array(
    'label' => array('text' => 'Para'),
    'id' => 'para',
    'div' => array('class' => 'form-group col-md-4'),
    'data-inputmask' => "'mask':'(99) 9999-9999[9]', 'greedy': false"
    ))
);

$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Envioshortservice.descricao', array(
    'label' => array('text' => 'Mensagem'),
    'type' => 'textarea',
    'div' => array('class' => 'form-group col-md-8'),
    ))
);
$formFields .= $this->Html->div('form-row', 
$this->element('mensagemSMS')
);


$this->assign('formFields', $formFields);
?>