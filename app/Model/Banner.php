<?php
App::uses('AppModel', 'Model');
    class Banner extends AppModel{
        public $actsAs = array('Containable');
        public $belongsTo = array (
            'Produto',
        );

        public $validate = array(
            'foto_um' => array(
                'fileSize' => array('rule' => array('fileSize', '<=', '250KB'), 'message' => 'A imagem deve ter menos de 250KB'),
                'extension' => array ('rule' => array('extension', array( 'png', 'jpg')), 'message' => 'Formato de imagem invalido, utilize  .png ou .jpg')
            ),
            'nome' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
            'endereco_link' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            ),
            'produto_id' => array(
                'notBlank' => array('rule' => 'notBlank', 'message' => 'Campo Obrigatório'),
            )
        );

        public function beforeValidate($options = array()){
            if (!empty($this->data)) {
                if ($this->data['Banner']['acao_id'] == '1') {
                 $this->validator()->remove('endereco_link');
                 $this->validator()->remove('produto_id');
                }
                if ($this->data['Banner']['acao_id'] == '2') {
                    $this->validator()->remove('endereco_link');
                } 
                if ($this->data['Banner']['acao_id'] == '3') {
                    $this->validator()->remove('produto_id');
                } 
            }  
        }

        public function beforeSave($options = array()) {
            $nomeDaImagem = array("um");
            foreach ($nomeDaImagem as $value) {
                if (!empty($this->data['Banner']['foto_' . $value])) {
                    if (is_uploaded_file($this->data['Banner']['foto_' . $value]['tmp_name'])) {
                            $tipo = substr($this->data['Banner']['foto_' . $value]['name'], -4);
                            $this->data['Banner']['foto_' . $value]['name'] = $this->data['Banner']['estabelecimento_id'] . '-foto-' . $value . date("YmdHis") . $tipo;
                            move_uploaded_file($this->data['Banner']['foto_' . $value]['tmp_name'], BANNER . DS . $this->data['Banner']['foto_' . $value]['name']);
                            $this->data['Banner']['foto_' . $value] = $this->data['Banner']['foto_' . $value]['name'];
                    } else {
                        $this->data['Banner']['foto_' . $value] = null;
                    }
                }
            }
    
            return parent::beforeSave($options);
        }

}

?>