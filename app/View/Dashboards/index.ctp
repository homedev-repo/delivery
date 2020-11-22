<?php echo $this->element('dashboard'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-blue">
                <div class="inner">
                    <h3> <?php echo $pedido ?> </h3>
                    <p> Pedidos </p>
                </div>
                <div class="icon">
                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                </div>
                <a href="./pedidos" class="card-box-footer">Ver Mais <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-green">
                <div class="inner">
                    <h3> <?php echo $clientes ?> </h3>
                    <p> Clientes </p>
                </div>
                <div class="icon">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <a href="./clientes" class="card-box-footer">Ver Mais <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-orange">
                <div class="inner">
                    <h3> <?php echo $usuario ?> </h3>
                    <p> Usuarios </p>
                </div>
                <div class="icon">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </div>
                <a href="./usuarios" class="card-box-footer">Ver Mais <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-red">
                <div class="inner">
                    <h3> <?php echo $contas ?> </h3>
                    <p> Contas a Pagar </p>
                </div>
                <div class="icon">
                    <i class="fa fa-donate"></i>
                </div>
                <a href="./contas" class="card-box-footer">Ver Mais <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>

<!--Begin::Section-->
<div class="row">
    <div class="col-xl-6">
        <!--begin:: Widgets/Download Files-->
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Tarefas
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <!--begin::k-widget4-->
                <div class="kt-widget4">
                    <div class="kt-widget4__item">
                        <div class="kt-widget4__pic kt-widget4__pic--icon">
                            <h3><?php echo $pedidoTarefas ?></h3>
                        </div>
                        <a href="./pedidos" class="kt-widget4__title">
                            Pedidos aguardando Estados
                        </a>
                        <div class="kt-widget4__tools">
                            <a href="#" class="btn btn-clean btn-icon btn-sm">
                                <i class="flaticon2-download-symbol-of-down-arrow-in-a-rectangle"></i>
                            </a>
                        </div>
                    </div>

                    <div class="kt-widget4__item">
                        <div class="kt-widget4__pic kt-widget4__pic--icon">
                            <h3><?php echo $pedidoFeedback ?></h3>
                        </div>
                        <?php
                        if ($pedidoFeedback == 0) {
                            $dataModal = "#";
                        } else {
                            $dataModal = "#pedidosSemFeedback";
                        }
                        ?>
                        <a href="#" data-toggle="modal" data-target=<?php echo $dataModal ?> class="kt-widget4__title">
                            Pedidos sem FeedBack do Cliente
                        </a>
                        <div class="kt-widget4__tools">
                            <a href="#" class="btn btn-clean btn-icon btn-sm">
                                <i class="flaticon2-download-symbol-of-down-arrow-in-a-rectangle"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div id="pedidosSemFeedback" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <?php echo $this->Html->image('/img/feedback.gif', array('style' => 'height: 300px; padding-left: 80px;')); ?>
                                </div>
                                <div class="modal-body">
                                    <h5>
                                        <p style="text-align: center;">Não fique triste 😟, que nossa equipe já esta tentando contato
                                            para que seu Cliente nós de um retorno 😍. </p>
                                        <p>O principal foco do feedback é identificar pontos de melhoria do seu produto ou serviço. Além disso, ter o feedback positivo pode ajudar a Vayron a entender melhor seu público.</p>
                                    </h5>
                                </div>
                                <div class="modal-footer">
                                    <p>Feito com ❤️ por Vayron. </p>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="kt-widget4__item">
                        <div class="kt-widget4__pic kt-widget4__pic--icon">
                            <h3><?php echo $pedidoPreparacao ?></h3>
                        </div>
                        <a href="./pedidos" class="kt-widget4__title">
                            Pedidos em Preparação
                        </a>
                        <div class="kt-widget4__tools">
                            <a href="#" class="btn btn-clean btn-icon btn-sm">
                                <i class="flaticon2-download-symbol-of-down-arrow-in-a-rectangle"></i>
                            </a>
                        </div>
                    </div>

                    <div class="kt-widget4__item">
                        <div class="kt-widget4__pic kt-widget4__pic--icon">
                            <h3><?php echo $pedidoSaiuEntrega ?></h3>
                        </div>
                        <a href="./pedidos" class="kt-widget4__title">
                            Pedidos saiu para Entrega
                        </a>
                        <div class="kt-widget4__tools">
                            <a href="#" class="btn btn-clean btn-icon btn-sm">
                                <i class="flaticon2-download-symbol-of-down-arrow-in-a-rectangle"></i>
                            </a>
                        </div>
                    </div>
                    <div class="kt-widget4__item">
                        <div class="kt-widget4__pic kt-widget4__pic--icon">
                            <h3><?php echo $pedidosAprovados ?></h3>
                        </div>
                        <a href="./pedidos" class="kt-widget4__title">
                            Pedidos aprovados aguardando Preparação
                        </a>
                        <div class="kt-widget4__tools">
                            <a href="#" class="btn btn-clean btn-icon btn-sm">
                                <i class="flaticon2-download-symbol-of-down-arrow-in-a-rectangle"></i>
                            </a>
                        </div>
                    </div>





                </div>
                <!--end::Widget 9-->
            </div>
        </div>

        <!--end:: Widgets/Download Files-->
        <!--end:: Widgets/Last Updates-->
    </div>
    <div class="col-xl-6">
        <!--begin:: Widgets/Notifications-->
        <div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Notificações
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body scrollable">
                <?php /* echo $this->element('tabelaNotifcacao'); */ ?>

                <div class="container">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="atualizaNotificacoesAjax">
                            <tr>
                                <th>Conteudo</th>
                                <th>Data</th>
                                <th>Ação</th>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-autohide="false">
        <div class="toast-header">
            <svg class=" rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                <rect fill="#007aff" width="100%" height="100%" /></svg>
            <strong class="mr-auto">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div>
    <?php

    ?>