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







	public function autenticar(){

        $cod = Container::getModel('Pro');

		$cod->__set('id', $_POST['cod']);

		$resultado = $cod->autenticar();

		if ($resultado !== false) {
			$c = $resultado;
		} else {
			$c = [];
		}
		
		$this->view->teste = $c;

		$this->render('achou', $this->layout());

    }

}


?>