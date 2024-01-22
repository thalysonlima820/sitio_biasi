<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


//os models
use App\Models\Produto;
use App\Models\Info;


class CadastroController extends Action {

	public function layout(){
	 return	$this->view->layout = 'layout1';
	}


	public function cadastro_produto() {


		$this->render('cadastro_produto', $this->layout());
	}
	
	public function cadastro_pesticida() {


		$this->render('cadastro_pesticida', $this->layout());
	}

	public function cadastro_canteiro() {


		$this->render('cadastro_canteiro', $this->layout());
	}
	public function cd_canteiro(){
		
		$cadastro = Container::getModel('Cadastro');

		$cadastro->__set('pes', $_POST['numeracao']);

		$cadastro->__set('numeracao', $_POST['numeracao']);

		if(count($cadastro->pescanteiro('numeracao', 'canteiro')) == 0){
			$cadastro->salvar_canteiro();
			$this->render('/cadastro_canteiro', $this->layout());
		}else{
			$this->view->erro = true;
			$this->render('/cadastro_canteiro', $this->layout());
		}
	}

	public function cd_produto(){

		$cadastro = Container::getModel('Cadastro');

		$cadastro->__set('pes', $_POST['nome']);

		$cadastro->__set('nome', $_POST['nome']);
		$cadastro->__set('custo', $_POST['custo']);
		$cadastro->__set('vl_venda', $_POST['vl_venda']);
		$cadastro->__set('tp_plantacao', $_POST['tp_plantacao']);

		if(count($cadastro->pescanteiro('nome', 'produto')) == 0){
			$cadastro->salvar_produto();
			$this->render('/cadastro_produto', $this->layout());
		}else{
			$this->view->erro = true;
			$this->render('/cadastro_produto', $this->layout());
		}
	}

	public function cd_pesticida(){

		$cadastro = Container::getModel('Cadastro');

		$cadastro->__set('pes', $_POST['nome']);

		$cadastro->__set('tipo_pesticida', $_POST['tipo_pesticida']);
		$cadastro->__set('nome', $_POST['nome']);


		if(count($cadastro->pescanteiro('nome', 'pesticida')) == 0){
			$cadastro->salvar_pesticida();
			$this->render('/cadastro_pesticida', $this->layout());
		}else{
			$this->view->erro = true;
			$this->render('/cadastro_pesticida', $this->layout());
		}
	}

	public function cd_plantacao(){
		
		$cadastro = Container::getModel('Cadastro');

		$cadastro->__set('canteiro', $_POST['canteiro']);
		$cadastro->__set('produto', $_POST['produto']);
		$cadastro->__set('qtd', $_POST['qtd']);
		$cadastro->__set('dat', $_POST['dat']);
		$cadastro->__set('ml_usado', $_POST['ml_usado']);
		$cadastro->__set('pesticida', $_POST['pesticida']);
		$cadastro->__set('obs', $_POST['obs']);
		$cadastro->__set('carencia', $_POST['carencia']);

		$cadastro->salvar_plantacao();

		$this->render('/cadastro_pesticida', $this->layout());
	}



}


?>