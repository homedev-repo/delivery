<?php
App::uses('AppController', 'Controller');

class KanbansController extends AppController
{

    public function index()
    {
        $estabelecimentoid = $this->Auth->user('estabelecimento_id');
        $fields = array('Kanban.id', 'Kanban.tarefa');
        $order = array('Kanban.id DESC');
        $conditions = array('Kanban.estabelecimento_id' => $estabelecimentoid, 'Kanban.situacao_id' => 1);
        $kanBanaFazer = $this->Kanban->find('all', compact('fields', 'conditions', 'order'));
        $this->set('kanBanaFazer', $kanBanaFazer);

        $order = array('Kanban.id DESC');
        $fields = array('Kanban.id', 'Kanban.tarefa');
        $conditions = array('Kanban.estabelecimento_id' => $estabelecimentoid, 'Kanban.situacao_id' => 2);
        $kanBanFazendo = $this->Kanban->find('all', compact('fields', 'conditions', 'order'));
        $this->set('kanBanFazendo', $kanBanFazendo);

        $order = array('Kanban.id DESC');
        $fields = array('Kanban.id', 'Kanban.tarefa');
        $conditions = array('Kanban.estabelecimento_id' => $estabelecimentoid, 'Kanban.situacao_id' => 3);
        $kanBanFeito = $this->Kanban->find('all', compact('fields', 'conditions', 'order'));
        $this->set('kanBanFeito', $kanBanFeito);
    }


    public function add()
    {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            $this->Kanban->create();
            if ($this->Kanban->save($this->request->data)) {
                $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
                $this->redirect('/kanbans');
            }
        }
    }

    public function edit($id = null)
    {
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
        if (!empty($this->request->data)) {
            if ($this->Kanban->save($this->request->data)) {
                $this->redirect('/kanbans');
            }
        } else {
            $fields = array(
                'Kanban.id',
                'Kanban.tarefa',
                'Kanban.situacao_id',
            );

            $conditions = array('Kanban.id' => $id);
            $this->request->data = $this->Kanban->find('first', compact('fields', 'conditions'));
        }
    }

    public function delete($id)
    {
        $this->Kanban->delete($id);
        $this->redirect('/kanbans');
    }
}
