<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $layout = 'metronicIndex';

    public $helpers = array(
        'Pdf.Document',
        'Pdf.Report',
        'Js' => 'Jquery'
    );
    public $components = array(
        'Flash',
        'RequestHandler',
        'Session',
        'Auth' => array(
            'flash' => array('element' => 'bootstrap', 'params' => array('key' => 'success'), 'key' => 'success'),
            'authError' => 'Você não possui permissão para acessar essa operação.',
            'loginAction' => '/login',
            'loginRedirect' => '/',
            'logoutRedirect' => '/login',
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'Usuario',
                    'fields' => array('username' => 'login', 'password' => 'senha'),
                    'passwordHasher' => array('className' => 'Simple', 'hashType' => 'sha256')
                )
            ),
        ),  
    );

    public $saveMethod = 'save';

    
    public function index() {
        $this->setPaginateConditions();
        try {
            $this->set($this->getControllerName(), $this->paginate());        
        } catch (NotFoundException $e) {
            $this->redirect('/' . $this->getControllerName());
        }
        if ($this->request->is('ajax')) {
            $this->layout = false;
        }
    }

    public function delete($id) {
        $this->{$this->getModelName()}->delete($id);
        $this->Flash->bootstrap('Excluído com sucesso!', array('key' => 'success'));
        $this->redirect('/' . $this->getControllerName());
    }

    public function edit($id = null) {
        if (!$this->request->is('ajax')) {
            $this->layout = false;
        }

        if (!empty($this->request->data[$this->modelClass])) {
            if ($this->{$this->modelClass}->{$this->saveMethod}($this->request->data)) {
                $this->Flash->bootstrap('Alterado com sucesso!', array('key' => 'success'));
                $this->afterEdit();
            }
        } else {
            $this->request->data = $this->{$this->modelClass}->editData($id);
        }

        $this->setFields();

    }

    public function afterEdit() {
        $this->redirect($this->indexUrl());
    }

    public function indexUrl() {
        $indexUrl = $this->Session->read('indexUrl');
        if (empty($indexUrl)) {
            $controller = $this->getControllerName();
            $action = 'index';
            $indexUrl = compact('controller', 'action');
            if (!empty($this->request->named)) {
                $indexUrl = array_merge($indexUrl, $this->request->named);
            }
        }

        return $indexUrl;
    }

    public function setFields($disabled = false) {
        $this->loadFormField();
        if (!empty($this->formField)) {
            $this->formField->setFields($disabled);
        }
    }

    public function loadFormField() {
        if (empty($this->formField)) {
            $formFieldComponentName = $this->modelClass . 'FormField';
            if (!empty($this->formFieldName)) {
                $formFieldComponentName = $this->formFieldName . 'FormField';
            }
            if (file_exists(APP . "Controller" . DS . "Component" . DS . $formFieldComponentName . "Component.php")) {
                $this->formField = $this->Components->load($formFieldComponentName);
            }
        }
    }

    public function getControllerName() {
        return $this->request->params['controller'];
    }
    public function getModelName() {
        return $this->modelClass;
    }


   
    
}
