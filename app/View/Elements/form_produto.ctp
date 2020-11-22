
<?php
$form = $this->fetch('formFields');

$form  .= $this->Html->div('mt-4 form-row', 
    $this->Form->input('Produto.nome', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control uppercase', 
        'label' => array('text' => 'Órgão'),
        'placeholder' => 'Secretaria Municipal',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) .
    $this->Form->input('Produto.categoria_id', array(
        'label' => array('text' => 'Categoria'),
        'div' => array('class' => 'form-group col-md-3 offset-md-2'),
        'class' => 'form-control', 
        'type' => 'select',
        'options' => $categorias
    ))
);
$form  .= $this->Html->div('form-row', 
    $this->Form->input('Produto.valor', array(
        'label' => array('text' => 'Valor'),
        'div' => array('class' => 'form-group col-md-2'),
        )
    )
);
$form  .= $this->Html->div('form-row', 
$this->Html->div('col-md-6 form-group',
    $this->Html->para('h5', 'Situação') .
    $this->Html->div('form-check form-check-inline',
        $this->Form->input('Produto.desabilitar', array(
            'legend' => false,
            'required' => false,
            'type' => 'radio',
            'options' => array('Sim' => 'Habilidado', 'Não' => 'Desabilitado'),
            'class' => 'form-check-input mb-2',
            'div' => false,
            'label' => array('class' => 'AbreOpcao form-check-label mr-3 mb-2'),
            'error' => array('attributes' => array('class' => 'form-check-input mb-2 text-danger'))
        ))
    ))
);
$form  .= $this->Html->div('form-row', 
    $this->Form->input('Produto.descricao', array(
        'label' => array('text' => 'Descrição / Ingredientes'),
        'div' => array('class' => 'form-group col-md-8'),
        'type' => 'textarea'
        )
    )
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

$form .= $this->Js->link($this->Html->tag('i', '', array('class' => 'fas fa-undo')) .
    ' Voltar',
    '/'. $controllerName,
    array(
        'class' => 'btn btn-secondary mt-4',
        'escape' => false,
        'update' => '#content'
    )
);
$form .= $this->Form->end();

echo $form;
$this->Js->buffer('$(".form-error").addClass("is-invalid");');
$this->Js->buffer('alterarImagemProduto();');
$this->Js->buffer('motoboyTerceirizado()');
if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>


