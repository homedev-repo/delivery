<?php

App::uses('AppController', 'Controller');

class PedidosController extends AppController{
    public $uses = array('Pedido', 'Estabelecimento', 'Estado');

 public $layout = 'metronicIndex';
    public $paginate = array (
        'fields' => array(
        'Pedido.id',
        'Pedido.numero_pedido',
        'Cliente.nome',
        'Cliente.cpf',
        'Estado.tipo_estado',
        'Motoboy.nome_motoboy'
    ),
    'conditions' => array(),
    'limit' => 3,
    'order' => array ('Pedido.id' => 'desc'),    
);

public function index() {
    parent::index();
    $atualizado = $this->Session->read('Atualizado');
}

public function setPaginateConditions() {
    if ($this->request->is('ajax')) {
        $this->layout = false;
    } 
    $numeroOrCpfOrnome = '';
    $tipo = '';
    if ($this->request->is('post')) {
        $tipo = $this->request->data['Estado']['tipo_estado'];
        $this->Session->write('Estado.tipo_estado', $tipo);
        $numeroOrCpfOrnome = $this->request->data['Pedido']['nome_or_numero_pedido_or_cpf'];
        $this->Session->write('Pedido.nome_or_numero_pedido_or_cpf', $numeroOrCpfOrnome);
    } else {
        $tipo = $this->Session->read('Estado.tipo_estado');
        $this->request->data('Estado.tipo_estado', $tipo);
        $numeroOrCpfOrnome = $this->Session->read('Pedido.nome_or_numero_pedido_or_cpf');            
        $this->request->data('Pedido.nome_or_numero_pedido_or_cpf', $numeroOrCpfOrnome);
    }
    if (!empty($tipo)) {
        $this->paginate['conditions']['Estado.tipo_estado'] = $tipo;
    }
    if (!empty($numeroOrCpfOrnome)) {
        $this->paginate['conditions']['Pedido.numeroCpfNome LIKE'] = '%' . trim($numeroOrCpfOrnome) . '%';
    }
    $this->paginate['conditions']['Pedido.estabelecimento_id'] = $this->Auth->user('estabelecimento_id');
    
        $Pedidos = $this->paginate();
        $this->set('pedidos', $Pedidos);        
}

    public function delete($id) {
        
    $this->Pedido->delete($id);
    $this->Flash->bootstrap('Excluido com êxito.', array('key' => 'success'));         
    $this->redirect('/pedidos');
}

public function view($id = null){ 
    if ($this->request->is('ajax')) {
        $this->layout = false;
    }
    $fields = array(
        'Pedido.id',
        'Pedido.numero_pedido',
        'Pedido.observacao_estabelecimento',
        'Pedido.observacao',
        'Cliente.nome',
        'Cliente.telefone_celular',
        'Cliente.telefone_residencial',
        'Cliente.cpf',
        'Cliente.endereco',
        'Cliente.complemento',
        'Cliente.bairro',
        'cliente.numero',
        'Cliente.cep',
        'Estado.tipo_estado',
        'Motoboy.nome_motoboy',
        'Pagamento.tipo_pagamento'
    );
    $conditions = array('Pedido.id' => $id);
    $this->request->data = $this->Pedido->find('first', compact('fields', 'conditions'));

}

public function edit($id = null) {
    if ($this->request->is('ajax')) {
        $this->layout = false;
    }
    if (!empty($this->request->data)) {
        if ($this->Pedido->save($this->request->data)) {
 
            $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
            $this->layout = false;
            $this->redirect('/pedidos');
        }
    } else {
        $fields = array(
            'Pedido.id',
            'Pedido.numero_pedido',
            'Pedido.observacao',
            'Pedido.observacao_estabelecimento',
            'Cliente.nome',
            'Cliente.telefone_celular',
            'Cliente.telefone_residencial',
            'Cliente.cpf',
            'Cliente.endereco',
            'Cliente.complemento',
            'Cliente.bairro',
            'cliente.numero',
            'Cliente.cep',
            'Estado.tipo_estado',
            'Motoboy.nome_motoboy',
            'Pagamento.tipo_pagamento'
        );
        $conditions = array('Pedido.id' => $id);
        $this->request->data = $this->Pedido->find('first', compact('fields', 'conditions'));
    }

    $fields = array('Estado.id', 'Estado.tipo_estado');
    $estado = $this->Pedido->Estado->find('list', compact('fields'));
    $fields = array('Motoboy.id', 'Motoboy.nome_motoboy');
    $motoboy = $this->Pedido->Motoboy->find('list', compact('fields'));
    $this->set('motoboy', $motoboy);   
    $this->set('estado', $estado);        
}

public function impressaoRelatorioPorTipo(){
    $this->layout = false;
    $this->response->type('pdf');
    parent::index();
    $clienteID = 1;
    $estadoid = $this->Session->read();
    if (!empty($estadoid['Estado']['tipo_estado'])) {
        $conditions = array('Estado.tipo_estado' => $estadoid['Estado']['tipo_estado'], 'Pedido.estabelecimento_id' => $clienteID);
    } else {
        $estadoid['Estado']['tipo_estado'] = '';
        $conditions = array('Pedido.estabelecimento_id' => $clienteID);
    }
    $quantidadePedidos = $this->Pedido->relatorioTipoQuantidade($estadoid, $conditions);
    if (empty($estadoid['Estado']['tipo_estado'])) {
        $estadoid['Estado']['tipo_estado'] = 'Todos';
    } else {
        $estadoid['Estado']['tipo_estado'] = $estadoid['Estado']['tipo_estado'];
    }
    $impressaoPedidos = $this->Pedido->find('all', compact('conditions'));
    $this->set('impressaoPedidos', $impressaoPedidos);
    $this->set('quantidadePedidos', $quantidadePedidos);
}

public function pedidosFind($cpf = null) {
    $this->autoRender = $this->layout = false;
    $estabelecimentoid = $this->Auth->user('estabelecimento_id');
    $conditions = array('Pedido.estabelecimento_id' => $estabelecimentoid);
    $licenca = $this->Pedido->find('all', compact('conditions'));
    $this->response->type('json');
    
    return json_encode($licenca);
}

public function numeroPedidosTypeHead() {
    $this->autoRender = $this->layout = false;
    $estabelecimentoid = $this->Auth->user('estabelecimento_id');
    $fields = array('Pedido.numero_pedido');
    $conditions = array('Pedido.estabelecimento_id' => $estabelecimentoid);
    $contain = array();
    $group = array('Pedido.numero_pedido');
    $order = array('Pedido.numero_pedido ASC');
    $numerosPedidos = $this->Pedido->find('all', compact('fields', 'conditions', 'contain','group','order'));
    $this->response->type('json');
    
    return json_encode($numerosPedidos);
}

}
?>