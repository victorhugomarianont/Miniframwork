<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function index() {

		$this->render('index');
	}

	public function indexx() {

		$this->view->login = isset($_GET['login']) ? $_GET['login'] : '';
		$this->render('indexx');
	}

	public function inscreverse() {

		$this->view->usuario = array(
				'nome' => '',
				'email' => '',
				'senha' => '',
			);

		$this->view->erroCadastro = false;

		$this->render('inscreverse');
	}

	public function registrar() {

		$usuario = Container::getModel('Usuario');

		$usuario->__set('nome', $_POST['nome']);
		$usuario->__set('email', $_POST['email']);
		$usuario->__set('senha', md5($_POST['senha']));

		
		if($usuario->validarCadastro() && count($usuario->getUsuarioPorEmail()) == 0) {
		
				$usuario->salvar();

				$this->render('cadastro');

		} else {

			$this->view->usuario = array(
				'nome' => $_POST['nome'],
				'email' => $_POST['email'],
				'senha' => $_POST['senha'],
			);

			$this->view->erroCadastro = true;

			$this->render('inscreverse');
		}

	}
	public function inscreverseCores() {

		$this->view->usuario = array(
				'Cor' => '',
				'Detalhes' => '',
			);

		$this->view->erroCadastro = false;

		$this->render('inscreverseCores');
	}

	public function registrarCores() {

		$mensagens = Container::getModel('mensagens');

		$mensagens->__set('Cor', $_POST['Cor']);
		$mensagens->__set('Detalhes', $_POST['Detalhes']);

		$mensagens->salvarCores();
		
		header('Location: /timeline');

		
		}

	}




?>