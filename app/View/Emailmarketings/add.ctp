<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');

$this->assign('title', 'Envio de Email');

$iconeWinner = $this->Html->tag('span', '', array('class' => 'far fa-envelope', 'style'=>"color: #fa716bfa"));
$formFields .= $this->Html->tag('h4', 'Dados E-mail' . ' ' .  $iconeWinner , array('class' => 'mt-4'));
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
                    'Emailmarketing.forma',
                    array(
                        'legend' => false,
                        'required' => false,
                        'type' => 'radio',
                        'options' => array('enderecoEspecifico' => 'E-mail específico ', 'TodosClientes' => 'E-mail para todos Clientes'),
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
    $this->Form->input('Emailmarketing.para', array(
    'label' => array('text' => 'Para'),
    'id' => 'para',
    'div' => array('class' => 'form-group col-md-4'),
    'placeholder' => 'Endereço E-mail'
    ))
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Emailmarketing.assunto', array(
    'label' => array('text' => 'Assunto'),
    'div' => array('class' => 'form-group col-md-4'),
    ))
);
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Emailmarketing.descricao', array(
    'label' => array('text' => 'Descrição'),
    'type' => 'textarea',
    'div' => array('class' => 'form-group col-md-8'),
    ))
);

$this->assign('formFields', $formFields);
?>