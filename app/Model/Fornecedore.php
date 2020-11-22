<?php
App::uses('AppModel', 'Model');
    
    class Fornecedore extends AppModel {
        public $virtualFields = array(
            'nomeCnpj' => "CONCAT(Fornecedore.nome, Fornecedore.cnpj)"
        );

        public $validate = array(
            'nome' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório')
            ),
            'responsavel' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório')
            ),
            'telefone' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório')
            ),
            'cnpj' => array(
                'numeric' => array('rule' => 'numeric', 'message' => 'O campo CNPJ permite 14 números'),
                'isCnpj' => array('rule' => 'isCnpj', 'message' => 'CNPJ inválido'),
            ),
            'email' => array(
                'rule' => array('email', true),
                'message' => 'Forneça um endereço de email válido.'
            )
        );
}

?>
