<?php
App::uses('AppModel', 'Model');
App::uses('CakeTime', 'Utility');

class Cupom extends AppModel {

    public $belongsTo = array (
        'Cliente'
    );

    public $validate = array(
        'numero_cupom' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
            'minLength' => array('rule' => array('minLength', 3), 'message' => 'Informe a numeração com mais de 3 dígitos'),
            'IsUniqueCupom' => array(
                'rule' => array('isUnique', array('numero_cupom', 'estabelecimento_id'), false),
                'message' => 'Númeração já existente.'
            ),
        ),
        'total_desconto' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Informe o Desconto. Ex: -10,99'),
        ),
        'validade' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório.'),
            'date' => array('rule' => array('date', 'dmy'), 'message' => 'Por favor, insira uma data válida.'),
            'dataMairoQueDataAtual' => array('rule' => 'dataMairoQueDataAtual', 'message' => 'Data de Validade não pode ser menor e igual a data atual.'),
        )
    );

    public function dataMairoQueDataAtual($check) {
        $dataInput = array_values($check);
        $dataInput = $this->sqlDate($dataInput[0]);
        $isDataValida = true;
        if ($dataInput <= date('Y-m-d')) {
            $isDataValida = false;
        }
        
        return $isDataValida;
    }

    public function beforeSave($options = array()) {
        $continue = true;
        if (!empty($this->data['Cupom']['validade'])) {
            $data = str_replace('/', '-', $this->data['Cupom']['validade']);
            $this->data['Cupom']['validade'] = date('Y-m-d', strtotime($data));
        }
        return $continue;
    } 

    public function enviaEmail($emailCliente, $nomeCliente, $numeroCupom, $nomeEstabelecimento, $vailidade) {
        App::uses('CakeEmail', 'Network/Email');
        $Email = new CakeEmail();
        $Email->config('gmail'); 
        $Email->emailFormat('html');
        $Email->to($emailCliente);
        $Email->subject('Você acaba de ganhar um Cupom de Desconto');
        $Email->template('cupomDeDesconto');
        $Email->viewVars(array('first_name'=>$nomeCliente, 'numero_cupom' => $numeroCupom, 'estabelecimento' => $nomeEstabelecimento, 'validade' => $vailidade));
        if ($Email->send('Hi did you receive the mail')) {
            $this->invalidate('email', 'E-mail Ecaminhado ao cliente');          
        } 
    }

    public function atualizarVencidos($estabelecimentoId) {
        $atualizado = false;
        $dataAtual = date('Y-m-d');
        $atualizado = $this->updateAll(
            array('Cupom.situacao' =>  2),
            array('Cupom.validade >' =>  $dataAtual, 'Cupom.situacao' => 1, 'Cupom.estabelecimento_id' => $estabelecimentoId)
        );


        return $atualizado;
    }
}

?>