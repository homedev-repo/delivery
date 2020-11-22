<?php
$path = APP . 'View' . DS . 'Common' . DS;
$settings = array(
    'orientation' => 'P',
    'templateFile' => array(
        'header' => $path . 'relatorioFichaTecnicaHeader.xml',
        'config' => $path . 'relatorioFichaTecnicaconfig.xml',
        'body' => $path . 'relatorioFichaTecnicabody.xml',

    ),
    'records' => array($findFicha),
    'header' => array(
        'titulo' => 'Ficha Ténica',
        'brasao' => WWW_ROOT . 'img' . DS . 'img_Brasao' . DS . AuthComponent::user('Estabelecimento.brasao'),
        'logoVayron' => WWW_ROOT . 'img' . DS . 'fundoPDF.png',
        'produto' => WWW_ROOT . 'img' . DS . 'img_Produtos' . DS . $findFicha['Produto']['foto_um']
    ),
);
echo $this->Report->create($settings);