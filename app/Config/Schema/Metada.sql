
CREATE TABLE estados (
    id int(10) AUTO_INCREMENT,
    tipo_estado varchar(25) DEFAULT NULL,
    `blocked` datetime DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `estados`(`id`, `tipo_estado`, `blocked`, `created`, `modified`)
 VALUES (1,'Entregue',null,null,null);
INSERT INTO `estados`(`id`, `tipo_estado`, `blocked`, `created`, `modified`)
 VALUES (2,'Aprovado',null,null,null);
 INSERT INTO `estados`(`id`, `tipo_estado`, `blocked`, `created`, `modified`)
 VALUES (3,'Reprovado',null,null,null);
  INSERT INTO `estados`(`id`, `tipo_estado`, `blocked`, `created`, `modified`)
 VALUES (4,'Em Preparacao',null,null,null);
   INSERT INTO `estados`(`id`, `tipo_estado`, `blocked`, `created`, `modified`)
 VALUES (5,'Saiu para entrega',null,null,null);


 CREATE TABLE estabelecimentos (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codigo varchar(4) DEFAULT NULL,
    brasao varchar(20) DEFAULT NULL,
    estado_funcionamento varchar(15) DEFAULT NULL,
    funcionamento_segunda varchar(20),
    funcionamento_terca varchar(20),
    funcionamento_quarta varchar(20),
    funcionamento_quinta varchar(20),
    funcionamento_sexta varchar(20),
    funcionamento_sabado varchar(20),
    funcionamento_domingo varchar(20),
    cnpj varchar(14) DEFAULT NULL,
    nome_fantasia varchar(180) DEFAULT NULL,
    cep varchar(15) DEFAULT NULL,
    endereco varchar(180) DEFAULT NULL,
    numero int(5) DEFAULT NULL,
    complemento varchar(50) DEFAULT NULL,
    bairro varchar(50) DEFAULT NULL,
    cidade varchar(20) DEFAULT NULL,
    responsavel varchar(20) DEFAULT NULL,
    telefone varchar(30) DEFAULT NULL,
    `blocked` datetime DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `estabelecimentos` (`id`, `codigo`, `brasao`, `estado_funcionamento`, `funcionamento_segunda`, `funcionamento_terca`, `funcionamento_quarta`, `funcionamento_quinta`, `funcionamento_sexta`, `funcionamento_sabado`, `funcionamento_domingo`, `cnpj`, `nome_fantasia`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `responsavel`, `telefone`, `blocked`, `created`, `modified`) VALUES ('1', '1015', 'teste.jpg', 'Aberto', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


 CREATE TABLE categorias (
    id int(11) NOT NULL AUTO_INCREMENT,
    tipo_categoria varchar(25)  DEFAULT NULL,
    estabelecimento_id int(11) DEFAULT NULL,
    `blocked` datetime DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `estabelecimento_id` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `situacaos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `situacaos` VALUES (1,'Ativo'),(2,'Bloqueado'),(3, 'Inativo');


CREATE TABLE clientes (
    id int(11) NOT NULL AUTO_INCREMENT,
    latitude float(10,6) NOT NULL,
    longitude float(10,6) NOT NULL,
    type varchar(30) NOT NULL,
    estabelecimento_id int(11) DEFAULT NULL,
    nome varchar(180)  DEFAULT NULL,
    telefone_celular varchar(15)  DEFAULT NULL,
    telefone_residencial varchar(15)  DEFAULT NULL,
    email varchar(180) DEFAULT NULL,
    cpf varchar(15) DEFAULT NULL,
    endereco varchar(280) DEFAULT NULL,
    complemento varchar(280) DEFAULT NULL,
    bairro varchar(280) DEFAULT NULL,
    numero varchar(10)  DEFAULT NULL,
    situacao_id int(11) DEFAULT NULL,
    justificativa text,
    cep varchar(10) DEFAULT NULL,
    `blocked` datetime DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `clientes_situacao_id` FOREIGN KEY (`situacao_id`) REFERENCES `situacaos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `clientes_estabelecimento_id` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE produtos (
    id int(11) NOT NULL AUTO_INCREMENT,
    estabelecimento_id int(11) DEFAULT NULL,
    desabilitar varchar(5) DEFAULT NULL,
    foto_um varchar(255) DEFAULT NULL,
    custo_produto decimal(10,2) DEFAULT NULL,
    nome varchar(180)  DEFAULT NULL,
    contem_complementos varchar(10) DEFAULT NULL,
    quantidade_inicial int(25) DEFAULT NULL,
    descricao text  DEFAULT NULL,
    valor decimal(10,2)  DEFAULT NULL,
    categoria_id int(11) DEFAULT NULL,
    controlar_estoque varchar(10) DEFAULT NULL,
    promocao varchar(5) DEFAULT NULL,
    valor_promocional decimal(10,2) DEFAULT NULL,
    `blocked` datetime DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `id_estabelecimento_fk_produtos` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `categoria_id_fk_produtos` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE produtotamanhos (
    id int(11) NOT NULL AUTO_INCREMENT,
    estabelecimento_id int(11) DEFAULT NULL,
    desabilitar varchar(5) DEFAULT NULL,
    foto_um varchar(255) DEFAULT NULL,
    custo_produto decimal(10,2) DEFAULT NULL,
    nome varchar(180)  DEFAULT NULL,
    preco_custo decimal(10,2) DEFAULT NULL,
    preco_venda decimal(10,2) DEFAULT NULL,
    descricao text  DEFAULT NULL,
    valor decimal(10,2)  DEFAULT NULL,
    categoria_id int(11) DEFAULT NULL,
    tipo_id int(11) DEFAULT NULL,
    `blocked` datetime DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `id_estabelecimento_fk_produtostamanhos` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `categoria_id_fk_produtostamanhos` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `tipos_produtos_tamanhos_fk` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE cardapios (
    id int(11) NOT NULL AUTO_INCREMENT,
    estabelecimento_id int(11) DEFAULT NULL,
    categoria_id int(11) DEFAULT NULL,
    produto_id int(11) DEFAULT NULL,
    tempo_entrega varchar(10) DEFAULT NULL,
    `blocked` datetime DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `estabelecimento_id_fk` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `categoria_id_fk` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `produto_id_fk` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE pagamentos (
    id int(11) NOT NULL AUTO_INCREMENT,
    estabelecimento_id int(11) DEFAULT NULL,
    tipo_pagamento varchar(20) DEFAULT NULL,
    cliente_id int(11) DEFAULT NULL,
    `blocked` datetime DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    CONSTRAINT `estabelecimento_id_pagamento_fk` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `pagamentos` (`id`, `estabelecimento_id`, `tipo_pagamento`, `cliente_id`, `blocked`, `created`, `modified`) VALUES ('1', '1', 'Cartão Crédito', '1', NULL, NULL, NULL);
INSERT INTO `pagamentos` (`id`, `estabelecimento_id`, `tipo_pagamento`, `cliente_id`, `blocked`, `created`, `modified`) VALUES ('2', '1', 'Cartão Debito', '1', NULL, NULL, NULL);
INSERT INTO `pagamentos` (`id`, `estabelecimento_id`, `tipo_pagamento`, `cliente_id`, `blocked`, `created`, `modified`) VALUES ('3', '1', 'Dinheiro', '1', NULL, NULL, NULL);

DROP TABLE IF EXISTS `motoboys`;
CREATE TABLE motoboys (
    id int(10) NOT NULL AUTO_INCREMENT,
    terceirizada varchar(5) DEFAULT NULL,
    nome_empresa_terceirizada varchar(30) DEFAULT NULL,
    cnpj_empresa_terceirizada varchar(20) DEFAULT NULL,
    estabelecimento_id int(11) DEFAULT NULL,
    nome_motoboy varchar(30) DEFAULT NULL,
    data_nascimento date  DEFAULT NULL,
    valor_pago double(5,2) DEFAULT NULL,
    rendimento varchar(30),
    cpf varchar(20)  DEFAULT NULL,
    placa varchar(15)  DEFAULT NULL,
    modelo_moto varchar(15) DEFAULT NULL,
    cnh varchar(20) DEFAULT NULL,
    `blocked` datetime DEFAULT NULL,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `motoboys_estabelecimento_id_fk` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE banners (
    id int(10) NOT NULL AUTO_INCREMENT,
    foto_um  varchar(50) DEFAULT NULL,
    nome varchar(40) DEFAULT NULL,
    produto_id int(11) DEFAULT NULL,
    acao_id int(11) DEFAULT NULL,
    estabelecimento_id int(11) DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `produto_banners_id_fk` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `estabelecimento_banners_id_fk` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE usuarios (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_nascimento` date,
  `estabelecimento_id` int(11) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `funcao` varchar(100) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `aro_parent_id` int(11) DEFAULT NULL,
  `blocked` datetime DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT `estabelecimento_id_usuarios_fk` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `usuarios`(`id`,`data_nascimento`, `estabelecimento_id`, `login`, `senha`, `nome`, `funcao`, `cpf`, `email`, `created`, `modified`, `aro_parent_id`, `blocked`)
 VALUES (1,NULL,1,'teste',2323,'victor','suporte',45454,'v@gmail.com',null,null,1,null);

DROP TABLE IF EXISTS `cupoms`;
CREATE TABLE cupoms (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estabelecimento_id` int(11) DEFAULT NULL,
  `numero_cupom` varchar(15) DEFAULT NULL,
  `total_desconto` decimal(10,2) DEFAULT NULL,
  `atribuir_cupom` varchar(5) DEFAULT NULL,
  `situacao` varchar(11) DEFAULT NULL,
  `desativado` varchar(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `validade` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT `estabelecimento_id_cupoms_fk` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cliente_id_cupoms_fk` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE pedidos (
    id int(180) NOT NULL AUTO_INCREMENT,
    cliente_id int(11) DEFAULT NULL,
    feedback text DEFAULT NULL,
    valor decimal(12,2) DEFAULT NULL,
    estabelecimento_id int(10) DEFAULT NULL,
    categoria_id int(10) DEFAULT NULL,
    produto_id int(10) DEFAULT NULL,
    estado_id int(10) DEFAULT NULL,
    motoboy_id int(10) DEFAULT NULL,
    cardapio_id int(10) DEFAULT NULL,
    pagamento_id int(10) DEFAULT NULL,
    numero_pedido int(11) DEFAULT NULL,
    cupoms_id int(10) DEFAULT NULL,
    observacao text DEFAULT NULL,
    observacao_estabelecimento  text DEFAULT NULL,
    cupomde_desconto varchar(10) DEFAULT NULL,
    situacao_pedido varchar(50) DEFAULT NULL,
    data_pedido date DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `cardapio_id_pedidos_fk` FOREIGN KEY (`cardapio_id`) REFERENCES `cardapios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `estabelecimento_pedidosid_fk` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `pedidos_categoria_idpedidos_fk` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `pedidos_produto_idpedidos_fk` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `pedidos_estado_idpedidos_fk` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `pedidos_motoboy_pedidosid_fk` FOREIGN KEY (`motoboy_id`) REFERENCES `motoboys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `pedidos_pagamento_pedidosid_fk` FOREIGN KEY (`pagamento_id`) REFERENCES `pagamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `pedidos_cupoms_id_pedidosfk` FOREIGN KEY (`cupoms_id`) REFERENCES `cupoms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `clientecupoms_id_pedidosfk` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE avaliacoes (
    id int(10) NOT NULL AUTO_INCREMENT,
    cliente_id int(11) DEFAULT NULL,
    pedido_id int(11)  DEFAULT NULL,
    avaliacoes int(11) DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `cliente_id_fk` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `pedido_id_fk` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE categoriadespesas (
    id int(10) NOT NULL AUTO_INCREMENT,
    categoria varchar(30) DEFAULT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `categoriadespesas`(`id`,`categoria`)VALUES (1,'Matéria-Prima');
INSERT INTO `categoriadespesas`(`id`,`categoria`)VALUES (2,'Salário');
INSERT INTO `categoriadespesas`(`id`,`categoria`)VALUES (3,'Entregadores');
INSERT INTO `categoriadespesas`(`id`,`categoria`)VALUES (4,'Gastos');
INSERT INTO `categoriadespesas`(`id`,`categoria`)VALUES (5,'Máquinas');
INSERT INTO `categoriadespesas`(`id`,`categoria`)VALUES (6,'Veículos');
INSERT INTO `categoriadespesas`(`id`,`categoria`)VALUES (7,'Embalagens');
INSERT INTO `categoriadespesas`(`id`,`categoria`)VALUES (8,'Imóveis');
INSERT INTO `categoriadespesas`(`id`,`categoria`)VALUES (9,'Funcionário');
INSERT INTO `categoriadespesas`(`id`,`categoria`)VALUES (10,'Outros');

CREATE TABLE despesas (
    id int(10) NOT NULL AUTO_INCREMENT,
    custo varchar(30) DEFAULT NULL,
    data_compra date  DEFAULT NULL,
    data_vencimento date  DEFAULT NULL,
    despesa_paga varchar(5) DEFAULT NULL,
    valor decimal(10,2)  DEFAULT NULL,
    estabelecimento_id int(10) DEFAULT NULL,
    categoriadespesa_id int(10) DEFAULT NULL,
    repetir varchar(5) DEFAULT NULL,
    `created` date DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `estabelecimento_id_despesa` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `categoriadespesa_id_despesa` FOREIGN KEY (`categoriadespesa_id`) REFERENCES `categoriadespesas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE contas (
    id int(10) NOT NULL AUTO_INCREMENT,
    tipoconta varchar(30) DEFAULT NULL,
    valor varchar(10)  DEFAULT NULL,
    data_vencimento  date,
    situacao varchar(15),
    estabelecimento_id int(10) DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `estabelecimento_id_contas` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE notificas (
    id int(10) NOT NULL AUTO_INCREMENT,
    conteudo varchar(10)  DEFAULT NULL,
    estabelecimento_id int(10) DEFAULT NULL,
     created datetime DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `estabelecimento_id_notifica` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE kanbans (
    id int(10) NOT NULL AUTO_INCREMENT,
    estabelecimento_id int(11)  DEFAULT NULL,
    tarefa varchar(100),
    situacao_id int(11)  DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `estabelecimento_id_kanban` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `situacao_id_kanban` FOREIGN KEY (`situacao_id`) REFERENCES `situacaos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE

)ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `premios`;
CREATE TABLE premios (
    id int(10) NOT NULL AUTO_INCREMENT,
    nome varchar(100)  DEFAULT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `premios` (`id`, `nome`) VALUES ('1', 'Comprar X vezes no aplicativo');
INSERT INTO `premios` (`id`, `nome`) VALUES ('2', 'Gastar X valor em um pedido');


DROP TABLE IF EXISTS `recompensas`;
CREATE TABLE recompensas (
    id int(10) NOT NULL AUTO_INCREMENT,
    nome varchar(100)  DEFAULT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `recompensas` (`id`, `nome`) VALUES ('1', 'Porcentagem de desconsto na compra');
INSERT INTO `recompensas` (`id`, `nome`) VALUES ('2', 'Desconto de R$ na compra');

DROP TABLE IF EXISTS `fidelidades`;
CREATE TABLE fidelidades (
    id int(10) NOT NULL AUTO_INCREMENT,
    nome varchar(30),
    comprarx_vezes int(10),
    gastarx_vezes decimal(10,2),
    porcentagem_desconto int(10) DEFAULT NULL,
    compra_desconto decimal(10,0) DEFAULT NULL,
    estabelecimento_id int(11)  DEFAULT NULL,
    recompensa_id int(10)  DEFAULT NULL,
    premio_id int(10)  DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `estabelecimento_id_fidelidade` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_id_premio` FOREIGN KEY (`premio_id`) REFERENCES `premios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `fk_id_recompensa` FOREIGN KEY (`recompensa_id`) REFERENCES `recompensas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `fichatecnicas `;
CREATE TABLE fichatecnicas  (
    id int(10) NOT NULL AUTO_INCREMENT,
    nome_preparacao varchar(50) DEFAULT NULL,
    produto_id int(10) DEFAULT NULL,
    categoria_id int(10) DEFAULT NULL,
    rendimento varchar(30) DEFAULT NULL,
    estabelecimento_id int(11)  DEFAULT NULL,
    data_alteracao date DEFAULT NULL,
    usuario_id int(10) DEFAULT NULL,
    observacao text,
    medidas varchar(15) DEFAULT NULL,
    itens varchar(47) DEFAULT NULL,
    marca varchar(20) DEFAULT NULL,
    valor_unitario varchar(7) DEFAULT NULL,
    valor_total varchar(12) DEFAULT NULL,
    medidas_2 varchar(15) DEFAULT NULL,
    itens_2 varchar(30) DEFAULT NULL,
    marca_2 varchar(30) DEFAULT NULL,
    valor_unitario_2 varchar(13) DEFAULT NULL,
    valor_total_2 varchar(12) DEFAULT NULL,
    medidas_3 varchar(15) DEFAULT NULL,
    itens_3 varchar(30) DEFAULT NULL,
    marca_3 varchar(30) DEFAULT NULL,
    valor_unitario_3 varchar(12) DEFAULT NULL,
    valor_total_3 varchar(12) DEFAULT NULL,
    medidas_4 varchar(15) DEFAULT NULL,
    itens_4 varchar(30) DEFAULT NULL,
    marca_4 varchar(30) DEFAULT NULL,
    valor_unitario_4 varchar(12) DEFAULT NULL,
    valor_total_4 varchar(12) DEFAULT NULL,
    medidas_5 varchar(15) DEFAULT NULL,
    itens_5 varchar(30) DEFAULT NULL,
    marca_5 varchar(30) DEFAULT NULL,
    valor_unitario_5 varchar(12) DEFAULT NULL,
    valor_total_5 varchar(12) DEFAULT NULL,
    medidas_6 varchar(15) DEFAULT NULL,
    itens_6 varchar(30) DEFAULT NULL,
    marca_6 varchar(30) DEFAULT NULL,
    valor_unitario_6 varchar(12) DEFAULT NULL,
    valor_total_6 varchar(12) DEFAULT NULL,
    medidas_7 varchar(15) DEFAULT NULL,
    itens_7 varchar(30) DEFAULT NULL,
    marca_7 varchar(30) DEFAULT NULL,
    valor_unitario_7 varchar(12) DEFAULT NULL,
    valor_total_7 varchar(12) DEFAULT NULL,
    medidas_8 varchar(15) DEFAULT NULL,
    itens_8 varchar(30) DEFAULT NULL,
    marca_8 varchar(30) DEFAULT NULL,
    valor_unitario_8 varchar(12) DEFAULT NULL,
    valor_total_8 varchar(12) DEFAULT NULL,
    modo_preparo text DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `estabelecimento_id_fixatecnica` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `produto_id_fixatecnica` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `categoria_id_fk_fixatecnicas` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE

)ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `fornecedores`;
CREATE TABLE fornecedores (
    id int(10) NOT NULL AUTO_INCREMENT,
    nome varchar(30) DEFAULT NULL,
    cnpj varchar(20) DEFAULT NULL,
    telefone varchar(20) DEFAULT NULL,
    fax varchar(20) DEFAULT NULL,
    cep varchar(15) DEFAULT NULL,
    endereco varchar(30) DEFAULT NULL,
    cidade varchar(15) DEFAULT NULL,
    bairro varchar(90) DEFAULT NULL,
    responsavel varchar(40) DEFAULT NULL,
    email varchar(80) DEFAULT NULL,
    estabelecimento_id int(11) DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `estabelecimento_id_fornecedores` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE cardapios (
    id int(10) NOT NULL AUTO_INCREMENT,
    categoria_id int(11) DEFAULT NULL,
    produto_id int(11) DEFAULT NULL,
    tempo_entrega varchar(25) DEFAULT NULL,
    estabelecimento_id int(11) DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `estabelecimento_cardapios_fk` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `produto_fk_cardapios` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `categoria_fk_cardapios` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE emailmarketings (
    id int(10) NOT NULL AUTO_INCREMENT,
    assunto varchar(35) DEFAULT NULL,
    descricao text DEFAULT NULL,
    forma varchar(15),
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE envioshortservices  (
    id int(10) NOT NULL AUTO_INCREMENT,
    descricao text DEFAULT NULL,
    forma varchar(25),
    quantidade_numeroespecifico int(30) DEFAULT NULL,
    quantidade_todosclientes int(30) DEFAULT NULL,
    estabelecimento_id int(11) DEFAULT NULL,
    `created` date DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `estabelecimento_sms_fk` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tipos` (
   id int(11) NOT NULL AUTO_INCREMENT,
   descricao varchar(25) DEFAULT NULL,
   estabelecimento_id int(11) DEFAULT NULL,
   `created` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `estabelecimento_tipos_fk` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tamanhos` (
    id int(11) NOT NULL AUTO_INCREMENT,
    tipo_id int(11) DEFAULT NULL,
    preco_custo decimal(10,2),
    preco_venda decimal(10,2),
    produtotamanho_id int(11) DEFAULT NULL,
    estabelecimento_id int(11) DEFAULT NULL,
    habilitar int(11) DEFAULT NULL,
    descricao text DEFAULT NULL,
    `created` date DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `tipo_tamanhos_fk` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `produto_tamanho_id_fk` FOREIGN KEY (`produtotamanho_id`) REFERENCES `produtotamanhos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `produto_tamanho_estabelecimento_id_fk` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `complementos` (
    id int(11) NOT NULL AUTO_INCREMENT,
    nome_complemento varchar(20) DEFAULT NULL,
    preco_custo decimal(10,2),
    preco_venda decimal(10,2),
    controlar_estoque varchar(8) DEFAULT NULL,
    quantidade_min int(11) DEFAULT NULL,
    quantidade_max int(11) DEFAULT NULL,
    estabelecimento_id int(11) DEFAULT NULL,
    `created` date DEFAULT NULL,
    PRIMARY KEY (id),
    CONSTRAINT `complementos_categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `complementos_estabelecimento_id_fk` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `categorias_complementos` (
    id int(11) NOT NULL AUTO_INCREMENT,
    complemento_id int(11) DEFAULT NULL,
    categoria_id int(11) DEFAULT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


