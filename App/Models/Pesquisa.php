<?php

namespace App\Models;

use MF\Model\Model;

class Pesquisa extends Model {

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

	public function pesquisa() {

        $query = "SELECT 
        pl.data_atu, pl.id, pl.canteiro, pl.produto, pl.qtd, pl.dat , pl.ml_usado, pl.pesticida, pl.obs, pl.carencia, pr.tp_plantacao
    FROM plantacao pl, produto pr WHERE pl.produto = pr.nome
    and pl.canteiro = :numeracao";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':numeracao', $this->__get('numeracao'));
        $stmt->execute();

		return $stmt->fetchAll();

	}

    public function pesquisaindex() {

        $query = "SELECT 
        pl.id,
            pl.dat,
            pl.canteiro, 
            pl.produto, 
            pl.qtd, 
            pl.ml_usado, 
            pl.pesticida, 
            pl.obs, 
            pl.carencia, 
            pr.tp_plantacao,
            pl.data_atu
        FROM 
            plantacao pl
        JOIN 
            produto pr ON pl.produto = pr.nome
        WHERE 
            DATE_ADD(pl.dat, INTERVAL pr.tp_plantacao DAY) <= CURDATE() 
            or DATE_ADD(pl.data_atu, INTERVAL pl.carencia DAY) <= CURDATE();
        ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

		return $stmt->fetchAll();

	}
    public function pesquisapesticida(){

        $query = "SELECT nome, tipo_pesticida FROM pesticida";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    
        return $stmt->fetchAll();

    }





}

?>