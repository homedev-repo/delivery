<?php
App::uses('AppController', 'Controller');

class RestricaosController extends AppController {
    public $uses = array('Restricao');
    public function add($idProduto) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }

        if (!empty($this->request->data)) {
            $this->Restricao->create();
            if ($this->Restricao->save($this->request->data)) {
                $this->Flash->bootstrap('Cliente gravado com sucesso!', array('key' => 'success'));
                $this->redirect('/clientes');
            }
        }
        $fields = array('Restricaos.nome');
        $categorias = $this->Restricao->find('all');
        debug($categorias);
        exit;
        $this->set('restricoesAlimentar', $restricoesAlimentar);
    }

    public function delete($id) {
        $this->Cliente->delete($id);
        $this->Flash->bootstrap('Excluido com êxito.', array('key' => 'success'));

        $this->redirect('/categorias');
    }
}
