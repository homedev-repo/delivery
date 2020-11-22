<?php
App::uses('AppModel', 'Model');
    
    class Conta extends AppModel {
        public function beforeSave($options = array()) {
            $continue = true;
            if (!empty($this->data['Conta']['data_vencimento'])) {
                $data = str_replace('/', '-', $this->data['Conta']['data_vencimento']);
                $this->data['Conta']['data_vencimento'] = date('Y-m-d', strtotime($data));
            }
            return $continue;
        }

        public $validate = array(
            'tipoconta' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
            'valor' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
            'data_vencimento' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
                'date' => array('rule' => array('date', 'dmy'), 'message' => 'Por favor, insira uma data válida.'),
                'dataMairoQueDataAtual' => array('rule' => 'dataMairoQueDataAtual', 'message' => 'Data de Validade não pode ser menor e igual a data atual.'),
            ),
            'situacao' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
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


        public function  impressaoContas($estabelecimento_id) {
            $this->virtualFields = array(
                'somaTotal' => "count(Conta.id)"
            );
            $fields = array(
                'Conta.somaTotal',
            );
            $group = array('estabelecimento_id');
            $conditions = array('Conta.estabelecimento_id' => $estabelecimento_id);
            $somaTotal = $this->find('all', compact('fields', 'group', 'conditions'));
    
            return $somaTotal;
        }

        public function envioSMS($findEstabelecimento, $contasVencida) {
            $telefoneResponsavel = $findEstabelecimento['Estabelecimento']['telefone'];
            $nomeResponsavel = $findEstabelecimento['Estabelecimento']['responsavel'];
            $detalhe = [];
            foreach ($contasVencida as $key => $value) {
                $dataVencimentoMenosUmDia = new DateTime($value['Conta']['data_vencimento']);
                $dataVencimentoMenosUmDia->sub(new DateInterval('P1D'));
                $dataVencimentoMenosUmDia  = $dataVencimentoMenosUmDia->format('Y-m-d');
                $dataAtual = date("Y-m-d");
                if ($dataAtual == $dataVencimentoMenosUmDia && !isset($_COOKIE['send_sms_Vayron_contas'])) {
                    $descricao =  "Olá, $nomeResponsavel. Estou passando apenas lembrar que existe contas cadastrada na página CONTAS A PAGAR no nosso sistema, que vencem amanhã. encaminhado por Sistema VAYRON";
                    $msgEncoded = urlencode($descricao);
                    $hash = Configure::read('App.HashSMS');
                    $urlChamada = "https://smsmobile.com.br/sms/routes/sms.php?hash=$hash&numero=$telefoneResponsavel&mensagem=".$msgEncoded;
                    echo file_get_contents($urlChamada);
                    setcookie('send_sms_Vayron_contas', true);
                }
            }
        }
}
