<?php

App:: uses('AppController', 'Controller');

class FeedbacksController extends AppController {
    
    public $uses = array('Pedido');

    public $paginate = array(
        'fields' => array('Pedido.id', 'Pedido.feedback', 'Pedido.numero_pedido'),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Pedido.id' => 'asc')    
    );

    public function setPaginateConditions(){
        $numero_pedido = '';
        if ($this->request->is('post')) {
            $numero_pedido = $this->request->data['Pedido']['numero_pedido'];
            $this->Session->write('Pedido.numero_pedido', $numero_pedido);
        } else {
            $numero_pedido = $this->Session->read('Pedido.numero_pedido');            
            $this->request->data('Pedido.numero_pedido', $numero_pedido);
        }
        if (!empty($numero_pedido)) {
            $this->paginate['conditions']['Pedido.numero_pedido LIKE'] = '%' .trim($numero_pedido) . '%';
        } 
        $this->paginate['conditions']['Pedido.estabelecimento_id'] = $this->Auth->user('estabelecimento_id');
    }

}

?>