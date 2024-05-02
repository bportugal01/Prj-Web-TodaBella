<?php
include_once 'conexao/conexao.php';

class ClienteDAO
{
    public static function cadastrarCliente( $nomeCliente, $rgCliente, $cpfCliente, $enderecoCliente)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "INSERT INTO Cliente (NomeCliente, RGCliente, CPFCliente, EnderecoCliente)
                    VALUES ( :nomeCliente, :rgCliente, :cpfCliente, :enderecoCliente)";

            $stmt = $conexao->prepare($sql);
          
            $stmt->bindParam(':nomeCliente', $nomeCliente);
            $stmt->bindParam(':rgCliente', $rgCliente);
            $stmt->bindParam(':cpfCliente', $cpfCliente);
            $stmt->bindParam(':enderecoCliente', $enderecoCliente);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao cadastrar cliente: " . $e->getMessage();
            return false;
        }
    }

    public static function listarClientes()
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT * FROM Cliente";
            $stmt = $conexao->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar clientes: " . $e->getMessage();
            return [];
        }
    }

    public static function excluirCliente($codigoCliente)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "DELETE FROM Cliente WHERE CodigoCliente = :codigoCliente";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':codigoCliente', $codigoCliente);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao excluir cliente: " . $e->getMessage();
            return false;
        }
    }

    public static function pesquisarClientes($nomeCliente)
    {
        try {
            $conexao = Conexao::getInstance();

            $sql = "SELECT * FROM Cliente WHERE NomeCliente LIKE :nomeCliente";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':nomeCliente', '%' . $nomeCliente . '%');
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao pesquisar clientes: " . $e->getMessage();
            return [];
        }
    }

   
}
?>