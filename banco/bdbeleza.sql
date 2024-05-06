-- Criação do banco de dados profissional de beleza:
CREATE DATABASE BdBeleza;

USE BdBeleza;

-- Tabela Produto
CREATE TABLE
    Produto (
        CodigoProduto INT NOT NULL AUTO_INCREMENT,
        NomeProduto VARCHAR(60) NOT NULL,
        SituacaoProduto ENUM ('Ativo', 'Inativo') NOT NULL,
        PrecoUnitario DECIMAL(10, 2) NOT NULL,
        QuantidadeEstoque INT NOT NULL,
        PRIMARY KEY (CodigoProduto)
    );

-- Tabela Cliente
CREATE TABLE
    Cliente (
        CodigoCliente INT NOT NULL AUTO_INCREMENT,
        NomeCliente VARCHAR(50) NOT NULL,
        RGCliente VARCHAR(20),
        CPFCliente VARCHAR(20),
        EnderecoCliente VARCHAR(50),
        PRIMARY KEY (CodigoCliente)
    );

-- Tabela Telefone
CREATE TABLE
    Telefone (
        CodigoTelefone INT NOT NULL AUTO_INCREMENT,
        CodigoCliente INT NOT NULL,
        NumeroTelefone VARCHAR(15) NOT NULL,
        PRIMARY KEY (CodigoTelefone),
        FOREIGN KEY (CodigoCliente) REFERENCES Cliente (CodigoCliente)
    );

-- Tabela TipoTelefone
CREATE TABLE
    TipoTelefone (
        CodigoTelefone INT NOT NULL,
        DescricaoTipo VARCHAR(20) NOT NULL,
        PRIMARY KEY (CodigoTelefone),
        FOREIGN KEY (CodigoTelefone) REFERENCES Telefone (CodigoTelefone)
    );

-- Tabela Veículo
CREATE TABLE
    Veiculo (
        CodigoVeiculo INT NOT NULL AUTO_INCREMENT,
        PlacaVeiculo VARCHAR(7) NOT NULL,
        TipoVeiculo VARCHAR(50) NOT NULL,
        ModeloVeiculo VARCHAR(50) NOT NULL,
        PRIMARY KEY (CodigoVeiculo)
    );

-- Tabela Região
CREATE TABLE
    Regiao (
        CodigoRegiao INT NOT NULL,
        NomeRegiao VARCHAR(30) NOT NULL,
        PRIMARY KEY (CodigoRegiao)
    );

-- Tabela Vendedor
CREATE TABLE
    Vendedor (
        CodigoVendedor INT NOT NULL AUTO_INCREMENT,
        CodigoRegiao INT NOT NULL,
        NomeVendedor VARCHAR(50) NOT NULL,
        RGVendedor VARCHAR(20),
        DataNascimento DATE,
        TelefoneVendedor VARCHAR(15),
        PRIMARY KEY (CodigoVendedor),
        FOREIGN KEY (CodigoRegiao) REFERENCES Regiao (CodigoRegiao)
    );

-- Tabela Ponto Estratégico
CREATE TABLE
    PontoEstrategico (
        CodigoPonto INT NOT NULL AUTO_INCREMENT,
        CodigoRegiao INT NOT NULL,
        NomePonto VARCHAR(100) NOT NULL,
        PRIMARY KEY (CodigoPonto),
        FOREIGN KEY (CodigoRegiao) REFERENCES Regiao (CodigoRegiao)
    );

-- Tabela Utilização do Veículo
CREATE TABLE
    UtilizacaoVeiculo (
        CodigoVeiculo INT NOT NULL,
        CodigoVendedor INT NOT NULL,
        DataUtilizacao DATE NOT NULL,
        PRIMARY KEY (CodigoVeiculo, CodigoVendedor, DataUtilizacao),
        FOREIGN KEY (CodigoVeiculo) REFERENCES Veiculo (CodigoVeiculo),
        FOREIGN KEY (CodigoVendedor) REFERENCES Vendedor (CodigoVendedor)
    );

-- Tabela Nota Fiscal
CREATE TABLE
    NotaFiscal (
        CodigoNotaFiscal INT NOT NULL AUTO_INCREMENT,
        NumeroNotaFiscal INT NOT NULL,
        CodigoCliente INT NOT NULL,
        CodigoVendedor INT NOT NULL,
        DataEmissao DATE NOT NULL,
        PRIMARY KEY (CodigoNotaFiscal),
        FOREIGN KEY (CodigoCliente) REFERENCES Cliente (CodigoCliente),
        FOREIGN KEY (CodigoVendedor) REFERENCES Vendedor (CodigoVendedor)
    );

