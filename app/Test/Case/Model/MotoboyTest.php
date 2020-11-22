<?php
    class MotoboyTest extends CakeTestCase {

        public $fixtures = array('app.motoboy');
        public $Motoboy = null;

        public function setUp() {
            $this->Motoboy = ClassRegistry::init('Motoboy');
        }

        public function testExisteModel() {
            $this->assertTrue(is_a($this->Motoboy, 'Motoboy'));
        }

      public function testEmptyNome() {
        $data = array('nome' => null);
        $saved = $this->Motoboy->save($data);
        $this->assertFalse($saved);
        $data = array('nome' => '');
        $saved = $this->Motoboy->save($data);
        $this->assertFalse($saved);
        $data = array('nome' => '   ');
        $saved = $this->Motoboy->save($data);
        $this->assertFalse($saved);
        $data = array('nome' => '12');
        $saved = $this->Motoboy->save($data);
        $this->assertFalse($saved);
    }

    
    public function testNotUniqueNome() {
        $data = array('nome' => 'Aventura');
        $saved = $this->Motoboy->save($data);
        $this->assertFalse($saved);
    }
}
?>