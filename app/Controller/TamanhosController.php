<?php
App::uses('AppController', 'Controller');

    class TamanhosController extends AppController{

        public function delete($id) {
            $this->Tamanho->delete($id);
        }

        public function editTamanho($idTamanho = null, $idProduto = null) {
            if ($this->request->is('ajax')) {
                $this->layout = false;
            }
            if (!empty($this->request->data)) {
                foreach($this->request->data['Tamanho'] as $tamanho){
                    if($tamanho['habilitar'] == '1') {
                        if ($this->Tamanho->saveAll($this->request->data['Tamanho'])) {
                        $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
                        $this->redirect('/produtotamanhos');
                        }
                    }
                }
            } else {
                $conditions = array('Tamanho.tipo_id' => $idTamanho);
                $this->request->data = $this->Tamanho->find('all', compact('conditions'));

                $this->set('idProduto', $idProduto);
            }
    }

    public function edit($idTamanho = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
                    if ($this->Tamanho->save($this->request->data['Tamanho'])) {
                    $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
                    $this->redirect('/produtotamanhos');
                    }
        } else {
            $conditions = array('Tamanho.id' => $idTamanho);
            $this->request->data = $this->Tamanho->find('first', compact('conditions'));
        }
    }

}
?>