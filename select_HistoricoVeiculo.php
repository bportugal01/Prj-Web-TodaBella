<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Históricos</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">




    <!-- Additional CSS Files -->

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-animate.js"></script>



    <link rel="stylesheet" href="assets/css/css.css">

    <style>
        /* Adicione este código ao seu arquivo de estilo CSS */
        .logo {
            align-items: center;
        }



        .logo img {
            max-height: 80px;
            /* Ajuste a altura máxima conforme necessário */
            max-width: 100%;
            /* Garante que o logo não ultrapasse o contêiner */
            margin-right: 10px;
            /* Espaçamento entre o logo e o texto (se houver) */

        }
    </style>

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
    <!-- ***** Preloader End ***** -->

    <header class="header-area header-sticky sticky-top">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="gerenciamento.php" class="logo">
                            <img src="assets/images/logo20.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Cadastro</a>
                                <ul>
                                    <li><a href="cadastro_Cliente.php">Cadastro de Cliente</a></li>
                                    <li><a href="cadastro_itemNotaFical.php">Cadastro de Item Nota Fiscal</a></li>
                                    <li><a href="cadastro_NotaFiscal.php">Cadastro de Nota Fiscal</a></li>
                                    <li><a href="cadastro_Produto.php">Cadastro de Produto</a></li>
                                    <li><a href="cadastro_Regiao_Ponto.php">Cadastro de Região Ponto</a></li>
                                    <li><a href="cadastro_Veiculo.php">Cadastro de Veículo</a></li>
                                    <li><a href="cadastro_Vendedor.php">Cadastro de Vendedor</a></li>
                                    <li><a href="cadatro_UtilizacaoVeiculo.php">Cadastro de Utilização de Veículo</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">Listagem</a>
                                <ul>
                                    <li><a href="listar_Cliente.php">Listar de Cliente</a></li>
                                    <li><a href="listar_NotaFiscal.php">Listar de Nota Fiscal</a></li>
                                    <li><a href="listar_Produto.php">Listar de Produto</a></li>
                                    <li><a href="listar_RegiaoPonto.php">Listar de Região Ponto</a></li>
                                    <li><a href="listar_Veiculo.php">Listar de Veículo</a></li>
                                    <li><a href="listar_Vendedor.php">Listar de Vendedor</a></li>
                                </ul>
                            </li>
                            <li><a href="select.php">Pesquisas detalhadas</a></li>
                            <li><a href="sair.php">Sair</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <br>


    <div class="subscribe">
        <div class="container">
            <div class="row justify-content-center">
                <div class="border p-4">
                    <div class="section-heading">
                        <h2>Listagem de Históricos de veiculos</h2>
                        <?php
                        // Inclua o arquivo VeiculoDAO.php apenas uma vez
                        include_once 'DAO/VeiculoDAO.php';

                        // Inicializa $historicoVeiculo como array vazio
                        $historicoVeiculo = [];
                        // Inicializa $placaVeiculo como uma string vazia
                        $placaVeiculo = '';
                        // Inicializa a mensagem de erro como vazia
                        $erroMensagem = '';

                        // Verifique se o parâmetro placaVeiculo está definido na URL
                        if (isset($_GET['placaVeiculo'])) {
                            // Atribua o valor do parâmetro placaVeiculo à variável $placaVeiculo
                            $placaVeiculo = $_GET['placaVeiculo'];

                            // Verifique se a placa do veículo foi digitada
                            if (empty($placaVeiculo)) {
                                $erroMensagem = 'Por favor, digite a placa do veículo.';
                            } else {
                                // Chame a função para obter o histórico de utilização do veículo
                                $historicoVeiculo = VeiculoDAO::listarHistoricoUtilizacao($placaVeiculo);
                            }
                        }
                        ?>

                        <table>
                            <thead>
                                <tr>
                                    <th colspan="3">
                                        <form action="" method="GET" style="display: flex;">
                                            <input type="text" name="placaVeiculo" id="placaVeiculo"
                                                placeholder="Digite a placa do veículo">&nbsp;&nbsp;&nbsp;
                                            <button type="submit" class="btn btn-primary"
                                                style="background-color: #f25180; text-align: center; font-weight: bold; line-height: 40px;">Pesquisar</button>
                                        </form>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Placa Veículo</th>
                                    <th>Nome Vendedor</th>
                                    <th>Data Utilização</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($historicoVeiculo)): ?>
                                    <?php foreach ($historicoVeiculo as $veiculo): ?>
                                        <tr>
                                            <td>
                                                <?= $veiculo['PlacaVeiculo'] ?>
                                            </td>
                                            <td>
                                                <?= $veiculo['NomeVendedor'] ?>
                                            </td>
                                            <td>
                                                <?= $veiculo['DataUtilizacao'] ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php elseif (!empty($erroMensagem)): ?>
                                    <tr>
                                        <td colspan="3">
                                            <?= $erroMensagem ?>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="3">Nenhum histórico encontrado para a placa do veículo:
                                            <?= $placaVeiculo ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <a href="select.php" class="btn btn-primary " style="background-color: #c62152"
                            href="select.php">voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>


    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

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

</body>

</html>