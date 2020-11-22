<?php
App::uses('AppModel', 'Model');
    
class Tamanho extends AppModel {
    public $actsAs = array(
        'Containable',
        'Crud' => array(
            'editFields' => array('id', 'descricao', 'preco_custo', 'preco_venda', 'habilitar'),
        ),
    );

    public $belongsTo = array (
         'Tipo'
    );

    public $validate = array(
        'descricao' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            'minLength' => array('rule' => array('minLength', 3), 'message' => 'Informe um nome com mais de 2 dígitos')
        ),
    );

    public function beforeSave($options = array()) {
        $continue = true;
        if (!empty($this->data['Tamanho']['preco_custo'])) {
            $data =  str_replace("R$", "", $this->data['Tamanho']['preco_custo']);
            $this->data['Tamanho']['preco_custo'] = $data;  
   
        }
        if (!empty($this->data['Tamanho']['preco_venda'])) {
            $data =  str_replace("R$", "", $this->data['Tamanho']['preco_venda']);
            $this->data['Tamanho']['preco_venda'] = $data;  
   
        }

        return $continue;
    }

}

?>