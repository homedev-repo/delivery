<?php
App::uses('AppController', 'Controller');

class ComplementosController  extends AppController {
    public $uses = array('Complemento', 'Categoria');
    public $paginate = array(
        'fields' => array(
            'Complemento.id',
            'Complemento.nome',
            'Complemento.preco_venda',
            'Complemento.preco_custo',
        ),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Complemento.id' => 'desc')
    );

    public function setPaginateConditions() {
        $tipo = '';
        if ($this->request->is('post')) {
            $tipo = $this->request->data['Complemento']['nome'];
            $this->Session->write('Complemento.nome', $tipo);
        } else {
            $tipo = $this->Session->read('Complemento.nome');            
            $this->request->data('Complemento.nome', $tipo);
        }
        if (!empty($tipo)) {
            $this->paginate['conditions']['Complemento.nome LIKE'] = '%' . strtoupper(trim($tipo)) . '%';
        } 

        $this->paginate['conditions']['Complemento.estabelecimento_id'] = $this->Auth->user('estabelecimento_id');
    }

    public function add($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {

            $this->Complemento->create();
            if ($this->Complemento->saveAll($this->request->data, array('deep' => true))) {
                $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
                $this->redirect('/complementos');
            }
        }
        $estabelecimentoID = $this->Auth->user('estabelecimento_id');
        $conditions = array('Categoria.estabelecimento_id' => $estabelecimentoID);
        $fields = array('Categoria.id', 'Categoria.tipo_categoria');
        $categorias = $this->Complemento->Categoria->find('list', compact('fields','conditions'));
        $this->set('categorias', $categorias);
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
