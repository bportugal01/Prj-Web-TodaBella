<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select</title>
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

    <!-- Restante do seu código HTML -->

    <body>
        <!-- ***** Preloader Start ***** -->
        <div id="preloader">
            <div class="jumper">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <!-- ***** Preloader End ***** -->

        <div class="relative overflow-x-auto sm:rounded-lg px-5 md:px-20 pt-10">
                        
            <div class="max-w-lg mx-auto p-2">
                <details class="bg-rose-700 dark:open:bg-rose-700 ring-1 ring-black/5 dark:ring-white/10 shadow-lg p-6 rounded-lg">
                    <summary class="text-sm leading-6 text-white font-semibold select-none">
                        A – Pontos Estratégicos por Região:
                    </summary>
                    <div class="mt-3 text-sm leading-6 text-white dark:ring-white-text-slate-400">
                        <p>Este relatório apresenta uma lista completa de todos os pontos estratégicos em cada região. Esses pontos podem incluir áreas de grande circulação, locais de interesse comercial ou quaisquer outras localidades relevantes para a estratégia de negócios. <a href="select_Ponto_Regiao.php" class="text-rose-200">Visualize</a></p>
                    </div>
                </details>
            </div>

            <div class="max-w-lg mx-auto p-2">
                <details class="bg-rose-700 dark:open:bg-rose-700 ring-1 ring-black/5 dark:ring-white/10 shadow-lg p-6 rounded-lg">
                    <summary class="text-sm leading-6 text-white font-semibold select-none">
                        B – Nomes das Regiões Cadastradas:
                    </summary>
                    <div class="mt-3 text-sm leading-6 text-white dark:ring-white-text-slate-400">
                        <p>Neste documento, estão discriminados os nomes de todas as regiões que foram cadastradas no sistema. Isso proporciona uma visão geral das áreas geográficas abrangidas pelo sistema de gestão, facilitando a organização e a referência. <a href="select_Regiao.php" class="text-rose-200">Visualize</a></p>
                    </div>
                </details>
            </div>

            <div class="max-w-lg mx-auto p-2">
                <details class="bg-rose-700 dark:open:bg-rose-700 ring-1 ring-black/5 dark:ring-white/10 shadow-lg p-6 rounded-lg">
                    <summary class="text-sm leading-6 text-white font-semibold select-none">
                        C – Vendedores e Veículos do Último Mês:
                    </summary>
                    <div class="mt-3 text-sm leading-6 text-white dark:ring-white-text-slate-400">
                        <p>Esse relatório detalha todos os vendedores ativos e os veículos que utilizaram no último mês. Essa informação é valiosa para avaliar a mobilidade dos vendedores e entender as preferências de veículos associadas ao desempenho de vendas. <a href="select_VendedorVeiculo.php" class="text-rose-200">Visualize</a></p>
                    </div>
                </details>
            </div>

            <div class="max-w-lg mx-auto p-2">
                <details class="bg-rose-700 dark:open:bg-rose-700 ring-1 ring-black/5 dark:ring-white/10 shadow-lg p-6 rounded-lg">
                    <summary class="text-sm leading-6 text-white font-semibold select-none">
                        D – Vendedores por Região:
                    </summary>
                    <div class="mt-3 text-sm leading-6 text-white dark:ring-white-text-slate-400">
                        <p>Este relatório apresenta uma lista completa de todos os vendedores ativos em cada região. Essa informação é valiosa para avaliar a mobilidade dos vendedores e entender as preferências de veículos associadas ao desempenho de vendas. <a href="select_VendedorRegiao.php" class="text-rose-200">Visualize</a></p>
                    </div>
                </details>
            </div>

            <div class="max-w-lg mx-auto p-2">
                <details class="bg-rose-700 dark:open:bg-rose-700 ring-1 ring-black/5 dark:ring-white/10 shadow-lg p-6 rounded-lg">
                    <summary class="text-sm leading-6 text-white font-semibold select-none">
                        E – Produtos Vendidos por Vendedor:
                    </summary>
                    <div class="mt-3 text-sm leading-6 text-white dark:ring-white-text-slate-400">
                        <p>Este relatório apresenta uma lista completa de todos os produtos vendidos por um determinado vendedor. Essa informação é valiosa para avaliar o desempenho de vendas de cada vendedor e entender as preferências de produtos associadas ao desempenho de vendas. <a href="select_VendedorProduto.php" class="text-rose-200">Visualize</a></p>
                    </div>
                </details>
            </div>

            <div class="max-w-lg mx-auto p-2">
                <details class="bg-rose-700 dark:open:bg-rose-700 ring-1 ring-black/5 dark:ring-white/10 shadow-lg p-6 rounded-lg">
                    <summary class="text-sm leading-6 text-white font-semibold select-none">
                        F – Vendedores por Produto:
                    </summary>
                    <div class="mt-3 text-sm leading-6 text-white dark:ring-white-text-slate-400">
                        <p>Este relatório apresenta uma lista completa de todos os vendedores que venderam um determinado produto. Essa informação é valiosa para avaliar o desempenho de vendas de cada vendedor e entender as preferências de produtos associadas ao desempenho de vendas. <a href="select_ProdutoVendedor.php" class="text-rose-200">Visualize</a></p>
                    </div>
                </details>
            </div>

            <div class="max-w-lg mx-auto p-2">
                <details class="bg-rose-700 dark:open:bg-rose-700 ring-1 ring-black/5 dark:ring-white/10 shadow-lg p-6 rounded-lg">
                    <summary class="text-sm leading-6 text-white font-semibold select-none">
                        G – Produtos Não Vendidos:
                    </summary>
                    <div class="mt-3 text-sm leading-6 text-white dark:ring-white-text-slate-400">
                        <p>Este relatório apresenta uma lista completa de todos os produtos que ainda não foram vendidos. Essa informação é valiosa para avaliar o desempenho de vendas de cada produto e entender as preferências de produtos associadas ao desempenho de vendas. <a href="select_ProdutosN.php" class="text-rose-200">Visualize</a></p>
                    </div>
                </details>
            </div>

            <div class="max-w-lg mx-auto p-2">
                <details class="bg-rose-700 dark:open:bg-rose-700 ring-1 ring-black/5 dark:ring-white/10 shadow-lg p-6 rounded-lg">
                    <summary class="text-sm leading-6 text-white font-semibold select-none">
                        H – Histórico de Utilização de Veículo:
                    </summary>
                    <div class="mt-3 text-sm leading-6 text-white dark:ring-white-text-slate-400">
                        <p>Este relatório apresenta uma lista completa de todos os veículos utilizados por um determinado vendedor. Essa informação é valiosa para avaliar o desempenho de vendas de cada vendedor e entender as preferências de veículos associadas ao desempenho de vendas. <a href="select_HistoricoVeiculo.php" class="text-rose-200">Visualize</a></p>
                    </div>
                </details>
            </div>

            <div class="max-w-lg mx-auto p-2">
                <details class="bg-rose-700 dark:open:bg-rose-700 ring-1 ring-black/5 dark:ring-white/10 shadow-lg p-6 rounded-lg">
                    <summary class="text-sm leading-6 text-white font-semibold select-none">
                        I – Quantidade de Itens de Cada Nota Fiscal:
                    </summary>
                    <div class="mt-3 text-sm leading-6 text-white dark:ring-white-text-slate-400">
                        <p>Este relatório apresenta uma lista completa de todos os itens de
                                        cada nota fiscal. Essa informação é valiosa para avaliar o
                                        desempenho de vendas de cada produto e entender as preferências
                                        de produtos associadas ao desempenho de vendas.<a href="select_QuantidadeProdutoNotaF.php" class="text-rose-200">Visualize</a></p>
                    </div>
                </details>
            </div>
            <br>
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