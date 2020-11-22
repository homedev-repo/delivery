
<?php

echo $this->element('header');
$this->extend('/Elements/indexPedidos');   
$this->assign('title', 'Motoboys');

$filtro = $this->Form->create('Pedidos', array('class' => 'form-inline'));
$filtro .= $this->Form->input('Pedido.nome_or_numero_pedido_or_cpf', array(
    'placeholder' => 'Número, CPF ou Nome',
    'label' => array('class' => 'sr-only'),
    'class' => 'form-control',
    'required' => false,
    'div' => false          
));
$filtro .= $this->Form->input('Estado.tipo_estado', array(
'type' => 'select',
'options' => array(
    '' => 'Todos',
    'Entregue' => 'Entregue',
    'Aprovado' => 'Aprovado',
    'Cancelados' => 'Cancelados',
    'Em Preparacao' => 'Em Preparação',
    'Saiu para entrega' => 'Saiu para entrega'
),
'required' => false,
'label' => array('class' => 'sr-only'),
'class' => 'form-control ml-2'
));

$filtro .= $this->Form->button(
    $this->Html->tag('i', '', array('class' => 'fas fa-search')),
    array(
        'class' => 'btn btn-secondary ml-2',
        'escape' => false,
        'title' => 'Pesquisar',
        'update' => '#content'
    ));
  
    $filtro .= $this->Form->end();
    $filtroBar =  $filtro . $relatorioDePedidosIndex;
    
echo $filtroBar;
$titulos = array(
    array($this->Paginator->sort('Pedido.numero_pedido', 'Número') => array('width' => '20%')),
    array($this->Paginator->sort('Cliente.nome', 'Nome Cliente') => array('width' => '20%')),
    array($this->Paginator->sort('Cliente.cpf', 'CPF Cliente') => array('width' => '20%')),
    array($this->Paginator->sort( 'Motoboy.nome_motoboy', 'Motoboy Resp.', array('escape' => false)) => array('width' => '20%')),
    array($this->Paginator->sort( 'Estado.tipo_estado', 'Estado', array('escape' => false)) => array('width' => '0')),
    array($this->Paginator->sort( '', '', array('escape' => false)) => array('width' => '0')),
);

