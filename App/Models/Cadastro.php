<?php

namespace App\Models;

use MF\Model\Model;

class Cadastro extends Model {

	private $id;
    private $numeracao;

    private $nome;
    private $custo;
    private $vl_venda;
    private $tp_plantacao;

    private $tipo_pesticida;

    private $canteiro;
    private $produto;
    private $qtd;
    private $dat;
    private $ml_usado;
    private $pesticida;
    private $obs;
    private $carencia;

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
    public function salvar_plantacao(){

        $query = "INSERT INTO plantacao( canteiro, produto, qtd, dat, ml_usado, pesticida, obs, carencia) VALUES ( :canteiro, :produto, :qtd, :dat, :ml_usado, :pesticida, :obs, :carencia )";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':canteiro', $this->__get('canteiro'));
        $stmt->bindValue(':produto', $this->__get('produto'));
        $stmt->bindValue(':qtd', $this->__get('qtd'));
        $stmt->bindValue(':dat', $this->__get('dat'));
        $stmt->bindValue(':ml_usado', $this->__get('ml_usado'));
        $stmt->bindValue(':pesticida', $this->__get('pesticida'));
        $stmt->bindValue(':obs', $this->__get('obs'));
        $stmt->bindValue(':carencia', $this->__get('carencia'));
        $stmt->execute();
    }







}

?>