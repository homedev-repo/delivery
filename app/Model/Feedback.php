<?php
App::uses('AppModel', 'Model');
    
    class Feedback extends AppModel {
        public $belongsTo = array (
            'Pedido'
        );
}

?>