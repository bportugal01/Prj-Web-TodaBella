<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendedor - Produtos Vendidos</title>
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
</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <br>
    <div class="relative overflow-x-auto sm:rounded-lg px-5 md:px-20 pt-10">

    <div class="subscribe">
    <div class="container">
        <div class="row justify-content-center">
                <div class="section-heading">

                    <?php
                    include_once 'DAO/VendedorDAO.php';

                    // Inicializa a variável $vendedores
                    $vendedores = [];
                    $erroMensagem = '';

                    if (isset($_GET['nomeVendedor'])) {
                        $nomeVendedor = $_GET['nomeVendedor'];

                        // Verifica se o nome do vendedor foi digitado
                        if (empty($nomeVendedor)) {
                            $erroMensagem = 'Por favor, digite o nome do vendedor.';
                        } else {
                            // Chama a função para obter a lista de produtos por nome do vendedor
                            $vendedores = VendedorDAO::listarProdutosPorVendedor($nomeVendedor);

                            // Verifica se produtos foram encontrados
                            if (empty($vendedores)) {
                                $erroMensagem = 'Nenhum produto encontrado para o vendedor: ' . $nomeVendedor;
                            }
                        }
                    }
                    ?>

                    <h2 class="text-lg font-bold mb-4 text-rose-700">Todos os produtos vendidos por um determinado Vendedor</h2>
                    <table class="w-full bg-white border-2 border-rose-700 table-auto">
                        <thead>
                            <tr class="bg-rose-700 text-white">
                                <th colspan="3" class="px-4 py-2">
                                    <form action="" method="GET" class="flex items-center">
                                        <input type="text" name="nomeVendedor" id="nomeVendedor"
                                            placeholder="Digite o nome do vendedor" class="text-black w-96 px-2 py-1 border-2 border-rose-700 rounded-lg">&nbsp;&nbsp;&nbsp;
                                        <button type="submit"
                                            class="btn btn-primary bg-rose-400 text-white font-bold px-4 py-1 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300">Pesquisar</button>
                                    </form>
                                </th>
                            </tr>
                            <tr class="bg-rose-700 text-white">
                                <th class="px-4 py-2">Nome Vendedor</th>
                                <th class="px-4 py-2">Nome Produto</th>
                                <th class="px-4 py-2">Quantidade Total Vendida</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($erroMensagem)): ?>
                                <tr>
                                    <td colspan="3" class="border-2 border-rose-700 px-4 py-2">
                                        <?= $erroMensagem ?>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($vendedores as $vendedor): ?>
                                    <tr>
                                        <td class="border-2 border-rose-700 px-4 py-2">
                                            <?= $vendedor['NomeVendedor'] ?>
                                        </td>
                                        <td class="border-2 border-rose-700 px-4 py-2">
                                            <?= $vendedor['NomeProduto'] ?>
                                        </td>
                                        <td class="border-2 border-rose-700 px-4 py-2">
                                            <?= $vendedor['QuantidadeTotal'] ?>
                                        </td> <!-- Nova coluna de quantidade total -->
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <a href="select.php" class="block w-full mt-8">
                        <div class="inline-flex items-center justify-center px-10 py-2 text-base font-medium text-white bg-rose-700 rounded-sm hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300">
                            Voltar
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



    <script>

        $(function () {
            var selectedClass = "";
            $("p").click(function () {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function () {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });

    </script>

</div>

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