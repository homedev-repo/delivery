<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link https://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Requisitos de Usuario 
 * -> dECLARAÇÃO DOS SERVIÇÕS DO SISTEMA
 * -> rEQ. SISTEMA
 * dEFINIR OQ SERA IMPLEMENTADO
 * 
 * cOMO UM PROJETO DE SOFTEARE SE INICIA (concepção) ?
 * iDENTIFICA AS NECESSIDADES DE UM NEGOCIO, PESQUISA DE MERCADO, CONCORRENTES
 * 
 * oq eu REQUISITO FUNCIONAL 
 * pensar em funcionalidades para o sistema
 * focar no usuario, pensar no que o sistema precisar atender.
 * 
 * REQUISITO NAO FUNCIONAL 
 * rEQUISITOS QUE DEFINEM RESTRIÇÕES NO SISTEMA
 * 
 * --explique sobre os ponstos de vistas
 * Cada um tem ponto de vista difenreten que são importantes para o levantamente de requisitos
 * 
 * OQUE É ORIENTAÇÃO OBJ ?
 * classes, metodos, atributos, heranças, objeto
 * 
 * oque é UML
 * uml , ajuda a espeficiar visualizar e documentar modelosde sistema
 * 
 * EM POO OQUE E UMA ANALISE?
 * Analise é fazer uma analise dos problemas dos requisots e dos aobjetos
 * 
 * EM POO OQUE É UM PROJETO?
 * cHAMADA DE PROJETO OBOJETO É DEFINIÇÃO DOS OBJ DE SOFTWARE QUE CONTRIBUI PARA OS REQUISTOS
 * 
 * oQUE É DEFINIÇÃO DE CASOS DE USO
 * R: OS CASOS DE USO NAO SÃO ARTEFATOS ORIENTADOS A OBJTO, SÃO TEXTO ESSENCIALMENTE;
 * 
 * DEFINIR DIAGRAMAS DE INTERAÇÃO 
 * dIAGRAMAS DE INTERAÇÃO COMPLEMENTA O CASO DE USO COM DIAGRAMA DE ATIVIDADE.
 * 
 * diagrama de clases
 * DIAGRAMA DE CLASSE ILUSTRA OS ATRIBUTOS E METODOS DE CLASSES.
 * 
 * QUAIS O TIPOS DE DIAGRAMA UML 
 * R: DIAGRAMA DE ESTRUTURA, DIAGRAMA DE CLASSES,, DIAGRAMA DE OBJ, DIAGRAMA DE INTERAÇÃO.
 * 
 * OQUE É UM SCRUM e suas atividades
 * Scrum é uma metodologia agil par gestão e planejamento de projetos de software 
 * Requisitos, analise, projeto, evolução, entrega. 
 * 
 * oque é backlog
 * Lista de prioridade são Registro pendente de trabalho
 * 
 * OQUE E SPRINT?
 * No scrum os projetos sao dividos em ciclos chamados de sprint, 
 * representa um conjunto de atividades que deve ser executadas
 * 
 * oque e PRODUCT OWNER
 * dono do produto
 * 
 * SCRUM MASTER
 * -> gERENTE DO PROJETO 
 * 
 * OQUE E UM KANBAN
 * TERMO EM JAPONES: CARTÃO 
 * MOSTRAR EM FORMA VISUAL O ANDAMENTO DO PROJETO
 * 
 * DAILY SCRUM
*Acada dia a equipe faz uma reunião diaria 

 * sCRUM TEAM
 * 
 *eQUIPE RESPONSAVEL PELO DESENVOLVIMENTO
*** 
*
*

 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @return CakeResponse|null
 * @throws ForbiddenException When a directory traversal attempt.
 * @throws NotFoundException When the view file could not be found
 *   or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		if (in_array('..', $path, true) || in_array('.', $path, true)) {
			throw new ForbiddenException();
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
}
