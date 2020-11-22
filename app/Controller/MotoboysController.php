<?php
App::uses('AppController', 'Controller');

class MotoboysController extends AppController{

    public $paginate = array (
         'fields' => array(
             'Motoboy.id',
             'Motoboy.nome_motoboy',
             'Motoboy.cpf',
             'Motoboy.terceirizada',
             'Motoboy.nome_empresa_terceirizada'
        ),
         'condition' => array(),
         'limit' => 10,
         'order' => array ('Motoboy.id' => 'desc')
 
     );

     public function setPaginateConditions(){
        $nomeOrCpfOrEmpresa = '';
        if ($this->request->is('post')) {
            $nomeOrCpfOrEmpresa = $this->request->data['Motoboy']['nomeCpf'];
            $this->Session->write('Motoboy.nomeCpf', $nomeOrCpfOrEmpresa);
        } else {
            $nomeOrCpfOrEmpresa = $this->Session->read('Motoboy.nomeCpf');            
            $this->request->data('Motoboy.nomeCpf', $nomeOrCpfOrEmpresa);
        }
        if (!empty($nomeOrCpfOrEmpresa)) {
            $this->paginate['conditions']['Motoboy.nomeCpf LIKE'] = '%' .trim($nomeOrCpfOrEmpresa) . '%';
        } 
         $this->paginate['conditions']['Motoboy.estabelecimento_id'] = $this->Auth->user('estabelecimento_id');
    }

     public function add() {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        } 
         if (!empty($this->request->data)) {
             $this->Motoboy->create();
             if ($this->Motoboy->save($this->request->data)) {
                $this->Flash->bootstrap('Motoboy Adicionado com êxito.', array('key' => 'success'));
                $this->redirect('/motoboys');
             }
         }
     }


    public function edit($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            if ($this->Motoboy->saveAll($this->request->data)) {
                $this->Flash->bootstrap('Alterado com sucesso!', array('key' => 'success'));
                $this->redirect('/motoboys');
            }
        } else {
            $conditions = array('Motoboy.id' => $id);
            $this->request->data = $this->Motoboy->find('first', compact('conditions'));

            if (!empty($this->request->data['Motoboy']['data_nascimento'])) {
                $this->request->data['Motoboy']['data_nascimento'] = $this->Motoboy->userDate($this->request->data['Motoboy']['data_nascimento']);
            }
            if (!empty($this->request->data['Motoboy']['valor_pago'])) {
                $valorFormatado = str_replace(array(",","."),array(".",","), $this->request->data['Motoboy']['valor_pago']);
                $this->request->data['Motoboy']['valor_pago'] = $valorFormatado;
            }
            if (!empty($this->request->data['Motoboy']['valor_pago'])) {
                $valorFormatado = str_replace(array(",","."),array(".",","), $this->request->data['Motoboy']['valor_pago']);
                $this->request->data['Motoboy']['valor_pago'] = $valorFormatado;
            }
        }
    }

    public function view($id = null) {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        $conditions = array('Motoboy.id' => $id);
        $this->request->data = $this->Motoboy->find('first', compact('conditions'));
        if (!empty($this->request->data['Motoboy']['data_nascimento'])) {
            $this->request->data['Motoboy']['data_nascimento'] = $this->Motoboy->userDate($this->request->data['Motoboy']['data_nascimento']);
        }
        if (!empty($this->request->data['Motoboy']['valor_pago'])) {
            $valorFormatado = str_replace(array(",","."),array(".",","), $this->request->data['Motoboy']['valor_pago']);
            $this->request->data['Motoboy']['valor_pago'] = $valorFormatado;
        }
        if (!empty($this->request->data['Motoboy']['valor_pago'])) {
            $valorFormatado = str_replace(array(",","."),array(".",","), $this->request->data['Motoboy']['valor_pago']);
            $this->request->data['Motoboy']['valor_pago'] = $valorFormatado;
        }
    }


    public function delete($id) {
        $this->Motoboy->delete($id);
        $this->Flash->bootstrap('Excluido com êxito.', array('key' => 'success'));        
        $this->redirect('/motoboys');
    }

}
?>
