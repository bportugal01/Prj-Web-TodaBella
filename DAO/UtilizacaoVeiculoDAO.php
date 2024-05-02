<?php
include_once 'conexao/conexao.php';

class UtilizacaoVeiculoDAO
{
    public static function cadastrarUtilizacaoVeiculo($codigoVeiculo, $codigoVendedor, $dataUtilizacao)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "INSERT INTO UtilizacaoVeiculo (CodigoVeiculo, CodigoVendedor, DataUtilizacao)
                    VALUES (:codigoVeiculo, :codigoVendedor, :dataUtilizacao)";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':codigoVeiculo', $codigoVeiculo);
            $stmt->bindParam(':codigoVendedor', $codigoVendedor);
            $stmt->bindParam(':dataUtilizacao', $dataUtilizacao);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar utilização de veículo: " . $e->getMessage();
            return false;
        }
    }

    public static function listarUtilizacoesVeiculo()
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT * FROM UtilizacaoVeiculo";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar utilizações de veículo: " . $e->getMessage();
            return false;
        }
    }

    public static function excluirUtilizacaoVeiculo($codigoUtilizacao)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "DELETE FROM UtilizacaoVeiculo WHERE CodigoUtilizacao = :codigoUtilizacao";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':codigoUtilizacao', $codigoUtilizacao);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao excluir utilização de veículo: " . $e->getMessage();
            return false;
        }
    }
}

?>