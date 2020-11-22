<?php
App::uses('AppModel', 'Model');
    
    class Fidelidade extends AppModel {
        public $belongsTo = array (
            'Premio', 'Recompensa'
        );

        public $validate = array(
            'comprarx_vezes' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo obrigatório'),
                'numeric' => array('rule' => 'numeric', 'message' => 'Permitido somente números'),
            ),
            'porcentagem_desconto' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo obrigatório'),
            ),
            'gastarx_vezes' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo obrigatório'),
            ),
            'compra_desconto' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo obrigatório'),
            ),
        );

        public function beforeValidate($options = array()){
            if (!empty($this->data)) {
                if ($this->data['Fidelidade']['premio_id'] == 1) {
                 $this->validator()->remove('gastarx_vezes');
                }
            }  
            if ($this->data['Fidelidade']['recompensa_id'] == 1) {
                $this->validator()->remove('compra_desconto');
            }
        }
}
