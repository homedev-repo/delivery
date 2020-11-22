<?php
$path = APP . 'View' . DS . 'Common' . DS;
$settings = array(
    'orientation' => 'L',
    'templateFile' => array(
        'header' => $path . 'relatorioGastoHeader.xml',
        'config' => $path . 'relatorioGastoconfig.xml',
        'body' => $path . 'relatorioGastobody.xml',
        'columnTitles' => $path . 'column-titles-Gastos.xml',

    ),
    $records = Hash::merge($findGastos, $somaTotal),
    'records' => $records,
    'header' => array(
        'titulo' => 'Relatório de Despesas Cadastradas',
        'brasao' => WWW_ROOT . 'img' . DS . 'img_Brasao' . DS . AuthComponent::user('Estabelecimento.brasao'),
        'logoVayron' => WWW_ROOT . 'img' . DS . 'fundoPDF.png',
        'somaTotal' => 'Total:' . ' ' . $records[0]['Despesa']['somaTotal']
    ),
);
echo $this->Report->create($settings);