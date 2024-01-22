<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


//os models
use App\Models\Produto;
use App\Models\Info;


class IndexController extends Action {

	public function layout(){
	 return	$this->view->layout = 'layout1';
	}

	public function index() {

		$cod = Container::getModel('Pesquisa');

		$resultado = $cod->pesquisaindex();

		if ($resultado !== false) {
			$c = $resultado;
		} else {
			$c = [];
		}

		$this->view->cod = $c;

		$this->render('index', $this->layout());
	}

	public function plantacao() {

		$informacaos = Container::getModel('Produto');

		$canteiro = $informacaos->pesquisa_canterio();
		$produto = $informacaos->pesquisa_produto();
		$pesticida = $informacaos->pesquisa_pesticida();

		$this->view->canteiro = $canteiro;
		$this->view->produto = $produto;
		$this->view->pesticida = $pesticida;

		$this->render('plantacao', $this->layout());
	}

	public function pesquisa(){
		$cod = Container::getModel('Pesquisa');

		$cod->__set('numeracao', $_POST['cod']);

		$resultado = $cod->pesquisa();

		if ($resultado !== false) {
			$c = $resultado;
		} else {
			$c = [];
		}

		$this->view->cod = $c;

		$this->render('pesquisa', $this->layout());
	}




}


?>