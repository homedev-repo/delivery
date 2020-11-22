<?php
App:: uses('AppController', 'Controller');

class FacebooksController extends AppController {
   
    public function add()
    {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            if ($this->Cupom->save($this->request->data)) {
                $atribuirCupom = $this->request->data['Cupom']['atribuir_cupom'];
                $CupomDesativado =  $this->request->data['Cupom']['situacao'];
                if ($atribuirCupom  == 'Sim' && $CupomDesativado == 'Ativo') {
                    $fields = array('Cliente.nome', 'Cliente.email');
                    $conditions = array('Cliente.id' => $this->request->data['Cupom']['cliente_id']);
                    $clientes = $this->Cupom->Cliente->find('all', compact('fields', 'conditions'));
                    $emailCliente = $clientes[0]['Cliente']['email'];
                    $nomeCliente = $clientes[0]['Cliente']['nome'];
                    $numeroCupom = $this->request->data['Cupom']['numero_cupom'];
                    $nomeEstabelecimento = $this->Auth->user()['Estabelecimento']['nome_fantasia'];
                    $emailEnviado = $this->Cupom->send_my_email($emailCliente, $nomeCliente, $numeroCupom, $nomeEstabelecimento);
                }
                $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
                $this->redirect('/cupoms');
            }
        }

    }


}



?>