<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Usuario extends AppModel {

    public $actsAs = array('Containable');

    public $belongsTo = array('Estabelecimento');

    public $virtualFields = array(
        'NomeCpf' => "CONCAT(Usuario.cpf, Usuario.nome)",
    );

    public $validate = array(
        'login' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            'LoginDiferentesOrgaos' => array(
                'rule' => array('isUnique', array('estabelecimento_id', 'login'), false),
                'message' => 'Login já existe'),
                'lengthBetween' => array('rule' => array('lengthBetween', 5, 100), 'message' => 'O nome do Usuario deve conter de 5 a 100 caracteres'),
        ),
        'senha' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            'minLength' => array('rule' => array('minLength', 4), 'message' => 'Senha deve possuir mais de 3 dígitos.', 'last' => true),
            'checkSenha' => array('rule' => 'checkSenha', 'message' => 'Senha informada não confere com a informada na confirmação.'),
            'checkLetraNumero' => array('rule' => 'checkLetraNumero', 'message' => 'A senha deve conter pelo menos uma letra e um número.', 'last' => true),
        ),
        'confirma_senha' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Confirme a senha.', 'last' => true),
        ),
        'cpf' => array(
            'isCpf' => array('rule' => 'isCpf', 'message' => 'CPF inválido'),
            'CpfDiferentesOrgaos' => array(
                'rule' => array('isUnique', array('estabelecimento_id', 'cpf'), false),
                'message' => 'Não é possível cadastrar novamente um mesmo Usuário'
            )
        ),
        'nome' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório')
        ),
        'email' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            'validEmail' => array('rule' => 'email', 'message' => 'E-mail inválido')
        ),
    );

    public function beforeSave($options = array()) {
        if (!empty($this->data['Usuario']['senha'])) {
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
            $this->data['Usuario']['senha'] = $passwordHasher->hash(
                $this->data['Usuario']['senha']
            );
        }

        if (!empty($this->data['Usuario']['data_nascimento'])) {
            $this->data['Usuario']['data_nascimento'] = $this->sqlDate($this->data['Usuario']['data_nascimento']);
        }

        return true;
    }    


   /* public function afterSave($created, $options = array()) {
        if (!empty($this->data['Usuario']['aro_parent_id'])) {
            $arouser = ClassRegistry::init('Aro');
            $aro = $arouser->findByForeignKey($this->data['Usuario']['id']);
            $saveAro = array(
                'model' => 'Usuario',
                'foreign_key' => $this->data['Usuario']['id'],
                'parent_id' => $this->data['Usuario']['aro_parent_id']
            );
            if (empty($aro)) {
                $arouser->create();
            } else {
                $arouser->id = $aro['Aro']['id'];
            }
            $arouser->save($saveAro);
        }
        if (!empty($this->data)) {
            $this->saveOnboard();
        }

        return parent::beforeSave($options);
    }
    */

    public function checkSenha($check) {
        $result = true;
        if (!empty($check) && isset($this->data["Usuario"]["confirma_senha"])) {
            $values = array_values($check);
            $result = $this->data["Usuario"]["confirma_senha"] == $values[0];
        }    
        
        return $result;
    } 
    
    public function checkLetraNumero($check) {
        $temLetraNumero = false;
        $temLetra = null;
        $temNumero = null;
        $senha = array_values($check);
        if (!empty($senha)) {
            $temLetra = preg_match('|[a-zA-Z]|', $senha[0]);
            $temNumero = preg_match('|[0-9]|', $senha[0]);
            if ($temLetra && $temNumero) {
                $temLetraNumero = true;
            }
        }
        
        return $temLetraNumero;
    }

    public function bloquear($id = null, $assinanteId) {
        $this->id = $id;
        $this->bloquearOnboard($id, $assinanteId);
        $dataAtual = date('Y-m-d H:i:s');
        $bloqueio = $this->saveField('blocked', $dataAtual);
        
        return $bloqueio;
    }

    public function desbloquear($id = null, $assinanteId) {
        $this->id = $id;
        $desbloqueio = $this->saveField('blocked', null);
        $this->desbloquearOnboard($id, $assinanteId);
        
        return $desbloqueio;
    }

    public function getLoginFile($fileName) {
        $file = null;
        if (!empty($fileName)) {
            $rota = ROOT . DS . 'app' . DS . 'tmp' . DS . $fileName . '.TXT'; 
            $path = new File($rota);
            $file = $path->read();
            $path->close();
            $path->delete();
        }
        if (!empty($file)) {
            return unserialize(base64_decode(urldecode($file)));
        }
    }
    
    public function getUsuarioToLogin($usuario) {
        $usuarioFound = array();
        if (!empty($usuario['Estabelecimento']['codigo']) &&
        !empty($usuario['Usuario']['login']) && 
            !empty($usuario['Usuario']['senha']) && 
            !empty($usuario['Usuario']['cpf'])
        ) {
            $conditions = array(
                'Estabelecimento.codigo' => $usuario['Estabelecimento']['codigo'], 
                'Usuario.login' => $usuario['Usuario']['login']
            );
            $contain = array('Estabelecimento');
            $usuarioFound = $this->find('first', compact('conditions', 'contain'));
        }

        return $usuarioFound;
    }  
}
?>