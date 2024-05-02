<?php
include_once 'conexao/conexao.php';

class PontoEstrategicoDAO
{
    public static function adicionarPontoEstrategico($pontoNome, $regiaoId)
    {
        try {
            $conexao = Conexao::getInstance();

            // Consulta de inserção parametrizada para evitar injeção de SQL
            $sql = "INSERT INTO PontoEstrategico (NomePonto, CodigoRegiao) VALUES (:pontoNome, :regiaoId)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':pontoNome', $pontoNome);
            $stmt->bindParam(':regiaoId', $regiaoId);
            $stmt->execute();

            echo "Ponto estratégico cadastrado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao cadastrar ponto estratégico: " . $e->getMessage();
        }
    }

    public static function listarPontosEstrategicos()
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT * FROM PontoEstrategico";
            $stmt = $conexao->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar pontos estratégicos: " . $e->getMessage();
            return [];
        }
    }

    public static function excluirPontoEstrategico($codigoPonto)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "DELETE FROM PontoEstrategico WHERE CodigoPonto = :codigoPonto";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':codigoPonto', $codigoPonto);
            $stmt->execute();

            echo "Ponto estratégico excluído com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao excluir ponto estratégico: " . $e->getMessage();
        }
    }

    public static function PontosRegioes(){
        try{
            $conexao = Conexao:: getInstance();
            $sql = "SELECT Regiao.NomeRegiao, PontoEstrategico.NomePonto
                    FROM Regiao
                    JOIN PontoEstrategico ON Regiao.CodigoRegiao = PontoEstrategico.CodigoRegiao
                    ORDER BY Regiao.CodigoRegiao, PontoEstrategico.CodigoPonto";
            $stmt = $conexao->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Erro ao listar pontos estratégicos: " . $e->getMessage();
            return [];
        }
    }

    
}
?>
