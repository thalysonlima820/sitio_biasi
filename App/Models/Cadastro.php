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
    private $dat_atu;
    private $numero_canterio;
    private $tempo_irrigacao;
    private $id_canteiro;

    private $qtd_coleta;
    private $data_coleta;

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

        $query = "INSERT INTO plantacao( canteiro, produto, qtd, dat, ml_usado, pesticida, obs, carencia, data_atu) VALUES ( :canteiro, :produto, :qtd, :dat, :ml_usado, :pesticida, :obs, :carencia, :data_atu )";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':canteiro', $this->__get('canteiro'));
        $stmt->bindValue(':produto', $this->__get('produto'));
        $stmt->bindValue(':qtd', $this->__get('qtd'));
        $stmt->bindValue(':dat', $this->__get('dat'));
        $stmt->bindValue(':ml_usado', $this->__get('ml_usado'));
        $stmt->bindValue(':pesticida', $this->__get('pesticida'));
        $stmt->bindValue(':obs', $this->__get('obs'));
        $stmt->bindValue(':carencia', $this->__get('carencia'));
        $stmt->bindValue(':data_atu', $this->__get('dat'));
        $stmt->execute();
    }

    public function atualizar_pes(){
        $query = "update plantacao set pesticida = :pesticida, data_atu = :dat_atu, ml_usado = :ml_usado,
         carencia = :carencia, fix = 0
        where id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':pesticida', $this->__get('pesticida'));
        $stmt->bindValue(':dat_atu', $this->__get('dat_atu'));
        $stmt->bindValue(':ml_usado', $this->__get('ml_usado'));
        $stmt->bindValue(':carencia', $this->__get('carencia'));
        $stmt->bindValue(':id', $this->__get('id'));

        $stmt->execute();
        
    }
    public function irrigacao(){
        $query = "INSERT INTO historico_irrigacao( data, tempo_regacao, numero_canterio, id_canteiro, pesticida, ml_usado, carencia ) VALUES ( :data, :tempo_regacao, :numero_canterio, :id_canteiro, :pesticida, :ml_usado, :carencia )";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':data', $this->__get('dat_atu'));
        $stmt->bindValue(':tempo_regacao', $this->__get('tempo_irrigacao'));
        $stmt->bindValue(':numero_canterio', $this->__get('numero_canterio'));
        $stmt->bindValue(':id_canteiro', $this->__get('id_canteiro'));
        $stmt->bindValue(':pesticida', $this->__get('pesticida'));
        $stmt->bindValue(':ml_usado', $this->__get('ml_usado'));
        $stmt->bindValue(':carencia', $this->__get('carencia'));
        $stmt->execute();
    }


    public function cadastrarcoleta(){
        $query = "INSERT INTO coleta( produto, qtd, data_coleta, qtd_coleta, canteiro ) 
        VALUES ( :produto, :qtd, :data_coleta, :qtd_coleta, :canteiro )";
    
        $stmt = $this->db->prepare($query);
    
        // Verificar se os dados estão definidos antes de acessá-los
        if ($this->__get('canteiro') && $this->__get('produto') && $this->__get('qtd') && $this->__get('data_coleta') && $this->__get('qtd_coleta')) {
            $stmt->bindValue(':canteiro', $this->__get('canteiro'));
            $stmt->bindValue(':produto', $this->__get('produto'));
            $stmt->bindValue(':qtd', $this->__get('qtd'));
            $stmt->bindValue(':data_coleta', $this->__get('data_coleta'));
            $stmt->bindValue(':qtd_coleta', $this->__get('qtd_coleta'));
            $stmt->execute();
        } else {
            // Adicione uma lógica aqui para lidar com o caso em que os dados não estão definidos
            echo "Erro: Dados de entrada ausentes.";
        }
    }
    
    public function mudarfi(){
        $query = "UPDATE plantacao SET fix = 3 WHERE id = :id";
        $stmt = $this->db->prepare($query);
    
        // Verificar se o ID está definido antes de acessá-lo
        if ($this->__get('id')) {
            $stmt->bindValue(':id', $this->__get('id'));
            $stmt->execute();
        } else {
            // Adicione uma lógica aqui para lidar com o caso em que o ID não está definido
            echo "Erro: ID ausente.";
        }
    }






}

?>