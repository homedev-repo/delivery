<?php

App::uses('AppController', 'Controller');
class CupomsController extends AppController
{

    public $paginate = array(
        'fields' => array(
            'Cupom.id',
            'Cupom.numero_cupom',
            'Cupom.total_desconto',
            'Cupom.situacao',
            'Cupom.validade',
            'Cupom.atribuir_cupom',
            'Cliente.nome'
        ),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Cupom.id' => 'desc'),
    );

    public function setPaginateConditions() {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if ($this->request->is('post') && !empty($this->request->data['Cupom']['numero_cupom'])) {
            $this->paginate['conditions']['Cupom.numero_cupom LIKE'] = '%' . trim($this->request->data['Cupom']['numero_cupom']) . '%';
        }
        $this->paginate['conditions']['Cupom.estabelecimento_id'] = $this->Auth->user('estabelecimento_id');

        $cupoms = $this->paginate();
        $this->set('cupoms', $cupoms);
    }

    public function index() {
        parent::index();
        $atualizado = $this->Session->read('Atualizado');
        if (empty($atualizado)) {
            $estabelecimentoId = $this->Auth->user('estabelecimento_id');
            $this->Cupom->atualizarVencidos($estabelecimentoId);
            $this->Session->write('Atualizado', 'Sim');
        }
    }

    public function add() {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            $this->Cupom->create();
            if ($this->Cupom->save($this->request->data)) {
                $atribuirCupom = $this->request->data['Cupom']['atribuir_cupom'];
                $CupomDesativado =  $this->request->data['Cupom']['situacao'];
                if ($atribuirCupom  == 'Sim' && $CupomDesativado == 1) {
                    $fields = array('Cliente.nome', 'Cliente.email');
                    $conditions = array('Cliente.id' => $this->request->data['Cupom']['cliente_id']);
                    $clientes = $this->Cupom->Cliente->find('all', compact('fields', 'conditions'));
                    $emailCliente = $clientes[0]['Cliente']['email'];
                    $nomeCliente = $clientes[0]['Cliente']['nome'];
                    $numeroCupom = $this->request->data['Cupom']['numero_cupom'];
                    $vailidade = $this->request->data['Cupom']['validade'];
                    $nomeEstabelecimento = $this->Auth->user()['Estabelecimento']['nome_fantasia'];
                    $emailEnviado = $this->Cupom->enviaEmail($emailCliente, $nomeCliente, $numeroCupom, $nomeEstabelecimento, $vailidade);
                }
                $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
                $this->redirect('/cupoms');
            }
        }
        $fields = array('Cliente.nome');
        $estabelecimentoID = $this->Auth->user('estabelecimento_id');
        $conditions = array('Cliente.estabelecimento_id' => $estabelecimentoID);
        $clientes = $this->Cupom->Cliente->find('list', compact('fields', 'conditions'));
        $this->set('clientes', $clientes);
    }



    public function edit($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            if ($this->Cupom->saveAll($this->request->data)) {
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
                $this->Flash->bootstrap('Alterado com sucesso!', array('key' => 'success'));
                $this->redirect('/cupoms');
            }
        } else {
            $conditions = array('Cupom.id' => $id);
            $contain = array('Cliente');
            $this->request->data = $this->Cupom->find('first', compact('conditions', 'contain'));
            if (!empty($this->request->data['Cupom']['validade'])) {
                $this->request->data['Cupom']['validade'] = $this->Cupom->userDate($this->request->data['Cupom']['validade']);
            }
        }

        $fields = array('Cliente.nome');
        $clientes = $this->Cupom->Cliente->find('list', compact('fields'));
        $this->set('clientes', $clientes);
    }



    public function view($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        $conditions = array('Cupom.id' => $id);
        $contain = array('Cliente');
        $this->request->data = $this->Cupom->find('first', compact('conditions', 'contain'));

        $fields = array('Cliente.nome');
        $clientes = $this->Cupom->Cliente->find('list', compact('fields'));
        $this->set('clientes', $clientes);
    }

    public function delete($id) {
        $this->Cupom->delete($id);
        $this->Flash->bootstrap('Excluido com êxito.', array('key' => 'success'));
        $this->redirect('/cupoms');
    }
}
