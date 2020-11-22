<?php

    $detalhe = array();
    foreach ($notificacoes as $notifica) {
    $deleteLink = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger')), '/notificas/delete/' . $notifica['Notifica']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'title' => 'Excluir',
        'escape' => false
    ));

    $created =  $notifica['Notifica']['created'];
    $mes = date('d/m', strtotime($created ));
    $horas = date('i:s', strtotime($created));

    $detalhe[] = array(  
    $notifica['Notifica']['conteudo'],
    $deleteLink . $mes . ' ' . $horas
    );
}
$tableCells = $this->Html->tableCells($detalhe);
echo $table = $this->Html->tag('table',  $tableCells, array('class' => 'table'));
?>