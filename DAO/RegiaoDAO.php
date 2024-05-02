<?php
include_once 'conexao/conexao.php';

class RegiaoDAO
{
    public static function adicionarRegiao($regiaoNome)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "INSERT INTO Regiao (NomeRegiao) VALUES (:regiaoNome)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':regiaoNome', $regiaoNome);
            $stmt->execute();

            echo "Região cadastrada com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao cadastrar região: " . $e->getMessage();
        }
    }

    public static function listarRegioes()
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT * FROM Regiao";
            $stmt = $conexao->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar regiões: " . $e->getMessage();
            return [];
        }
    }

    public static function excluirRegiao($codigoRegiao)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "DELETE FROM Regiao WHERE CodigoRegiao = :codigoRegiao";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':codigoRegiao', $codigoRegiao);
            $stmt->execute();

            echo "Região excluída com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao excluir região: " . $e->getMessage();
        }
    }

    public static function listarVendedoresPorRegiao()
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT Regiao.NomeRegiao, Vendedor.NomeVendedor
            FROM Vendedor
            JOIN Regiao ON Vendedor.CodigoRegiao = Regiao.CodigoRegiao
            ORDER BY Regiao.CodigoRegiao, Vendedor.NomeVendedor";
            $stmt = $conexao->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar vendedores por região: " . $e->getMessage();
            return [];
        }
    }
}



?>