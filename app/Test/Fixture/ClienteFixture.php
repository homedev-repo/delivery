<?php
class ClienteFixture extends CakeTestFixture {
    
    public $name = 'Cliente';
    public $import = array('model' => 'Cliente', 'records' => false);
    public function init() {
        $this->records = array(
            array('nome' => 'Victor',
                  'telefone_celular' => '1499000101', 
                  'endereco' => 'Rua nove de novembro',
                   'numero' => '520', 
                   'cep' => '17520-170')
           );
        parent::init();
    }
}
?>