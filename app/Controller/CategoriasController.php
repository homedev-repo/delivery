<?php
App:: uses('AppController', 'Controller');

class CategoriasController extends AppController {
    public $uses = array('Categoria', 'Produto');

    public $paginate = array(
        'fields' => array(
            'Categoria.id', 
            'Categoria.tipo_categoria'
        ),
        'contain' => array(
            'Produto' => array('fields' => array('Produto.id','Produto.nome', 'Produto.promocao', 'Produto.foto_um')),
        ), 
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Categoria.id' => 'desc')    
    );

    public function setPaginateConditions(){
        $this->paginate['conditions']['Categoria.estabelecimento_id'] = $this->Auth->user('estabelecimento_id'); 
  
    }



    public function add($id = null){
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)){
            $this->Categoria->create();
        if ($this->Categoria->save($this->request->data)){
            $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
            $this->redirect('/categorias');
        }}
    }

    public function delete($id) {
        $this->Categoria->delete($id);
        $this->Flash->bootstrap('Excluido com êxito.', array('key' => 'success'));        
        $this->redirect('/categorias');
    }


    public function edit($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            if ($this->Categoria->saveAll($this->request->data)) {
                $this->Flash->bootstrap('Categoria alterado com sucesso!', array('key' => 'success'));
                $this->redirect('/categorias');
            }
        } else {
        $fields  = array(
            'Categoria.id',
            'Categoria.tipo_categoria',
        );
        $conditions = array('Categoria.id' => $id);
        $this->request->data = $this->Categoria->find('first', compact('fields', 'conditions'));
        }
    }


}
?>