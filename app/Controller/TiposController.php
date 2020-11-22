<?php
App::uses('AppController', 'Controller');

class TiposController  extends AppController {
    public $uses = array('Tipo', 'Tamanho');
    public $paginate = array(
        'fields' => array(
            'Tipo.id',
            'Tipo.descricao',
        ),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Tipo.id' => 'desc')
    );

    public function setPaginateConditions() {
        $tipo = '';
        if ($this->request->is('post')) {
            $tipo = $this->request->data['Tipo']['descricao'];
            $this->Session->write('Tipo.descricao', $tipo);
        } else {
            $tipo = $this->Session->read('Tipo.descricao');            
            $this->request->data('Tipo.descricao', $tipo);
        }
        if (!empty($tipo)) {
            $this->paginate['conditions']['Tipo.descricao LIKE'] = '%' . strtoupper(trim($tipo)) . '%';
        } 

        $this->paginate['conditions']['Tipo.estabelecimento_id'] = $this->Auth->user('estabelecimento_id');
    }

    public function add($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            $this->Tipo->create();
            if ($this->Tipo->saveAll($this->request->data, array('deep' => true))) {
                $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
                $this->redirect('/tipos');
            }
        }
    }

    public function edit($id = null) {
        if (!$this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            if ($this->Tipo->saveAll($this->request->data)) {
                $this->Flash->bootstrap('Alterado com sucesso!', array('key' => 'success'));
                $this->afterEdit();
            }
        } else {
            $this->request->data = $this->Tipo->editData($id);

        }

        $this->setFields();

    }
    
    public function view($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        $conditions = array('Tipo.id' => $id);
        $this->request->data = $this->Tipo->find('first', compact('conditions'));
    }

    public function tipoSelectProdutoTamanhos($id) {
        $this->autoRender = $this->layout = false;
        $this->response->type('json');
        $fields = array(
            'Tipo.id', 
            'Tipo.descricao',
        );
        $contain = array('Tamanho');
        $conditions = array('Tipo.id' => $id);
        $conteudo = $this->Tipo->find('first', compact('fields', 'contain','conditions'));

        return json_encode($conteudo);
    }

}
