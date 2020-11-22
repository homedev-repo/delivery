<?php
$this->extend('/Common/form');
$this->assign('title', 'Clientes');
$formFields .= $this->element('formCreate');

$iconeimpressora  = $this->Html->link($this->Html->tag('i', '', 
array('class' => 'fas fa-print')), '/clientes/impressaoDadosView/' . $this->request->data['Cliente']['id'], array(
    'update' => '#content',
    'class' => 'btn btn-secondary float-right mr-2 hint--left',
    'aria-label'=>"Impressão Dados do Cliente",
    'escape' => false,
    'target' => '_blank'
    )
);

$formFields .= $this->Html->tag('h4', 'Dados Pessoais' . $iconeimpressora , array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row',
    $this->Form->input('Cliente.nome', array(
        'label' => array('text' => 'Nome'),
        'div' => array('class' => 'form-group col-md-3'),
    )) .
    $this->Form->input('Cliente.cpf', array(
        'disabled' => true,
        'label' => array('text' => 'CPF'),
        'div' => array('class' => 'form-group col-md-3 offset-md-3 offset-mr-4'),
    ))
);
$formFields .= $this->Html->div('form-row',
    $this->Form->input('Cliente.email', array(
        'disabled' => true,
        'label' => array('text' => 'E-mail'),
        'div' => array('class' => 'form-group col-md-3'),
    )) .
    $this->Form->input('Cliente.telefone_celular', array(
        'disabled' => true,
        'label' => array('text' => 'Tel. Celular'),
        'div' => array('class' => 'form-group col-md-3 offset-md-3 offset-mr-4'),
    ))
);
$formFields .= $this->Html->div('form-row',
    $this->Form->input('Cliente.telefone_residencial', array(
        'disabled' => true,
        'label' => array('text' => 'Tel. Residencial'),
        'div' => array('class' => 'form-group col-md-3'),
    ))
);
$formFields .= $this->Html->tag('h4', 'Dados Endereço', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row',
    $this->Form->input('Cliente.endereco', array(
        'disabled' => true,
        'label' => array('text' => 'Endereço'),
        'div' => array('class' => 'form-group col-md-4'),
    )) .
    $this->Form->input('Cliente.bairro', array(
        'disabled' => true,
        'label' => array('text' => 'Bairro'),
        'div' => array('class' => 'form-group col-md-3 offset-md-2'),
    ))
);
$formFields .= $this->Html->div('form-row',
    $this->Form->input('Cliente.complemento', array(
        'disabled' => true,
        'label' => array('text' => 'Complemento'),
        'div' => array('class' => 'form-group col-md-4'),
    )) .
    $this->Form->input('Cliente.cep', array(
        'disabled' => true,
        'label' => array('text' => 'CEP'),
        'div' => array('class' => 'form-group col-md-3 offset-md-2'),
    ))
);
$formFields .= $this->Html->div('form-row',
    $this->Form->input('Cliente.numero', array(
        'disabled' => true,
        'label' => array('text' => 'Número'),
        'div' => array('class' => 'form-group col-md-2'),
    ))
);
$formFields .= $this->Html->tag('h4', 'Situação', array('class' => 'mt-4'));
$formFields .= $this->Html->tag('hr');
$formFields .= $this->Html->div('form-row ',
    $this->Html->div('col-md-6 form-group',
   
        $this->Html->div('form-check form-check-inline',
            $this->Form->input('Cliente.situacao_id', array(
                'legend' => false,
                'required' => false,
                'type' => 'radio',
                'options' => array('1' => 'Ativo', '2' => 'Bloqueado'),
                'class' => 'form-check-input mb-2',
                'div' => false,
                'label' => array('class' => 'AbreOpcao form-check-label mr-3 mb-2'),
                'error' => array('attributes' => array('class' => 'form-check-input mb-2 text-danger'))
            )
        ))
    )
);
if($this->request->data['Situacao']['nome'] == 'Bloqueado'){
$formFields .= $this->Html->div('form-row',
    $this->Form->input('Cliente.justificativa', array(
        'label' => array('text' => 'Justificativa'),
        'div' => array('class' => 'form-group Justificativa col-md-6'),
        'type' => 'textarea',
    ))
);
}
    if (!empty($this->request->data['Pedidos'])) {
        $formFields .= $this->Html->tag('hr');
        $formFields .= $this->Html->tag('h4', 'Pedidos realizados', array('class' => 'mt-4 mb-4'));
    }

    $acordion = '';
    foreach ($this->request->data['Pedidos'] as $pedido) {
        $acordion .= $this->Html->div('card',
        $this->Html->div('card-header',
            $this->Html->tag('h2',
                $this->Form->button(
                    $this->Html->tag('span', 'Número Pedido: ' . $pedido['numero_pedido'], array('class' => 'ml-4')) ,
                    array(
                        'class' => 'btn btn-link',
                        'type' => 'button',
                        'data-toggle' => 'collapse',
                        'data-target' => '#collapse' . $pedido['id'],
                        'aria-expanded' => false,
                        'aria-controls' => 'collapse' . $pedido['id'],
                    )
                ),
                array('class' => 'mb-0')
            ),
            array('id' => 'heading' . $pedido['id']))
        );
            $iconeimpressora = '';
            $form = '';
            $foto = '';
        }
        $formFields .= $this->Html->div('accordion', 
        $acordion,
        array('id' => 'accordion')
    );

$this->assign('formFields', $formFields);