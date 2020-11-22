<?php
$this->extend('/Elements/indexProdutos');

$this->assign('title', 'Produtos');

$searchFields .= $this->Html->div('form-row',
    $this->Form->input('Produto.nome', array(
        'placeholder' => 'Nome', 
        'label' => array('class' => 'sr-only'),
        'class' => 'form-control col-md-6 mr-2',
        'div' => false          
    )) .
    $this->Form->input('Produto.categoria_id', array(
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
    array('class' => 'fas fa-print')), '/produtos/impressaoRelatorioProdutos/', array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right mr-2 hint--left',
        'aria-label'=>"Impressão dos Produtos",
        'escape' => false,
        'target' => '_blank'
    )
);

$this->assign('imprimirButton', $imprimirButton);

$titulos = array(
    array($this->Paginator->sort('Produto.nome', 'Nome') => array('width' => '35%')),
    array('Valor' => array('width' => '20%')),
    array('Categoria' => array('width' => '20%')),
    array('' => array('width' => '18%'))
   );
   
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

   $detalhe = array();

   foreach ($produtos as $produto) {
    $produtoView = $this->Js->link($produto['Produto']['nome'], '/produtos/view/' . $produto['Produto']['id'], array('update' => '#content'));
 
    $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger')), '/produtos/delete/' . $produto['Produto']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'escape' => false
    ));

    $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/produtos/edit/' . $produto['Produto']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'title' => 'Alterar',
        'escape' => false
    ));

    $relatorio = $this->Html->link($this->Html->tag('i', '', 
        array('class' => 'fas fa-print')), '/produtos/impressaoMargemLucroProdutos/' . $produto['Produto']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right mr-2 hint--left',
        'aria-label'=>"Impressão Da Margem de Lucro Do Produto",
        'escape' => false,
        'target' => '_blank'
        )
    );

    $classTooltipBotao = 'hint--top float-right mr-2';
    $classTooltipView = 'hint--top';
    $textoTooltipView = 'Visualizar';
    $textoTooltipAlterar = 'Alterar';
    $textoTooltipExcluir = 'Excluir';
    $excluir = $this->Html->tag('span', $excluir, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipExcluir));
    $alterar = $this->Html->tag('span', $alterar, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipAlterar));
    $detalhe[] = array(     
    $this->Html->tag('span', $produtoView, array('class' => $classTooltipView, 'aria-label'=> $textoTooltipView)),
    str_replace(array(",","."),array(".",","), $produto['Produto']['valor']),
    $produto['Categoria']['tipo_categoria'],
    $excluir . ' ' . $alterar . ' ' . $relatorio
    );
}

$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);
?>    
