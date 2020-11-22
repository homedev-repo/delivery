<?php
App:: uses('AppController', 'Controller');

class FidelidadesController extends AppController {
    
    public $uses = array('Fidelidade', 'Premio', 'Recompensa');

    public $paginate = array(
        'fields' => array('Fidelidade.id', 'Fidelidade.nome', 'Premio.nome', 'Recompensa.nome'),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Fidelidade.id' => 'asc')    
    );

    public function setPaginateConditions(){
        $nome = '';
        if ($this->request->is('post')) {
            $nome = $this->request->data['Fidelidade']['nome'];
            $this->Session->write('Fidelidade.nome', $nome);
        } else {
            $nome = $this->Session->read('Desperdicio.nome');            
            $this->request->data('Fidelidade.nome', $nome);
        }
        if (!empty($nome)) {
            $this->paginate['conditions']['Fidelidade.nome LIKE'] = '%' .trim($nome) . '%';
        } 
        $this->paginate['conditions']['Fidelidade.estabelecimento_id'] = $this->Auth->user('estabelecimento_id');
    }

    public function add($id = null){
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)){
            $this->Fidelidade->create();
        if ($this->Fidelidade->save($this->request->data)){
            $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
            $this->redirect('/fidelidades');
        }}
        $estabelecimento_id = $this->Auth->user('estabelecimento_id');
        $conditions = array('Fidelidade.estabelecimento_id' => $estabelecimento_id);
        $findAll = $this->Fidelidade->find('all', compact('conditions'));

    }

    public function edit($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        } 
        if (!empty($this->request->data)) {
            if ($this->Fidelidade->saveAll($this->request->data)) {
                $this->Flash->bootstrap('Alterado com sucesso!', array('key' => 'success'));
                $this->redirect('/fidelidades');
            }
        } else {
            $fields = array(
                'Fidelidade.id',
                'Fidelidade.nome',
                'Fidelidade.comprarx_vezes',
                'Fidelidade.gastarx_vezes',
                'Fidelidade.porcentagem_desconto',
                'Fidelidade.compra_desconto',
                'Fidelidade.recompensa_id',
                'Fidelidade.premio_id',
            );
            $conditions = array('Fidelidade.id' => $id);
            $this->request->data = $this->Fidelidade->find('first', compact('fields', 'conditions'));
        }
        $estabelecimento_id = $this->Auth->user('estabelecimento_id');
        $conditions = array('Fidelidade.estabelecimento_id' => $estabelecimento_id);
        $findAll = $this->Fidelidade->find('all', compact('conditions'));
    }

    public function view($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        } 
        $fields = array(
            'Fidelidade.id',
            'Fidelidade.nome',
            'Fidelidade.comprarx_vezes',
            'Fidelidade.gastarx_vezes',
            'Fidelidade.porcentagem_desconto',
            'Fidelidade.compra_desconto',
            'Fidelidade.recompensa_id',
            'Fidelidade.premio_id',
         );
        $conditions = array('Fidelidade.id' => $id);
        $this->request->data = $this->Fidelidade->find('first', compact('fields', 'conditions'));
    }

    public function delete($id) {
        $this->Fidelidade->delete($id);
        $this->Flash->bootstrap('Excluido com êxito.', array('key' => 'success'));        
        $this->redirect('/fidelidades');
    }

}
