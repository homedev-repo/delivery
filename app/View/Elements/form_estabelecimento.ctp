<?php
echo $this->element('header');
$form = $this->fetch('formFields');
$form .= $this->Html->div(
    'form-row',
    $this->Form->input('Estabelecimento.estado_funcionamento', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control bordaLabel',
        'label' => array('text' => 'Estado de Funcionamento *'),
        'error' => array('attributes' => array('class' => 'invalid-feedback')),
        'type' => 'select',
        'options' => array(
            'Aberto' => 'Aberto',
            'Fechado' => 'Fechado'
        )
    ))
);
$form .= $this->Html->div(
    'form-row',
    $this->Form->input('Estabelecimento.codigo', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-2'),
        'class' => 'form-control',
        'label' => array('text' => 'Código'),
        'disabled' => true,
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    ))
);
$form .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'mt-4'));
$form .= $this->Html->tag('hr');
$form .= $this->Html->div(
    'form-row',
    $this->Form->input('Estabelecimento.nome_fantasia', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control',
        'label' => array('text' => 'Nome Fantasia *'),
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) .
        $this->Form->input('Estabelecimento.cnpj', array(
            'required' => false,
            'label' => array('text' => 'CNPJ'),
            'div' => array('class' => 'form-group col-md-6 offset-md-2'),
            'class' => 'form-control ',
            'error' => array('attributes' => array('class' => 'invalid-feedback'))
        ))
);
$form .= $this->Html->div('form-row', 
    $this->Form->input('Estabelecimento.taxa', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control', 
        'label' => array('text' => 'Taxa de Entrega *'),
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    ))
);
$form .= $this->Html->tag('h4', 'Dados Endereço', array('class' => 'mt-4'));
$form .= $this->Html->tag('hr');
$form .= $this->Html->div(
    'form-row',
    $this->Form->input('Estabelecimento.cep', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-4 '),
        'class' => 'form-control Cep',
        'label' => array('text' => 'CEP *'),
        'error' => array('attributes' => array('class' => 'invalid-feedback')),
        'data-inputmask' => "'mask': '9', 'repeat': 8, 'greedy' : false"
    )) .
        $this->Form->input('Estabelecimento.endereco', array(
            'required' => false,
            'div' => array('class' => 'form-group col-md-6 offset-md-2'),
            'class' => 'form-control Rua',
            'label' => array('text' => 'Endereço *'),
            'error' => array('attributes' => array('class' => 'invalid-feedback')),
        )) .
        $this->Form->input('Estabelecimento.numero', array(
            'required' => false,
            'div' => array('class' => 'form-group col-md-4 '),
            'class' => 'form-control  input Rua',
            'label' => array('text' => 'Numero *'),
            'error' => array('attributes' => array('class' => 'invalid-feedback'))
        )) .
        $this->Form->input('Estabelecimento.bairro', array(
            'required' => false,
            'div' => array('class' => 'form-group col-md-6 offset-md-2'),
            'class' => 'form-control  Bairro',
            'label' => array('text' => 'Bairro *'),
            'error' => array('attributes' => array('class' => 'invalid-feedback')),
        )) .
        $this->Form->input('Estabelecimento.cidade', array(
            'type' => 'text',
            'required' => false,
            'div' => array('class' => 'form-group col-md-4'),
            'class' => 'form-control Cidade',
            'label' => array('text' => 'Cidade *', 'class' => 'sem-quebradelinha'),
            'error' => array('attributes' => array('class' => 'invalid-feedback')),
        )) .
        $this->Form->input('Estabelecimento.complemento', array(
            'required' => false,
            'div' => array('class' => 'form-group col-md-6 offset-md-2'),
            'class' => 'form-control  input',
            'error' => array('attributes' => array('class' => 'invalid-feedback')),
            'label' => array('text' => 'Complemento')

        ))
);
$form .= $this->Html->tag('h4', 'Dados Responsável', array('class' => 'mt-4'));
$form .= $this->Html->tag('hr');
$form .= $this->Html->div(
    'form-row',
    $this->Form->input('Estabelecimento.responsavel', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-4 '),
        'class' => 'form-control',
        'label' => array('text' => 'Nome *'),
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) .
        $this->Form->input('Estabelecimento.telefone', array(
            'required' => false,
            'disabled' => true,
            'div' => array('class' => 'form-group col-md-6 offset-md-2'),
            'class' => 'form-control',
            'label' => array('text' => 'Telefone *'),
            'error' => array('attributes' => array('class' => 'invalid-feedback')),
            'placeholder' => "ex: 5514998100110"
        ))
);
$form .= $this->Html->tag('h4', 'Horário de Funcionamento', array('class' => 'mt-4'));
$form .= $this->Html->tag('hr');
$form .= $this->Html->div(
    'form-row',
    $this->Form->input('Estabelecimento.funcionamento_segunda', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control',
        'label' => array('text' => 'Segunda *'),
        'error' => array('attributes' => array('class' => 'invalid-feedback')),
        
    )) .
        $this->Form->input('Estabelecimento.funcionamento_terca', array(
            'required' => false,
            'label' => array('text' => 'Terça *'),
            'div' => array('class' => 'form-group col-md-6 offset-md-2'),
            'class' => 'form-control',
            'error' => array('attributes' => array('class' => 'invalid-feedback')),
            
        ))
);
$form .= $this->Html->div(
    'form-row',
    $this->Form->input('Estabelecimento.funcionamento_quarta', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control ',
        'label' => array('text' => 'Quarta *'),
        'error' => array('attributes' => array('class' => 'invalid-feedback')),
        
    )) .
        $this->Form->input('Estabelecimento.funcionamento_quinta', array(
            'required' => false,
            'label' => array('text' => 'Quinta *'),
            'div' => array('class' => 'form-group col-md-6 offset-md-2'),
            'class' => 'form-control',
            'error' => array('attributes' => array('class' => 'invalid-feedback')),
            
        ))
);
$form .= $this->Html->div(
    'form-row',
    $this->Form->input('Estabelecimento.funcionamento_sexta', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control ',
        'label' => array('text' => 'Sexta *'),
        'error' => array('attributes' => array('class' => 'invalid-feedback')),
        
    )) .
        $this->Form->input('Estabelecimento.funcionamento_sabado', array(
            'required' => false,
            'label' => array('text' => 'Sábado *'),
            'div' => array('class' => 'form-group col-md-6 offset-md-2'),
            'class' => 'form-control',
            'error' => array('attributes' => array('class' => 'invalid-feedback')),
            
        ))
);
$form .= $this->Html->div(
    'form-row',
    $this->Form->input('Estabelecimento.funcionamento_domingo', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-4'),
        'class' => 'form-control ',
        'label' => array('text' => 'Domingo *'),
        'error' => array('attributes' => array('class' => 'invalid-feedback')),
        
    ))
);

$form .= $this->Form->button(
    $this->Html->tag('i', '', array('class' => 'fas fa-check')) .
        ' Gravar',
    array(
        'type' => 'submit',
        'class' => 'btn btn-success',
        'escape' => false,
        'update' => '#content'
    )
);
$form .= $this->Js->link(
    $this->Html->tag('i', '', array('class' => 'fas fa-undo')) .
        ' Voltar',
    '/',
    array(
        'class' => 'btn btn-secondary ml-3',
        'escape' => false,
        'update' => '#content'
    )
);

$form .= $this->Form->end();

echo $form;

$this->Js->buffer("alterarImagemProduto();");
$this->Js->buffer("getCep();");
$this->Js->buffer('$(".form-error").addClass("is-invalid")');
if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
