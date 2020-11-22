<?php
App::uses('AppModel', 'Model');
    
    class Fichatecnica extends AppModel {
        public $belongsTo = array (
            'Produto', 'Usuario'
        );

        public function beforeSave($options = array()) {
            $continue = true;
            if (!empty($this->data['Fichatecnica']['data_alteracao'])) {
                $data = str_replace('/', '-', $this->data['Fichatecnica']['data_alteracao']);
                $this->data['Fichatecnica']['data_alteracao'] = date('Y-m-d', strtotime($data));
            }
            return $continue;
        }

        public $validate = array(
            'nome_preparacao' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo obrigatório'),
                'maxLenght' => array('rule' => array('maxLength', 50), 'message' => 'Nome deve conter no máximo 50 caracteres') 
            ),
            'data_alteracao' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
                'date' => array('rule' => array('date', 'dmy'), 'message' => 'Por favor, insira uma data válida.'),
            ),
            'produto_id' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo obrigatório'),
            ),
            'usuario_id' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo obrigatório'),
            ),
            'medidas' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo obrigatório'),
                'maxLenght' => array('rule' => array('maxLength', 15), 'message' => 'Nome deve conter no máximo 15 caracteres')
            ),
            'itens' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo obrigatório'),
                'maxLenght' => array('rule' => array('maxLength', 47), 'message' => 'Nome deve conter no máximo 47 caracteres')
            ),
            'marca' => array(
                'maxLenght' => array('rule' => array('maxLength', 20), 'message' => 'Nome deve conter no máximo 20 caracteres')
            ),
            'valor_unitario' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo obrigatório'),
                'maxLenght' => array('rule' => array('maxLength', 7), 'message' => 'Nome deve conter no máximo 7 caracteres')
            ),
            'valor_total' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo obrigatório'),
                'maxLenght' => array('rule' => array('maxLength', 12), 'message' => 'Nome deve conter no máximo 12 caracteres')
            ),
            'modo_preparo' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo obrigatório'),
            ),

            'medidas_2' => array(
                'maxLenght' => array('rule' => array('maxLength', 15), 'message' => 'Nome deve conter no máximo 15 caracteres')
            ),
            'itens_2' => array(
                'maxLenght' => array('rule' => array('maxLength', 47), 'message' => 'Nome deve conter no máximo 47 caracteres')
            ),
            'marca_2' => array(
                'maxLenght' => array('rule' => array('maxLength', 20), 'message' => 'Nome deve conter no máximo 20 caracteres')
            ),
            'valor_unitario_2' => array(
                'maxLenght' => array('rule' => array('maxLength', 7), 'message' => 'Nome deve conter no máximo 7 caracteres')
            ),
            'valor_total_2' => array(
                'maxLenght' => array('rule' => array('maxLength', 12), 'message' => 'Nome deve conter no máximo 12 caracteres')
            ),

            'medidas_3' => array(
                'maxLenght' => array('rule' => array('maxLength', 15), 'message' => 'Nome deve conter no máximo 15 caracteres')
            ),
            'itens_3' => array(
                'maxLenght' => array('rule' => array('maxLength', 47), 'message' => 'Nome deve conter no máximo 47 caracteres')
            ),
            'marca_3' => array(
                'maxLenght' => array('rule' => array('maxLength', 20), 'message' => 'Nome deve conter no máximo 20 caracteres')
            ),
            'valor_unitario_3' => array(
                'maxLenght' => array('rule' => array('maxLength', 7), 'message' => 'Nome deve conter no máximo 7 caracteres')
            ),
            'valor_total_3' => array(
                'maxLenght' => array('rule' => array('maxLength', 12), 'message' => 'Nome deve conter no máximo 12 caracteres')
            ),

            'medidas_4' => array(
                'maxLenght' => array('rule' => array('maxLength', 15), 'message' => 'Nome deve conter no máximo 15 caracteres')
            ),
            'itens_4' => array(
                'maxLenght' => array('rule' => array('maxLength', 47), 'message' => 'Nome deve conter no máximo 47 caracteres')
            ),
            'marca_4' => array(
                'maxLenght' => array('rule' => array('maxLength', 20), 'message' => 'Nome deve conter no máximo 20 caracteres')
            ),
            'valor_unitario_4' => array(
                'maxLenght' => array('rule' => array('maxLength', 7), 'message' => 'Nome deve conter no máximo 7 caracteres')
            ),
            'valor_total_4' => array(
                'maxLenght' => array('rule' => array('maxLength', 12), 'message' => 'Nome deve conter no máximo 12 caracteres')
            ),
            'medidas_5' => array(
                'maxLenght' => array('rule' => array('maxLength', 15), 'message' => 'Nome deve conter no máximo 15 caracteres')
            ),
            'itens_5' => array(
                'maxLenght' => array('rule' => array('maxLength', 47), 'message' => 'Nome deve conter no máximo 47 caracteres')
            ),
            'marca_5' => array(
                'maxLenght' => array('rule' => array('maxLength', 20), 'message' => 'Nome deve conter no máximo 20 caracteres')
            ),
            'valor_unitario_5' => array(
                'maxLenght' => array('rule' => array('maxLength', 7), 'message' => 'Nome deve conter no máximo 7 caracteres')
            ),
            'valor_total_5' => array(
                'maxLenght' => array('rule' => array('maxLength', 12), 'message' => 'Nome deve conter no máximo 12 caracteres')
            ),

            'medidas_6' => array(
                'maxLenght' => array('rule' => array('maxLength', 15), 'message' => 'Nome deve conter no máximo 15 caracteres')
            ),
            'itens_6' => array(
                'maxLenght' => array('rule' => array('maxLength', 47), 'message' => 'Nome deve conter no máximo 47 caracteres')
            ),
            'marca_6' => array(
                'maxLenght' => array('rule' => array('maxLength', 20), 'message' => 'Nome deve conter no máximo 20 caracteres')
            ),
            'valor_unitario_6' => array(
                'maxLenght' => array('rule' => array('maxLength', 7), 'message' => 'Nome deve conter no máximo 7 caracteres')
            ),
            'valor_total_6' => array(
                'maxLenght' => array('rule' => array('maxLength', 12), 'message' => 'Nome deve conter no máximo 12 caracteres')
            ),

            'medidas_7' => array(
                'maxLenght' => array('rule' => array('maxLength', 15), 'message' => 'Nome deve conter no máximo 15 caracteres')
            ),
            'itens_7' => array(
                'maxLenght' => array('rule' => array('maxLength', 47), 'message' => 'Nome deve conter no máximo 47 caracteres')
            ),
            'marca_7' => array(
                'maxLenght' => array('rule' => array('maxLength', 20), 'message' => 'Nome deve conter no máximo 20 caracteres')
            ),
            'valor_unitario_7' => array(
                'maxLenght' => array('rule' => array('maxLength', 7), 'message' => 'Nome deve conter no máximo 7 caracteres')
            ),
            'valor_total_7' => array(
                'maxLenght' => array('rule' => array('maxLength', 12), 'message' => 'Nome deve conter no máximo 12 caracteres')
            ),
            
        );
}
