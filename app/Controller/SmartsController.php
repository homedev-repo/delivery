<?php
App::uses('AppController', 'Controller');

    class SmartsController extends AppController{
        
        public $uses = array('Produto','Motoboy','Pedido', 'Usuario');

        public function index(){
 
        }
    }
?>