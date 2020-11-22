<?php
class ClienteTest extends CakeTestCase {
    public $fixtures = array('app.cliente');
    public $Cliente = null;
    public function setUp() {
        $this->Cliente = ClassRegistry::init('Cliente');
    }
    public function testExisteModel() {
        $this->assertTrue(is_a($this->Cliente, 'Cliente'));
    }
    public function testNomeEmpty() {
        /** preparacao */
        $data = array('Cliente' => array('nome' => null));
       
        /** execucao */
        $saved = $this->Cliente->save($data);
        
        /** checagem / teste */
        $this->assertFalse($saved);
    }
    
    public function testTelefone_CelularEmpty() {
        $data = array('Cliente' => array('telefone_celular' => null));
        $saved = $this->Cliente->save($data);
        $this->assertFalse($saved);
    }

    public function testEnderecoEmpty() {
        $data = array('Cliente' => array('endereco' => null));
        $saved = $this->Cliente->save($data);
        $this->assertFalse($saved);
    }

    public function testNumeroEmpty() {
        $data = array('Cliente' => array('numero' => null));
        $saved = $this->Cliente->save($data);
        $this->assertFalse($saved);
    }

    public function testCepEmpty() {
        $data = array('Cliente' => array('cep' => null));
        $saved = $this->Cliente->save($data);
        $this->assertFalse($saved);
    }
}
?>