-- Tabela Item da Nota Fiscal
CREATE TABLE
    ItemNotaFiscal (
        NumeroItemNotaFiscal INT NOT NULL AUTO_INCREMENT,
        CodigoProduto INT NOT NULL,
        CodigoNotaFiscal INT NOT NULL,
        QuantidadeProduto INT NOT NULL,
        PRIMARY KEY (NumeroItemNotaFiscal),
        FOREIGN KEY (CodigoProduto) REFERENCES Produto (CodigoProduto),
        FOREIGN KEY (CodigoNotaFiscal) REFERENCES NotaFiscal (CodigoNotaFiscal)
    );

-- Inser��o de dados na tabela Produto:
INSERT INTO
    Produto (
        NomeProduto,
        SituacaoProduto,
        PrecoUnitario,
        QuantidadeEstoque
    )
VALUES
    ('Creme Hidratante Facial', 'Ativo', 19.99, 100),
    ('Shampoo Anticaspa', 'Ativo', 12.50, 80),
    ('Batom Matte Vermelho', 'Ativo', 8.99, 50),
    ('Loção Corporal Hidratante', 'Ativo', 15.99, 120),
    ('Perfume Floral', 'Ativo', 29.99, 70),
    ('Máscara Capilar Reparadora', 'Ativo', 14.50, 60),
    ('Esmalte de Unhas Nude', 'Ativo', 5.99, 90),
    ('Gel de Limpeza Facial', 'Ativo', 7.50, 110),
    (
        'Condicionador para Cabelos Cacheados',
        'Ativo',
        10.99,
        75
    ),
    ('Pó Compacto Bronzeador', 'Ativo', 11.99, 40),
    ('Creme para Cachos', 'Inativo', 13.99, 30),
    ('Protetor Solar FPS 50', 'Inativo', 18.99, 20),
    ('Shampoo para Cabelos Lisos', 'Ativo', 8.50, 85),
    (
        'Condicionador para Cabelos Finos',
        'Ativo',
        9.50,
        70
    ),
    ('Creme Anti-Idade', 'Inativo', 25.99, 10),
    (
        'Perfume Masculino Amadeirado',
        'Ativo',
        34.99,
        50
    ),
    ('Máscara de Argila Facial', 'Inativo', 9.99, 25),
    ('Batom Matte Marrom', 'Ativo', 8.99, 45),
    ('Loção Pós-Barba', 'Inativo', 15.50, 15),
    ('Esmalte de Unhas Vermelho', 'Ativo', 5.99, 80),
    ('Sabonete Líquido Corporal', 'Inativo', 6.99, 60),
    (
        'Creme para Mãos Hidratante',
        'Inativo',
        11.99,
        30
    ),
    (
        'Shampoo para Cabelos Cacheados',
        'Ativo',
        10.50,
        65
    ),
    (
        'Condicionador para Cabelos Ondulados',
        'Ativo',
        11.50,
        55
    ),
    ('Sérum Facial Antirrugas', 'Inativo', 28.99, 5),
    (
        'Perfume Feminino Floral Frutal',
        'Ativo',
        27.99,
        40
    ),
    ('Batom Gloss Rosa', 'Inativo', 7.99, 20),
    ('Loção Pós-Sol', 'Ativo', 14.99, 30),
    ('Esmalte de Unhas Azul', 'Ativo', 5.99, 70),
    ('Gel de Banho Energizante', 'Inativo', 9.99, 25),
    ('Pó Compacto Iluminador', 'Inativo', 12.99, 15),
    ('Sabonete', 'Ativo', 2.99, 200),
    ('Creme Facial', 'Ativo', 15.50, 5),
    ('Esmalte', 'Ativo', 5.99, 150),
    ('Secador de Cabelo', 'Ativo', 49.99, 30),
    ('Pincel de Maquiagem', 'Ativo', 7.99, 100),
    ('Protetor Solar', 'Inativo', 12.99, 80),
    ('Batom', 'Ativo', 9.50, 60),
    ('Shampoo', 'Inativo', 8.99, 90),
    ('Condicionador', 'Ativo', 8.99, 80);

-- Inser��o de dados na tabela Cliente:
INSERT INTO
    Cliente (
        NomeCliente,
        RGCliente,
        CPFCliente,
        EnderecoCliente
    )
