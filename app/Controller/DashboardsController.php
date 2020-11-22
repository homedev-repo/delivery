<?php
App:: uses('AppController', 'Controller');

    class DashboardsController extends AppController{

        public $uses = array('Conta','Pedido', 'Usuario', 'Cliente', 'Estabelecimento', 'Motoboy', 'Notifica', 'Cupom', 'Despesa');

        public function index(){
        
            $atualizado = $this->Session->read('Atualizado');
            if (empty($atualizado)) {
                $estabelecimentoId = $this->Auth->user('estabelecimento_id');
                $this->Cupom->atualizarVencidos($estabelecimentoId);
                $this->Session->write('Atualizado', 'Sim');
            }
       
            $this->duplicaDespesa();
            $this->enviaSMS();

        //Condicoes do dashboards
            $estabelecimento_id = $this->Auth->user('estabelecimento_id');
            $conditions = array('Pedido.estabelecimento_id' => $estabelecimento_id);
            $pedido = $this->Pedido->find('count', compact('conditions'));
            $this->set('pedido', $pedido);

            $conditions = array('Usuario.estabelecimento_id' => $estabelecimento_id);
            $usuario = $this->Usuario->find('count', compact('conditions'));
            $this->set('usuario', $usuario);

            $conditions = array('Conta.estabelecimento_id' => $estabelecimento_id);
            $contas = $this->Conta->find('count', compact('conditions'));
            $this->set('contas', $contas);

            $conditions = array('Cliente.estabelecimento_id' => $estabelecimento_id);
            $clientes = $this->Cliente->find('count', compact('conditions'));
            $this->set('clientes', $clientes);

            $conditions = array('Estabelecimento.id' => $estabelecimento_id);
            $estabelecimento = $this->Estabelecimento->find('all', compact('conditions'));
            $this->set('estabelecimento', $estabelecimento);

            $conditions = array('Pedido.estabelecimento_id' => $estabelecimento_id, 'Pedido.estado_id' => NULL);
            $pedidoTarefas = $this->Pedido->find('count', compact('conditions'));
            $this->set('pedidoTarefas', $pedidoTarefas);

            $conditions = array('Pedido.estabelecimento_id' => $estabelecimento_id, 'Pedido.feedback' => NULL);
            $pedidoFeedback = $this->Pedido->find('count', compact('conditions'));
            $this->set('pedidoFeedback', $pedidoFeedback);

            $conditions = array('Pedido.estabelecimento_id' => $estabelecimento_id, 'Pedido.estado_id' => 4);
            $pedidoPreparacao = $this->Pedido->find('count', compact('conditions'));
            $this->set('pedidoPreparacao', $pedidoPreparacao);

            $conditions = array('Pedido.estabelecimento_id' => $estabelecimento_id, 'Pedido.estado_id' => 5);
            $pedidoSaiuEntrega = $this->Pedido->find('count', compact('conditions'));
            $this->set('pedidoSaiuEntrega', $pedidoSaiuEntrega);

            $conditions = array('Pedido.estabelecimento_id' => $estabelecimento_id, 'Pedido.estado_id' => 2);
            $pedidosAprovados = $this->Pedido->find('count', compact('conditions'));
            $this->set('pedidosAprovados', $pedidosAprovados);

           
            $pedidosFaturamento = $this->Pedido->somavalorFaturaPedidos($estabelecimento_id);
            $this->set('pedidosFaturamento', $pedidosFaturamento);

            $conditions = array('Conta.estabelecimento_id' => $estabelecimento_id);
            $contasVencida = $this->Conta->find('all', compact('conditions'));
            $this->set('contasVencida', $contasVencida);

            $conditions = array('Notifica.estabelecimento_id' => $estabelecimento_id);
            $notificacoes = $this->Notifica->find('all', compact('conditions'));
            $this->set('notificacoes', $notificacoes);

            $conditions = array('Notifica.estabelecimento_id' => $estabelecimento_id);
            $notificacoesContagem = $this->Notifica->find('count', compact('conditions'));
            $this->set('notificacoesContagem', $notificacoesContagem);
   
        }

        public function enviaSMS() {
            $estabelecimento_id = $this->Auth->user('estabelecimento_id');
            $conditions = array('Estabelecimento.id' => $estabelecimento_id);
            $findEstabelecimento = $this->Estabelecimento->find('first', compact('conditions'));
            $conditions = array('Conta.estabelecimento_id' => $estabelecimento_id);
            $contasVencida = $this->Conta->find('all', compact('conditions'));
            $this->Conta->envioSMS($findEstabelecimento, $contasVencida);
            $conditions = array('Despesa.estabelecimento_id' => $estabelecimento_id);
            $despesasVencida = $this->Despesa->find('all', compact('conditions'));
            $this->Despesa->envioSMS($findEstabelecimento, $despesasVencida);
        }

        public function duplicaDespesa() {
            $dataAtual = date("d");
            $dataCopiaDespesa = 01;
            if ($dataAtual == $dataCopiaDespesa && !isset($_COOKIE['duplica_despesas_repetidas'])){
            $estabelecimento_id = $this->Auth->user('estabelecimento_id');
            $conditions = array('Despesa.estabelecimento_id' => $estabelecimento_id, 'Despesa.repetir' => 'Sim');
            $findDespesas = $this->Despesa->find('all', compact('conditions'));
            $salvaDespesas = $this->Despesa->repetirDespesas($findDespesas);
            setcookie('duplica_despesas_repetidas', true);
            }
        }
    }

?>