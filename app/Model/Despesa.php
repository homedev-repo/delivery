<?php
App::uses('AppModel', 'Model');
    
class Despesa  extends AppModel {
    public $actsAs = array('Containable');

    public $belongsTo = array (
        'Categoriadespesa',
    );


    public $validate = array(
        'custo' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            'minLength' => array('rule' => array('minLength', 3), 'message' => 'Informe um nome com mais de 2 dígitos')
        ),
        'valor' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
        ),
        'categoriadespesa_id' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
        ),
        'despesa_paga' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
        ),

    );

    public function impressaoDespesa($estabelecimento_id){
        $this->virtualFields = array(
            'somaTotal' => "SUM(Despesa.valor)"
        );
        $fields = array(
            'Despesa.somaTotal',
        );
        $group = array('estabelecimento_id');
        $conditions = array('Despesa.estabelecimento_id' => $estabelecimento_id);
        $somaTotal = $this->find('all', compact('fields', 'group', 'conditions'));
        $somaTotal[0]['Despesa']['somaTotal'] = str_replace(array(",","."),array(".",","), $somaTotal[0]['Despesa']['somaTotal']);
    
        return $somaTotal;
    }

    public function beforeSave($options = array()) {
        $continue = true;
        if (!empty($this->data['Despesa']['valor'])) {
            $data = str_replace(',', '.', $this->data['Despesa']['valor']);
            $this->data['Despesa']['valor'] = $data;  
        }
        if (!empty($this->data['Despesa']['data_vencimento'])) {
            $this->data['Despesa']['data_vencimento'] = $this->sqlDate($this->data['Despesa']['data_vencimento']);
        }  
        if (!empty($this->data['Despesa']['data_compra'])) {
            $this->data['Despesa']['data_compra'] = $this->sqlDate($this->data['Despesa']['data_compra']);
        }
        return $continue;
    }

    public function repetirDespesas($findDespesas) {
        foreach($findDespesas as $despesas){
            $this->create();
            $this->save(array(
                'custo' => $despesas['Despesa']['custo'],
                'data_compra' => date('d/m/Y', strtotime($despesas['Despesa']['data_compra'])),
                'data_vencimento' => date('d/m/Y', strtotime($despesas['Despesa']['data_vencimento'])),
                'despesa_paga' => $despesas['Despesa']['despesa_paga'],
                'valor' => $despesas['Despesa']['valor'],
                'estabelecimento_id' => $despesas['Despesa']['estabelecimento_id'],
                'categoriadespesa_id' => $despesas['Despesa']['categoriadespesa_id'],
            ));
        }
    }

    public function envioSMS($findEstabelecimento, $despesasVencida) {
        $telefoneResponsavel = $findEstabelecimento['Estabelecimento']['telefone'];
        $nomeResponsavel = $findEstabelecimento['Estabelecimento']['responsavel'];
        foreach ($despesasVencida as $key => $value) {
            $dataVencimentoMenosUmDia = new DateTime($value['Despesa']['data_vencimento']);
            $dataVencimentoMenosUmDia->sub(new DateInterval('P1D'));
            $dataVencimentoMenosUmDia  = $dataVencimentoMenosUmDia->format('Y-m-d');
            $dataAtual = date("Y-m-d");
            if ($dataAtual == $dataVencimentoMenosUmDia && !isset($_COOKIE['send_sms_Despesas_Vayron'])) {
                $descricao =  "Olá, $nomeResponsavel. Estou passando apenas lembrar que existe contas cadastrada na página DESPESAS no nosso sistema, que vencem amanhã. encaminhado por Sistema VAYRON";
                $msgEncoded = urlencode($descricao);
                $hash = Configure::read('App.HashSMS');
                $urlChamada = "https://smsmobile.com.br/sms/routes/sms.php?hash=$hash&numero=$telefoneResponsavel&mensagem=".$msgEncoded;
                echo file_get_contents($urlChamada);
                setcookie('send_sms_Despesas_Vayron', true);
            }
        }
    }
}

?>