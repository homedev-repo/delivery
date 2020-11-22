<?php
$path = APP . 'View' . DS . 'Common' . DS;
$settings = array(
    'orientation' => 'P',
    'templateFile' => array(
        'header' => $path . 'relatorioClientesViewHeader.xml',
        'config' => $path . 'relatorioClientesViewconfig.xml',
        'body' => $path . 'relatorioClientesViewbody.xml'
    ),

    'records' => array($impressaoClientesDadosView),
    'header' => array(
        'titulo' => 'Dados do Cliente',
        'logoVayron' => WWW_ROOT . 'img' . DS . 'vayron.png',
    ),
);
echo $this->Report->create($settings);