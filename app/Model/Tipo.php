<?php
App::uses('AppModel', 'Model');
    
class Tipo extends AppModel {
    public $actsAs = array(
        'Containable',
        'Crud' => array(
            'editFields' => array('id', 'descricao'),
            'editContain' => array(
                'Tamanho' => array('fields' => array('id', 'descricao')),
            ),
        ),
    );

    public $hasMany = array (
        'Tamanho'
    );

    public $validate = array(
        'descricao' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            'minLength' => array('rule' => array('minLength', 3), 'message' => 'Informe um nome com mais de 2 dígitos')
        ),
    );

}

?>