VALUES
    (
        'Pedro Santos',
        '7654321',
        '123456789',
        'Rua C, 789'
    ),
    (
        'Ana Pereira',
        '9871234',
        '234567890',
        'Av. D, 987'
    ),
    (
        'José Silva',
        '5432198',
        '890123456',
        'Rua E, 456'
    ),
    (
        'Marta Oliveira',
        '3217890',
        '567890123',
        'Av. F, 654'
    ),
    (
        'Luiz Fernandes',
        '8765432',
        '678901234',
        'Rua G, 321'
    ),
    (
        'Júlio Neves',
        '1111111',
        '222222222',
        'Rua H, 123'
    ),
    (
        'Maria Werlang',
        '2222222',
        '333333333',
        'Av. I, 456'
    ),
    (
        'Victor Roma',
        '3333333',
        '444444444',
        'Rua J, 789'
    ),
    (
        'Victor Novaes',
        '4444444',
        '555555555',
        'Av. K, 987'
    ),
    (
        'Mariane Souza',
        '5555555',
        '666666666',
        'Rua L, 654'
    ),
    (
        'João Cabral',
        '6666666',
        '777777777',
        'Av. M, 321'
    ),
    (
        'Juan Rocha',
        '7777777',
        '888888888',
        'Rua N, 123'
    ),
    (
        'Yasmin Mello',
        '8888888',
        '999999999',
        'Av. O, 456'
    ),
    (
        'Vinícius Moreira',
        '9999999',
        '123123123',
        'Rua P, 789'
    ),
    (
        'João Rodrigues',
        '1231230',
        '234234234',
        'Av. Q, 987'
    ),
    (
        'Lucas Carvalho',
        '2342341',
        '345345345',
        'Rua R, 654'
    ),
    (
        'Deryll Bodnariuc',
        '3453452',
        '456456456',
        'Av. S, 321'
    ),
    (
        'Paulo Silva',
        '4564563',
        '567567567',
        'Rua T, 123'
    ),
    (
        'João Alves',
        '5675674',
        '678678678',
        'Av. U, 456'
    ),
    (
        'Sarah Laurindo',
        '6786785',
        '789789789',
        'Rua V, 789'
    ),
    (
        'Vincent Alvarado',
        '7897896',
        '890890890',
        'Av. W, 987'
    ),
    (
        'Nathalia Werlang',
        '8908907',
        '901901901',
        'Rua X, 654'
    ),
    (
        'Júlia Gonçalves',
        '9019018',
        '123123123',
        'Av. Y, 321'
    ),
    (
        'Eliel Godoy',
        '1231239',
        '234234234',
        'Rua Z, 123'
    ),
    (
        'Bruno Rezende',
        '2342340',
        '345345345',
        'Av. AA, 456'
    );

-- Inser��o de dados na tabela Telefone:
INSERT INTO
    Telefone (CodigoCliente, NumeroTelefone)
VALUES
    (3, '555-2468'),
    (4, '555-7890'),
    (5, '555-9876'),
    (1, '555-1111'),
    (2, '555-2222');

-- Inser��o de dados na tabela TipoTelefone:
INSERT INTO
    TipoTelefone (CodigoTelefone, DescricaoTipo)
VALUES
    (3, 'Comercial'),
    (4, 'Celular Trabalho'),
    (5, 'Recado'),
    (1, 'Celular Pessoal'),
    (2, 'Residencial');

-- Inser��o de dados na tabela Veiculo:
INSERT INTO
    Veiculo (PlacaVeiculo, TipoVeiculo, ModeloVeiculo)
VALUES
    ('DEF456', 'Carro', 'SUV'),
    ('UVW123', 'Moto', 'Custom'),
    ('GHI789', 'Carro', 'Hatchback'),
    ('JKL012', 'Moto', 'Touring'),
    ('MNO345', 'Carro', 'Sedan'),
    ('ABC1234', 'Carro', 'Volkswagen Golf'),
    ('DEF5678', 'Carro', 'Toyota Corolla'),
    ('GHI9012', 'Carro', 'Ford Focus'),
    ('JKL3456', 'Carro', 'Honda Civic'),
    ('MNO7890', 'Carro', 'Chevrolet Cruze'),
    ('PQR2345', 'Moto', 'Honda CB 500'),
    ('STU6789', 'Moto', 'Yamaha YZF-R6'),
    ('VWX1234', 'Moto', 'Suzuki GSX-R750'),
    ('YZA5678', 'Moto', 'Kawasaki Ninja 300'),
    ('BCD9012', 'Moto', 'Harley-Davidson Sportster'),
    ('EFG1234', 'Carro', 'Renault Sandero'),
    ('HIJ5678', 'Carro', 'Hyundai HB20'),
    ('KLM9012', 'Carro', 'Fiat Uno'),
    ('NOP3456', 'Carro', 'Volkswagen Polo'),
    ('QRS7890', 'Carro', 'Ford Fiesta'),
    ('TUV2345', 'Moto', 'Ducati Monster 821'),
    ('WXY6789', 'Moto', 'KTM 390 Duke'),
    ('ZAB1234', 'Moto', 'BMW S1000RR'),
    ('CDE5678', 'Moto', 'Triumph Bonneville'),
    ('FGH9012', 'Moto', 'Indian Scout'),
    ('IJK3456', 'Carro', 'Chevrolet Onix'),
    ('LMN7890', 'Carro', 'Toyota Yaris'),
    ('OPQ2345', 'Carro', 'Ford Ranger'),
    ('RST6789', 'Carro', 'Jeep Wrangler'),
    ('UVW1234', 'Carro', 'Audi A3'),
    ('XYZ5678', 'Carro', 'BMW X5'),
    ('BCA9012', 'Carro', 'Mercedes-Benz Classe C'),
    ('DEF3456', 'Carro', 'Porsche 911'),
    ('GHI7890', 'Carro', 'Jaguar F-PACE'),
    ('JKL2345', 'Carro', 'Land Rover Range Rover');

