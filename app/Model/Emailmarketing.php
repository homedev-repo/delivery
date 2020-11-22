<?php

App::uses('AppModel', 'Model');
    
    class Emailmarketing  extends AppModel {
        public $actsAs = array('Containable');

        public $validate = array(
            'assunto' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
            'descricao' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
            'forma' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
            'para' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
        );

        public function beforeValidate($options = array()){
            if (!empty($this->data)) {
                if ($this->data['Emailmarketing']['forma'] == 'EmailTodosClientes') {
                 $this->validator()->remove('para');
                }
            }  
        }
}



?>

