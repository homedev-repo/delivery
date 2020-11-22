
<?php

App::uses('AppController', 'Controller');

class ProdutotamanhosController extends AppController{
    public $uses = array('Produtotamanho', 'Tipo', 'Tamanho');
    public $paginate = array (
         'fields' => array(
             'Produtotamanho.id', 
             'Produtotamanho.nome', 
             'Produtotamanho.valor',
             'Categoria.tipo_categoria',
             'Tipo.descricao',
             'Tipo.id'
        ),
         'condition' => array(),
         'limit' => 10,
         'order' => array ('Produtotamanho.id' => 'desc')
    );

    public function index(){
        parent::index();
        $fields = array('Categoria.id', 'Categoria.tipo_categoria');
        $categoria = $this->Produtotamanho->Categoria->find('list', compact('fields'));
        $this->set('categoria', $categoria);
    }

    public function setPaginateConditions() {
        $nome = '';
        $categoria = '';
        if ($this->request->is('post')) {
            $categoria = $this->request->data['Produtotamanho']['categoria_id'];
            $this->Session->write('Produtotamanho.categoria_id', $categoria);
            $nome = $this->request->data['Produtotamanho']['nome'];
            $this->Session->write('Produtotamanho.nome', $nome);
        } else {
            $categoria = $this->Session->read('Produtotamanho.categoria_id');
            $this->request->data('Produtotamanho.categoria_id', $categoria);
            $nome = $this->Session->read('Produtotamanho.nome');
            $this->request->data('Produtotamanho.nome', $nome);
        }
        if (!empty($categoria)) {
            $this->paginate['conditions']['Produtotamanho.categoria_id'] = $categoria;
        }
        if (!empty($nome)) {
            $this->paginate['conditions']['Produtotamanho.nome LIKE'] = '%' . trim($nome) . '%';
        }
        
        $this->paginate['conditions']['Produtotamanho.estabelecimento_id'] = $this->Auth->user('estabelecimento_id');
    }

    public function add() {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            $this->Produtotamanho->create();
            if ($this->Produtotamanho->save($this->request->data)) {
            $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
            $idTamanho = $this->request->data['Produtotamanho']['tipo_id'];
            $idProduto = $this->Produtotamanho->getInsertID();
      
            $this->redirect('/tamanhos/editTamanho/' . $idTamanho . ' / ' . $idProduto);
            }
        } 

        $estabelecimentoID = $this->Auth->user('estabelecimento_id');
        $conditions = array('Categoria.estabelecimento_id' => $estabelecimentoID);
        $fields = array('Categoria.id', 'Categoria.tipo_categoria');
        $categorias = $this->Produtotamanho->Categoria->find('list', compact('fields','conditions'));
        $conditions = array('Tipo.estabelecimento_id' => $estabelecimentoID);
        $fields = array('Tipo.id', 'Tipo.descricao');
        $tipos = $this->Produtotamanho->Tipo->find('list', compact('fields','conditions'));
       
