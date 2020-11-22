<?php
App::uses('AppModel', 'Model');
    
class Complemento extends AppModel {
    public $actsAs = array(
        'Containable',
        'Crud' => array(
            'editFields' => array('id', 'descricao'),
            'editContain' => array(
                'Tamanho' => array('fields' => array('id', 'descricao')),
            ),
        ),
    );


    public $hasAndBelongsToMany = array(
        'Categoria'
    );

    public $validate = array(
        'descricao' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            'minLength' => array('rule' => array('minLength', 3), 'message' => 'Informe um nome com mais de 2 dígitos')
        ),
    );

    public function beforeSave($options = array()) {
        $continue = true;
        if (!empty($this->data['Complemento']['preco_venda'])) {
            $data =  str_replace("R$", "", $this->data['Complemento']['preco_venda']);
            $this->data['Complemento']['preco_venda'] = $data;  
   
        }
        if (!empty($this->data['Complemento']['preco_custo'])) {
            $data =  str_replace("R$", "", $this->data['Complemento']['preco_custo']);
            $this->data['Complemento']['preco_custo'] = $data;  
   
        }

        return $continue;
    }

}

?>