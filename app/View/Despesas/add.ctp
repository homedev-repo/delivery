<?php

$this->extend('/Common/form');

$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('Despesa.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));

$this->assign('title', 'Adicionar Despesa');
$formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'disabled mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Despesa.custo', array(
    'label' => array('text' => 'Despesa *'),
    'placeholder' => 'Ex: Funcionário',
    'div' => array('class' => 'form-group col-md-3'),
    )) . 
    $this->Form->input('Despesa.valor', array(
        'label' => array('text' => 'Valor *'),
        'div' => array('class' => 'form-group col-md-3 offset-2'),
        'placeholder' => array('Ex: 1500,00'),
        'id' => 'mascaraDinheiro'
    ))
);

$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Despesa.data_compra', array(
        'label' => array('text' => 'Data da Compra (Opcional)'),
        'div' => array('class' => 'form-group col-md-3'),
        'data-inputmask' => "'mask': '99/99/9999', 'greedy' : false"
    )) . 
    $this->Form->input('Despesa.data_vencimento', array(
        'label' => array('text' => 'Data Vencimento (Opcional)'),
        'div' => array('class' => 'form-group col-md-3 offset-2'),
        'data-inputmask' => "'mask': '99/99/9999', 'greedy' : false"
    ))
);

$formFields .= $this->Html->div('form-row', 
    $this->Form->input('Despesa.categoriadespesa_id', array(
    'label' => array('text' => 'Categoria *'),
    'div' => array('class' => 'form-group col-md-3'),
    'type' => 'select',
    'empty' => '-- Selecione a Categoria --',
    'options' => $categoriaDespesa
    )) 
);

$formFields .= $this->Html->div(
    'form-row ',
    $this->Html->div(
        'col-md-6 form-group ocultaDiv',
        $this->Html->para('h5', 'Despesa Paga ? *') .
            $this->Html->div(
                'form-check form-check-inline',
                $this->Form->input(
                    'Despesa.despesa_paga',
                    array(
                        'legend' => false,
                        'required' => false,
                        'type' => 'radio',
                        'options' => array('Sim' => 'Sim', 'Não' => 'Não'),
                        'class' => 'form-check-input mb-2',
                        'div' => false,
                        'label' => array('class' => ' form-check-label mr-3 mb-2'),
                        'error' => array('attributes' => array('class' => 'form-check-input mb-2 text-danger'))
                    )
                )
            )
    )
);

$formFields .= $this->Html->div(
    'form-row ',
    $this->Html->div(
        'col-md-6 form-group',
        $this->Html->para('h5', 'Repetir ?') .
            $this->Html->div(
                'form-check form-check-inline',
                $this->Form->input(
                    'Despesa.repetir',
                    array(
                        'legend' => false,
                        'required' => false,
                        'type' => 'radio',
                        'options' => array('Sim' => 'Sim', 'Não' => 'Não'),
                        'aria-label'=>"Essa opção marcado como Sim, irá repetir ou seja gravar novamente todo mês essa conta que você está cadastrando",
                        'class' => 'form-check-input mb-2 hint--right  hint--medium',
                        'div' => false,
                        'label' => array('class' => ' form-check-label mr-3 mb-2'),
                        'error' => array('attributes' => array('class' => 'form-check-input mb-2 text-danger'))
                    )
                )
            )
    )
);

echo $this->Html->script('projeto');
$this->assign('formFields', $formFields);
?>