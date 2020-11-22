<?php
$this->extend('/Elements/indexProdutos');

$this->assign('title', 'Produtos Por Tamanhos');

$searchFields .= $this->Html->div('form-row',
    $this->Form->input('Produtotamanho.nome', array(
        'placeholder' => 'Nome', 
        'label' => array('class' => 'sr-only'),
        'class' => 'form-control col-md-6 mr-2',
        'div' => false          
    )) .
    $this->Form->input('Produtotamanho.categoria_id', array(
        'type' => 'select',
        'empty' => 'Todos',
        'options' => $categoria,
        'required' => false,
        'label' => array('class' => 'sr-only'),
        'class' => 'form-control'
    ))
);
$this->assign('searchFields', $searchFields);

$imprimirButton = $this->Html->link($this->Html->tag('i', '', 
    array('class' => 'fas fa-print')), '/produtotamanho/impressaoMargemLucroProdutosTamanhos/', array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right mr-2 hint--left',
        'aria-label'=>"Impressão dos Produtos",
        'escape' => false,
        'target' => '_blank'
    )
);

$this->assign('imprimirButton', $imprimirButton);

$titulos = array(
    array($this->Paginator->sort('Produtotamanho.nome', 'Nome') => array('width' => '25%', 'update' => '#content')),
    array('Valor' => array('width' => '15%')),
    array('Categoria' => array('width' => '15%')),
    array('Tipo' => array('width' => '12%')),
    array('' => array('width' => '18%')),
   );
   
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

   $detalhe = array();
   foreach ($produtotamanhos as $produto) {

    $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger')), '/produtotamanhos/delete/' . $produto['Produtotamanho']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'escape' => false
    ));

    $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/produtotamanhos/edit/' . $produto['Produtotamanho']['id'] . '/' . $produto['Tipo']['id'] , array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'title' => 'Alterar',
        'escape' => false
    ));

    $relatorio = $this->Html->link($this->Html->tag('i', '', 
        array('class' => 'fas fa-print')), '/produtotamanhos/impressaoMargemLucroProdutosTamanhos/' . $produto['Produtotamanho']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right mr-2 hint--left',
        'aria-label'=>"Impressão Da Margem de Lucro Do Produto",
        'escape' => false,
        'target' => '_blank'
        )
    );

    $classTooltipBotao = 'hint--top float-right mr-2';
    $classTooltipView = 'hint--top';
    $textoTooltipAlterar = 'Alterar';
    $textoTooltipExcluir = 'Excluir';
    $excluir = $this->Html->tag('span', $excluir, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipExcluir));
    $alterar = $this->Html->tag('span', $alterar, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipAlterar));
    $detalhe[] = array(     
    $produto['Produtotamanho']['nome'],
    str_replace(array(",","."),array(".",","), $produto['Produtotamanho']['valor']),
    $produto['Categoria']['tipo_categoria'],
    $produto['Tipo']['descricao'],
    $excluir . ' ' . $alterar . ' ' . $relatorio
    );
}

$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);
?>    
