<?php
include_once 'DAO/UserDAO.php';

// Se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Verifica se os campos estão vazios
    if (empty($email) || empty($senha)) {
        $erroLogin = "Por favor, preencha todos os campos.";
    } else {
        // Chama o método de login
        if (UserDAO::login($email, $senha)) {
            // Login bem-sucedido, redireciona para a página desejada
            header("Location: gerenciamento.php");
            exit();
        } else {
            // Exibe mensagem de erro no login
            $erroLogin = "Credenciais inválidas. Tente novamente.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex flex-col h-screen">
    <div class="flex-grow bg-rose-50">
        <header>
            <nav class="bg-white outline outline-offset-2 outline-rose-700">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img src="assets/images/logo20.png" class="h-24" alt="Logo Toda Bella" />
                    </a>
                </div>
            </nav>
        </header>
        <main>
            <div class="flex justify-center py-24">
                <a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow">
                    <form class="max-w-sm mx-auto" id="subscribe" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <?php if (isset($erroLogin)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $erroLogin; ?>
                            </div>
                        <?php endif; ?>

                        <h5 class="mb-2 text-4xl font-bold tracking-tight text-rose-700 text-center">Login</h5>
                        <br>
                        <h1 class="mb-2 text-base tracking-tight text-gray-400 text-center">Por favor, efetue o login utilizando as credenciais corretas.</h1>
                        <div class="mb-5">
                            <label for="e-mail" class="block mb-2 text-base font-medium">Seu e-mail</label>
                            <fieldset>
                                <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" class="bg-gray-100 border-2 border-rose-700 text-gray-700 placeholder-rose-700 text-base focus:ring-rose-800 focus:border-rose-800 block w-full p-2.5" placeholder="Digite seu e-mail"  required="">
                            </fieldset>    
                        </div>
                        <div>
                            <label for="senha" class="block mb-2 text-base font-medium">Sua senha</label>
                            <fieldset>
                                <input type="password" name="senha" id="senha" class="bg-gray-100 border-2 border-rose-700 text-gray-700 placeholder-rose-700 text-base focus:ring-rose-800 focus:border-rose-800 block w-full p-2.5" placeholder="Digite sua senha" required="">
                            </fieldset>
                        </div>
                        <div class="text-center">
                            <button type="submit" id="form-submit" class="inline-flex items-center px-10 py-2 text-base font-medium text-center text-white bg-rose-700 rounded-sm hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 mt-8">
                                Entrar
                            </button>
                        </div> 
                    </form>                                                    
                </a>
            </div>    
        </main>
    </div>    
    <footer class="bg-rose-700 shadow">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
            <span class="block text-base text-white text-center">Copyright © 2024 | Todos os direitos reservados - Toda Bella</span>
        </div>
    </footer>

    <script src="https://cdn.tailwindcss.com"></script>  
    <script src="assets/js/menu.js"></script>     
</body>
</html>        