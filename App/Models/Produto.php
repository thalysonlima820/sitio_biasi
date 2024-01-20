<?php

namespace App\Models;

use MF\Model\Model;

class Produto extends Model {

    private $id;
    private $numeracao;

    private $nome;
    private $custo;
    private $vl_venda;
    private $tp_plantacao;

    private $tipo_pesticida;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $value){
        $this->$atributo = $value;
    }

	public function pesquisa_canterio() {

        $query = "SELECT numeracao as canteiro FROM canteiro";
		return $this->db->query($query)->fetchAll();

	}
	public function pesquisa_produto() {

        $query = "SELECT nome as produto FROM produto";
		return $this->db->query($query)->fetchAll();

	}
	public function pesquisa_pesticida() {

        $query = "SELECT nome as pesticida FROM pesticida";
		return $this->db->query($query)->fetchAll();

	}


    public function autenticar(){

        $query = "SELECT id, nome, preco FROM produto WHERE id = :cod";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':cod', $this->__get('id'));
        $stmt->execute();
    
        return $stmt->fetch(\PDO::FETCH_ASSOC);

    }







}

?>