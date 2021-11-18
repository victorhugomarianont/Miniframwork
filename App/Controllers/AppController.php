<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {


	public function timeline() {

		$this->validaAutenticacao();


		$usuario = Container::getModel('Usuario');
		$usuario->__set('id', $_SESSION['id']);

		$this->view->info_usuario = $usuario->getInfoUsuario();
		

		$this->render('timeline');
		
		
	}

	

	public function validaAutenticacao() {

		session_start();

		if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || $_SESSION['nome'] == '') {
			header('Location: /?login=erro');
		}	

	}

	public function procuraCor() {


		$pesquisarPor = isset($_GET['pesquisarPor']) ? $_GET['pesquisarPor'] : '';
		
		$mensagens = array();

		if($pesquisarPor != '') {
			
			$mensagens = Container::getModel('mensagens');
			$mensagens->__set('Cor', $pesquisarPor);
			$mensagens = $mensagens->getAll();

		}

		$this->view->mensagens = $mensagens;

		$this->render('procuraCor');
	}	

	public function procuracorAdmin() {


		$pesquisarPor = isset($_GET['pesquisarPorcores']) ? $_GET['pesquisarPorcores'] : '';
		
		$mensagens = array();

		if($pesquisarPor != '') {
			
			$mensagens = Container::getModel('mensagens');
			$mensagens->__set('Cor', $pesquisarPor);
			$mensagens = $mensagens->getAll();

		}

		$this->view->mensagens = $mensagens;

		$this->render('procuracorAdmin');
	}

	
}

?>