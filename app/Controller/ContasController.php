<?php
App::uses('AppController', 'Controller');

class ContasController  extends AppController
{

    public $paginate = array(
        'fields' => array(
            'Conta.id',
            'Conta.tipoconta',
            'Conta.valor',
            'Conta.data_vencimento',
            'Conta.situacao'
        ),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Conta.id' => 'desc')
    );

    public function setPaginateConditions() {
        $situacao = '';
        $nome = '';
        if ($this->request->is('post')) {
            $situacao = $this->request->data['Conta']['situacao'];
            $this->Session->write('Conta.situacao', $situacao);

            $nome = $this->request->data['Conta']['tipoconta'];
            $this->Session->write('Conta.tipoconta', $nome);
        } else {
            $situacao = $this->Session->read('Conta.situacao');
            $this->request->data('Conta.situacao', $situacao);

            $nome = $this->Session->read('Conta.tipoconta');
            $this->request->data('Conta.tipoconta', $nome);
        }
        if (!empty($situacao)) {
            $this->paginate['conditions']['Conta.situacao'] = $situacao;
        }
        if (!empty($nome)) {
            $this->paginate['conditions']['Conta.tipoconta LIKE'] = '%' . trim($nome) . '%';
        }
        $this->paginate['conditions']['Conta.estabelecimento_id'] = $this->Auth->user('estabelecimento_id');

        $contas = $this->paginate();
        $this->set('contas', $contas);
    }

    public function add($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            $this->Conta->create();
            if ($this->Conta->save($this->request->data)) {
                $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
                $this->redirect('/contas');
            }
        }
    }

    public function delete($id) {
        $this->Conta->delete($id);
        $this->Flash->bootstrap('Excluido com êxito.', array('key' => 'success'));
        $this->redirect('/contas');
    }

    public function edit($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            if ($this->Conta->save($this->request->data)) {
                $this->Flash->bootstrap('Alterado com sucesso!', array('key' => 'success'));
                $this->redirect('/contas');
            }
        } else {
            $fields = array(
                'Conta.id',
                'Conta.tipoconta',
                'Conta.valor',
                'Conta.data_vencimento',
                'Conta.situacao'
            );
            $conditions = array('Conta.id' => $id);
            $this->request->data = $this->Conta->find('first', compact('fields', 'conditions'));
            if (!empty($this->request->data['Conta']['data_vencimento'])) {
                $this->request->data['Conta']['data_vencimento'] = $this->Conta->userDate($this->request->data['Conta']['data_vencimento']);
            }
        }
    }



    public function impressaoRelatorioContas() {
        $this->layout = false;
        $this->response->type('pdf');
        $estabelecimento_id = $this->Auth->user('estabelecimento_id');
        $fields = array('Conta.tipoconta', 'Conta.valor', 'Conta.data_vencimento');
        $conditions = array('Conta.estabelecimento_id' => $estabelecimento_id);
        $findContas = $this->Conta->find('all', compact('conditions', 'fields'));

        $somaTotal = $this->Conta->impressaoContas($estabelecimento_id);

        $detalhe = array();
        foreach ($findContas as $conta) {
            $year = substr($conta['Conta']['data_vencimento'], 0, 4);
            $month = substr($conta['Conta']['data_vencimento'], 5, 2);
            $day = substr($conta['Conta']['data_vencimento'], 8, 2);
            $conta['Conta']['data_vencimento']  =  $day . '/' . $month . '/' . $year;
            $dataContaCliente = $conta['Conta']['data_vencimento'];

        }

        $detalhe[] = array(        
            $conta['Conta']['tipoconta'],
            $conta['Conta']['valor'],
            $conta['Conta']['data_vencimento'],
        );


        $this->set('detalhe', $detalhe);
        $this->set('somaTotal', $somaTotal);
    }
}
