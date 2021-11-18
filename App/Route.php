<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['indexx'] = array(
			'route' => '/indexx',
			'controller' => 'indexController',
			'action' => 'indexx'
		);

		$routes['inscreverse'] = array(
			'route' => '/inscreverse',
			'controller' => 'indexController',
			'action' => 'inscreverse'
		);
		$routes['inscreverseCores'] = array(
			'route' => '/inscreverseCores',
			'controller' => 'indexController',
			'action' => 'inscreverseCores'
		);

		$routes['registrar'] = array(
			'route' => '/registrar',
			'controller' => 'indexController',
			'action' => 'registrar'
		);
		$routes['registrarCores'] = array(
			'route' => '/registrarCores',
			'controller' => 'indexController',
			'action' => 'registrarCores'
		);

		$routes['autenticar'] = array(
			'route' => '/autenticar',
			'controller' => 'AuthController',
			'action' => 'autenticar'
		);

		$routes['timeline'] = array(
			'route' => '/timeline',
			'controller' => 'AppController',
			'action' => 'timeline'
		);

		$routes['sair'] = array(
			'route' => '/sair',
			'controller' => 'AuthController',
			'action' => 'sair'
		);


		$routes['procura_Cor'] = array(
			'route' => '/procura_Cor',
			'controller' => 'AppController',
			'action' => 'procuraCor'
		);

		$routes['procura_corAdmin'] = array(
			'route' => '/procura_corAdmin',
			'controller' => 'AppController',
			'action' => 'procuracorAdmin'
		);

		

		

		$this->setRoutes($routes);
	}

}

?>