<?php
session_start(); // Inicia a sessão, se ainda não estiver iniciada

// Gera um token CSRF e o armazena na sessão
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Verifica se o formulário foi submetido e o token CSRF é válido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    // Processa o formulário
    include_once 'DAO/ClienteDAO.php';

    $nomeCliente = $_POST['nomeCliente'];
    $rgCliente = $_POST['rgCliente'];
    $cpfCliente = $_POST['cpfCliente'];
    $enderecoCliente = $_POST['enderecoCliente'];

    ClienteDAO::cadastrarCliente($nomeCliente, $rgCliente, $cpfCliente, $enderecoCliente);

    // Limpa o token CSRF após o processamento do formulário
    unset($_SESSION['csrf_token']);
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
                    <a href="gerenciamento.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img src="assets/images/logo20.png" class="h-24" alt="Logo Toda Bella" />
                    </a>
                </div>
            </nav>
        </header>
        <main>
            <div class="flex justify-center py-24">
                <div class="block max-w-3xl p-6 bg-white border border-gray-200 rounded-lg shadow">
                    <h5 class="mb-2 text-4xl font-bold tracking-tight text-rose-700 text-center px-12 pb-5">Cadastrar Cliente</h5>
                    <form action="" method="POST" class="max-w-sm mx-auto">
                        <input type="hidden" name="csrf_token" value="<?php echo isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : ''; ?>">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="mb-5">
                                    <fieldset>
                                        <label for="nomeCliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nome</label>
                                        <input type="text" id="nomeCliente" placeholder="Digite o nome" name="nomeCliente" class="bg-gray-100 border-2 border-rose-700 text-gray-700 placeholder-rose-700 text-base focus:ring-rose-800 focus:border-rose-800 block w-full p-2.5" 
                                        value="<?php echo isset($_POST['nomeCliente']) ? $_POST['nomeCliente'] : ''; ?>" required/>
                                    </fieldset>    
                                </div>
                            </div>
                            <div>
                                <div class="mb-5">
                                    <fieldset>
                                        <label for="rgCliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">RG</label>
                                        <input type="text" id="rgCliente"  placeholder="Digite o RG" name="rgCliente" class="bg-gray-100 border-2 border-rose-700 text-gray-700 placeholder-rose-700 text-base focus:ring-rose-800 focus:border-rose-800 block w-full p-2.5"  
                                        value="<?php echo isset($_POST['rgCliente']) ? $_POST['rgCliente'] : ''; ?>" oninput="formatRG()" maxlength="12" required/>
                                    </fieldset>
                                </div>
                            </div>   
                            <div>
                                <div class="mb-5">
                                    <fieldset>
                                        <label for="cpfCliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">CPF</label>
                                        <input type="text" id="cpfCliente" placeholder="Digite o CPF" name="cpfCliente" class="bg-gray-100 border-2 border-rose-700 text-gray-700 placeholder-rose-700 text-base focus:ring-rose-800 focus:border-rose-800 block w-full p-2.5" 
                                        value="<?php echo isset($_POST['cpfCliente']) ? $_POST['cpfCliente'] : ''; ?>" oninput="formatCPF()" maxlength="14" required />
                                    </fieldset>    
                                </div>
                            </div>
                            <div>
                                <div class="mb-5">
                                    <fieldset>
                                        <label for="cep" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">CEP</label>
                                        <input type="text" id="cep" name="cep" placeholder="Digite o CEP" class="bg-gray-100 border-2 border-rose-700 text-gray-700 placeholder-rose-700 text-base focus:ring-rose-800 focus:border-rose-800 block w-full p-2.5"
                                        value="<?php echo isset($_POST['cep']) ? $_POST['cep'] : ''; ?>" required onblur="getAddressByCEP()" oninput="formatCEP()" maxlength="8" />
                                    </fieldset>   
                                </div>
                            </div>
                            <div>
                                <div class="mb-5">
                                    <fieldset>
                                        <label for="enderecoCliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Endereço</label>
                                        <input type="text" id="enderecoCliente" placeholder="Digite o endereço"  name="enderecoCliente" class="bg-gray-100 border-2 border-rose-700 text-gray-700 placeholder-rose-700 text-base focus:ring-rose-800 focus:border-rose-800 block w-full p-2.5" 
                                        value="<?php echo isset($_POST['enderecoCliente']) ? $_POST['enderecoCliente'] : ''; ?>" required />
                                    </fieldset>    
                                </div>
                            </div>
                            <div>
                                <div class="mb-5">
                                    <fieldset>
                                        <label for="numeroCliente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Telefone</label>
                                        <input type="text" name="numeroCliente" placeholder="Digite o número" id="numeroCliente" class="bg-gray-100 border-2 border-rose-700 text-gray-700 placeholder-rose-700 text-base focus:ring-rose-800 focus:border-rose-800 block w-full p-2.5" required />
                                    </fieldset>    
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" onclick="getAddressByCEP()" id="form-submit" class="inline-flex items-center px-10 py-2 text-base font-medium text-center text-white bg-rose-700 rounded-sm hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 mt-8">
                                Cadastrar
                            </button>
                            <a href="gerenciamento.php">
                            <div class="inline-flex items-center px-10 py-2 text-base font-medium text-center text-white bg-rose-700 rounded-sm hover:bg-rose-800 focus:ring-4 focus:outline-none focus:ring-rose-300 mt-8">
                                Voltar
                            </div>
                            </a>
                        </div>
                    </form>                                                       
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
            document.getElementById('nomeCliente').value = '';
            document.getElementById('rgCliente').value = '';
            document.getElementById('cpfCliente').value = '';
            document.getElementById('cep').value = '';
            document.getElementById('enderecoCliente').value = '';
            document.getElementById('numeroCliente').value = '';
        }
        // Chama a função para limpar os campos quando a página é carregada
        window.onload = limparCampos;

        function formatCEP() {
            var cepInput = document.getElementById('cep');
            cepInput.value = maskCEP(cepInput.value.replace(/\D/g, ''));
        }

        function maskCEP(cep) {
            cep = cep.replace(/^(\d{5})(\d)/, '$1-$2'); // Aplica a máscara
            return cep;
        }

        function getAddressByCEP() {
            var cep = document.getElementById('cep').value.replace(/\D/g, ''); // Remove a máscara
            var url = 'https://viacep.com.br/ws/' + cep + '/json/';

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.erro) {
                        alert('CEP não encontrado');
                    } else {
                        document.getElementById('enderecoCliente').value = data.logradouro;
                    }
                })
                .catch(error => {
                    console.error('Erro ao buscar endereço:', error);
                });
        }

        function formatCPF() {
            var cpfInput = document.getElementById('cpfCliente');
            cpfInput.value = cpfInput.value.replace(/[^0-9]/g, ''); // Remove caracteres não numéricos
            cpfInput.value = cpfInput.value.substring(0, 14); // Limita a 14 caracteres
            cpfInput.value = cpfInput.value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
        }

        function formatRG() {
            var rgInput = document.getElementById('rgCliente');
            rgInput.value = rgInput.value.replace(/[^0-9]/g, ''); // Remove caracteres não numéricos
            rgInput.value = rgInput.value.substring(0, 12); // Limita a 12 caracteres
            rgInput.value = rgInput.value.replace(/(\d{2})(\d{3})(\d{3})(\d{1})/, '$1.$2.$3-$4');
        }
    </script>
</body>
</html>        