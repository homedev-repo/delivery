<?php
$this->extend('/Elements/index');

$this->assign('title', 'Cupom de Desconto');

$searchFields .= $this->Html->div('form-row',
$this->Form->input('Cupom.numero_cupom', array(
    'placeholder' => 'Número Cupom', 
    'label' => array('class' => 'sr-only'),
    'class' => 'form-control col-md-11 mr-2',
    'div' => false          
))
);
$this->assign('searchFields', $searchFields);

$titulos = array(
    array($this->Paginator->sort('Cupom.numero_cupom', 'Cod. Cupom') => array('width' => '25%')),
    array('Validade' => array('width' => '9%')),
    array($this->Paginator->sort('Cupom.situacao', 'Situação') => array('width' => '12%')),
    array('Total Desconto' => array('width' => '12%')),
    array('' => array('width' => '19%'))
   );
   
$tableHeaders = $this->Html->tableHeaders($titulos);
$this->assign('tableHeaders', $tableHeaders);

   $detalhe = array();
   foreach ($cupoms as $cupom) {
    $cupomView = $this->Js->link($cupom['Cupom']['numero_cupom'], '/cupoms/view/' . $cupom['Cupom']['id'], array('update' => '#content'));

    $excluir = $this->Js->link($this->Html->tag('span', '', array('class' => 'far fa-trash-alt text-danger')), '/cupoms/delete/' . $cupom['Cupom']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'escape' => false
    ));

    $alterar = $this->Js->link($this->Html->tag('span', '', array('class' => 'fas fa-pencil-alt')), '/cupoms/edit/' . $cupom['Cupom']['id'], array(
        'update' => '#content',
        'class' => 'btn btn-secondary float-right ml-2',
        'title' => 'Alterar',
        'escape' => false
    ));

    if($cupom['Cupom']['situacao'] == 1){
        $cupom['Cupom']['situacao'] = 'Ativo';
        $colorTextSituacao = 'kt-badge kt-badge--success kt-badge--inline kt-badge--pill';
    } else{
        $cupom['Cupom']['situacao'] = 'Desativado';
        $colorTextSituacao = 'kt-badge kt-badge--danger kt-badge--inline kt-badge--pill';
    }

    if($cupom['Cupom']['atribuir_cupom'] == 'Sim'){
        $envioDeEmail = $this->Html->link($this->Html->tag('span', '', array('class' => 'far fa-envelope')), '#', array(
            'id' => 'chamadaModalCupom',
            'class' => 'btn btn-secondary  float-right ml-2',
            'title' => 'E-mail',
            'escape' => false
        ));
    
    } else {
        $envioDeEmail = '';
    }


    $classTooltipBotao = 'hint--top float-right mr-2';
    $classTooltipView = 'hint--top';
    $textoTooltipView = 'Visualizar';
    $textoTooltipAlterar = 'Alterar';
    $textoTooltipExcluir = 'Excluir';
    $textoTooltipEmail = 'E-mail';
    $excluir = $this->Html->tag('span', $excluir, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipExcluir));
    $alterar = $this->Html->tag('span', $alterar, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipAlterar));
    $envioDeEmail = $this->Html->tag('span', $envioDeEmail, array('class' => $classTooltipBotao, 'aria-label'=> $textoTooltipEmail));

    $totalDesconto = 'R$' . ' '. $cupom['Cupom']['total_desconto'];
    $detalhe[] = array(        
    $this->Html->tag('span', $cupomView, array('class' => $classTooltipView, 'aria-label'=> $textoTooltipView)),
    date('d/m/Y', strtotime($cupom['Cupom']['validade'])),
    $this->Html->tag('span', $cupom['Cupom']['situacao'], array('class' => $colorTextSituacao)),
    str_replace(array(",","."),array(".",","), $totalDesconto),
    $excluir . ' ' .  $alterar . ' ' .  $envioDeEmail
    );
}

$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);
