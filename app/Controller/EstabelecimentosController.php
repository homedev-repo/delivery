<?php
App:: uses('AppController', 'Controller');

class EstabelecimentosController extends AppController{

    public function edit($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            if ($this->Estabelecimento->save($this->request->data)) {
                $this->Flash->bootstrap('Estabelecimento alterado com sucesso!', array('key' => 'success'));
                $this->redirect('/dashboards');
            }
        } else {
            if (empty($id)) {
                $id = $this->Auth->user('estabelecimento_id');
                $conditions = array('Estabelecimento.id' => $id);
                $this->request->data = $this->Estabelecimento->find('first', compact('conditions'));
                $this->request->data['Estabelecimento']['foto_visualizacao'] = $this->request->data['Estabelecimento']['brasao']; 
            }
        }
    }
}

?>