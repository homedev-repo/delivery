<?php
App::uses('AppModel', 'Model');
    
    class Categoria extends AppModel {
        public $actsAs = array('Containable');

        public $hasMany = array(
            'Produto', 'Complemento'
        );


        public $validate = array(
            'tipo_categoria' => array(
                'IsUniqueCategoria' => array(
                    'rule' => array('isUnique', array('tipo_categoria', 'estabelecimento_id'), false),
                    'message' => 'Númeração já existente.'
                ),
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
                'minLength' => array('rule' => array('minLength', 3), 'message' => 'Informe a categoria com mais de 3 dígitos')
            )
        );
}

?>

