<?php
echo $this->Html->css('Metronic/fatura.css');
?>

			<!-- begin:: Content -->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="kt-portlet">
    <div class="kt-portlet__body kt-portlet__body--fit">
        <div class="kt-invoice-1">
            <div class="kt-invoice__head" style="background-image: url(/Vayron/app/webroot/img/imgFatura.jpg);">
                <div class="kt-invoice__container">
                    <div class="kt-invoice__brand">
						<h1 class="kt-invoice__title">FATURA</h1>
						
                        <div href="#" class="kt-invoice__logo">
                        <?php echo $this->Html->image('/img/vayronFatura.png');?>

							<span class="kt-invoice__desc">
								<span>Rua Hygino Muzy Filho - 529, Com. 104 • Marília/SP </span>
								<span>CEP: 17525-000</span>
							</span>
						</div>
					</div>
					
                    <div class="kt-invoice__items">
                        <div class="kt-invoice__item">
                            <span class="kt-invoice__subtitle">DATA</span>
                            <span class="kt-invoice__text">Dec 12, 2017</span>
                        </div>
                        <div class="kt-invoice__item">
                            <span class="kt-invoice__subtitle">INVOICE NO.</span>
                            <span class="kt-invoice__text">GS 000014</span>
                        </div>
                        <div class="kt-invoice__item">
                            <span class="kt-invoice__subtitle">INVOICE TO.</span>
                            <span class="kt-invoice__text">Iris Watson, P.O. Box 283 8562 Fusce RD.<br>Fredrick Nebraska 20620</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-invoice__body">
                <div class="kt-invoice__container">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>DESCRIÇÃO</th>
                                    <th>AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sistema de Gestão para Delivery</td>
                                    <td>R$ 190,00</td>
                                </tr>
                                <tr>
                                    <td>Front-End Development</td>
                                    <td>$4800.00</td>
                                </tr>
                                <tr>
                                    <td>Back-End Development</td>
                                    <td>$12600.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="kt-invoice__footer">
                <div class="kt-invoice__container">
                    <div class="kt-invoice__bank">
                        <div class="kt-invoice__title">BANK TRANSFER</div>
						
						<div class="kt-invoice__item">
							<span class="kt-invoice__label">Account Name:</span>
							<span class="kt-invoice__value">Barclays UK</span></span>
						</div>

						<div class="kt-invoice__item">
							<span class="kt-invoice__label">Account Number:</span>
							<span class="kt-invoice__value">1234567890934</span></span>
						</div>

						<div class="kt-invoice__item">
							<span class="kt-invoice__label">Code:</span>
							<span class="kt-invoice__value">BARC0032UK</span></span>
						</div>
                    </div>
                    <div class="kt-invoice__total">
                        <span class="kt-invoice__title">TOTAL AMOUNT</span>
                        <span class="kt-invoice__price">$20.600.00</span>
                        <span class="kt-invoice__notice">Taxes Included</span>
                    </div>
                </div>
            </div>
            <div class="kt-invoice__actions">
                <div class="kt-invoice__container">
                    <button type="button" class="btn btn-label-brand btn-bold" onclick="window.print();">Download Invoice</button>
                    <button type="button" class="btn btn-brand btn-bold" onclick="window.print();">Print Invoice</button>
                </div>
            </div>
        </div>
    </div>
</div>	</div>
<!-- end:: Content -->				</div>