<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Itens da Nota Fiscal</title>
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
                    <h5 class="mb-2 text-4xl font-bold tracking-tight text-rose-700 text-center px-12 pb-5">Cadastrar Vendedor</h5>
                    <form action="" method="POST" class="max-w-sm mx-auto">
                        <input type="hidden" name="csrf_token" value="<?php echo isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : ''; ?>">
                        <div>
                            <div class="mb-5">
                                <fieldset>
                                    <label for="nomeVendedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nome</label>
                                    <input type="text" id="nomeVendedor" placeholder="Digite o nome" name="nomeVendedor" class="bg-gray-100 border-2 border-rose-700 text-gray-700 placeholder-rose-700 text-base focus:ring-rose-800 focus:border-rose-800 block w-full p-2.5" required/>
                                </fieldset>  
                            </div>
                        </div> 
                        <div class="grid grid-cols-2 gap-4">   
                            <div>
                                <div class="mb-5">
                                    <fieldset>
                                        <label for="rgVendedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">RG</label>
                                        <input type="text" id="rgVendedor" placeholder="Digite o RG" name="rgVendedor" class="bg-gray-100 border-2 border-rose-700 text-gray-700 placeholder-rose-700 text-base focus:ring-rose-800 focus:border-rose-800 block w-full p-2.5"
                                        value="<?php echo isset($_POST['rgVendedor']) ? $_POST['rgVendedor'] : ''; ?>" oninput="formatRG()" maxlength="12" required/>
                                    </fieldset>    
                                </div>
                            </div>
                            <div>
                                <div class="mb-5">
                                    <fieldset>
                                        <label for="dataNascimento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Data de Nascimento</label>
                                        <input type="date" id="dataNascimento"  name="dataNascimento" class="bg-gray-100 border-2 border-rose-700 text-gray-700 placeholder-rose-700 text-base focus:ring-rose-800 focus:border-rose-800 block w-full p-2.5" required/>
                                    </fieldset>
                                </div>
                            </div>    
                            <div>
                                <div class="mb-5">
                                    <fieldset>
                                        <label for="telefoneVendedor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Telefone</label>
                                        <input type="tel" id="telefoneVendedor"  placeholder="Digite o telefone" name="telefoneVendedor" class="bg-gray-100 border-2 border-rose-700 text-gray-700 placeholder-rose-700 text-base focus:ring-rose-800 focus:border-rose-800 block w-full p-2.5" 
                                        oninput="formatCelular()" required/>
                                    </fieldset>   
                                </div>
                            </div>
                            <div>
                                <div class="mb-5">
                                    <fieldset>
                                        <label for="codigoRegiao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Código da Região</label>
                                        <input type="number" id="codigoRegiao" placeholder="Digite o código" name="codigoRegiao" class="bg-gray-100 border-2 border-rose-700 text-gray-700 placeholder-rose-700 text-base focus:ring-rose-800 focus:border-rose-800 block w-full p-2.5" required/>
                                    </fieldset>   
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="inline-flex items-center px-10 py-2 text-base font-medium text-center text-white bg-rose-700 rounded-sm hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 mt-8">
                                Cadastrar
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
            document.getElementById('nomeVendedor').value = '';
            document.getElementById('rgVendedor').value = '';
            document.getElementById('dataNascimento').value = '';
            document.getElementById('telefoneVendedor').value = '';
            document.getElementById('codigoRegiao').value = '';
        }

        // Chama a função para limpar os campos quando a página é carregada
        window.onload = limparCampos;
    </script>

    <script>
        function formatRG() {
            var rgInput = document.getElementById('rgVendedor');
            rgInput.value = rgInput.value.replace(/[^0-9]/g, ''); // Remove caracteres não numéricos
            rgInput.value = rgInput.value.substring(0, 12); // Limita a 12 caracteres
            rgInput.value = rgInput.value.replace(/(\d{2})(\d{3})(\d{3})(\d{1})/, '$1.$2.$3-$4');
        }

        function formatCelular() {
            var celularInput = document.getElementById('telefoneVendedor');
            celularInput.value = celularInput.value.replace(/[^0-9]/g, ''); // Remove caracteres não numéricos
            celularInput.value = celularInput.value.substring(0, 11); // Limita a 11 caracteres
            celularInput.value = celularInput.value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
        }
    </script>
</body>
</html>