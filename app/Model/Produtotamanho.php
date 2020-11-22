
<?php
App::uses('AppModel', 'Model');
    
class Produtotamanho extends AppModel {

    public $belongsTo = array (
        'Categoria', 'Tipo'
    );

    public $hasMany = array (
        'Tamanho'
    ); 


    public $validate = array(
        'foto_um' => array(
            'fileSize' => array('rule' => array('fileSize', '<=', '1MB'), 'message' => 'A imagem deve ter menos de 1MG'),
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
        'desabilitar' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
        ),
        'descricao' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
        ),
        'tipo_id' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
        ),
    );

   
    
    public function beforeSave($options = array()) {
        $nomeDaImagem = array("um", "dois");
        foreach ($nomeDaImagem as $value) {
            if (!empty($this->data['Produtotamanho']['foto_' . $value])) {
                if (is_uploaded_file($this->data['Produtotamanho']['foto_' . $value]['tmp_name'])) {
                        $tipo = substr($this->data['Produtotamanho']['foto_' . $value]['name'], -4);
                        $this->data['Produtotamanho']['foto_' . $value]['name'] = $this->data['Produtotamanho']['estabelecimento_id'] . '-foto-' . $value . date("YmdHis") . $tipo;
                        move_uploaded_file($this->data['Produtotamanho']['foto_' . $value]['tmp_name'], PRODUTO_TAMANHOS . DS . $this->data['Produtotamanho']['foto_' . $value]['name']);
                        $this->data['Produtotamanho']['foto_' . $value] = $this->data['Produtotamanho']['foto_' . $value]['name'];
                } else {
                    $this->data['Produtotamanho']['foto_' . $value] = null;
                }
            }
        }

        $continue = true;
        if (!empty($this->data['Produtotamanho']['valor'])) {
            $data =  str_replace("R$", "", $this->data['Produtotamanho']['valor']);
            $this->data['Produtotamanho']['valor'] = $data;  
   
        }
        if (!empty($this->data['Produtotamanho']['custo_produto'])) {
            $data =  str_replace("R$", "", $this->data['Produtotamanho']['custo_produto']);
            $this->data['Produtotamanho']['custo_produto'] = $data;  
   
        }

        return $continue;
    }

    public function somaTotalProduto($estabelecimento_id) {
        $this->virtualFields = array(
            'somaTotal' => "count(Produtotamanho.id)"
        );
        $fields = array(
            'Produtotamanho.somaTotal',
        );
        $conditions = array('Produtotamanho.estabelecimento_id' => $estabelecimento_id);
        $somaTotal = $this->find('all', compact('fields', 'conditions'));
    
        return $somaTotal;
    }
}

?>