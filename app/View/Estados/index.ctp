<?php
echo $this->element('header');
echo $formFields = $this->assign('title', 'Cupons');

$detalhe = array();
foreach ($estados as $estado) {
     $viewLink = $estado['Estado']['tipo_estado'];
    $detalhe[] = array(
        $viewLink
    );
}   
    $titulos = array('');
    $header = $this->Html->tag('thead', $this->Html->tableHeaders($titulos));
    $body = $this->Html->tableCells($detalhe);

    echo $this->Html->tag('table', $header . $body, array('class' => 'table m-table table-striped table-hover table-bordered dataTable' ));
  
    if ($this->request->is('ajax')){
        echo $this->Js->writeBuffer();
    }

  

?>    
