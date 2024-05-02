<?php
include_once 'conexao/conexao.php';

class ItemNotaFiscalDAO
{

    function cadastrarItemNotaFiscal($numeroItemNotaFiscal, $codigoProduto, $codigoNotaFiscal, $quantidadeProduto) {    
        try {
            $conexao = Conexao::getInstance();

            $sql = "INSERT INTO ItemNotaFiscal (NumeroItemNotaFiscal, CodigoProduto, CodigoNotaFiscal, QuantidadeProduto)
                    VALUES (:numeroItemNotaFiscal, :codigoProduto, :codigoNotaFiscal, :quantidadeProduto)";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':numeroItemNotaFiscal', $numeroItemNotaFiscal);
            $stmt->bindParam(':codigoProduto', $codigoProduto);
            $stmt->bindParam(':codigoNotaFiscal', $codigoNotaFiscal);
            $stmt->bindParam(':quantidadeProduto', $quantidadeProduto);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar item da nota fiscal: " . $e->getMessage();
            return false;
        }
    }

    public static function listarItensNotaFiscal()
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT * FROM ItemNotaFiscal";
            $stmt = $conexao->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar itens da nota fiscal: " . $e->getMessage();
            return false;
        }
    }

    public static function excluirItemNotaFiscal($numeroItemNotaFiscal)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "DELETE FROM ItemNotaFiscal WHERE NumeroItemNotaFiscal = :numeroItemNotaFiscal";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':numeroItemNotaFiscal', $numeroItemNotaFiscal);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao excluir item da nota fiscal: " . $e->getMessage();
            return false;
        }
    }
}

?>