<?php
App::uses('AppController', 'Controller');
class ClientesController extends AppController {
    public $uses = array('Cliente', 'Situacao', 'Pedido');
    public $paginate = array(
        'fields' => array(
            'Cliente.id',
            'Cliente.nome',
            'Cliente.cpf',
            'Cliente.situacao_id',
            'Situacao.nome'
        ),
        'contain' => array(
            'Pedido' => array('fields' => array('Pedido.numero_pedido')),
            'Situacao' => array('fields' => array('Situacao.nome')),
        ),
        'condition' => array(),
        'limit' => 10,
        'order' => array('Cliente.id' => 'desc')
    );

    public function setPaginateConditions()
    {
        $nomeOrCpf = '';
        $situacao = '';
        if ($this->request->is('post')) {
            $situacao = $this->request->data['Cliente']['situacao_id'];
            $this->Session->write('Cliente.situacao_id', $situacao);

            $nomeOrCpf = $this->request->data['Cliente']['nomeCpf'];
            $this->Session->write('Cliente.nomeCpf', $nomeOrCpf);
        } else {
            $situacao = $this->Session->read('Cliente.situacao_id');
            $this->request->data('Cliente.situacao_id', $situacao);

            $nomeOrCpf = $this->Session->read('Cliente.nomeCpf');
            $this->request->data('Cliente.nomeCpf', $nomeOrCpf);
        }
        if (!empty($situacao)) {
            $this->paginate['conditions']['Cliente.situacao_id'] = $situacao;
        }
        if (!empty($nomeOrCpf)) {
            $this->paginate['conditions']['Cliente.nomeCpf LIKE'] = '%' . trim($nomeOrCpf) . '%';
        }
        $this->paginate['conditions']['Cliente.estabelecimento_id'] = $this->Auth->user('estabelecimento_id');
    }

    public function add()
    {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            $this->Cliente->create();
            if ($this->Cliente->save($this->request->data)) {
                $this->Flash->bootstrap('Cliente gravado com sucesso!', array('key' => 'success'));
                $this->redirect('/clientes');
            }
        }
    }

    public function delete($id)
    {
        $this->Cliente->delete($id);
        $this->Flash->bootstrap('Excluido com êxito.', array('key' => 'success'));

        $this->redirect('/clientes');
    }

    public function view($id = null)
    {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        $fields  = array(
            'Cliente.id',
            'Cliente.nome',
            'Cliente.telefone_celular',
            'Cliente.telefone_residencial',
            'Cliente.email',
            'Cliente.cpf',
            'Cliente.endereco',
            'Cliente.complemento',
            'Cliente.bairro',
            'Cliente.numero',
            'Cliente.cep',
            'Situacao.nome',
            'Cliente.justificativa',
            'Cliente.situacao_id'
        );
        $contain = array(
            'Pedido' => array(
                'order' => array('Pedido.numero_pedido' => 'desc')
            )
        );
        $conditions = array('Cliente.id' => $id);
        $this->request->data = $this->Cliente->find('first', compact('fields', 'conditions', 'contain'));
    }

    public function edit($id = null)
    {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            if ($this->Cliente->saveAll($this->request->data)) {
                $this->Flash->bootstrap('Cliente alterado com sucesso!', array('key' => 'success'));
                $this->redirect('/clientes');
            }
        } else {
            $fields  = array(
                'Cliente.id',
                'Cliente.situacao_id',
                'Cliente.justificativa'
            );
            $conditions = array('Cliente.id' => $id);
            $this->request->data = $this->Cliente->find('first', compact('fields', 'conditions'));
        }
    }
    public function impressaoRelatorioClientes()
    {
        $this->layout = false;
        $this->response->type('pdf');
        $estabelecimento_id = $this->Auth->user('estabelecimento_id');
        $servicoId = $this->Session->read();
        if (!empty($servicoId['Cliente']['situacao_id'])) {
            $conditions = array('Cliente.situacao_id' => $servicoId['Cliente']['situacao_id'], 'Cliente.estabelecimento_id' => $estabelecimento_id);
        } else {
            $servicoId['Cliente']['situacao_id'] = '';
            $conditions = array('Cliente.estabelecimento_id' => $estabelecimento_id);
        }

        $impressaoClientes = $this->Cliente->find('all', compact('conditions'));
        $quantidadeCliente = $this->Cliente->relatorioClienteQuantidade($servicoId, $conditions);
        if (empty($servicoId['Cliente']['situacao_id'])) {
            $impressaoClientes[0]['Cliente']['nomeRelatorio'] = 'Todos';
        } else {
            $impressaoClientes[0]['Cliente']['nomeRelatorio'] = $impressaoClientes[0]['Situacao']['nome'];
        }

        $this->set('impressaoClientes', $impressaoClientes);
        $this->set('quantidadeCliente', $quantidadeCliente);
    }

    public function impressaoDadosView($id)
    {
        $this->layout = false;
        $this->response->type('pdf');
        $estabelecimento_id = $this->Auth->user('estabelecimento_id');
        $conditions = array('Cliente.estabelecimento_id' => $estabelecimento_id, 'Cliente.id' => $id);
        $impressaoClientesDadosView = $this->Cliente->find('first', compact('conditions'));
  
        $this->set('impressaoClientesDadosView', $impressaoClientesDadosView);
    }


    public function relatorioRegioesAtendidas()
    {
        $this->layout = false;
        $this->response->type('pdf');
        $estabelecimento_id = $this->Auth->user('estabelecimento_id');
        $fields = array('Cliente.endereco', 'Cliente.bairro');
        $conditions = array('Cliente.estabelecimento_id' => $estabelecimento_id);
        $findEnderecoClientes = $this->Cliente->find('all', compact('conditions', 'fields'));

        $somaTotal = $this->Cliente->somaDeRegioes($estabelecimento_id);
        $this->set('findEnderecoClientes', $findEnderecoClientes);
        $this->set('somaTotal', $somaTotal);
    }
}