-- Inser��o de dados na tabela Regiao:
INSERT INTO
    Regiao (CodigoRegiao, NomeRegiao)
VALUES
    (1, 'Oeste'),
    (2, 'Leste'),
    (3, 'Centro'),
    (4, 'Noroeste'),
    (5, 'Sudoeste');

-- Inser��o de dados na tabela Ponto Estrat�gico com os principais locais de cada regi�o (adicionais):
INSERT INTO
    PontoEstrategico (CodigoRegiao, NomePonto)
VALUES
    (
        FLOOR(1 + RAND () * 5),
        'Avenida Paulista, Museu de Arte de São Paulo (MASP), Parque Trianon, Shopping Paulista'
    ),
    (
        FLOOR(1 + RAND () * 5),
        'Parque Ibirapuera, Museu de Arte Moderna de São Paulo (MAM), Jardim Botânico'
    ),
    (
        FLOOR(1 + RAND () * 5),
        'Pátio do Colégio, Catedral da Sé, Mercado Municipal de São Paulo'
    ),
    (
        FLOOR(1 + RAND () * 5),
        'Parque Villa-Lobos, Shopping Villa-Lobos, Estádio Allianz Parque'
    ),
    (
        FLOOR(1 + RAND () * 5),
        'Parque Burle Marx, Praça Panamericana, Jockey Club de São Paulo'
    ),
    (
        FLOOR(1 + RAND () * 5),
        'Parque da Independência, Museu do Ipiranga, Sesc Ipiranga'
    ),
    (
        FLOOR(1 + RAND () * 5),
        'Parque Villa-Lobos, Tomie Ohtake Cultural Institute, Shopping Eldorado'
    ),
    (
        FLOOR(1 + RAND () * 5),
        'Bairro da Liberdade, Teatro Municipal de São Paulo, Pinacoteca do Estado'
    ),
    (
        FLOOR(1 + RAND () * 5),
        'Parque do Povo, Shopping Iguatemi, Cidade Jardim'
    ),
    (
        FLOOR(1 + RAND () * 5),
        'Parque do Povo, Parque Alfredo Volpi, Shopping Cidade Jardim'
    ),
    (
        FLOOR(1 + RAND () * 5),
        'Parque do Carmo, Shopping Aricanduva, Sesc Itaquera'
    ),
    (FLOOR(1 + RAND () * 5), 'Moema Centro'),
    (FLOOR(1 + RAND () * 5), 'Parque do Ibirapuera'),
    (FLOOR(1 + RAND () * 5), 'Aeroporto de Congonhas'),
    (FLOOR(1 + RAND () * 5), 'Hospital Santa Paula'),
    (FLOOR(1 + RAND () * 5), 'Shopping Ibirapuera'),
    (FLOOR(1 + RAND () * 5), 'Vila Mariana Shopping'),
    (FLOOR(1 + RAND () * 5), 'Praça da Árvore'),
    (FLOOR(1 + RAND () * 5), 'Estação Ana Rosa'),
    (FLOOR(1 + RAND () * 5), 'Hospital São Paulo'),
    (FLOOR(1 + RAND () * 5), 'Parque Ibirapuera'),
    (FLOOR(1 + RAND () * 5), 'Museu do Ipiranga'),
    (FLOOR(1 + RAND () * 5), 'Sesc Ipiranga'),
    (FLOOR(1 + RAND () * 5), 'Praça das Crianças'),
    (FLOOR(1 + RAND () * 5), 'Hospital Ipiranga'),
    (FLOOR(1 + RAND () * 5), 'Estação Sacomã'),
    (FLOOR(1 + RAND () * 5), 'Shopping Metrô Tatuapé'),
    (FLOOR(1 + RAND () * 5), 'Parque do Piqueri'),
    (FLOOR(1 + RAND () * 5), 'Estação Tatuapé'),
    (FLOOR(1 + RAND () * 5), 'Hospital São Luiz'),
    (FLOOR(1 + RAND () * 5), 'Praça Silvio Romero'),
    (FLOOR(1 + RAND () * 5), 'Shopping Eldorado'),
    (FLOOR(1 + RAND () * 5), 'Parque Villa Lobos'),
    (FLOOR(1 + RAND () * 5), 'Estação Faria Lima'),
    (FLOOR(1 + RAND () * 5), 'Hospital das Clínicas'),
    (FLOOR(1 + RAND () * 5), 'Praça Benedito Calixto'),
    (FLOOR(1 + RAND () * 5), 'Shopping Morumbi'),
    (FLOOR(1 + RAND () * 5), 'Parque Severo Gomes'),
    (FLOOR(1 + RAND () * 5), 'Estação Santo Amaro'),
    (
        FLOOR(1 + RAND () * 5),
        'Hospital Albert Einstein'
    ),
    (FLOOR(1 + RAND () * 5), 'Praça do Sol'),
    (FLOOR(1 + RAND () * 5), 'Praça da Liberdade'),
    (FLOOR(1 + RAND () * 5), 'Templo Zu Lai'),
    (FLOOR(1 + RAND () * 5), 'Estação Liberdade'),
    (FLOOR(1 + RAND () * 5), 'Hospital AC Camargo'),
    (FLOOR(1 + RAND () * 5), 'Parque da Aclimação'),
    (FLOOR(1 + RAND () * 5), 'Praça Charles Miller'),
    (FLOOR(1 + RAND () * 5), 'Allianz Parque'),
    (FLOOR(1 + RAND () * 5), 'PUC-SP'),
    (FLOOR(1 + RAND () * 5), 'Estádio do Pacaembu'),
    (
        FLOOR(1 + RAND () * 5),
        'Hospital das Clínicas - Faculdade de Medicina'
    ),
    (
        FLOOR(1 + RAND () * 5),
        'USP - Universidade de São Paulo'
    ),
    (FLOOR(1 + RAND () * 5), 'Parque Villa-Lobos'),
    (FLOOR(1 + RAND () * 5), 'Estação Butantã (CPTM)'),
    (
        FLOOR(1 + RAND () * 5),
        'Hospital Universitário - HU-USP'
    ),
    (FLOOR(1 + RAND () * 5), 'Praça Elis Regina'),
    (FLOOR(1 + RAND () * 5), 'Sesc Pompéia'),
    (FLOOR(1 + RAND () * 5), 'Estação Lapa (CPTM)'),
    (FLOOR(1 + RAND () * 5), 'Parque da Água Branca'),
    (
        FLOOR(1 + RAND () * 5),
        'Hospital São Camilo - Unidade Pompéia'
    ),
    (FLOOR(1 + RAND () * 5), 'Shopping Bourbon'),
    (FLOOR(1 + RAND () * 5), 'Parque da Juventude'),
    (FLOOR(1 + RAND () * 5), 'Santana Parque Shopping'),
    (FLOOR(1 + RAND () * 5), 'Estação Santana (CPTM)'),
    (
        FLOOR(1 + RAND () * 5),
        'Hospital São Camilo - Unidade Santana'
    ),
    (
        FLOOR(1 + RAND () * 5),
        'Santuário de Santa Terezinha do Menino Jesus'
    ),
    (
        FLOOR(1 + RAND () * 5),
        'Teatro Municipal de São Paulo'
    ),
    (FLOOR(1 + RAND () * 5), 'Shopping Frei Caneca'),
    (
        FLOOR(1 + RAND () * 5),
        'Estação Trianon-Masp (Metrô)'
    ),
    (FLOOR(1 + RAND () * 5), 'Hospital Sírio-Libanês'),
    (FLOOR(1 + RAND () * 5), 'Praça da Liberdade'),
    (FLOOR(1 + RAND () * 5), 'Parque da Aclimação'),
    (FLOOR(1 + RAND () * 5), 'Museu do Ipiranga'),
    (
        FLOOR(1 + RAND () * 5),
        'Estação Ana Nery (Metrô)'
    ),
    (FLOOR(1 + RAND () * 5), 'Hospital Cruz Azul'),
    (FLOOR(1 + RAND () * 5), 'Praça da Árvore'),
    (FLOOR(1 + RAND () * 5), 'Parque do Trote'),
    (FLOOR(1 + RAND () * 5), 'Shopping Center Norte'),
    (
        FLOOR(1 + RAND () * 5),
        'Estação Carandiru (Metrô)'
    ),
    (FLOOR(1 + RAND () * 5), 'Hospital San Paolo'),
    (FLOOR(1 + RAND () * 5), 'Praça 14 Bis'),
    (FLOOR(1 + RAND () * 5), 'Parque da Mooca'),
    (FLOOR(1 + RAND () * 5), 'Mooca Plaza Shopping'),
    (
        FLOOR(1 + RAND () * 5),
        'Estação Bresser-Mooca (Metrô)'
    ),
    (FLOOR(1 + RAND () * 5), 'Hospital Cema'),
    (
        FLOOR(1 + RAND () * 5),
        'Praça Humberto de Campos'
    ),
    (FLOOR(1 + RAND () * 5), 'Parque Jacuí'),
    (FLOOR(1 + RAND () * 5), 'Shopping Anália Franco'),
    (FLOOR(1 + RAND () * 5), 'Estação Carrão (Metrô)'),
    (FLOOR(1 + RAND () * 5), 'Hospital Montemagno'),
    (FLOOR(1 + RAND () * 5), 'Praça Silvio Romero'),
    (FLOOR(1 + RAND () * 5), 'Parque da Independência'),
    (FLOOR(1 + RAND () * 5), 'Shopping Plaza Sul'),
    (FLOOR(1 + RAND () * 5), 'Estação Sacomã (Metrô)'),
    (FLOOR(1 + RAND () * 5), 'Hospital Heliópolis'),
    (FLOOR(1 + RAND () * 5), 'Praça dos Meninos'),
    (FLOOR(1 + RAND () * 5), 'Parque do Trote'),
    (FLOOR(1 + RAND () * 5), 'Shopping Metrô Tucuruvi'),
    (
        FLOOR(1 + RAND () * 5),
        'Estação Tucuruvi (Metrô)'
    ),
    (FLOOR(1 + RAND () * 5), 'Hospital Presidente'),
    (FLOOR(1 + RAND () * 5), 'Praça Marechal Deodoro'),
    (
        FLOOR(1 + RAND () * 5),
        'Parque Cidade Tiradentes'
    ),
    (
        FLOOR(1 + RAND () * 5),
        'Shopping Cidade Tiradentes'
    ),
    (
        FLOOR(1 + RAND () * 5),
        'Estação Cidade Tiradentes (Metrô)'
    ),
    (
        FLOOR(1 + RAND () * 5),
        'Hospital Cidade Tiradentes'
    ),
    (FLOOR(1 + RAND () * 5), 'Praça dos Trabalhadores'),
    (
        FLOOR(1 + RAND () * 5),
        'Parque Ecológico Vila Prudente'
    ),
    (FLOOR(1 + RAND () * 5), 'Central Plaza Shopping'),
    (
        FLOOR(1 + RAND () * 5),
        'Estação Vila Prudente (Metrô)'
    ),
    (FLOOR(1 + RAND () * 5), 'Hospital Vila Alpina'),
    (FLOOR(1 + RAND () * 5), 'Praça da Vila Zelina');

