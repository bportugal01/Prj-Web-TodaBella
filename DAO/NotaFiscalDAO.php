<?php
include_once 'conexao/conexao.php';

class NotaFiscalDAO
{
    public static function cadastrarNotaFiscal($codigoNotaFiscal, $numeroNotaFiscal, $codigoCliente, $codigoVendedor, $dataEmissao)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "INSERT INTO NotaFiscal (CodigoNotaFiscal, NumeroNotaFiscal, CodigoCliente, CodigoVendedor, DataEmissao)
                    VALUES (:codigoNotaFiscal, :numeroNotaFiscal, :codigoCliente, :codigoVendedor, :dataEmissao)";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':codigoNotaFiscal', $codigoNotaFiscal);
            $stmt->bindParam(':numeroNotaFiscal', $numeroNotaFiscal);
            $stmt->bindParam(':codigoCliente', $codigoCliente);
            $stmt->bindParam(':codigoVendedor', $codigoVendedor);
            $stmt->bindParam(':dataEmissao', $dataEmissao);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar nota fiscal: " . $e->getMessage();
            return false;
        }
    }

    public static function listarNotasFiscais()
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT * FROM NotaFiscal";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar notas fiscais: " . $e->getMessage();
            return false;
        }
    }

    public static function excluirNotaFiscal($codigoNotaFiscal)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "DELETE FROM NotaFiscal WHERE CodigoNotaFiscal = :codigoNotaFiscal";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':codigoNotaFiscal', $codigoNotaFiscal);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao excluir nota fiscal: " . $e->getMessage();
            return false;
        }
    }

    public static function listarQuantidadeItensNotaFiscal()
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT NotaFiscal.CodigoNotaFiscal, ItemNotaFiscal.QuantidadeProduto AS QuantidadeItens
            FROM NotaFiscal
            LEFT JOIN ItemNotaFiscal ON NotaFiscal.CodigoNotaFiscal = ItemNotaFiscal.CodigoNotaFiscal
            GROUP BY NotaFiscal.CodigoNotaFiscal";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar quantidade de itens por nota fiscal: " . $e->getMessage();
            return false;
        }
    }
}

?>