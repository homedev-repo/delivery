<?php
App::uses('AppController', 'Controller');
class EnvioshortservicesController extends AppController
{
   
    public $uses = array('Envioshortservice','Cliente');
    public function add() {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            $consultaSaldo = $this->Envioshortservice->consultaSaldoNaSmsMobile();
            $retornodaConsulta = json_decode($consultaSaldo, true);
            $saldo = $retornodaConsulta['saldo'];
            $saldoNegativo = '0';
            if($saldo == $saldoNegativo){
                $this->Flash->bootstrap('Erro ao encaminhar SMS entre em contato com o Suporte.', array('key' => 'danger'));
                $this->redirect('/envioshortservices/add');
            }
            else {
            $this->Envioshortservice->create();
            if($this->request->data['Envioshortservice']['forma'] == 'enderecoEspecifico'){
                $descricao = $this->request->data['Envioshortservice']['descricao'];
                if(!empty($descricao)){
                    $this->request->data['Envioshortservice']['quantidade_numeroespecifico'] = 1;
                    $clienteEspecifico = $this->request->data['Envioshortservice']['para'];
                    $this->Envioshortservice->sendSMSunico($clienteEspecifico, $descricao); 
                }
            } 
            else{
                $descricao = $this->request->data['Envioshortservice']['descricao'];
                if(!empty($descricao)){
                $idEstabelecimento = $this->Auth->user('estabelecimento_id');
                $conditions = array('Cliente.estabelecimento_id' => $idEstabelecimento);
                $contagemClientesRecebidosSMS = $this->Cliente->find('count', compact('conditions'));
                $this->request->data['Envioshortservice']['quantidade_todosclientes'] = $contagemClientesRecebidosSMS;
                $conditions = array('Cliente.estabelecimento_id' => $idEstabelecimento);
                $findClientes = $this->Cliente->find('all', compact('conditions'));
                $this->Envioshortservice->enviaSMSmassa($findClientes, $descricao);
                }
            }
        }
            if ($this->Envioshortservice->save($this->request->data)) {
                $this->Flash->bootstrap('SMS encaminhado com sucesso!', array('key' => 'success'));
                $this->redirect('/envioshortservices/add');
            }
        }
    }


}
