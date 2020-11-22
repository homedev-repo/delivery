<?php
$controllerName = $this->request->params['controller'];
$estadoDoEstabelecimento = $estabelecimento[0]['Estabelecimento']['estado_funcionamento'];
$estado = '';
$classBtn = '';
$corSituacao = '';
$usuariosessao = AuthComponent::user();
$stringReplace = substr($usuariosessao['data_nascimento'], 5, 10);

if($stringReplace == date('m-d') && !isset($_COOKIE['aniversarioVayron'])){
    echo $this->element('modalAniversario'); 
    setcookie('aniversarioVayron', true);
}

if($estadoDoEstabelecimento == 'Aberto'){
    $corSituacao = 'badge badge-success';
    $estado = 'Fechar Estabelecimento';
    $classBtn = 'btn btn-default';
} else{
    $estado = 'Abrir Estabelecimento';
    $corSituacao = 'badge badge-danger';
    $classBtn = 'btn btn-success';
}
$novoButton = $this->Js->link(
    $this->Html->tag('i', '', array(
        'class' => 'fas fa-plus '
    )) . 
    $estado,
    '/estabelecimentos/edit', 
    
    array('class' => 'float-right', 'escape' => false, 'update' => '#content', 'class' => $classBtn)
);

if($pedido > 0){
    //toca o som de alerta
    echo "<embed src='/Vayron/app/webroot/notificacao/notificacao.mp3'width='1' height='1'>";
}
?>

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Dashboard                        
            </h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
        </div> 
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Estado de funcionamento:                        
            </h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <h3 class="kt-subheader__title">
                <?php echo $this->Html->tag('span', $estadoDoEstabelecimento, array('class' => $corSituacao)); ?>               
            </h3>
        </div>        
        <div class="kt-subheader__toolbar">
           <?php echo $novoButton ?>
        </div>
    </div>
</div>