-- Inser��o de dados na tabela Vendedor:
INSERT INTO
    Vendedor (
        CodigoRegiao,
        NomeVendedor,
        RGVendedor,
        DataNascimento,
        TelefoneVendedor
    )
VALUES
    (
        3,
        'Rita Soares',
        '6543210',
        '1988-04-30',
        '555-3333'
    ),
    (
        4,
        'Paulo Martins',
        '4321098',
        '1992-07-12',
        '555-4444'
    ),
    (
        5,
        'Isabel Lima',
        '2109876',
        '1995-10-15',
        '555-5555'
    ),
    (
        1,
        'Fernando Costa',
        '7890123',
        '1980-02-25',
        '555-6666'
    ),
    (
        2,
        'Lúcia Santos',
        '0987654',
        '1987-11-05',
        '555-7777'
    ),
    (
        1,
        'Guilherme Figueiredo',
        '1111111',
        '1985-06-15',
        '555-8888'
    ),
    (
        2,
        'Gustavo Dias',
        '2222222',
        '1990-09-22',
        '555-9999'
    ),
    (
        3,
        'Giovanna Silva',
        '3333333',
        '1989-12-01',
        '555-1010'
    ),
    (
        4,
        'Giovana Santos',
        '4444444',
        '1994-03-18',
        '555-1111'
    ),
    (
        5,
        'Gabriel Mendes',
        '5555555',
        '1986-08-29',
        '555-1212'
    ),
    (
        1,
        'Edward Mevis',
        '6666666',
        '1991-05-07',
        '555-1313'
    ),
    (
        5,
        'Erick Bastos',
        '7777777',
        '1983-10-25',
        '555-1414'
    ),
    (
        1,
        'Ana Augusto',
        '8888888',
        '1984-07-03',
        '555-1515'
    ),
    (
        2,
        'Ana Martins',
        '9999999',
        '1982-02-14',
        '555-1616'
    ),
    (
        3,
        'Bruno Portugal',
        '1010101',
        '1981-11-11',
        '555-1717'
    ),
    (
        2,
        'Daniel Rufino',
        '1212121',
        '1993-04-05',
        '555-1818'
    ),
    (
        3,
        'Bianca Silva',
        '1313131',
        '1985-06-15',
        '555-1919'
    ),
    (
        5,
        'Ana Lima',
        '1414141',
        '1992-07-12',
        '555-2020'
    ),
    (
        4,
        'Natalia Lopes',
        '1515151',
        '1989-10-15',
        '555-2121'
    ),
    (
        1,
        'Gabriel Pires',
        '1616161',
        '1980-02-25',
        '555-2222'
    ),
    (
        2,
        'Natali Guimarães',
        '1717171',
        '1987-11-05',
        '555-2323'
    ),
    (
        3,
        'Bernardo Ferreira',
        '1818181',
        '1988-04-30',
        '555-2424'
    ),
    (
        4,
        'Zaynoun Sayegh',
        '1919191',
        '1991-05-07',
        '555-2525'
    ),
    (
        4,
        'Pedro Araújo',
        '2020202',
        '1983-10-25',
        '555-2626'
    ),
    (
        2,
        'Nicolas Maya',
        '2121212',
        '1986-08-29',
        '555-2727'
    );

