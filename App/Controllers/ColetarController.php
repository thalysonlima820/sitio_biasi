<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


//os models
use App\Models\Produto;
use App\Models\Info;


class ColetarController extends Action {

	public function layout(){
	 return	$this->view->layout = 'layout1';
	}

    public function coletar(){
        
        $produtos = Container::getModel('Lista');
        $produtos->__set('id', $_GET['id']);
        $resul = $produtos->pesplantacao();

        $this->view->produto = $resul;


        $this->render('/coletar', $this->layout());
    }
    public function cadastrarcoleta(){
        $produtos = Container::getModel('Cadastro');
        $mudarfix = Container::getModel('Cadastro');
    
        // Verificar se os dados estão definidos antes de acessá-los
        if (isset($_POST['canteiro'], $_POST['produto'], $_GET['id'], $_POST['qtd'], $_POST['data_coleta'], $_POST['qtd_coleta'])) {
            $produtos->__set('canteiro', $_POST['canteiro']);
            $produtos->__set('produto', $_POST['produto']);
            $mudarfix->__set('id', $_GET['id']);
            $produtos->__set('qtd', $_POST['qtd']);
            $produtos->__set('data_coleta', $_POST['data_coleta']);
            $produtos->__set('qtd_coleta', $_POST['qtd_coleta']);
    
            $produtos->cadastrarcoleta();
    
            // Chamar a função mudarfi() para atualizar o campo fix na tabela plantacao
            $mudarfix->mudarfi();
        } else {
            // Adicione uma lógica aqui para lidar com o caso em que os dados não estão definidos
            echo "Erro: Dados de entrada ausentes.";
        }
    
        $this->render('/coletar', $this->layout());
    }
    

   


}


?>