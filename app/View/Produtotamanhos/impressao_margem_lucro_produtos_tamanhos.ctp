<?php
$path = APP . 'View' . DS . 'Common' . DS;
$settings = array(
    'orientation' => 'L',
    'templateFile' => array(
        'header' => $path . 'margemDeLucroProdutotamanhoHeader.xml',
        'config' => $path . 'margemDeLucroProdutotamanhoconfig.xml',
        'body' => $path . 'margemDeLucroProdutotamanhobody.xml',
        'columnTitles' => $path . 'column-titles-margemDeLucroProdutotamanho.xml',
    ),
    'records' => $findProduto,
    'header' => array(
        'titulo' => 'Margem de Lucro',
        'brasao' => WWW_ROOT . 'img' . DS . 'img_Brasao' . DS . AuthComponent::user('Estabelecimento.brasao'),
        'logoVayron' => WWW_ROOT . 'img' . DS . 'fundoPDF.png',
    ),
);

echo $this->Report->create($settings);