-- Inser��o de dados na tabela UtilizacaoVeiculo:
INSERT INTO
    UtilizacaoVeiculo (CodigoVeiculo, CodigoVendedor, DataUtilizacao)
VALUES
    (3, 3, '2023-10-27'),
    (4, 4, '2023-10-28'),
    (5, 5, '2023-10-29'),
    (1, 1, '2023-10-30'),
    (2, 2, '2023-10-31'),
    (1, 1, '2023-10-01'),
    (2, 2, '2023-10-02'),
    (3, 4, '2023-10-03'),
    (4, 3, '2023-10-04'),
    (5, 6, '2023-10-05'),
    (6, 5, '2023-10-06'),
    (7, 8, '2023-10-07'),
    (8, 7, '2023-10-08'),
    (9, 10, '2023-10-09'),
    (10, 9, '2023-10-10'),
    (9, 12, '2023-10-11'),
    (8, 11, '2023-10-12'),
    (7, 14, '2023-10-13'),
    (6, 13, '2023-10-14'),
    (5, 16, '2023-10-15'),
    (4, 15, '2023-10-16'),
    (3, 17, '2023-10-17'),
    (2, 18, '2023-10-18'),
    (1, 19, '2023-10-19'),
    (10, 20, '2023-10-20'),
    (2, 1, '2023-10-21'),
    (3, 2, '2023-10-22'),
    (4, 3, '2023-10-23'),
    (5, 4, '2023-10-24'),
    (6, 5, '2023-10-25'),
    (7, 6, '2023-10-26'),
    (8, 7, '2023-10-27'),
    (9, 8, '2023-10-28'),
    (1, 9, '2023-10-29'),
    (10, 10, '2023-10-30'),
    (2, 11, '2023-10-31'),
    (3, 12, '2023-11-01'),
    (4, 13, '2023-11-02'),
    (5, 14, '2023-11-03'),
    (6, 15, '2023-11-04'),
    (7, 16, '2023-11-05'),
    (11, 1, '2023-09-01'),
    (12, 2, '2023-09-02'),
    (13, 4, '2023-09-03'),
    (14, 3, '2023-09-04'),
    (15, 6, '2023-09-05'),
    (16, 5, '2023-09-06'),
    (17, 8, '2023-09-07'),
    (18, 7, '2023-09-08'),
    (19, 10, '2023-09-09'),
    (20, 9, '2023-09-10'),
    (29, 12, '2023-11-11'),
    (28, 11, '2023-11-12'),
    (27, 14, '2023-11-13'),
    (26, 13, '2023-11-14'),
    (25, 16, '2023-11-15'),
    (24, 15, '2023-11-16'),
    (23, 17, '2023-11-17'),
    (22, 18, '2023-11-18'),
    (21, 19, '2023-11-19'),
    (30, 20, '2023-11-20'),
    (12, 1, '2023-12-21'),
    (27, 16, '2023-10-05');

