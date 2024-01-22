<?php

namespace App\Core;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);
		$routes['cadastro_produto'] = array(
			'route' => '/cadastro_produto',
			'controller' => 'cadastroController',
			'action' => 'cadastro_produto'
		);
		$routes['cadastro_pesticida'] = array(
			'route' => '/cadastro_pesticida',
			'controller' => 'CadastroController',
			'action' => 'cadastro_pesticida'
		);
		$routes['cadastro_canteiro'] = array(
			'route' => '/cadastro_canteiro',
			'controller' => 'CadastroController',
			'action' => 'cadastro_canteiro'
		);
		$routes['cd_canteiro'] = array(
			'route' => '/cd_canteiro',
			'controller' => 'CadastroController',
			'action' => 'cd_canteiro'
		);
		$routes['cd_produto'] = array(
			'route' => '/cd_produto',
			'controller' => 'CadastroController',
			'action' => 'cd_produto'
		);
		$routes['cd_pesticida'] = array(
			'route' => '/cd_pesticida',
			'controller' => 'CadastroController',
			'action' => 'cd_pesticida'
		);
		$routes['plantacao'] = array(
			'route' => '/plantacao',
			'controller' => 'indexController',
			'action' => 'plantacao'
		);
		$routes['cd_plantacao'] = array(
			'route' => '/cd_plantacao',
			'controller' => 'CadastroController',
			'action' => 'cd_plantacao'
		);
		$routes['pesquisa'] = array(
			'route' => '/pesquisa',
			'controller' => 'indexController',
			'action' => 'pesquisa'
		);

		$this->setRoutes($routes);
	}

}

?>