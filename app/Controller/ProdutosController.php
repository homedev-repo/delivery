
<?php

App::uses('AppController', 'Controller');

class ProdutosController extends AppController{
    public $uses = array('Produto', 'Categoria', 'Complemento');

    public $paginate = array (
         'fields' => array(
             'Produto.id', 
             'Produto.nome', 
             'Produto.valor',
             'Categoria.tipo_categoria',
        ),
        'contain' => array(
            'Complemento' => array('fields' => array('Complemento.nome'))
        ),
         'condition' => array(),
         'limit' => 10,
         'order' => array ('Produto.id' => 'desc')
    );
 
    public function index(){
        parent::index();
        $fields = array('Categoria.id', 'Categoria.tipo_categoria');
        $categoria = $this->Produto->Categoria->find('list', compact('fields'));
        $this->set('categoria', $categoria);
    }

    public function setPaginateConditions() {
        $nome = '';
        $categoria = '';
        if ($this->request->is('post')) {
            $categoria = $this->request->data['Produto']['categoria_id'];
            $this->Session->write('Produto.categoria_id', $categoria);
            $nome = $this->request->data['Produto']['nome'];
            $this->Session->write('Produto.nome', $nome);
        } else {
            $categoria = $this->Session->read('Produto.categoria_id');
            $this->request->data('Produto.categoria_id', $categoria);
            $nome = $this->Session->read('Produto.nome');
            $this->request->data('Produto.nome', $nome);
        }
        if (!empty($categoria)) {
            $this->paginate['conditions']['Produto.categoria_id'] = $categoria;
        }
        if (!empty($nome)) {
            $this->paginate['conditions']['Produto.nome LIKE'] = '%' . trim($nome) . '%';
        }
        
        $this->paginate['conditions']['Produto.estabelecimento_id'] = $this->Auth->user('estabelecimento_id');
    }

    public function add($idCategoria = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            $this->Produto->create();
            if ($this->Produto->save($this->request->data)) {
                $this->redirect('/categorias');
                $this->Flash->bootstrap('Produto cadastrado com sucesso!', array('key' => 'success'));
            }
        } 
        $estabelecimentoID = $this->Auth->user('estabelecimento_id');
        $conditions = array('Categoria.estabelecimento_id' => $estabelecimentoID, 'Categoria.id'  => $idCategoria);
        $fields = array('Categoria.id', 'Categoria.tipo_categoria');
        $categorias = $this->Produto->Categoria->find('list', compact('fields','conditions'));
        $this->set('categorias', $categorias);
    }

    public function edit($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            if ($this->Produto->saveAll($this->request->data)) {
                $this->Flash->bootstrap('Alterado com sucesso!', array('key' => 'success'));
                $this->redirect('/produtos');
            }
        } else {
            $conditions = array('Produto.id' => $id);
            $contain = array('Categoria');
            $this->request->data = $this->Produto->find('first', compact('conditions', 'contain'));
        }
        $this->request->data['Produto']['foto_visualizacao1'] = $this->request->data['Produto']['foto_um'];

        $estabelecimentoID = $this->Auth->user('estabelecimento_id');
        $conditions = array('Categoria.estabelecimento_id' => $estabelecimentoID);
        $fields = array('Categoria.id', 'Categoria.tipo_categoria');
        $categorias = $this->Produto->Categoria->find('list', compact('fields','conditions'));
        $this->set('categorias', $categorias);
    }

    
    public function view($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        $conditions = array('Produto.id' => $id);
        $contain = array('Categoria', 'Complemento');
        $this->request->data = $this->Produto->find('first', compact('conditions', 'contain'));
        $estabelecimentoID = $this->Auth->user('estabelecimento_id');
       
        $conditions = array('Categoria.estabelecimento_id' => $estabelecimentoID);
        $fields = array('Categoria.id', 'Categoria.tipo_categoria');
        $categorias = $this->Produto->Categoria->find('list', compact('fields'));
        $this->set('categorias', $categorias);
    }

    public function delete($id) {
        $this->Produto->delete($id);
        $this->Flash->bootstrap('Excluido com êxito.', array('key' => 'success'));         
        $this->redirect('/produtos');
    }

    public function impressaoRelatorioProdutos() {
        $this->layout = false;
        $this->response->type('pdf');
        $estabelecimento_id = $this->Auth->user('estabelecimento_id');
        $conditions = array('Produto.estabelecimento_id' => $estabelecimento_id);
        $findProdutos = $this->Produto->find('all', compact('conditions'));
        $somaTotal = $this->Produto->somaTotalProduto($estabelecimento_id);
        $this->set('findProdutos', $findProdutos);
        $this->set('somaTotal', $somaTotal);
    }

    public function impressaoMargemLucroProdutos($idProduto) {
        $this->layout = false;
        $this->response->type('pdf');
        $estabelecimento_id = $this->Auth->user('estabelecimento_id'); 
        $fields = array('Produto.nome', 'Produto.valor', 'Produto.custo_produto');
        $conditions = array('Produto.estabelecimento_id' => $estabelecimento_id, 'Produto.id' => $idProduto );
        
        $findProduto = $this->Produto->find('first', compact('conditions', 'fields'));
        $valorDoProduto = $findProduto['Produto']['valor'];
        $valorDoDCustoDoProduto = $findProduto['Produto']['custo_produto'];
        $lucro = $valorDoProduto - $valorDoDCustoDoProduto;
        $divisao = $lucro / $valorDoDCustoDoProduto;
        $margemDeLucro = $divisao * 100;
        $findProduto['Produto']['valor'] = str_replace(array(",","."),array(".",","), $findProduto['Produto']['valor'] . ' ' . 'R$');
        $findProduto['Produto']['custo_produto'] = str_replace(array(",","."),array(".",","), $findProduto['Produto']['custo_produto'] . ' ' . 'R$');
        $findProduto['Produto']['MargemDeLucro'] = substr($margemDeLucro, 0, 5) . '%';
        $findProduto['Produto']['Lucro'] = $lucro . ' ' . 'R$';

        $this->set('findProduto', $findProduto);
    
    }
}

?>