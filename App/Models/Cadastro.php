<?php

namespace App\Models;

use MF\Model\Model;

class Cadastro extends Model {

    private $pes;

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

    public function pescanteiro($nome_pes, $nome_tabela){

        $query = "SELECT $nome_pes FROM $nome_tabela WHERE $nome_pes = :pes";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':pes', $this->__get('pes'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function salvar_canteiro(){

        $query = "INSERT INTO canteiro(numeracao) VALUES(:numeracao)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':numeracao', $this->__get('numeracao'));
        $stmt->execute();

        return $this;
    }

    public function salvar_produto(){

        $query = "INSERT INTO produto(nome, custo, vl_venda, tp_plantacao) VALUES (:nome, :custo, :vl_venda, :tp_plantacao)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':custo', $this->__get('custo'));
        $stmt->bindValue(':vl_venda', $this->__get('vl_venda'));
        $stmt->bindValue(':tp_plantacao', $this->__get('tp_plantacao'));
        $stmt->execute();

    }

    public function salvar_pesticida(){

        $query = "INSERT INTO pesticida( tipo_pesticida, nome) VALUES ( :tipo_pesticida, :nome)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':tipo_pesticida', $this->__get('tipo_pesticida'));
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->execute();
    }







}

?>