-- Inser��o de dados na tabela Nota Fiscal:
INSERT INTO
    NotaFiscal (
        NumeroNotaFiscal,
        CodigoCliente,
        CodigoVendedor,
        DataEmissao
    )
VALUES
    (1003, 3, 3, '2023-10-27'),
    (1004, 3, 4, '2023-10-28'),
    (1005, 5, 5, '2023-10-29'),
    (1006, 1, 1, '2023-10-30'),
    (1007, 2, 2, '2023-10-31'),
    (1008, 2, 3, '2023-11-1'),
    (1009, 1, 3, '2023-11-2'),
     (123456789, 1, 1, '2023-10-01'),
    (987654321, 2, 2, '2023-10-02'),
    (123987654, 3, 3, '2023-10-03'),
    (456789123, 4, 4, '2023-10-04'),
    (654789123, 5, 5, '2023-10-05'),
    (012345678, 6, 6, '2023-10-06'),
    (023456789, 7, 7, '2023-10-07'),
    (034567891, 8, 8, '2023-10-08'),
    (045678912, 9, 9, '2023-10-09'),
    (056789123, 10, 10, '2023-10-10'),
    (067891234, 11, 11, '2023-10-11'),
    (078912356, 12, 12, '2023-10-12'),
    (089123456, 13, 13, '2023-10-13'),
    (091234567, 14, 14, '2023-10-14'),
    (075671234, 15, 15, '2023-10-15'),
    (501894707, 16, 16, '2023-10-16'),
    (405687162, 17, 17, '2023-10-17'),
    (698753124, 18, 18, '2023-10-18'),
    (854321976, 19, 19, '2023-10-19'),
    (789213514, 20, 20, '2023-10-20'),
    (123456790, 1, 1, '2023-10-21'),
    (123456791, 2, 2, '2023-10-22'),
    (123456792, 3, 3, '2023-10-23'),
    (123456793, 4, 4, '2023-10-24'),
    (123456794, 5, 5, '2023-10-25'),
    (123456795, 6, 6, '2023-10-26'),
    (123456796, 7, 7, '2023-10-27'),
    (123456797, 8, 8, '2023-10-28'),
    (123456798, 9, 9, '2023-10-29'),
    (123456799, 10, 10, '2023-10-30'),
    (123456800, 11, 11, '2023-10-31'),
    (123456801, 12, 12, '2023-11-01');

