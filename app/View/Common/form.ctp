<?php
echo $this->element('header');
$controllerName = $this->request->params['controller'];
$actionName = $this->request->params['action'];
if($controllerName == 'emailmarketings' || $controllerName == 'envioshortservices'){
    echo $this->Flash->render('success');
    echo $this->Flash->render('danger');
    echo $this->Flash->render();
}
$form = $this->fetch('formFields');
if ($actionName != 'view') {
    $form .= $this->Form->button($this->Html->tag('i', '', array('class' => 'fas fa-check')) .
        ' Gravar',
        array(
            'type' => 'submit',
            'class' => 'btn btn-success gravar mr-3 mt-4',
            'div' => false,
            'update' => '#content'
        )
    );
}
    $form .= $this->Js->link($this->Html->tag('i', '', array('class' => 'fas fa-undo')) .
        ' Voltar',
        '/'. $controllerName,
        array(
            'class' => 'btn btn-secondary voltar mt-4',
            'escape' => false,
            'update' => '#content'
        )
    );



$form .= $this->Form->end();

echo $form;

$this->Js->buffer('$(".form-error").addClass("is-invalid");');
$this->Js->buffer("getCep();");
$this->Js->buffer('emailMarketing();');
$this->Js->buffer('envioSMS();');
$this->Js->buffer('cupomDesativado();');
$this->Js->buffer('atribuirCupom();');
$this->Js->buffer('mensagemCustoProduto();');
$this->Js->buffer('mostraOpcoesBanner();');
$this->Js->buffer('ocultaDivFichaTecnica();');
$this->Js->buffer('produtoContemComplementos();');
$this->Js->buffer('situacaoCliente();');
$this->Js->buffer('alterarImagemProduto();');
$this->Js->buffer('motoboyTerceirizado();');
$this->Js->buffer('programaDeFidelidadeDados();');
$this->Js->buffer('programaDeFidelidadePremio();');
$this->Js->buffer('cloneDivDescricaoProduto();');
$this->Js->buffer('produtoEmPromocao();');
$this->Js->buffer('produtoEstoque();');
echo $this->Html->script('Metronic/multipleSelect.js');

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>