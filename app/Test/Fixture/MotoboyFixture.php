<?php
class MotoboyFixture extends CakeTestFixture {
    
    public $name = 'Motoboy';
    public $import = array('model' => 'Motoboy', 'records' => false);
    
    public function init() {
        $this->records = array(
            array( 'nome' => 'Teste')
        );
        parent::init();
    }
}
?>