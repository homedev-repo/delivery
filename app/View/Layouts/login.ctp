
<!DOCTYPE html>
<html lang="PT-BR" >
    <head>
        <meta charset="utf-8"/>
        <title>Vayron | Login </title>
        <meta name="description" content="Pagina de Login">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
        <link rel="shortcut icon" href="/metronic/themes/metronic/theme/default/demo1/dist/assets/media/logos/favicon.ico" />
        <?php 
          echo $this->Html->css('Metronic/Login/css/login-1.css');
          echo $this->Html->css('Metronic/Login/css/plugins.bundle.css');
          echo $this->Html->css('Metronic/Login/css/style.bundle.css');
        ?>
  </head>
    <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

	<div class="kt-grid kt-grid--ver kt-grid--root">
		<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">

  <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background-image: url(/Vayron/app/webroot/img/submenuLogin.jpg);">
			<div class="kt-grid__item">
				<a href="#" class="kt-login__logo">
				
        <?php echo $this->Html->image('/img/vayronIcone.png', array('class' => 'tamanho-imagem-vayronIconeMobile'));?>
		
      </a>
			</div>
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
				<div class="kt-grid__item kt-grid__item--middle">
					<h3 class="kt-login__title">Bem Vindo a HomeDev!</h3>
					<h4 class="kt-login__subtitle">Tudo o que fazemos é um sistema de Gestão para Delivery, acreditamos em pensar de forma diferente em um sistema complexo, inovador, para atender suas necessidades. Através de um design elegante facíl e intuitivo, com nossa plataforma você vai decolar seu négocio! </h4>
				</div>
			</div>
			<div class="kt-grid__item">
				<div class="kt-login__info">
					<div class="kt-login__copyright">
						&copy 2020 Vayron
					</div>
					<div class="kt-login__menu">
						<a href="www.vayron.com.br" target='_blank' class="kt-link">Contato</a>
					</div>
				</div>
			</div>
		</div>
		<div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
			<div class="kt-login__body">
				<div class="kt-login__form">
					<div class="kt-login__title">
            <h3>Acessar Conta</h3>
            <p>Sistema de Gestão para Delivery</p>
          </div>
		<?php 
            echo $this->fetch('content');
            echo $this->Html->script('jquery-3.4.1.min.js');
            echo $this->Html->script('bootstrap.bundle.min.js');
            echo $this->Js->writeBuffer();
        ?>
						<!--begin::Action-->
						<div class="kt-login__actions">
							<a href="#" class="kt-link kt-login__link-forgot">
								Esqueceu sua Senha?
							</a>
						</div>

				</div>

			</div>

		</div>

	</div>
</div>
	</div>
</body>

</html>

