<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Cliente</title>
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
                    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-rose-500 rounded-lg md:hidden hover:bg-rose-100 focus:outline-none focus:ring-2 focus:ring-rose-200" aria-controls="navbar-default" aria-expanded="false">
                        <span class="sr-only">Abrir Menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                        </svg>
                    </button>
                    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-rose-100 rounded-lg bg-white md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
                            <li>
                                <a href="gerenciamento.php" class="block py-2 px-3 text-rose-700 text-lg font-bold rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-400 md:p-0">Home</a>
                            </li>
                            <li>
                                <a href="select.php" class="block py-2 px-3 text-rose-700 text-lg font-bold rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-400 md:p-0">Pesquisas Detalhadas</a>
                            </li>
                            <li>
                                <a href="sair.php" class="block py-2 px-3 text-rose-700 text-lg font-bold rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-400 md:p-0">Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>  
            </nav>
            <main class="pb-12">
                <?php
                    include_once 'DAO/ClienteDAO.php';

                    try {
                        // Verifica se foi feita uma pesquisa
                        if (isset($_GET['search'])){
                            $search = htmlspecialchars($_GET['search']); // Sanitiza o input
                            $clientes = ClienteDAO::pesquisarClientes($search);
                        } else {
                            $clientes = ClienteDAO::listarClientes();
                        }
                    } catch (PDOException $e) {
                        // Loga o erro em um ambiente de produção
                        error_log("Erro no script: " . $e->getMessage());
                        // Mensagem de erro genérica para o usuário
                        $clientes = [];
                    }
                ?>

                <div class="relative overflow-x-auto sm:rounded-lg px-5 md:px-40 pt-20">
                    <h5 class="mb-2 text-3xl font-bold tracking-tight text-rose-700 text-left">Consulta de Clientes</h5>
                    <table class="w-full text-base text-center rtl:text-right text-gray-900 p-5 border border-rose-700">
                        <thead class="text-base text-white uppercase bg-rose-700">
                            <th colspan="5" class="pt-5 pb-5">        
                                <form action="" method="GET" class="max-w-md mx-auto">   
                                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Pesquisar</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                            </svg>
                                        </div>
                                        <input type="text" name="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-rose-800 rounded-lg focus:ring-rose-500 focus:border-rose-500" placeholder="Digite o nome do cliente" 
                                            value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"/>
                                        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-rose-700 hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 font-medium rounded-lg text-sm px-4 py-2">Pesquisar</button>
                                    </div>
                                </form>  
                            </th>
                            <tr>  
                                <th scope="col" class="px-6 py-3">
                                    Código
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nome
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    RG
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    CPF
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Endereço
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-rose-800">
                            <?php if (empty($clientes)): ?>
                                <tr>
                                    <td colspan="5">Cliente não encontrado</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($clientes as $cliente): ?>
                                    <tr>
                                        <td class="px-6 py-4 bg-rose-200" data-label="Código do Cliente">
                                            <?= $cliente['CodigoCliente']; ?>
                                        </td>
                                        <td class="px-6 py-4" data-label="Nome do Cliente">
                                            <?= $cliente['NomeCliente']; ?>
                                        </td>

                                        <td class="px-6 py-4 bg-rose-200" data-label="RG do Cliente">
                                            <?= $cliente['RGCliente']; ?>
                                        </td>

                                        <td class="px-6 py-4" data-label="CPF do Cliente">
                                            <?= $cliente['CPFCliente']; ?>
                                        </td>

                                        <td class="px-6 py-4 bg-rose-200" data-label="Endereço do Cliente">
                                            <?= $cliente['EnderecoCliente']; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>  
                        </tbody>
                    </table>
                </div>    
            </main>
        </header>
    </div>
    <footer class="bg-rose-700 shadow mt-auto">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
            <span class="block text-base text-white text-center">Copyright © 2024 | Todos os direitos reservados - Toda Bella</span>
        </div>
    </footer>    

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="assets/js/menu.js"></script>        
</body>
</html>