<?php
$form = $this->Form->create('Usuario', array('class' => 'form-signin'));
$form .= $this->Flash->render('danger'); 
$form .= $this->Form->input('Estabelecimento.codigo', array(
    'required' => false,
    'div' => 'form-group',
    'label' => array('class' => 'sr-only'),
    'class' => 'form-control', 
    'placeholder' => 'Código do Estabelecimento',
    'type' => 'number',
    'error' => array('attributes' => array('class' => 'invalid-feedback'))    
));
$form .= $this->Form->input('Usuario.login', array(
    'required' => false,
    'div' => 'form-group',
    'label' => array('class' => 'sr-only'),
    'class' => 'form-control', 
    'placeholder' => 'Login',
    'error' => array('attributes' => array('class' => 'invalid-feedback'))    
));
$form .= $this->Form->input('Usuario.senha', array(
    'required' => false,
    'type' => 'password',
    'label' => array('class' => 'sr-only'),
    'div' => 'form-group',
    'placeholder' => 'Senha',
    'class' => 'form-control', 
    'error' => array('attributes' => array('class' => 'invalid-feedback'))    
));
$form .= $this->Form->submit('Entrar', array('div' => 'mt-4', 'class' => "col-md-3 btn btn-primary btn-elevate kt-login__btn-primary"));
$form .= $this->Form->end();

echo $form;

$this->Js->buffer('$(".form-error").addClass("is-invalid");');

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}