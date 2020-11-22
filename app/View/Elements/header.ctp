<?php
$controllerName = $this->request->params['controller'];
$actionName = $this->request->params['action'];

$idBotaoNovo = '';
if($controllerName == 'clientes'){
    $idBotaoNovo = 'chamadaModalCliente';
}else{
    $idBotaoNovo = 'idBotaoNovo';
}

$hidden = 'visibility: hidden;';
if($actionName == 'add' || $actionName == 'view' || $actionName == 'edit'){
    $hidden;
} else {
    $hidden = 'visibility: visible;';
}

if($controllerName == 'banners' && $actionName == 'index' && $countBanner == 4){
    $this->Js->buffer('hiddenBotaoAddBanner();');
} 

$nomeBotao = 'Incluir';
$buttonCardapio = '';
$buttonProduto = '';
$buttonProdutosTamanhos = '';
$buttonProdutosTCambo = '';
$buttonComplementos = '';
$nomeHeader = $this->Html->tag('h7', $this->fetch('title'));  
if($controllerName == 'categorias'){
    $nomeHeader = $this->Html->tag('h7', 'Cardápio');
    $nomeBotao = 'Categorias';
    $buttonComplementos = $this->Js->link(
        $this->Html->tag('i', '', array(
            'class' => 'fas fa-plus '
        )) . 
        '&nbsp;' . 'Complementos',
        '/complementos', 
        array('class' => 'btn btn-success  float-right', 'escape' => false, 'style' => $hidden, 'update' => '#content')
    );
    $buttonProdutosTCambo = $this->Js->link(
        $this->Html->tag('i', '', array(
            'class' => 'fas fa-plus '
        )) . 
        '&nbsp;' . 'Produtos Combo',
        '/produtocombos', 
        array('class' => 'btn btn-success  float-right', 'escape' => false, 'style' => $hidden, 'update' => '#content')
    );
}

if($controllerName == 'kanbans'){
    $nomeHeader = $this->Html->tag('h7', 'KanBan');
}

$novoButton = $this->Js->link(
    $this->Html->tag('i', '', array(
        'class' => 'fas fa-plus '
    )) . 
    '&nbsp;' . $nomeBotao,
    '/' . $controllerName . '/add', 
    array('class' => 'btn btn-success  float-right','id' => $idBotaoNovo, 'escape' => false, 'style' => $hidden, 'update' => '#content')
);

?>
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <?php echo $nomeHeader ?>                         
            </h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
        </div>        
        <div class="kt-subheader__toolbar">
            <?php echo $buttonComplementos . ' ' . $buttonProdutosTCambo . ' ' .  $novoButton ?>
        </div>
    </div>
</div>
