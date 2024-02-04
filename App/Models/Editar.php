<?php

namespace App\Models;

use MF\Model\Model;

class Editar extends Model {

	private $id;
	private $nome;
	private $custo;
	private $tabela;
	private $vl_venda;
	private $numeracao;
	private $tp_plantacao;
	private $tipo_pesticida;



    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $value){
        $this->$atributo = $value;
    }

    public function salvarproduto(){
        $query = "update produto set nome = :nome, custo = :custo, vl_venda = :vl_venda, tp_plantacao = :tp_plantacao where id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':custo', $this->__get('custo'));
        $stmt->bindValue(':vl_venda', $this->__get('vl_venda'));
        $stmt->bindValue(':tp_plantacao', $this->__get('tp_plantacao'));
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

    }
    public function salvarpesticida(){
        $query = "update pesticida set nome = :nome, tipo_pesticida = :tipo_pesticida where id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':tipo_pesticida', $this->__get('tipo_pesticida'));
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

    }
    public function salvaredicanteiro(){
        $query = "update canteiro set numeracao = :numeracao where id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':numeracao', $this->__get('numeracao'));
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

    }
    public function deletar(){
        $query = "DELETE FROM " . $this->__get('tabela') . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

    }
    public function fechar(){
        $query = "update plantacao set fix = 1 where id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

    }



}

?>