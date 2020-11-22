<html>
<!--Modal  -->
<a data-target="#ConfirmDelete" role="button" data-toggle="modal" id="triggerCupom"></a>
<div class="modal fade" id="ConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            <?php echo $this->Html->image('/img/email.gif', array('style' => 'height: 170px; padding-left: 40px;'));?>
            </div>
            <div class="modal-body">
            <h5><p>Fiz tudo automático =)</p></h5>
                <h6>Essa opção é apenas uma confirmação que encaminhei ao e-mail do seu cliente o Código do Cupom gerado</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" class="close" data-dismiss="modal" aria-label="Close">Cancelar</button>
                <div id="ajax_button"></div>
            </div>
        </div>
    </div>
</div>
</html>