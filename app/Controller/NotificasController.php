<?php

App::uses('AppController', 'Controller');

class NotificasController extends AppController{
  
    public function delete($id) {
        $this->Notifica->delete($id);
        $this->Flash->bootstrap('Excluido com êxito.', array('key' => 'success'));         
        $this->redirect('/dashboards');
    }

    public function notificacoesFind() {
        $this->autoRender = $this->layout = false;
        $estabelecimentoid = $this->Auth->user('estabelecimento_id');
        $conditions = array('Notifica.estabelecimento_id' => $estabelecimentoid);
        $findNotificacoes = $this->Notifica->find('all', compact('conditions'));
        $this->response->type('json');
        
        return json_encode($findNotificacoes);
    }

}