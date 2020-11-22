<?php
App::uses('AppController', 'Controller');
class EmailmarketingsController extends AppController
{
   
    public $uses = array('Emailmarketing','Cliente');
    public function add() {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            $this->Emailmarketing->create();
            if ($this->Emailmarketing->save($this->request->data)) {
                $formaDeEnvio = $this->request->data['Emailmarketing']['forma'];
                if($formaDeEnvio == 'TodosClientes'){
                    $assunto = $this->request->data['Emailmarketing']['assunto'];
                    $descricao = $this->request->data['Emailmarketing']['descricao'];
                    $idEstabelecimento = $this->Auth->user('estabelecimento_id');
                    $conditions = array('Cliente.estabelecimento_id' => $idEstabelecimento);
                    $findEmailClientes = $this->Cliente->find('all', compact('conditions'));
                    foreach($findEmailClientes as $emailMassaCliente){
                        App::uses('CakeEmail', 'Network/Email');
                        $Email = new CakeEmail();
                        $Email->config('gmail'); 
                        $Email->emailFormat('html');
                        $Email->to($emailMassaCliente['Cliente']['email']);
                        $Email->subject($assunto);
                        $Email->template('emailMarketing');
                        $Email->viewVars(array('descricao' => $descricao));
                        $Email->send();
                    }       
                   
                }else {
                    $clienteEspecifico = $this->request->data['Emailmarketing']['para'];
                    $assunto = $this->request->data['Emailmarketing']['assunto'];
                    $descricao = $this->request->data['Emailmarketing']['descricao'];
                    $envio = $this->sendEmail($clienteEspecifico, $assunto, $descricao);
                }
                $this->Flash->bootstrap('E-mail encaminhado com sucesso!', array('key' => 'success'));
                $this->redirect('/emailmarketings/add');
            }
        }
    }

    public function sendEmail($clienteEspecifico, $assunto, $descricao){
        App::uses('CakeEmail', 'Network/Email');
        $Email = new CakeEmail();
        $Email->config('gmail'); 
        $Email->emailFormat('html');
        $Email->to($clienteEspecifico);
        $Email->subject($assunto);
        $Email->template('emailMarketing');
        $Email->viewVars(array('descricao' => $descricao));
        $Email->send();
    }

}



