
<?php

App::uses('AppController', 'Controller');

class FornecedoresController extends AppController{

    public $paginate = array (
         'fields' => array(
             'Fornecedore.id', 
             'Fornecedore.nome', 
             'Fornecedore.cnpj',
             'Fornecedore.telefone',
        ),
         'condition' => array(),
         'limit' => 10,
         'order' => array ('Fornecedore.id' => 'desc')
    );
 
    public function setPaginateConditions()
    {
        $nomeOrCnpj= '';
        if ($this->request->is('post')) {
            $nomeOrCnpj = $this->request->data['Fornecedore']['nomeCnpj'];
            $this->Session->write('Fornecedore.nomeCnpj', $nomeOrCnpj);
        } else {
            $nomeOrCnpj = $this->Session->read('Fornecedore.nomeCnpj');
            $this->request->data('Fornecedore.nomeCnpj', $nomeOrCnpj);
        }
        if (!empty($nomeOrCnpj)) {
            $this->paginate['conditions']['Fornecedore.nomeCnpj LIKE'] = '%' . trim($nomeOrCnpj) . '%';
        }
        $this->paginate['conditions']['Fornecedore.estabelecimento_id'] = $this->Auth->user('estabelecimento_id');
    }

    public function add() {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            $this->Fornecedore->create();
            if ($this->Fornecedore->save($this->request->data)) {
            $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
            $this->redirect('/fornecedores');
            }
        } 
    }

    public function edit($id = null) {

        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            if ($this->Fornecedore->saveAll($this->request->data)) {
                $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
                $this->redirect('/custofixos');
            }
        } else {
            $conditions = array('Fornecedore.id' => $id);
            $this->request->data = $this->Fornecedore->find('first', compact('conditions', 'contain'));
            
        }
        
    }

    
    public function view($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        $conditions = array('Fornecedore.id' => $id);
        $this->request->data = $this->Fornecedore->find('first', compact('conditions', 'contain'));
    }

    public function delete($id) {
        $this->Fornecedore->delete($id);
        $this->Flash->bootstrap('Excluido com êxito.', array('key' => 'success'));         
        $this->redirect('/fornecedores');
    }

}

?>