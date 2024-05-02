<?php

include_once 'conexao/conexao.php';

class VendedorDAO
{
    public static function cadastrarVendedor($codigoRegiao, $nomeVendedor, $rgVendedor, $dataNascimento, $telefoneVendedor)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "INSERT INTO Vendedor (CodigoRegiao, NomeVendedor, RGVendedor, DataNascimento, TelefoneVendedor)
                    VALUES (:codigoRegiao, :nomeVendedor, :rgVendedor, :dataNascimento, :telefoneVendedor)";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':codigoRegiao', $codigoRegiao);
            $stmt->bindParam(':nomeVendedor', $nomeVendedor);
            $stmt->bindParam(':rgVendedor', $rgVendedor);
            $stmt->bindParam(':dataNascimento', $dataNascimento);
            $stmt->bindParam(':telefoneVendedor', $telefoneVendedor);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar vendedor: " . $e->getMessage();
            return false;
        }
    }

    public static function listarVendedores()
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT * FROM Vendedor";
            $stmt = $conexao->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar vendedores: " . $e->getMessage();
            return [];
        }
    }

    public static function excluirVendedor($codigoVendedor)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "DELETE FROM Vendedor WHERE CodigoVendedor = :codigoVendedor";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':codigoVendedor', $codigoVendedor);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao excluir vendedor: " . $e->getMessage();
            return false;
        }
    }
    public static function listarProdutosPorVendedor($nomeVendedor)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT Vendedor.NomeVendedor, Produto.NomeProduto, SUM(ItemNotaFiscal.QuantidadeProduto) as QuantidadeTotal
                FROM Produto
                JOIN ItemNotaFiscal ON Produto.CodigoProduto = ItemNotaFiscal.CodigoProduto
                JOIN NotaFiscal ON ItemNotaFiscal.CodigoNotaFiscal = NotaFiscal.CodigoNotaFiscal
                JOIN Vendedor ON NotaFiscal.CodigoVendedor = Vendedor.CodigoVendedor
                WHERE Vendedor.NomeVendedor = :NomeVendedor
                GROUP BY Vendedor.NomeVendedor, Produto.NomeProduto
                ORDER BY Produto.NomeProduto";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':NomeVendedor', $nomeVendedor);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar produtos por vendedor: " . $e->getMessage();
            return [];
        }
    }






    public static function pesquisarVendedores($nomeVendedor)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT * FROM Vendedor WHERE NomeVendedor LIKE :nomeVendedor";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':nomeVendedor', '%' . $nomeVendedor . '%');
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao pesquisar vendedores: " . $e->getMessage();
            return [];
        }
    }

}
?>