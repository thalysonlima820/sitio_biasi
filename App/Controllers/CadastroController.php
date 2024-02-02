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

	public function regacao(){

		$pesquisa = Container::getModel('Pesquisa');

		$resultadosPesticida = $pesquisa->pesquisapesticida();


		$id = isset($_GET['id']) ? $_GET['id'] : null;
		$canteiros = isset($_GET['canteiro']) ? $_GET['canteiro'] : null;

		if ($canteiros !== null) {
			// O índice 'canteiro' está definido, você pode usar $canteiros aqui
			$this->view->canteiro = $canteiros;
		} else {
			// O índice 'canteiro' não está definido, lide com isso conforme necessário
			$this->view->canteiro = 'Valor padrão'; // ou null ou qualquer valor padrão desejado
		}

		$this->view->id = $id;
		$this->view->pesticida = $resultadosPesticida;

		$this->view->pesticida = $resultadosPesticida;

		$this->render('/regacao', $this->layout());
	}

	public function irrigacao_concluida(){


		$atualizar_pesticida = Container::getModel('Cadastro');
		$irrigacao = Container::getModel('Cadastro');

		$atualizar_pesticida->__set('pesticida', $_POST['pesticida']);
		$atualizar_pesticida->__set('dat_atu', $_POST['dat_atu']);
		$atualizar_pesticida->__set('ml_usado', $_POST['ml_usado']);
		$atualizar_pesticida->__set('carencia', $_POST['carencia']);
		$atualizar_pesticida->__set('id', $_GET['id']);


		$irrigacao->__set('tempo_irrigacao', $_POST['tempo_irrigacao']);
		$irrigacao->__set('dat_atu', $_POST['dat_atu']);
		$irrigacao->__set('numero_canterio', $_GET['canteiro']);

		$irrigacao->__set('id_canteiro',  $_GET['id']);
		$irrigacao->__set('pesticida', $_POST['pesticida']);
		$irrigacao->__set('ml_usado', $_POST['ml_usado']);
		$irrigacao->__set('carencia', $_POST['carencia']);

		$atualizar_pesticida->atualizar_pes();
		$irrigacao->irrigacao();


		$this->render('/cadastro_produto', $this->layout());
	}



}


?>