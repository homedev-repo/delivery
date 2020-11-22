<?php

    $detalhe = array();
    foreach ($contasVencida as $conta) {
    $created =  $notifica['Notifica']['created'];
    $mes = date('d/m', strtotime($created ));
    $horas = date('i:s', strtotime($created));

    $detalhe[] = array(  
    $conta['Conta']['data_vencimento'],
    );
}
$tableCells = $this->Html->tableCells($detalhe);
$table = $this->Html->tag('table',  $tableCells, array('class' => 'table'));
?>