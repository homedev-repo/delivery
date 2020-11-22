<?php
$path = APP . 'View' . DS . 'Common' . DS;
$settings = array(
    'orientation' => 'P',
    'templateFile' => array(
        'header' => $path . 'RegioesAtendidasHeader.xml',
        'config' => $path . 'RegioesAtendidasconfig.xml',
        'body' => $path . 'RegioesAtendidasbody.xml',
        'columnTitles' => $path . 'column-titles-RegioesAtendidas.xml',
    ),
    $records = Hash::merge($findEnderecoClientes, $somaTotal),

    'records' => $records,
    'header' => array(
        'titulo' => 'TOTAL DE REGIÕES ATENDIDAS',
       'totalRegistros' => 'Total de Endereços:' . ' ' . $records[0]['Cliente']['somaTotal'],
        'logoVayron' => WWW_ROOT . 'img' . DS . 'vayron.png',
    ),
);
echo $this->Report->create($settings);


