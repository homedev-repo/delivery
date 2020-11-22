<?php
$path = APP . 'View' . DS . 'Common' . DS;
$settings = array(
    'orientation' => 'P',
    'templateFile' => array(
        'header' => $path . 'relatorioContaHeader.xml',
        'config' => $path . 'relatorioContaconfig.xml',
        'body' => $path . 'relatorioContabody.xml',
        'columnTitles' => $path . 'column-titles-Conta.xml',

    ),
    $records = Hash::merge($detalhe, $somaTotal),

    'records' => $records,
    'header' => array(
        'titulo' => 'Relatório De Contas',
        'totalRegistros' => 'Total Cadastrados:' . ' ' .  $records[0]['Conta']['somaTotal'],
        'logoVayron' => WWW_ROOT . 'img' . DS . 'vayron.png',
    ),
);
echo $this->Report->create($settings);