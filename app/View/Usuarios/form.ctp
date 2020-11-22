<?php
$this->extend('/Elements/form_usuarios');
$formFields = $this->Form->create('Usuario');

if ($this->request->params['action'] == 'add') {
    $this->assign('title', 'Novo Usuário');
    $formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'disabled mt-4'));
    $formFields .= $this->Html->tag('hr');
    
}
if ($this->request->params['action'] == 'alterarsenha') {
   $this->assign('title', 'Alterar Senha do Usuário');
   echo $this->element('header');
   $formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'disabled mt-4'));
   $formFields .= $this->Html->tag('hr');
   $desabilitar = true;
}
if ($this->request->params['action'] == 'edit') {
    $this->assign('title', 'Editar Usuário');
    echo $this->element('header');
    $desabilitar = true;
}
if ($this->request->params['action'] == 'view') {
    $this->assign('title', 'Usuário');
    $formFields .= $this->Html->tag('h4', 'Dados Pessoais', array('class' => 'disabled mt-4'));
    $formFields .= $this->Html->tag('hr');
}
//$formFields .= $this->Form->hidden('Usuario.estabelecimento_id', array('value' => AuthComponent::user('estabelecimento_id')));

$formFields .= $this->Form->hidden('Usuario.login');
$formFields .= $this->Form->hidden('Usuario.nome');
$formFields .= $this->Form->hidden('Usuario.cpf');
$formFields .= $this->Form->hidden('Usuario.email');
$formFields .= $this->element('formCreate');
$formFields .= $this->Html->div('form-row ',
    $this->Form->input('Usuario.login', array(
        'type' => 'text',
        'label' => array('text' => 'Login'),
        'required' => false,
        'div' => array('class' => 'form-group col-md-3'),
        'class' => 'form-control uppercase',
        'error' => array('attributes' => array('class' => 'invalid-feedback')),
        'disabled' => $desabilitar
    )) .
    $this->Form->input('Usuario.nome', array(
        'label' => array('text' => 'Nome Completo'),
        'required' => false,
        'div' => array('class' => 'form-group col-md-6 offset-md-3'),
        'class' => 'form-control uppercase',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    ))
    
);
$formFields .= $this->Html->div(
    'form-row',
    $this->Form->input('Usuario.cpf', array(
        'label' => array('text' => 'CPF'),
        'required' => false,
        'div' => array('class' => 'form-group  col-md-3'),
        'class' => 'form-control',
        'error' => array('attributes' => array('class' => 'invalid-feedback')),
        'data-inputmask' => "'mask': '9', 'repeat': 11, 'greedy' : false"
    )) .
    $this->Form->input('Usuario.email', array(
        'type' => 'text',
        'required' => false,
        'label' => array('text' => 'E-mail'),
        'div' => array('class' => 'form-group col-md-6 offset-md-3'),
        'class' => 'form-control uppercase',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) . 
    $this->Form->input('Usuario.data_nascimento', array(
        'label' => array('text' => 'Data Nascimento'),
        'required' => false,
        'div' => array('class' => 'form-group col-md-6 offset-md-3'),
        'class' => 'form-control uppercase',
        'data-inputmask' => "'mask': '99/99/9999', 'greedy' : false",
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    ))
);

$formFields .= $this->Html->div(
    'form-row ',
    $this->Form->input('Usuario.aro_parent_id', array(
        'type' => 'select',
        'div' => array('class' => 'form-group col-md-3 offset-mr-9'),
        'class' => 'form-control',
        'label' => array('text' => 'Nível de Usuário'),
        'options' => $aros,
    ))
);

$formFields .= $this->Html->div(
    'form-row ',
    $this->Form->input('Usuario.aro_parent_id', array(
        'type' => 'select',
        'div' => array('class' => 'form-group col-md-3 offset-mr-9'),
        'class' => 'form-control',
        'label' => array('text' => 'Nível de Usuario'),
        'options' => $aros,
        'disabled' => true
    ))
);
$formFields .= $this->Form->hidden('Usuario.aro_parent_id', array('value' => 1));

$this->assign('formFields', $formFields);   