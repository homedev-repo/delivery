<?php
$path = APP . 'View' . DS . 'Relatorios' . DS;
$settings = array(
    'orientation' => 'L',
    'templateFile' => array(
        'header' => $path . 'relatorioPedidoHeader.xml',
        'config' => $path . 'relatorioPedidoconfig.xml',
        'body' => $path . 'relatorioPedidobody.xml',
        'columnTitles' => $path . 'column-titles-relatorioPedido.xml',
    ),
    $records = Hash::merge($impressaoPedidos, $quantidadePedidos),
    'records' => $records,
    debug($records),
    exit(),
    'header' => array(
        'titulo' => 'RELATÓRIO DE PEDIDOS',
        'tipo' =>   'Tipo: ' . $records['Estado']['tipo_estado'],
        //'totalRegistros' => 'Total de Licenças:' . $quantidadeLicenca[0]['Licenca']['somaTotal'],
        //'nome' => AuthComponent::user('Empresa.nome_fantasia'),
        //'brasao' => WWW_ROOT . 'img' . DS . 'Imagem_Brasao' . DS . AuthComponent::user('Orgao.brasao'),
    ),
);
echo $this->Report->create($settings);
