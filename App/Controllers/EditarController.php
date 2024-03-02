<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


//os models
use App\Models\Produto;
use App\Models\Info;


class EditarController extends Action {

	public function layout(){
	 return	$this->view->layout = 'layout1';
	}

    public function listaproduto(){

        $produtos = Container::getModel('Lista');


        $resul = $produtos->lista('produto');

        $this->view->produto = $resul;

        $this->render('listaproduto', $this->layout());
    }
    public function listapesticida(){

        $produtos = Container::getModel('Lista');

        $resul = $produtos->lista('pesticida');

        $this->view->produto = $resul;

        $this->render('listapesticida', $this->layout());
    }
    public function listacanteiro(){

        $produtos = Container::getModel('Lista');

        $resul = $produtos->lista('canteiro');

        $this->view->produto = $resul;

        $this->render('listacanteiro', $this->layout());
    }

    public function editarproduto(){

        $documentos = Container::getModel('Lista');

        $documentos->__set('id', $_GET['id']);

        $docu = $documentos->editar('produto');

        $this->view->valor = $docu;

        $this->render('editarproduto', $this->layout());
    }
    public function editarpesticida(){

        $documentos = Container::getModel('Lista');

        $documentos->__set('id', $_GET['id']);

        $docu = $documentos->editar('pesticida');

        $this->view->valor = $docu;

        $this->render('editarpesticida', $this->layout());
    }
    public function editarcanteiro(){

        $documentos = Container::getModel('Lista');

        $documentos->__set('id', $_GET['id']);

        $docu = $documentos->editar('canteiro');

        $this->view->valor = $docu;

        $this->render('editarcanteiro', $this->layout());
    }

    public function salvarediproduto(){

        $documentos = Container::getModel('Editar');

        $documentos->__set('id', $_GET['id']);
        $documentos->__set('nome', $_POST['nome']);
        $documentos->__set('custo', $_POST['custo']);
        $documentos->__set('vl_venda', $_POST['vl_venda']);
        $documentos->__set('tp_plantacao', $_POST['tp_plantacao']);

        $documentos->salvarproduto();

        $this->render('/', $this->layout());
    }
    public function salvaredipesticida(){

        $documentos = Container::getModel('Editar');

        $documentos->__set('id', $_GET['id']);
        $documentos->__set('nome', $_POST['nome']);
        $documentos->__set('tipo_pesticida', $_POST['tipo_pesticida']);


        $documentos->salvarpesticida();

        $this->render('/', $this->layout());
    }
    public function salvaredicanteiro(){

        $documentos = Container::getModel('Editar');

        $documentos->__set('id', $_GET['id']);
        $documentos->__set('numeracao', $_POST['numeracao']);

        $documentos->salvaredicanteiro();

        $this->render('listacanteiro', $this->layout());
    }

    public function deletar(){
        try {
            $documentos = Container::getModel('Editar');
    
            $documentos->__set('id', $_GET['id']);
            $documentos->__set('tabela', $_GET['tabela']);
    
            $documentos->deletar();
    
            echo json_encode(['status' => 'success', 'message' => 'Registro deletado com sucesso']);
        } catch (\Exception $e) {
            echo json_encode(['status' => 'error', 'message' => 'Falha ao deletar o registro: ' . $e->getMessage()]);
        }
    }
    
    public function fechar() {
        $response = ['status' => 'error', 'message' => 'Ocorreu um erro.'];
    
        if (isset($_GET['id'])) {
            try {
                // Lógica para fechar a atualização
                $documentos = Container::getModel('Editar');
                $documentos->__set('id', $_GET['id']);
                $documentos->fecharAtualizacao();
    
                // Obtenha os dados atualizados
                $cod = Container::getModel('Pesquisa');
                $resultado = $cod->pesquisaindex();
    
                // Atualize a resposta para sucesso e inclua os dados
                $response['status'] = 'success';
                $response['message'] = 'Dados retornados com sucesso.';
                $response['data'] = $resultado;
    
            } catch (\Exception $e) {
                // Se ocorrer uma exceção, log e mantenha a resposta como erro
                error_log('Exceção: ' . $e->getMessage());
            }
        } else {
            error_log('Código GET não recebido.');
        }
    
        // Envie a resposta JSON
        echo json_encode($response);
    }
    
    
    
    


}


?>