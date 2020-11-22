<?php
$this->extend('/Elements/indexFornecedor');
$this->assign('title', 'Fornecedores');
$searchFields .= $this->Html->div('form-row',
    $this->Form->input('Fornecedore.nomeCnpj', array(
        'placeholder' => 'Nome ou CNPJ', 
        'label' => array('class' => 'sr-only'),
        'class' => 'form-control col-md-11 mr-2',
        'div' => false          
    ))
);
$this->assign('searchFields', $searchFields);

$titulos = array(
    array($this->Paginator->sort('Fornecedore.nome', 'Nome') => array( 'class'=>"hint--bottom", 'aria-label'=>"Ordenar por Nome")),
    array('CNPJ' => array('width' => '0%')),
    array('Telefone' => array('width' => '0%')),
    array($this->Paginator->sort( '', '', array('escape' => false)) => array('width' => '0%'))

);

    $tableHeaders = $this->Html->tableHeaders($titulos);
    $this->assign('tableHeaders', $tableHeaders);

    $detalhe = array();
    foreach ($fornecedores as $fornecedor) {
        $fornecedorView = $this->Js->link($fornecedor['Fornecedore']['nome'], '/fornecedores/view/' . $fornecedor['Fornecedore']['id'], array('update' => '#content'));

        $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger')), '/fornecedores/delete/' . $fornecedor['Fornecedore']['id'], array(
            'update' => '#content',
            'class' => 'btn btn-secondary float-right ml-2',
            'escape' => false
        ));

        $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/fornecedores/edit/' . $fornecedor['Fornecedore']['id'], array(
            'class' => 'btn btn-secondary float-right',
            'escape' => false,
            'update' => '#content',
        ));


        $classTooltipBotao = 'hint--top float-right mr-2';
        $classTooltipView = 'hint--top';
        $textoTooltipView = 'Visualizar';
        $textoTooltipAlterar = 'Alterar';
        $textoTooltipExcluir = 'Excluir';
        $excluir = $this->Html->tag('span', $excluir, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipExcluir));
        $alterar = $this->Html->tag('span', $alterar, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipAlterar));
        $detalhe[] = array(     
            $this->Html->tag('span', $fornecedorView, array('class' => $classTooltipView, 'aria-label'=> $textoTooltipView)),
            $fornecedor['Fornecedore']['cnpj'],
            $fornecedor['Fornecedore']['telefone'],
            $excluir . ' ' . $alterar
        );
    }
        $tableCells = $this->Html->tableCells($detalhe);
        $this->assign('tableCells', $tableCells);
?>

  


