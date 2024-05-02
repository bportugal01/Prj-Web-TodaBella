<?php
include_once 'conexao/conexao.php';

class VeiculoDAO
{
    public static function cadastrarVeiculo($codigoVeiculo, $placaVeiculo, $tipoVeiculo, $modeloVeiculo)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "INSERT INTO Veiculo (CodigoVeiculo, PlacaVeiculo, TipoVeiculo, ModeloVeiculo)
                    VALUES (:codigoVeiculo, :placaVeiculo, :tipoVeiculo, :modeloVeiculo)";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':codigoVeiculo', $codigoVeiculo);
            $stmt->bindParam(':placaVeiculo', $placaVeiculo);
            $stmt->bindParam(':tipoVeiculo', $tipoVeiculo);
            $stmt->bindParam(':modeloVeiculo', $modeloVeiculo);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar veículo: " . $e->getMessage();
            return false;
        }
    }

    public static function listarVeiculos()
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT * FROM Veiculo";
            $stmt = $conexao->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar veículos: " . $e->getMessage();
            return [];
        }
    }

    public static function excluirVeiculo($codigoVeiculo)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "DELETE FROM Veiculo WHERE CodigoVeiculo = :codigoVeiculo";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':codigoVeiculo', $codigoVeiculo);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao excluir veículo: " . $e->getMessage();
            return false;
        }
    }

    public static function VendedorVeiculo()
    {
        try {
            $conexao = Conexao::getInstance();
            $sql = "SELECT Vendedor.NomeVendedor, Veiculo.PlacaVeiculo
                FROM Vendedor
                JOIN UtilizacaoVeiculo ON Vendedor.CodigoVendedor = UtilizacaoVeiculo.CodigoVendedor
                JOIN Veiculo ON UtilizacaoVeiculo.CodigoVeiculo = Veiculo.CodigoVeiculo
                WHERE UtilizacaoVeiculo.DataUtilizacao >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
                ORDER BY Vendedor.CodigoVendedor, UtilizacaoVeiculo.DataUtilizacao DESC";
            $stmt = $conexao->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar vendedor e veículo: " . $e->getMessage();
            return [];
        }
    }

    public static function listarVendedoresVeiculosUltimoMes()
    {
        try {
            $conexao = Conexao::getInstance();
            $sql = "SELECT Vendedor.NomeVendedor, Vendedor.CodigoVendedor, Veiculo.PlacaVeiculo, Veiculo.CodigoVeiculo, Veiculo.TipoVeiculo, Veiculo.ModeloVeiculo
                FROM Vendedor
                JOIN UtilizacaoVeiculo ON Vendedor.CodigoVendedor = UtilizacaoVeiculo.CodigoVendedor
                JOIN Veiculo ON UtilizacaoVeiculo.CodigoVeiculo = Veiculo.CodigoVeiculo
                WHERE UtilizacaoVeiculo.DataUtilizacao >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
                ORDER BY Vendedor.CodigoVendedor, UtilizacaoVeiculo.DataUtilizacao DESC";
            $stmt = $conexao->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar vendedores e veículos do último mês: " . $e->getMessage();
            return [];
        }
    }

    public static function listarHistoricoUtilizacao($placaVeiculo)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT UtilizacaoVeiculo.DataUtilizacao, Vendedor.NomeVendedor, Veiculo.PlacaVeiculo
            FROM UtilizacaoVeiculo
            JOIN Veiculo ON UtilizacaoVeiculo.CodigoVeiculo = Veiculo.CodigoVeiculo
            JOIN Vendedor ON UtilizacaoVeiculo.CodigoVendedor = Vendedor.CodigoVendedor
            WHERE Veiculo.PlacaVeiculo = :placaVeiculo
            ORDER BY UtilizacaoVeiculo.DataUtilizacao DESC";


            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':placaVeiculo', $placaVeiculo);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar histórico de utilização: " . $e->getMessage();
            return [];
        }
    }

}



?>