<?php
ob_start();
include_once 'DAO/PontoEstratagicoDAO.php';
include_once 'DAO/RegiaoDAO.php';

$redirectUrlPonto = 'listar_PontoEstrategico.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['deletePonto']) && isset($_POST['codigoPonto'])) {
    $codigoPonto = $_POST['codigoPonto'];
    $deletedPonto = PontoEstrategicoDAO::excluirPontoEstrategico($codigoPonto);

    if ($deletedPonto) {
        header("Location: $redirectUrlPonto");
        exit();
    } else {
        $deleteErrorPonto = "Erro ao excluir o ponto estratégico.";
    }
}

$pontosEstrategicos = PontoEstrategicoDAO::listarPontosEstrategicos();
$regioes = RegiaoDAO::listarRegioes();
ob_end_clean();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Região</title>
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
                    include_once 'DAO/PontoEstratagicoDAO.php';
                    include_once 'DAO/RegiaoDAO.php';

                    // Agora, após o possível cadastro, lista os pontos estratégicos
                    $pontosEstrategicos = PontoEstrategicoDAO::listarPontosEstrategicos();
                    $regioes = RegiaoDAO::listarRegioes();  // Corrigindo o nome da variável
                ?>    

                <div class="relative overflow-x-auto sm:rounded-lg px-5 md:px-40">
                    <h5 class="mb-2 text-3xl font-bold tracking-tight text-rose-700 text-left pt-20">Consulta de Regiões</h5>
                    <table class="w-full text-base text-center rtl:text-right text-gray-900 p-5 border border-rose-700">
                        <thead class="text-base text-white uppercase bg-rose-700">
                            <tr>  
                                <th scope="col" class="px-6 py-3">
                                    Código
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Localidade
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-rose-800">
                            <?php foreach ($regioes as $regiao): ?>
                                <tr>
                                    <td class="px-6 py-4 bg-rose-200" data-label="Codigo da Região">
                                        <?= $regiao['CodigoRegiao']; ?>
                                    </td>
                                    <td class="px-6 py-4" data-label="Nome da Região">
                                        <?= $regiao['NomeRegiao']; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>  
                        </tbody>
                    </table>
                    <h5 class="mb-2 text-3xl font-bold tracking-tight text-rose-700 text-left pt-20">Consulta de Pontos Estratégicos</h5>
                    <table class="w-full text-base text-center rtl:text-right text-gray-900 p-5 border border-rose-700">
                        <thead class="text-base text-white uppercase bg-rose-700">
                            <tr>  
                                <th scope="col" class="px-6 py-3">
                                    Código do Ponto Estratégico
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Código da Região
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ponto Estratégico
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ação
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-rose-800">
                            <?php foreach ($pontosEstrategicos as $ponto): ?>
                                <tr>
                                    <td class="px-6 py-4 bg-rose-200" data-label="Código Ponto E.">
                                        <?= $ponto['CodigoPonto']; ?>
                                    </td>
                                    <td class="px-6 py-4" data-label="Código da Região">
                                        <?= $ponto['CodigoRegiao']; ?>
                                    </td>
                                    <td class="px-6 py-4 bg-rose-200" data-label="Nome do Ponto E.">
                                        <?= $ponto['NomePonto']; ?>
                                    </td>

                                    <td class="px-6 py-4" data-label="Ações">
                                        <!-- Link para acionar a exclusão por meio de JavaScript -->
                                        <a href="#" class="inline-flex items-center px-3 py-2 text-base font-medium text-center text-white bg-rose-700 rounded-lg hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 mt-4"
                                            onclick="excluirPonto(<?= $ponto['CodigoPonto']; ?>)">Excluir</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>  
                        </tbody>
                    </table>
                </div>    
            </main>
        </header>
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
        // Função JavaScript para confirmar a exclusão e enviar o formulário
        function excluirPonto(codigoPonto) {
            if (confirm('Tem certeza de que deseja excluir este ponto estratégico?')) {
                var form = document.createElement('form');
                form.method = 'post';
                form.action = ' '; // Coloque a URL apropriada aqui

                var deleteInput = document.createElement('input');
                deleteInput.type = 'hidden';
                deleteInput.name = 'deletePonto';
                deleteInput.value = 'true';
                form.appendChild(deleteInput);

                var codigoPontoInput = document.createElement('input');
                codigoPontoInput.type = 'hidden';
                codigoPontoInput.name = 'codigoPonto';
                codigoPontoInput.value = codigoPonto;
                form.appendChild(codigoPontoInput);

                document.body.appendChild(form);

                // Oculta o preloader antes de enviar o formulário
                document.getElementById('preloader').style.display = 'none';

                form.submit();
            }
        }
    </script>
</body>  
</html>  