<?php

namespace App\Models;

use MF\Model\Model;

class Lista extends Model {

	private $id;
	private $nome;
	private $custo;
	private $vl_venda;
	private $tp_plantacao;

    private $nome_tabela;


    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $value){
        $this->$atributo = $value;
    }

    public function lista($tabela){
        $query = "select * from $tabela";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function editar($tabela){
        $query = "select * from $tabela where id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function pesplantacao(){
        $query = "select * from plantacao where id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();
        return $stmt->fetchAll();
    }



}

?>