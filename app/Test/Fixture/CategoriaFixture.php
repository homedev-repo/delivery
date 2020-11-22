<?php
class CategoriaFixture extends CakeTestFixture {
    
    public $name = 'Categoria';
    public $import = array('model' => 'Categoria', 'records' => false);
    public function init() {
        $this->records = array(
            array('id' => 1, 'nome' => 'Bebida')
        );
        parent::init();
    }
}
?>