<?php
session_start(); // Inicia a sessão, se ainda não estiver iniciada

// Gera um token CSRF e o armazena na sessão
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

include_once 'DAO/UtilizacaoVeiculoDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    $codigoVeiculo = $_POST['codigoVeiculo'];
    $codigoVendedor = $_POST['codigoVendedor'];
    $dataUtilizacao = $_POST['dataUtilizacao'];

    UtilizacaoVeiculoDAO::cadastrarUtilizacaoVeiculo($codigoVeiculo, $codigoVendedor, $dataUtilizacao);

    // Limpa o token CSRF após o processamento do formulário
    unset($_SESSION['csrf_token']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Itens da Nota Fiscal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex flex-col h-screen">
    <div class="flex-grow bg-rose-50">
        <header>
            <nav class="bg-white outline outline-offset-2 outline-rose-700">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <a href="gerenciamento.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img src="assets/images/logo20.png" class="h-24" alt="Logo Toda Bella" />
                    </a>
                </div>
            </nav>
        </header>
        <main>
            <div class="flex justify-center py-24">
                <div class="block max-w-3xl p-6 bg-white border border-gray-200 rounded-lg shadow">
                    <h5 class="mb-2 text-4xl font-bold tracking-tight text-rose-700 text-center px-12 pb-5">Editar Utilização de Veículos</h5>
                    <form action="" method="POST" class="max-w-sm mx-auto">
                        <input type="hidden" name="csrf_token" value="<?php echo isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : ''; ?>">
                        <div>
                            <div class="mb-5">
                                <fieldset>
                                    <label for="codigoVeiculo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código do Veículo</label>
                                    <input type="text" id="codigoVeiculo" placeholder="Digite o código" name="codigoVeiculo" class="bg-gray-100 border-2 border-rose-700 text-gray-700 placeholder-rose-700 text-base focus:ring-rose-800 focus:border-rose-800 block w-full p-2.5" required/>
                                </fieldset>  
                            </div>
                        </div> 
                        <div class="grid grid-cols-2 gap-4">   
                            <div>
                                <div class="mb-5">
                                    <fieldset>
                                        <label for="codigoVendedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código do Vendedor</label>
                                        <input type="text" id="codigoVendedor" placeholder="Digite o nome" name="codigoVendedor" class="bg-gray-100 border-2 border-rose-700 text-gray-700 placeholder-rose-700 text-base focus:ring-rose-800 focus:border-rose-800 block w-full p-2.5" required/>
                                    </fieldset>    
                                </div>
                            </div>
                            <div>
                                <div class="mb-5">
                                    <fieldset>
                                        <label for="codigoRegiao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código da Região</label>
                                        <input type="number" id="codigoRegiao" placeholder="Digite o código" name="codigoRegiao" class="bg-gray-100 border-2 border-rose-700 text-gray-700 placeholder-rose-700 text-base focus:ring-rose-800 focus:border-rose-800 block w-full p-2.5" required/>
                                    </fieldset>   
                                </div>
                            </div>
                            <div>
                                <div class="mb-5">
                                    <fieldset>
                                        <label for="dataUtilizacao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data de Utilização</label>
                                        <input type="date" id="dataUtilizacao" name="dataUtilizacao" class="bg-gray-100 border-2 border-rose-700 text-gray-700 placeholder-rose-700 text-base focus:ring-rose-800 focus:border-rose-800 block w-full p-2.5" required/>
                                    </fieldset>
                                </div>
                            </div>    
                            <div>
                                <div class="mb-5">
                                    <fieldset>
                                        <label for="telefoneVendedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone</label>
                                        <input type="tel" id="telefoneVendedor" placeholder="Digite o telefone" name="telefoneVendedor" class="bg-gray-100 border-2 border-rose-700 text-gray-700 placeholder-rose-700 text-base focus:ring-rose-800 focus:border-rose-800 block w-full p-2.5" 
                                        oninput="formatCelular()" required/>
                                    </fieldset>   
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="inline-flex items-center px-10 py-2 text-base font-medium text-center text-white bg-rose-700 rounded-sm hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 mt-8">
                                Editar
                            </button>
                            <a href="gerenciamento.php">
                            <div class="inline-flex items-center px-10 py-2 text-base font-medium text-center text-white bg-rose-700 rounded-sm hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 mt-8">
                                Voltar
                            </div>
                            </a>
                        </div>
                    </form>   
                    <?php
                        include_once 'DAO/VendedorDAO.php';

                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $codigoRegiao = $_POST['codigoRegiao'];
                            $nomeVendedor = $_POST['nomeVendedor'];
                            $rgVendedor = $_POST['rgVendedor'];
                            $dataNascimento = $_POST['dataNascimento'];
                            $telefoneVendedor = $_POST['telefoneVendedor'];

                            VendedorDAO::cadastrarVendedor($codigoRegiao, $nomeVendedor, $rgVendedor, $dataNascimento, $telefoneVendedor);
                        }
                    ?>                                                    
                </div>
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
    
    <script>
        // Define a função para limpar os campos
        function limparCampos() {
            document.getElementById('codigoVeiculo').value = '';
            document.getElementById('codigoVendedor').value = '';
            document.getElementById('dataUtilizacao').value = '';
        }

        // Chama a função para limpar os campos quando a página é carregada
        window.onload = limparCampos;
    </script>
</body>
</html>