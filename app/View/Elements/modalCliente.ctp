<html>
<!--Modal  -->
<a data-target="#ConfirmDelete" role="button" data-toggle="modal" id="triggerCliente"></a>
<div class="modal fade" id="ConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            <?php echo $this->Html->image('/img/danger.gif', array('style' => 'height: 170px; padding-left: 40px;'));?>
            </div>
            <div class="modal-body">
            Não é possível cadastrar um novo cliente, pois os dados que alimentam essa pagina
            são dados de clientes que se cadastraram no aplicativo.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">OK</button>
                <div id="ajax_button_cliente"></div>
            </div>
        </div>
    </div>
</div>
</html>