<?php
$path = APP . 'View' . DS . 'Common' . DS;
$settings = array(
    'orientation' => 'P',
    'templateFile' => array(
        'header' => $path . 'relatorioProdutoHeader.xml',
        'config' => $path . 'relatorioProdutoconfig.xml',
        'body' => $path . 'relatorioProdutobody.xml',
        'columnTitles' => $path . 'column-titles-relatorioProduto.xml',

    ),
    $records = Hash::merge($findProdutos, $somaTotal),
    'records' => $records,
    'header' => array(
        'titulo' => 'Relatório De Produtos',
        'totalRegistros' => 'Total Cadastrados:' . ' ' .  $records[0]['Produto']['somaTotal'],
        'brasao' => WWW_ROOT . 'img' . DS . 'img_Brasao' . DS . AuthComponent::user('Estabelecimento.brasao'),
        'logoVayron' => WWW_ROOT . 'img' . DS . 'fundoPDF.png',
    ),
);
echo $this->Report->create($settings);
