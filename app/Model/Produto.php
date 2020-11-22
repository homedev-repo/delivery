
<?php
App::uses('AppModel', 'Model');
    
class Produto extends AppModel {

    public $belongsTo = array (
        'Categoria'
    );


    public $validate = array(
        'foto_um' => array(
            'fileSize' => array('rule' => array('fileSize', '<=', '200KB'), 'message' => 'A imagem deve ter menos de 200KB'),
            'extension' => array ('rule' => array('extension', array( 'png', 'jpg')), 'message' => 'Formato de imagem invalido, utilize  .png ou .jpg')
        ),
        'valor' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
        ),
        'categoria_id' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
        ),
        'nome' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
        ),
        'promocao' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
        ),
        'valor_promocao' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
        ),
        'descricao' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
        ),
        'custo_produto' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
        ),
    );

    public function beforeValidate($options = array()){
        if (!empty($this->data)) {
            if ($this->data['Produto']['promocao'] == 'Nao') {
             $this->validator()->remove('foto_um');
             $this->validator()->remove('valor');
             $this->validator()->remove('categoria_id');
             $this->validator()->remove('nome');
             $this->validator()->remove('valor_promocao');
             $this->validator()->remove('descricao');
             $this->validator()->remove('custo_produto');
            }
        } 
    }

    public function beforeSave($options = array()) {
        $nomeDaImagem = array("um", "dois");
        foreach ($nomeDaImagem as $value) {
            if (!empty($this->data['Produto']['foto_' . $value])) {
                if (is_uploaded_file($this->data['Produto']['foto_' . $value]['tmp_name'])) {
                        $tipo = substr($this->data['Produto']['foto_' . $value]['name'], -4);
                        $this->data['Produto']['foto_' . $value]['name'] = $this->data['Produto']['estabelecimento_id'] . '-foto-' . $value . date("YmdHis") . $tipo;
                        move_uploaded_file($this->data['Produto']['foto_' . $value]['tmp_name'], PRODUTO . DS . $this->data['Produto']['foto_' . $value]['name']);
                        $this->data['Produto']['foto_' . $value] = $this->data['Produto']['foto_' . $value]['name'];
                } else {
                    $this->data['Produto']['foto_' . $value] = null;
                }
            }
        }

        $continue = true;
        if (!empty($this->data['Produto']['valor'])) {
            $data = str_replace(',', '.', $this->data['Produto']['valor']);
            $this->data['Produto']['valor'] = $data;  
  
        }
        return $continue;

    }



    public function somaTotalProduto($estabelecimento_id) {
        $this->virtualFields = array(
            'somaTotal' => "count(Produto.id)"
        );
        $fields = array(
            'Produto.somaTotal',
        );
        $conditions = array('Produto.estabelecimento_id' => $estabelecimento_id);
        $somaTotal = $this->find('all', compact('fields', 'conditions'));
    
        return $somaTotal;
    }
}

?>