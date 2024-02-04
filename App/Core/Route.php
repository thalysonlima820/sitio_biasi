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
		$routes['regacao'] = array(
			'route' => '/regacao',
			'controller' => 'CadastroController',
			'action' => 'regacao'
		);
		$routes['irrigacao_concluida'] = array(
			'route' => '/irrigacao_concluida',
			'controller' => 'CadastroController',
			'action' => 'irrigacao_concluida'
		);

		$routes['listaproduto'] = array(
			'route' => '/listaproduto',
			'controller' => 'EditarController',
			'action' => 'listaproduto'
		);
		$routes['listapesticida'] = array(
			'route' => '/listapesticida',
			'controller' => 'EditarController',
			'action' => 'listapesticida'
		);
		$routes['listacanteiro'] = array(
			'route' => '/listacanteiro',
			'controller' => 'EditarController',
			'action' => 'listacanteiro'
		);
		$routes['editarproduto'] = array(
			'route' => '/editarproduto',
			'controller' => 'EditarController',
			'action' => 'editarproduto'
		);
		$routes['editarpesticida'] = array(
			'route' => '/editarpesticida',
			'controller' => 'EditarController',
			'action' => 'editarpesticida'
		);
		$routes['editarcanteiro'] = array(
			'route' => '/editarcanteiro',
			'controller' => 'EditarController',
			'action' => 'editarcanteiro'
		);
		$routes['salvarediproduto'] = array(
			'route' => '/salvarediproduto',
			'controller' => 'EditarController',
			'action' => 'salvarediproduto'
		);
		$routes['salvaredipesticida'] = array(
			'route' => '/salvaredipesticida',
			'controller' => 'EditarController',
			'action' => 'salvaredipesticida'
		);
		$routes['salvaredicanteiro'] = array(
			'route' => '/salvaredicanteiro',
			'controller' => 'EditarController',
			'action' => 'salvaredicanteiro'
		);
		$routes['deletar'] = array(
			'route' => '/deletar',
			'controller' => 'EditarController',
			'action' => 'deletar'
		);
		
		$routes['fechar'] = array(
			'route' => '/fechar',
			'controller' => 'EditarController',
			'action' => 'fechar'
		);
		$routes['coletar'] = array(
			'route' => '/coletar',
			'controller' => 'ColetarController',
			'action' => 'coletar'
		);
		$routes['cadastrarcoleta'] = array(
			'route' => '/cadastrarcoleta',
			'controller' => 'ColetarController',
			'action' => 'cadastrarcoleta'
		);
		

		$this->setRoutes($routes);
	}

}

?>