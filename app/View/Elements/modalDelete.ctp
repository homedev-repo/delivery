<html>
<!--Modal  -->
<a data-target="#ConfirmDelete" role="button" data-toggle="modal" id="chamaModalExcluir"></a>
<div class="modal fade" id="ConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            <?php echo $this->Html->image('/img/error.gif', array('style' => 'height: 170px; padding-left: 40px;'));?>
            </div>
            <div class="modal-body">
            <h5><p>Confirma exclusão?</p></h5>
                <h6>Ao confirmar os dados não poderão ser recuperados.</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Cancelar</button>
                <div id="ajax_button"></div>
            </div>
        </div>
    </div>
</div>
</html>