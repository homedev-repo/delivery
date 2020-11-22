<?php
App:: uses('AppController', 'Controller');

    class CardsController extends AppController {
        public function index(){
                  
                $fields     = array('Produto.id', 'Produto.nome');
                $order      = array('Produto.nome' => 'asc');
                $group      = array();
                $conditions = array();
                $total = $this->Article->find('count');
                $this->set('cards', $total);
            }
        }
    
    
?>