        $this->set('tipos', $tipos);
        $this->set('categorias', $categorias);
    }
    
    public function edit($id = null, $idtipo = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }

        if (!empty($this->request->data)) {
            if ($this->Produtotamanho->saveAll($this->request->data)) {
                $this->Flash->bootstrap('Alterado com sucesso!', array('key' => 'success'));
                $this->redirect('/produtotamanhos');
            }
        } else {
            $estabelecimentoID = $this->Auth->user('estabelecimento_id');
            $conditions = array('Produtotamanho.id' => $id, 'Produtotamanho.estabelecimento_id' => $estabelecimentoID);
            $contain = array('Categoria', 'Tipo', 'Tamanho');
            $this->request->data = $this->Produtotamanho->find('first', compact('conditions', 'contain'));



            $this->request->data['Produtotamanho']['foto_visualizacao1'] = $this->request->data['Produtotamanho']['foto_um'];
            $conditions = array('Categoria.estabelecimento_id' => $estabelecimentoID);
            $fields = array('Categoria.id', 'Categoria.tipo_categoria');
            $categorias = $this->Produtotamanho->Categoria->find('list', compact('fields','conditions'));

            $conditions = array('Tipo.estabelecimento_id' => $estabelecimentoID);
            $fields = array('Tipo.id', 'Tipo.descricao');
            $tipos = $this->Produtotamanho->Tipo->find('list', compact('fields','conditions'));

            $fields = array('Tamanho.id','Tamanho.descricao', 'Tamanho.habilitar', 'Tamanho.produtotamanho_id', 'Tamanho.preco_custo', 'Tamanho.preco_venda');
            $conditions = array('Tamanho.tipo_id' => $idtipo, 'Tamanho.estabelecimento_id' => $estabelecimentoID);
            $findTiposETamanhosEdit = $this->Produtotamanho->Tamanho->find('all', compact('conditions','fields'));
  
            
            $this->set('tipos', $tipos);
            $this->set('findTiposETamanhosEdit', $findTiposETamanhosEdit );
            $this->set('categorias', $categorias);
        }
    }

    
    public function view($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        $conditions = array('Produtotamanho.id' => $id);
        $contain = array('Categoria', 'Tipo');
        $this->request->data = $this->Produtotamanho->find('first', compact('conditions', 'contain'));
        $estabelecimentoID = $this->Auth->user('estabelecimento_id');
        $conditions = array('Categoria.estabelecimento_id' => $estabelecimentoID);
        $fields = array('Categoria.id', 'Categoria.tipo_categoria');
        $categorias = $this->Produtotamanho->Categoria->find('list', compact('fields','conditions'));
        $conditions = array('Tipo.estabelecimento_id' => $estabelecimentoID);
        $fields = array('Tipo.id', 'Tipo.descricao');
        $tipos = $this->Produtotamanho->Tipo->find('list', compact('fields','conditions'));
        $this->set('tipos', $tipos);
        $this->set('categorias', $categorias);
    }


    public function impressaoRelatorioProdutos() {
        $this->layout = false;
        $this->response->type('pdf');
        $estabelecimento_id = $this->Auth->user('estabelecimento_id');
        $conditions = array('Produtotamanho.estabelecimento_id' => $estabelecimento_id);
        $findProdutos = $this->Produtotamanho->find('all', compact('conditions'));
        $somaTotal = $this->Produtotamanho->somaTotalProduto($estabelecimento_id);
        $this->set('findProdutos', $findProdutos);
        $this->set('somaTotal', $somaTotal);
    }

    public function impressaoMargemLucroProdutosTamanhos($idProduto) {
        $this->layout = false;
        $this->response->type('pdf');
        $estabelecimento_id = $this->Auth->user('estabelecimento_id'); 
        $fields = array('Produtotamanho.nome', 'Produtotamanho.valor', 'Produtotamanho.custo_produto');
        $conditions = array('Produtotamanho.estabelecimento_id' => $estabelecimento_id, 'Produtotamanho.id' => $idProduto );
        $findProduto = $this->Produtotamanho->find('first', compact('conditions', 'fields'));

        $valorDoProduto = $findProduto['Produtotamanho']['valor'];
        $valorDoDCustoDoProduto = $findProduto['Produtotamanho']['custo_produto'];

        $lucro = $valorDoProduto - $valorDoDCustoDoProduto;
        $margemDeLucro = ($lucro / $valorDoDCustoDoProduto) * 100;

        $findProduto['Produtotamanho']['valor'] = str_replace(array(",","."),array(".",","), $findProduto['Produtotamanho']['valor'] . ' ' . 'R$');
        $findProduto['Produtotamanho']['custo_produto'] = str_replace(array(",","."),array(".",","), $findProduto['Produtotamanho']['custo_produto'] . ' ' . 'R$');
        $findProduto['Produtotamanho']['MargemDeLucro'] = substr($margemDeLucro, 0, 5) . '%';
        $findProduto['Produtotamanho']['Lucro'] = $lucro . ' ' . 'R$';

        $this->set('findProduto', $findProduto);
    
    }

}

?>