<?php
class CategoriaTest extends CakeTestCase {
    public $fixtures = array('app.categoria');
    public $Categoria = null;
    public function setUp() {
        $this->Categoria = ClassRegistry::init('Categoria');
    }
    public function testExisteModel() {
        $this->assertTrue(is_a($this->Categoria, 'Categoria'));
    }
    public function testEmptyNome() {
        $data = array('nome' => null);
        $saved = $this->Categoria->save($data);
        $this->assertFalse($saved);
        $data = array('nome' => '');
        $saved = $this->Categoria->save($data);
        $this->assertFalse($saved);
        $data = array('nome' => '   ');
        $saved = $this->Categoria->save($data);
        $this->assertFalse($saved);
        $data = array('nome' => '12');
        $saved = $this->Categoria->save($data);
        $this->assertFalse($saved);
    }
    public function testNotUniqueNome() {
        $data = array('nome' => 'Bebida');
        $saved = $this->Categoria->save($data);
        $this->assertFalse($saved);
    }
}
?>