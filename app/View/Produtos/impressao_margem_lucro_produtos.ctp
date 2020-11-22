<?php
$path = APP . 'View' . DS . 'Common' . DS;
$settings = array(
    'orientation' => 'L',
    'templateFile' => array(
        'header' => $path . 'margemDeLucroProdutoHeader.xml',
        'config' => $path . 'margemDeLucroProdutoconfig.xml',
        'body' => $path . 'margemDeLucroProdutobody.xml',
        'columnTitles' => $path . 'column-titles-margemDeLucroProduto.xml',

    ),

    'records' => $findProduto,
    'header' => array(
        'titulo' => 'Margem de Lucro',
        'markup' => '- Markup parte do custo e é acrescentado um percentual sobre o custo.',
        'brasao' => WWW_ROOT . 'img' . DS . 'img_Brasao' . DS . AuthComponent::user('Estabelecimento.brasao'),
        'logoVayron' => WWW_ROOT . 'img' . DS . 'fundoPDF.png',
    ),
);
echo $this->Report->create($settings);
