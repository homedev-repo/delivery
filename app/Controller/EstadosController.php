<?php
App:: uses('AppController', 'Controller');

class EstadosController extends AppController {
   
    public $paginate = array(
        'fields' => array('Estado.id', 'Estado.tipo_estado'),
        'conditions' => array(),
        'limit' => 8,
        'order' => array('Estado.tipo_estado' => 'asc')    
    );

    public function index() {
        if ($this->request->is('post') && !empty($this->request->data['Estado']['nome'])) {
            $this->paginate['conditions']['Estado.nome LIKE'] = '%' .trim($this->request->data['Estado']['nome']) . '%';
        }

        $estados = $this->paginate();
        $this->set('estados', $estados);        
    }

}



?>