<?php

    App::uses('AppModel', 'Model');
    class Pedido extends AppModel{
        public $belongsTo = array (
            'Cliente', 'Produto', 'Estado', 'Motoboy',
        );
        

        public $virtualFields = array(
            'numeroCpfNome' => "CONCAT(Pedido.numero_pedido, Cliente.cpf, Cliente.nome)"
        );

        public function relatorioTipoQuantidade($estadoid, $conditions){
            $this->virtualFields = array(
                'totalEntregues' => "SUM(if(Estado.tipo_estado = 'Entregue', 1,0))",
                'totalAprovado' => "SUM(if(Estado.tipo_estado = 'Aprovado', 1,0))",
                'totalCancelados' => "SUM(if(Estado.tipo_estado = 'Cancelado', 1,0))",
                'totalPreparacao' => "SUM(if(Estado.tipo_estado = 'Em Preparacao', 1,0))",
                'totalSaiuParaEntrega' => "SUM(if(Estado.tipo_estado = 'Saiu para entrega', 1,0))",
                'somaTotal' => "count(1)"
            );
            $fields = array(
                'Pedido.totalEntregues',
                'Pedido.totalAprovado',
                'Pedido.totalCancelados',
                'Pedido.totalPreparacao',
                'Pedido.totalSaiuParaEntrega',
                'Pedido.somaTotal'
            );
            $group = array('Estabelecimento.estabelecimento_id');
            $quantidadeLicenca = $this->find('all', compact('fields', 'group', 'conditions'));
            if (empty($estadoid)) {
                $quantidade[0]['Pedido']['totalRegistro'] = $quantidadeLicenca[0]['Pedido']['somaTotal'];
            } 
            $records = Hash::merge($estadoid, $quantidadeLicenca);
            
            return $records;
        }

        public function somavalorFaturaPedidos($estabelecimento_id){
            $this->virtualFields = array(
                'somaValor' => "SUM(Pedido.valor)",
            );
            $fields = array(
                'Pedido.somaValor'
            );
            $conditions = array('Pedido.estabelecimento_id' => $estabelecimento_id);
            $pedidosFaturamento = $this->find('all', compact('fields', 'conditions'));
            
            return $pedidosFaturamento;
        }

    }

?>