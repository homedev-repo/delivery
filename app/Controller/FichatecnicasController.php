<?php
App::uses('AppController', 'Controller');

class FichatecnicasController  extends AppController
{
    public $paginate = array(
        'fields' => array(
            'Fichatecnica.id',
            'Fichatecnica.nome_preparacao'
        ),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Fichatecnica.id' => 'desc')
    );

    public function setPaginateConditions()
    {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if ($this->request->is('post') && !empty($this->request->data['Fichatecnica']['nome_preparacao'])) {
            $this->paginate['conditions']['Fichatecnica.nome_preparacao LIKE'] = '%' . trim($this->request->data['Fichatecnica']['nome_preparacao']) . '%';
        }
        $this->paginate['conditions']['Fichatecnica.estabelecimento_id'] = $this->Auth->user('estabelecimento_id');
    }

    public function add($id = null)
    {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            $this->Fichatecnica->create();
            if ($this->Fichatecnica->save($this->request->data)) {
                $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
                $this->redirect('/fichatecnicas');
            }
        }

        $estabelecimentoID = $this->Auth->user('estabelecimento_id');
        $conditions = array('Usuario.estabelecimento_id' => $estabelecimentoID);
        $fields = array('Usuario.id', 'Usuario.nome');
        $usuariosCadastrados = $this->Fichatecnica->Usuario->find('list', compact('fields', 'conditions'));
        $this->set('usuariosCadastrados', $usuariosCadastrados);

        $conditions = array('Produto.estabelecimento_id' => $estabelecimentoID);
        $fields = array('Produto.id', 'Produto.nome');
        $produtos = $this->Fichatecnica->Produto->find('list', compact('fields', 'conditions'));
        $this->set('produtos', $produtos);

 
    }

    public function delete($id)
    {
        $this->Fichatecnica->delete($id);
        $this->Flash->bootstrap('Excluido com êxito.', array('key' => 'success'));
        $this->redirect('/fichatecnicas');
    }

    public function edit($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            if ($this->Fichatecnica->saveAll($this->request->data)) {
                $this->Flash->bootstrap('Alterado com sucesso!', array('key' => 'success'));
                $this->redirect('/fichatecnicas');
            }
        } else {
            $conditions = array('Fichatecnica.id' => $id);
            $contain = array('Produto', 'Usuario');
            $this->request->data = $this->Fichatecnica->find('first', compact('conditions', 'contain'));
        }
        if (!empty($this->request->data['Fichatecnica']['data_alteracao'])) {
            $this->request->data['Fichatecnica']['data_alteracao'] = $this->Fichatecnica->userDate($this->request->data['Fichatecnica']['data_alteracao']);
        }

        $estabelecimentoID = $this->Auth->user('estabelecimento_id');
        $conditions = array('Usuario.estabelecimento_id' => $estabelecimentoID);
        $fields = array('Usuario.id', 'Usuario.nome');
        $usuariosCadastrados = $this->Fichatecnica->Usuario->find('list', compact('fields', 'conditions'));
        $this->set('usuariosCadastrados', $usuariosCadastrados);

        $conditions = array('Produto.estabelecimento_id' => $estabelecimentoID);
        $fields = array('Produto.id', 'Produto.nome');
        $produtos = $this->Fichatecnica->Produto->find('list', compact('fields', 'conditions'));
        $this->set('produtos', $produtos);
    }

    public function impressaoFichaTecnica($idFicha)
    {
        $this->layout = false;
        $this->response->type('pdf');
        $estabelecimento_id = $this->Auth->user('estabelecimento_id');
        $conditions = array( 'Fichatecnica.estabelecimento_id' => $estabelecimento_id, 'Fichatecnica.id' => $idFicha);
        $findFicha = $this->Fichatecnica->find('first', compact('conditions'));
        if (!empty($findFicha['Fichatecnica']['data_alteracao'])) {
            $findFicha['Fichatecnica']['data_alteracao'] = $this->Fichatecnica->userDate($findFicha['Fichatecnica']['data_alteracao']);
        }
        $this->set('findFicha', $findFicha);
    }
}
