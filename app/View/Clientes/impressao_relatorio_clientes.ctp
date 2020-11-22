<?php
$path = APP . 'View' . DS . 'Common' . DS;
$settings = array(
    'orientation' => 'P',
    'templateFile' => array(
        'header' => $path . 'relatorioClientesHeader.xml',
        'config' => $path . 'relatorioClientesconfig.xml',
        'body' => $path . 'relatorioClientesbody.xml',
        'columnTitles' => $path . 'column-titles-relatorioClientes.xml',
    ),
    debug( $records),
    exit,
    'records' => $records,
    'header' => array(
        'titulo' => 'RELATÓRIO DE CLIENTES CADASTRADOS',
        'tipo' =>   'Situação: ' . $records[0]['Cliente']['nomeRelatorio'],
        'totalRegistros' => 'Total de Clientes:' . $records[0]['Cliente']['somaTotal'],
        'logoVayron' => WWW_ROOT . 'img' . DS . 'vayron.png',
    ),
);
echo $this->Report->create($settings);


