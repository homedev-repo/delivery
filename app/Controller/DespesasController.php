<?php
App:: uses('AppController', 'Controller');

class DespesasController  extends AppController {
    public $uses = array('Despesa', 'Categoriadespesa');

    public $paginate = array(
        'fields' => array(
            'Despesa.id', 
            'Despesa.custo',
            'Categoriadespesa.categoria',
            'Despesa.valor',
            'Despesa.data_vencimento'
        ),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Despesa.id' => 'desc')    
    );

    public function index(){
        parent::index();
        $fields = array('Categoriadespesa.id', 'Categoriadespesa.categoria');
        $categoriaDespesas = $this->Despesa->Categoriadespesa->find('list', compact('fields'));
        $this->set('categoriaDespesas', $categoriaDespesas);
    }

    public function setPaginateConditions() {
        $nomeCusto = '';
        $situacao = '';
        if ($this->request->is('post')) {
            $situacao = $this->request->data['Despesa']['categoriadespesa_id'];
            $this->Session->write('Despesa.categoriadespesa_id', $situacao);

            $nomeCusto = $this->request->data['Despesa']['custo'];
            $this->Session->write('Despesa.custo', $nomeCusto);
        } else {
            $situacao = $this->Session->read('Despesa.categoriadespesa_id');
            $this->request->data('Despesa.categoriadespesa_id', $situacao);

            $nomeCusto = $this->Session->read('Despesa.custo');
            $this->request->data('Despesa.custo', $nomeCusto);
        }
        if (!empty($situacao)) {
            $this->paginate['conditions']['Despesa.categoriadespesa_id'] = $situacao;
        }
        if (!empty($nomeCusto)) {
            $this->paginate['conditions']['Despesa.custo LIKE'] = '%' . trim($nomeCusto) . '%';
        }
        $this->paginate['conditions']['Despesa.estabelecimento_id'] = $this->Auth->user('estabelecimento_id');
    }

    public function add($id = null){
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)){
            $this->Despesa->create();
    
        if ($this->Despesa->save($this->request->data)){
            $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
            $this->redirect('/despesas');
        }}

        $fields = array('Categoriadespesa.id', 'Categoriadespesa.categoria');
        $categoriaDespesa = $this->Despesa->Categoriadespesa->find('list', compact('fields'));
        $this->set('categoriaDespesa', $categoriaDespesa);
    }
    

    public function edit($id = null) {

        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            if ($this->Despesa->saveAll($this->request->data)) {
                $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
                $this->redirect('/despesas');
            }
        } else {
            $conditions = array('Despesa.id' => $id);
            $contain = array('Categoriadespesa');
            $this->request->data = $this->Despesa->find('first', compact('conditions', 'contain'));
            if (!empty($this->request->data['Despesa']['data_compra'])) {
                $this->request->data['Despesa']['data_compra'] = $this->Despesa->userDate($this->request->data['Despesa']['data_compra']);
            }
            if (!empty($this->request->data['Despesa']['data_vencimento'])) {
                $this->request->data['Despesa']['data_vencimento'] = $this->Despesa->userDate($this->request->data['Despesa']['data_vencimento']);
            }
            if (!empty($this->request->data['Despesa']['valor'])) {
                $valorFormatado = str_replace(array(",","."),array(".",","), $this->request->data['Despesa']['valor']);
                $this->request->data['Despesa']['valor'] = $valorFormatado;
            }
        }
        
        $fields = array('Categoriadespesa.id', 'Categoriadespesa.categoria');
        $categoriaDespesa = $this->Despesa->Categoriadespesa->find('list', compact('fields'));
        $this->set('categoriaDespesa', $categoriaDespesa);
    }

    public function view($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        $conditions = array('Despesa.id' => $id);
        $this->request->data = $this->Despesa->find('first', compact('conditions'));
        if (!empty($this->request->data['Despesa']['data_vencimento'])) {
            $this->request->data['Despesa']['data_vencimento'] = $this->Despesa->userDate($this->request->data['Despesa']['data_vencimento']);
        }
        if (!empty($this->request->data['Despesa']['data_compra'])) {
            $this->request->data['Despesa']['data_compra'] = $this->Despesa->userDate($this->request->data['Despesa']['data_compra']);
        }
        $fields = array('Categoriadespesa.id', 'Categoriadespesa.categoria');
        $categoriaDespesa = $this->Despesa->Categoriadespesa->find('list', compact('fields'));
        $this->set('categoriaDespesa', $categoriaDespesa);
    }

	public function impressaoRelatorioDespesa() {
        $this->layout = false;
        $this->response->type('pdf');
        $estabelecimento_id = $this->Auth->user('estabelecimento_id');
        $conditions = array('Despesa.estabelecimento_id' => $estabelecimento_id);
        $findGastos = $this->Despesa->find('all', compact('conditions'));
        $somaTotal = $this->Despesa->impressaoDespesa($estabelecimento_id);
        $this->set('findGastos', $findGastos);
        $this->set('somaTotal', $somaTotal);
	}
}
?>