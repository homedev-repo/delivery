<?php
echo $this->element('header');
echo $this->Flash->render('success'); 
echo $this->Session->flash();

if($categorias == null) {
    echo $this->Html->div(
        'nenhum-item mb-3',
        $this->Html->tag('h5', 'Nenhum registro cadastrado.', array('class' => 'text-muted mt-5 mb-5 text-center'))
    );
}
$acordion = '';
$detalhe = array();

foreach ($categorias as $categoria) {
    $titulos = array(
        array('Imagem' => array('width' => '25%')),
        array('Nome' => array('width' => '19%')),
        array('' => array('width' => '25%'))
    );

    $tableHeaders = $this->Html->tableHeaders($titulos);
    foreach($categoria['Produto'] as $produto) {
        $imagemProduto = $this->Html->div(
            'tamanhoCard',
            $this->Html->image('/img/img_Produtos/' . $produto['foto_um'],
            array('class' => 'img-thumbnail img-banner-tamanho', "disabled" ,'style'=>"width:19%")
            )
        );

        $alterarProduto = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/categorias/edit/' .  $categoria['Categoria']['id'], array(
            'update' => '#content',
            'class' => 'btn mt-2  btn-secondary float-right ml-2',
            'title' => 'Editar Produto',
            'escape' => false
        ));
        $alterarProduto = $this->Html->tag('span', $alterarProduto, array('class' => 'hint--top float-right ml-4 mr-2', 'aria-label'=> 'Editar Produto'));
        
        $relatorio = $this->Html->link($this->Html->tag('i', '', 
            array('class' => 'fas fa-print')), '/produtos/impressaoMargemLucroProdutos/' . $produto['id'], array(
            'update' => '#content',
            'class' => 'btn mt-2 btn-secondary float-right hint--left ml-2',
            'aria-label'=>"Impressão Da Margem de Lucro Do Produto",
            'escape' => false,
            'target' => '_blank'
            )
        );

        $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger')), '/produtos/delete/' . $produto['id'], array(
            'update' => '#content',
            'class' => 'btn mt-2 btn-secondary float-right ml-2',
            'escape' => false
        ));

        $produtoView = $this->Js->link($produto['nome'], '/produtos/view/' . $produto['id'], array('update' => '#content'));
        $detalhe[] = array(
            $imagemProduto,
            $produtoView,
            $excluir . ' ' . $alterarProduto . ' ' . $relatorio
        );
    }
    
    
    $alterarCategoria= $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/categorias/edit/' .  $categoria['Categoria']['id'], array(
        'update' => '#content',
        'class' => 'btn mt-2  btn-secondary float-right ml-2',
        'title' => 'Alterar',
        'escape' => false
    ));
    $alterarCategoria = $this->Html->tag('span', $alterarCategoria, array('class' => 'hint--top float-right ml-4 mr-2', 'aria-label'=> 'Alterar'));

    $excluirCategoria = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger')), '/categorias/delete/' .  $categoria['Categoria']['id'], array(
        'update' => '#content',
        'class' => 'btn mt-2 btn-secondary float-right ml-2',
        'escape' => false
    ));


    $acordion .= $this->Html->div('card',
        $this->Html->div('card-header ',
            $this->Html->tag('h6',
            $excluirCategoria . $alterarCategoria . 
                $this->Form->button(
                    $this->Html->tag('span', $categoria['Categoria']['tipo_categoria']),
                    array(
                        'class' => 'btn btn-lg btn-link',
                        'type' => 'button',
                        'data-toggle' => 'collapse',
                        'data-target' => '#collapse' . $categoria['Categoria']['id'],
                        'aria-expanded' => false,
                        'aria-controls' => 'collapse' . $categoria['Categoria']['id'],
                    )
                ) .
                $this->Js->link(
                    $this->Html->tag('i', '', array(
                        'class' => 'fas fa-plus '
                    )) . 
                    '&nbsp;' . 'Incluir Produtos',
                    '/produtos/add/' . $categoria['Categoria']['id'], 
                    array('class' => 'btn mt-2 btn-success  ml-4 float-right', 'escape' => false, 'update' => '#content')
                ),
                array('class' => 'mb-0')
            ),
            array('id' => 'heading' . $categoria['Categoria']['id'])
    ) .
    $this->Html->div('collapse',
        $this->Html->div('card-body',
            $this->Html->tag('table', $tableHeaders . $this->Html->tableCells($detalhe), array('class' => 'table m-table table-striped'))
        ),
        array(
            'id' => 'collapse' . $categoria['Categoria']['id'],
            'class' => 'table',
            'aria-labelledby' => 'heading' . $categoria['Categoria']['id'],
            'data-parent' => '#accordion'
        )
    ) 
    );
}

echo $this->Html->div('accordion', 
   $acordion,
    array('id' => 'accordion')
);

echo $this->element('modalDelete'); 
$this->Js->buffer('modalAlerta()');
$this->Js->buffer('setPaginate();');
$this->Js->buffer('createAjax()');
$this->Js->buffer('$(".nav-link a[href$=\'Vayron\']").addClass("active");');
if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>