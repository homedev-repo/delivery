<?php

App::uses('AppModel', 'Model');
    
    class Envioshortservice  extends AppModel {
        public $actsAs = array('Containable');

        public $validate = array(
            'descricao' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
            'forma' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
            'para' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
        );

        public function beforeValidate($options = array()){
            if (!empty($this->data)) {
                if ($this->data['Envioshortservice']['forma'] == 'TodosClientes') {
                 $this->validator()->remove('para');
                }
            }  
        }

        public function enviaSMSmassa($findClientes, $descricao) {
            foreach($findClientes as $envioemMassa){
                $msgEncoded = urlencode($descricao);
                $numero = $envioemMassa['Cliente']['telefone_celular'];
                $hash = Configure::read('App.HashSMS');
                $urlChamada = "https://smsmobile.com.br/sms/shortcode/routes/sms.php?hash=$hash&numero=$numero&mensagem=" . $msgEncoded;
                 file_get_contents($urlChamada);
            }
        }
    
        public function sendSMSunico($clienteEspecifico, $descricao){
            $msgEncoded = urlencode($descricao);
            $hash = Configure::read('App.HashSMS');
            $mensagemSemMascaraTelefone = preg_replace('/()[^0-9]/', '', $clienteEspecifico);
            $urlChamada = "https://smsmobile.com.br/sms/shortcode/routes/sms.php?hash=$hash&numero=$mensagemSemMascaraTelefone&mensagem=".$msgEncoded;
            file_get_contents($urlChamada);
        }

        public function consultaSaldoNaSmsMobile(){
            $dados['acao'] = 'consultar';
            $dados['hash'] = Configure::read('App.HashSMS');
            $dado[] = json_encode($dados);
            $point = curl_init("https://smsmobile.com.br/sms/shortcode/routes/saldo.php");
            curl_setopt($point, CURLOPT_POST, 1);
            curl_setopt($point, CURLOPT_POSTFIELDS, $dado);
            curl_setopt($point, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($point, CURLOPT_SSL_VERIFYPEER, false);
            $respostaServidor = curl_exec($point);
            curl_close($point);
            
            return  $respostaServidor;
        }
}



?>

