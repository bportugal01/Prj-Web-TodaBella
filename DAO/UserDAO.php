<?php
include_once 'conexao/conexao.php';

class UserDAO
{
    public static function login($email, $senha) {
        // Aqui você implementaria a lógica real de verificação no banco de dados
        // Neste exemplo, apenas comparação simples é usada
        $usuarios = [
            ['email' => 'admin@example.com', 'senha' => 'senha123'],
            ['email' => 'admin2@example.com', 'senha' => 'senha456'],
        ];

        foreach ($usuarios as $usuario) {
            if ($usuario['email'] === $email && $usuario['senha'] === $senha) {
                return true;
            }
        }

        return false;
    }
}

?>