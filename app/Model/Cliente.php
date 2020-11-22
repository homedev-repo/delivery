<?php
App::uses('AppModel', 'Model');
    
class Cliente extends AppModel {
    public $belongsTo = array (
        'Situacao', 'Estabelecimento'
    );

    public $hasMany = array(
        'Pedidos'
    );

    public $virtualFields = array(
        'nomeCpf' => "CONCAT(Cliente.nome, Cliente.cpf)"
    );

    public function relatorioClienteQuantidade($servicoId, $conditions){
        $this->virtualFields = array(
            'totalAtivo' => "SUM(if(Cliente.situacao_id = '1', 1,0))",
            'totalBloqueado' => "SUM(if(Cliente.situacao_id = '2', 1,0))",
            'somaTotal' => "count(1)"
        );
        $fields = array(
            'Cliente.totalAtivo',
            'Cliente.totalBloqueado',
            'Cliente.somaTotal'
        );
        $group = array('estabelecimento_id');
        $quantidadeCliente = $this->find('all', compact('fields', 'group', 'conditions'));
        
        if(empty($servicoId['Cliente']['situacao_id'])){
            $servicoId['Cliente']['situacao_id'] = 'Todos';
        }
      
        return $quantidadeCliente;
    }

    public function impressaoClientesDadosView($id, $estabelecimento_id){
        $conditions = array('Cliente.id' => $id, 'Cliente.estabelecimento_id' => $estabelecimento_id);
        $contain = array();
        $impressaoClientesDadosView = $this->find('all', compact('conditions', 'contain'));

        return $impressaoClientesDadosView;
    }

    public function somaDeRegioes($estabelecimento_id){
        $this->virtualFields = array(
            'somaTotal' => "count(Cliente.endereco)"
        );
        $fields = array(
            'Cliente.somaTotal',
        );
        $conditions = array('Cliente.estabelecimento_id' => $estabelecimento_id);
        $somaTotal = $this->find('all', compact('fields', 'conditions'));
        $somaTotal[0]['Cliente']['somaTotal'] = str_replace(array(",","."),array(".",","), $somaTotal[0]['Cliente']['somaTotal']);
    
        return $somaTotal;
    }


}
