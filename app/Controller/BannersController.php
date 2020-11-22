<?php
App:: uses('AppController', 'Controller');

    class BannersController  extends AppController {
        public $paginate = array (
            'fields' => array(
                'Banner.id',
                'Banner.nome',
                'Banner.foto_um',
                'Banner.acao_id'
            ),
            'contain' => array(
                'Produto' => array('fields' => array('Produto.nome')),
            ),
            'condition' => array(),
            'limit' => 10,
            'order' => array ('Banner.id' => 'desc')
        );
        
        public function index(){
            parent::index();
            $estabelecimentoID = $this->Auth->user('estabelecimento_id');
            $conditions = array('Banner.estabelecimento_id' => $estabelecimentoID);
            $countBanner = $this->Banner->find('count', compact('conditions'));
            $this->set('countBanner', $countBanner);
        }
        public function setPaginateConditions(){
            $nome = '';
            if ($this->request->is('post')) {
                $nome = $this->request->data['Banner']['nome'];
                $this->Session->write('Banner.nome', $nome);
            } else {
                $nome = $this->Session->read('Banner.nome');            
                $this->request->data('Banner.nome', $nome);
            }
            if (!empty($nome)) {
                $this->paginate['conditions']['Banner.nome LIKE'] = '%' .trim($nome) . '%';
            } 
            $this->paginate['conditions']['Banner.estabelecimento_id'] = $this->Auth->user('estabelecimento_id');

        }
    
        public function add() {
            if ($this->request->is('ajax')) {
                $this->layout = false;
            }
            if (!empty($this->request->data)) {
                $this->Banner->create();
                if ($this->Banner->save($this->request->data)) {
                $this->Flash->bootstrap('Banner gravado com sucesso!', array('key' => 'success'));
                $this->redirect('/banners');
                }
            } 
            $estabelecimentoID = $this->Auth->user('estabelecimento_id');
            $conditions = array('Produto.estabelecimento_id' => $estabelecimentoID);
            $fields = array('Produto.id', 'Produto.nome');
            $Produto = $this->Banner->Produto->find('list', compact('fields','conditions'));
            $this->set('Produto', $Produto);  
        }

        public function delete($id) {
            $this->Banner->delete($id);
            $this->Flash->bootstrap('Excluido com êxito.', array('key' => 'success'));
                        
            $this->redirect('/banners');
        }

        public function edit($id = null) {
            if ($this->request->is('ajax')) {
                $this->layout = false;
            }
            if (!empty($this->request->data)) {
                if ($this->Banner->saveAll($this->request->data)) {
                    $this->Flash->bootstrap('Alterado com sucesso!', array('key' => 'success'));
                    $this->redirect('/banners');
                }
            } else {
            $fields  = array(
                'Banner.id',
                'Banner.nome',
                'Banner.foto_um',
                'Banner.acao_id',
                'Banner.produto_id'
            );
            $conditions = array('Banner.id' => $id);
            $this->request->data = $this->Banner->find('first', compact('fields', 'conditions'));
        }

        $estabelecimentoID = $this->Auth->user('estabelecimento_id');
        $conditions = array('Produto.estabelecimento_id' => $estabelecimentoID);
        $fields = array('Produto.id', 'Produto.nome');
        $Produto = $this->Banner->Produto->find('list', compact('fields','conditions'));
        $this->set('Produto', $Produto);  
    }
    
    public function view($id = null){ 
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        $fields = array(
            'Banner.id',
            'Banner.nome',
            'Banner.foto_um',
            'Banner.acao_id',
            'Banner.produto_id'
        );
        $conditions = array('Banner.id' => $id);
        $this->request->data = $this->Banner->find('first', compact('fields', 'conditions'));
        $fields = array('Produto.nome');
        $Produto = $this->Banner->Produto->find('list', compact('fields'));
        $this->set('Produto', $Produto); 
    }

}
    
    
?>