$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

    $detalhe = array();
    foreach ($pedidos as $pedido) {
        $pedidoView = $this->Js->link($pedido['Pedido']['numero_pedido'], '/pedidos/view/' . $pedido['Pedido']['id'], array('update' => '#content'));
        $alterarLink = $this->Js->link($alterar, '/pedidos/edit/' . $pedido['Pedido']['id'], array('update' => '#content','escape' => false));

        $colorTextSituacao =  $editarLink = $removerLink  = '';
        if ($pedido['Estado']['tipo_estado'] == 'Aprovado'){
            $colorTextSituacao = 'badge badge-success';
            $imprimirLink = $this->Html->div('dropdown IconeImpressao',
            $this->Html->link('Imprimir', '#', array(
                'class' => 'btn btn-secondary  dropdown-toggle btn-sm float-right ml-2',
                'data-toggle' => 'dropdown',
                'title' => 'Imprimir',
                'aria-haspopup' => true,
                'aria-expanded' => false,
                'id' => 'dropdownMenuLink'
            )) .
            $this->Html->div('dropdown-menu dropdown-menu-right ',
            $this->Html->link('2° Via Cupom Não Fiscal', '/pedidos/impressaoUm/' .  $pedido['Pedido']['id'] , array('class' => 'dropdown-item', 'target' => '_blank')) .
            $this->Html->link('2° Via Comanda', '/pedidos/comandaPedido/' . $pedido['Pedido']['id'], array('class' => 'dropdown-item', 'target' => '_blank')),
            array('aria-labelledby' => 'dropdownMenuLink')
            )
        );
        } 
        if ($pedido['Estado']['tipo_estado'] == 'Em Preparação'){
            $colorTextSituacao = 'badge badge-warning';
            $imprimirLink = $this->Html->div('dropdown IconeImpressao',
            $this->Html->link('Imprimir', '#', array(
                'class' => 'btn btn-secondary  dropdown-toggle btn-sm float-right ml-2',
                'data-toggle' => 'dropdown',
                'title' => 'Imprimir',
                'aria-haspopup' => true,
                'aria-expanded' => false,
                'id' => 'dropdownMenuLink'
            )) .
            $this->Html->div('dropdown-menu dropdown-menu-right ',
            $this->Html->link('2° Via Cupom Não Fiscal', '/pedidos/impressaoUm/' .  $pedido['Pedido']['id'] , array('class' => 'dropdown-item', 'target' => '_blank')) .
            $this->Html->link('2° Via Comanda', '/pedidos/comandaPedido/' . $pedido['Pedido']['id'], array('class' => 'dropdown-item', 'target' => '_blank')),
            array('aria-labelledby' => 'dropdownMenuLink')
            )
        );
        } 
        if ($pedido['Estado']['tipo_estado'] == 'Saiu para entrega'){
            $colorTextSituacao = 'badge badge-primary';
            $imprimirLink = $this->Html->div('dropdown IconeImpressao',
            $this->Html->link('Imprimir', '#', array(
                'class' => 'btn btn-secondary  dropdown-toggle btn-sm float-right ml-2',
                'data-toggle' => 'dropdown',
                'title' => 'Imprimir',
                'aria-haspopup' => true,
                'aria-expanded' => false,
                'id' => 'dropdownMenuLink'
            )) .
            $this->Html->div('dropdown-menu dropdown-menu-right ',
            $this->Html->link('2° Via Cupom Não Fiscal', '/pedidos/impressaoUm/' .  $pedido['Pedido']['id'] , array('class' => 'dropdown-item', 'target' => '_blank')) .
            $this->Html->link('2° Via Comanda', '/pedidos/comandaPedido/' . $pedido['Pedido']['id'], array('class' => 'dropdown-item', 'target' => '_blank')),
            array('aria-labelledby' => 'dropdownMenuLink')
        )
        );
        } 
        if ($pedido['Estado']['tipo_estado'] == 'Entregue'){
            $colorTextSituacao = 'badge badge-success';
            $imprimirLink = $this->Html->div('dropdown IconeImpressao',
            $this->Html->link('Imprimir', '#', array(
                'class' => 'btn btn-secondary  dropdown-toggle btn-sm float-right ml-2',
                'data-toggle' => 'dropdown',
                'title' => 'Imprimir',
                'aria-haspopup' => true,
                'aria-expanded' => false,
                'id' => 'dropdownMenuLink'
            )) .
            $this->Html->div('dropdown-menu dropdown-menu-right ',
                $this->Html->link('2° Via Cupom Não Fiscal', '/pedidos/impressaoUm/' .  $pedido['Pedido']['id'] , array('class' => 'dropdown-item', 'target' => '_blank')) .
                $this->Html->link('2° Via Comanda', '/pedidos/comandaPedido/' . $pedido['Pedido']['id'], array('class' => 'dropdown-item', 'target' => '_blank')),
                array('aria-labelledby' => 'dropdownMenuLink')
            )
        );
}


if ($pedido['Estado']['tipo_estado'] == 'Cancelado'){
    $colorTextSituacao = 'badge badge-danger';
}
    $detalhe[] = array(        

   
    );
}


$tableCells = $this->Html->tableCells($detalhe, array('class' => 'placar'));
$this->assign('tableCells', $tableCells);

echo $this->Flash->render('warning'); 
echo $this->Flash->render('success'); 
echo $this->Html->tag('h1', $this->fetch('title')); 
echo $filtroBar;
echo $this->Html->tag('table', $header . $body, array('class' => 'table' ));
echo $paginateBar;

?>    
   

  


