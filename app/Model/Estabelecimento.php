<?php
App::uses('AppModel', 'Model');

class Estabelecimento extends AppModel {
        
    public $validate = array(
        'nome_fantasia' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.')
        ),
        'cep' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.')
        ),
        'endereco' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'numero' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'bairro' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'cidade' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'responsavel' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'telefone' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'funcionamento_segunda' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'funcionamento_terca' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'funcionamento_quarta' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'funcionamento_quinta' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'funcionamento_sexta' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'funcionamento_sabado' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
        'funcionamento_domingo' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
        ),
    );

    public function beforeSave($options = array()) {
        if (!empty($this->data['Estabelecimento']['brasao'])) {
            $this->data['Estabelecimento']['brasao'] = $this->saveImagemBrasao($this->data['Estabelecimento']['brasao']);

        }

        return parent::beforeSave($options);
    }

    public function saveImagemBrasao($brasao) {
        if (!empty($brasao)) {
            $brasao['name'] = $this->alterarNomeImagemBrasao($brasao['name']);
            if (is_uploaded_file($brasao['tmp_name'])) {
                move_uploaded_file($brasao['tmp_name'], BRASAO . DS . $brasao['name']);
            }
            $brasao = $brasao['name'];
        }

        return $brasao;
    }

    public function alterarNomeImagemBrasao($brasaoNome) {
        $tipo = substr($brasaoNome, -4);
        $brasaoNome =  $tipo;
        
        return $brasaoNome;
    }
   
}
?>