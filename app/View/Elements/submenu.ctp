<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
	<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500" >		
        <ul class="kt-menu__nav ">

        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-home kt-menu__link-icon settings-text-submenu'))
                    . $this->Html->tag('span', 'Dashboard', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                    '/dashboards', array('escape'=>false, 'class' => 'kt-menu__link'));
                    ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-sitemap kt-menu__link-icon settings-text-submenu'))
                    . $this->Html->tag('span', 'KanBan', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                    '/kanbans', array('escape'=>false, 'class' => 'kt-menu__link'));
                    ?>
            </li>
    
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-bell kt-menu__link-icon settings-text-submenu'))
                    . $this->Html->tag('span', 'Notificações', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                    '/notificacoes', array('escape'=>false, 'class' => 'kt-menu__link'));
                    ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-cart-plus kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', ' Pedidos', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/pedidos', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-receipt kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Pagamentos', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/pagamentos', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-file-invoice-dollar kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Cupom de Descontos', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/cupoms', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-plus-circle kt-menu__link-icon  settings-text-submenu'))
                . $this->Html->tag('span', 'Estados De Pedidos', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/estados', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-users kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Clientes', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/clientes', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-folder-plus kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Categorias / Cardápio', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/categorias', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fab fa-elementor kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Fidelidade', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/fidelidades', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'far fa-comment-dots kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'FeedBacks', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/feedbacks', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-motorcycle kt-menu__link-icon  settings-text-submenu'))
                . $this->Html->tag('span', 'MotoBoy', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/motoboys', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'far fa-images kt-menu__link-icon  settings-text-submenu'))
                . $this->Html->tag('span', 'Banner', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/banners', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-map-marked-alt kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Mapa Inteligente', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/mapas', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fab fa-gratipay kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Módulos disponíveis', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/modulos', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-headset kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Suporte', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/suportes', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fab fa-blogger kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Blogger', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                'https://thevayron.wordpress.com/', array('escape'=>false, 'class' => 'kt-menu__link', 'target' => '_blank'));
                ?>
            </li>
            
            <li class="kt-menu__section"> <h4 class="kt-menu__section-text">Produtos</h4> <i class="kt-menu__section-icon fas fa-caret-down"></i>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fab fa-buffer kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Tipos e Tamanhos', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/tipos', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-comment-dollar kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Produtos', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/produtos', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fab fa-buffer kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Produtos por Tamanho', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/produtotamanhos', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fab fa-buffer kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Produtos Combo', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/tamanhos', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-comment-dollar kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Promoções', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/produtos', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-comment-dollar kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Insumos', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/produtos', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fab fa-buffer kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Complementos', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/complementos', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__section"> <h4 class="kt-menu__section-text">Integrações</h4> <i class="kt-menu__section-icon fas fa-caret-down"></i>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fab fa-google-plus-g kt-menu__link-icon settings-text-submenu'))
                    . $this->Html->tag('span', 'Google Calendário', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                    '/googles', array('escape'=>false, 'class' => 'kt-menu__link'));
                    ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'far fa-envelope kt-menu__link-icon settings-text-submenu'))
                    . $this->Html->tag('span', 'E-mail Marketing', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                    '/emailmarketings/add', array('escape'=>false, 'class' => 'kt-menu__link'));
                    ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-sms kt-menu__link-icon settings-text-submenu'))
                    . $this->Html->tag('span', 'SMS', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                    '/envioshortservices/add', array('escape'=>false, 'class' => 'kt-menu__link'));
                    ?>
            </li>
            <li class="kt-menu__section"> <h4 class="kt-menu__section-text">Estoque</h4> <i class="kt-menu__section-icon fas fa-caret-down"></i>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fab fa-wpforms kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Ficha Técnica', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/fichatecnicas', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-cubes kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Ingredientes', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/ingredientes', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-cubes kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Estoque', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/fichatecnicas', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__section"> <h4 class="kt-menu__section-text">Financeiro</h4> <i class="kt-menu__section-icon fas fa-caret-down"></i>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-cog kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Estabelecimento', array('class' => 'offset-md-1  kt-menu__link-text ')),
                '/estabelecimentos/edit', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-file-invoice kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Fatura', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/faturas', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-percentage  kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Despesas', array('class' => 'offset-md-1  kt-menu__link-text ')),
                '/despesas', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'far fa-address-book  kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Fornecedores', array('class' => 'offset-md-1  kt-menu__link-text ')),
                '/fornecedores', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-donate kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Contas a Pagar', array('class' => 'offset-md-1  kt-menu__link-text ')),
                '/contas', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-user-plus kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Cadastrar Usuarios', array('class' => 'offset-md-1  kt-menu__link-text ')),
                '/usuarios', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fas fa-chart-pie kt-menu__link-icon settings-text-submenu'))
                . $this->Html->tag('span', 'Smart', array('class' => 'offset-md-1 settings-text-submenu kt-menu__link-text')),
                '/smarts', array('escape'=>false, 'class' => 'kt-menu__link'));
                ?>
            </li>
            <li class="kt-menu__section">
                    <h4 class="kt-menu__section-text">Relatorios</h4>
                    <i class="kt-menu__section-icon fas fa-caret-down"></i>
            </li>
        </ul>
    </div>
</div>
</div>
</div>