-- Inser��o de dados na tabela Item da Nota Fiscal:
INSERT INTO
    ItemNotaFiscal (
        CodigoProduto,
        CodigoNotaFiscal,
        QuantidadeProduto
    )
VALUES
    (3, 1, 4),
    (4, 2, 1),
    (5, 3, 2),
    (1, 4, 5),
    (2, 5, 3),
    (6, 6, 2),
    (1, 1, 10),
    (1, 2, 9),
    (2, 3, 8),
    (2, 4, 7),
    (3, 5, 6),
    (3, 6, 5),
    (4, 7, 4),
    (4, 8, 3),
    (5, 9, 2),
    (5, 10, 1),
    (6, 9, 11),
    (6, 8, 12),
    (7, 7, 13),
    (7, 6, 14),
    (8, 5, 15),
    (8, 3, 16),
    (9, 4, 17),
    (9, 2, 18),
    (10, 1, 19),
    (10, 10, 20),
    (11, 9, 1),
    (11, 8, 3),
    (12, 6, 2),
    (12, 7, 4),
    (13, 5, 6),
    (13, 4, 7),
    (14, 3, 8),
    (14, 2, 9),
    (15, 1, 10),
    (15, 10, 11),
    (16, 19, 7),
    (16, 18, 5),
    (17, 16, 6),
    (19, 27, 8),
    (18, 14, 9),
    (20, 25, 10),
    (21, 13, 10),
    (21, 12, 9),
    (22, 23, 8),
    (22, 14, 7),
    (23, 15, 6),
    (23, 26, 5),
    (24, 17, 4),
    (24, 18, 3),
    (25, 19, 2),
    (25, 10, 1),
    (26, 19, 11),
    (26, 18, 12),
    (27, 17, 13),
    (27, 16, 14),
    (28, 15, 15),
    (28, 13, 16),
    (29, 14, 17),
    (29, 12, 18),
    (30, 11, 19),
    (30, 10, 20),
    (31, 19, 1),
    (31, 18, 3),
    (32, 26, 2),
    (32, 27, 4),
    (20, 25, 6),
    (23, 24, 7),
    (24, 23, 8),
    (21, 22, 9),
    (15, 21, 10),
    (16, 10, 11),
    (31, 19, 7),
    (32, 18, 5),
    (17, 26, 6),
    (19, 27, 8),
    (16, 24, 9),
    (20, 25, 10);