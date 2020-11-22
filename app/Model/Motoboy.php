<?php
App::uses('AppModel', 'Model');
    class Motoboy extends AppModel{

        public $hasMany = array(
            'Pedido'
        );

        public $virtualFields = array(
            'nomeCpf' => "CONCAT(Motoboy.nome_motoboy, Motoboy.cpf, Motoboy.nome_empresa_terceirizada)"
        );

        public $validate = array(
            'nome_motoboy' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
                'maxLenght' => array('rule' => array('maxLength', 30), 'message' => 'Não é permitido o Nome Completo apenas Nome e Sobrenome')
            ),
            'cpf' => array(
                'isCpf' => array('rule' => 'isCpf', 'message' => 'CPF inválido'),
                'numeric' => array('rule' => 'numeric', 'message' => 'O campo CPF permite onze números'),
                'IsUniqueCupom' => array(
                    'rule' => array('isUnique', array('cpf', 'estabelecimento_id'), false),
                    'message' => 'CPF já existente.'
                ),
            ),
            'cnh' => array(
                'maxLenght' => array('rule' => array('maxLength', 11), 'message' => 'CNH deve conter no máximo onze números'),
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório')         
            ),
            'terceirizada' => array(
                'rule' => array('multiple', array('in' => array('Sim', 'Não'))),
                'message' => 'Campo Tipo Obrigatório'        
            ),
            'nome_empresa_terceirizada' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo obrigatório'),
                'maxLenght' => array('rule' => array('maxLength', 50), 'message' => 'Nome deve conter no máximo 50 caracteres') 
            ),
            'cnpj_empresa_terceirizada' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo obrigatório'),
                'numeric' => array('rule' => 'numeric', 'message' => 'O campo CNPJ permite quatorze números'),
                'isCnpj' => array('rule' => 'isCnpj', 'message' => 'CNPJ inválido'),
            ),
            'data_nascimento' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo obrigatório'),
                'date' => array('rule' => array('date', 'dmy'), 'message' => 'Data inválida'),
            ),
            'rendimento_id' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo obrigatório'),
            ),
            'valor_pago' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo obrigatório'),
            )
        );

        public function beforeValidate($options = array()){
            if (!empty($this->data)) {
                if ($this->data['Motoboy']['terceirizada'] == 'Não') {
                 $this->validator()->remove('nome_empresa_terceirizada');
                 $this->validator()->remove('cnpj_empresa_terceirizada');
                }
            }  
            if ($this->data['Motoboy']['terceirizada'] == 'Sim') {
                $this->validator()->remove('nome_motoboy');
                $this->validator()->remove('cpf');
                $this->validator()->remove('cnpj');
                $this->validator()->remove('valor_pago');
                $this->validator()->remove('cnh');
                $this->validator()->remove('data_nascimento');
            }
        }

        public function beforeSave($options = array()) {
            $continue = true;
            if (!empty($this->data['Motoboy']['data_nascimento'])) {
                $data = str_replace('/', '-', $this->data['Motoboy']['data_nascimento']);
                $this->data['Motoboy']['data_nascimento'] = date('Y-m-d', strtotime($data));
    
            }
            return $continue;
        }

        public function impressaoMotoboyDadosView($id, $estabelecimento_id){
            $conditions = array('Motoboy.id' => $id, 'Motoboy.estabelecimento_id' => $estabelecimento_id);
            $contain = array();
            $impressaoMotoboyDadosView = $this->find('all', compact('conditions', 'contain'));
    
            return $impressaoMotoboyDadosView;
        }
    }

?>