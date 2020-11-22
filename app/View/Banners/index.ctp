<?php
$this->extend('/Elements/indexProdutos');

$this->assign('title', 'Banners');

$searchFields .= $this->Html->div('form-row',
$this->Form->input('Banner.nome', array(
    'placeholder' => 'Nome', 
    'label' => array('class' => 'sr-only'),
    'class' => 'form-control col-md-11 mr-2',
    'div' => false          
))
);
$this->assign('searchFields', $searchFields);


$titulos = array(
    array('Imagem' => array('width' => '0%')),
    array($this->Paginator->sort('Banner.nome', 'Nome') => array('width' => '0%',  'class'=>"hint--bottom", 'aria-label'=>"Ordenar por Nome")),
    array('Ação' => array('width' => '0%')),
);
   
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

   $detalhe = array();
   foreach ($banners as $banner) {
    $imagemProduto = $this->Html->div('tamanhoCard',
            $this->Html->image('/img/img_Banner/' . $banner['Banner']['foto_um'], array('class' => 'img-banner-tamanho', "disabled"))
    );
    $bannerView = $this->Js->link($banner['Banner']['nome'], '/banners/view/' . $banner['Banner']['id'], array('update' => '#content'));

    $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger')), '/banners/delete/' . $banner['Banner']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'escape' => false
    ));

    $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/banners/edit/' . $banner['Banner']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'title' => 'Alterar',
        'escape' => false
    ));

    if($banner['Banner']['acao_id'] == 1){
        $banner['Banner']['acaoTipo'] = 'Não executar nenhuma ação';
    }
    if($banner['Banner']['acao_id'] == 2){
        $banner['Banner']['acaoTipo'] =  'Abrir um Produto';
    }
 

    $quantidadeRegistro = count($banner['Banner']);
    if($quantidadeRegistro == '4'){
        $this->Js->buffer('changeVisibility();');
    }

    $classTooltipBotao = 'hint--top float-right mr-2';
    $classTooltipView = 'hint--top';
    $textoTooltipView = 'Visualizar';
    $textoTooltipAlterar = 'Alterar';
    $textoTooltipExcluir = 'Excluir';
    $excluir = $this->Html->tag('span', $excluir, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipExcluir));
    $alterar = $this->Html->tag('span', $alterar, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipAlterar));
    $detalhe[] = array(     
    $imagemProduto,
    $this->Html->tag('span', $bannerView, array('class' => $classTooltipView, 'aria-label'=> $textoTooltipView)),      
    $banner['Banner']['acaoTipo'],
    $excluir . ' ' . $alterar
    );

}

$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);
?>    
