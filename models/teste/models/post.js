// Importe o Sequelize
const Sequelize = require('sequelize');

// Importe a configuração do banco de dados
const sequelize = require("./db");

// Defina os modelos Sequelize para cada tabela do banco de dados
const Produto = sequelize.define('Produto', {
    CodigoProduto: {
        type: Sequelize.INTEGER,
        autoIncrement: true,
        allowNull: false,
        primaryKey: true
    },
    NomeProduto: {
        type: Sequelize.STRING(60),
        allowNull: false
    },
    SituacaoProduto: {
        type: Sequelize.ENUM('Ativo', 'Inativo'),
        allowNull: false
    },
    PrecoUnitario: {
        type: Sequelize.DECIMAL(10, 2),
        allowNull: false
    },
    QuantidadeEstoque: {
        type: Sequelize.INTEGER,
        allowNull: false
    }
});

const Cliente = sequelize.define('Cliente', {
    CodigoCliente: {
        type: Sequelize.INTEGER,
        autoIncrement: true,
        allowNull: false,
        primaryKey: true
    },
    NomeCliente: {
        type: Sequelize.STRING(50),
        allowNull: false
    },
    RGCliente: {
        type: Sequelize.STRING(20)
    },
    CPFCliente: {
        type: Sequelize.STRING(20)
    },
    EnderecoCliente: {
        type: Sequelize.STRING(50)
    }
});

const Telefone = sequelize.define('Telefone', {
    CodigoTelefone: {
        type: Sequelize.INTEGER,
        autoIncrement: true,
        allowNull: false,
        primaryKey: true
    },
    NumeroTelefone: {
        type: Sequelize.STRING(15),
        allowNull: false
    }
});

const TipoTelefone = sequelize.define('TipoTelefone', {
    CodigoTelefone: {
        type: Sequelize.INTEGER,
        primaryKey: true
    },
    DescricaoTipo: {
        type: Sequelize.STRING(20),
        allowNull: false
    }
});

const Veiculo = sequelize.define('Veiculo', {
    CodigoVeiculo: {
        type: Sequelize.INTEGER,
        autoIncrement: true,
        allowNull: false,
        primaryKey: true
    },
    PlacaVeiculo: {
        type: Sequelize.STRING(7),
        allowNull: false
    },
    TipoVeiculo: {
        type: Sequelize.STRING(50),
        allowNull: false
    },
    ModeloVeiculo: {
        type: Sequelize.STRING(50),
        allowNull: false
    }
});

const Regiao = sequelize.define('Regiao', {
    CodigoRegiao: {
        type: Sequelize.INTEGER,
        allowNull: false,
        primaryKey: true
    },
    NomeRegiao: {
        type: Sequelize.STRING(30),
        allowNull: false
    }
});

const Vendedor = sequelize.define('Vendedor', {
    CodigoVendedor: {
        type: Sequelize.INTEGER,
        autoIncrement: true,
        allowNull: false,
        primaryKey: true
    },
    CodigoRegiao: {
        type: Sequelize.INTEGER,
        allowNull: false
    },
    NomeVendedor: {
        type: Sequelize.STRING(50),
        allowNull: false
    },
    RGVendedor: {
        type: Sequelize.STRING(20)
    },
    DataNascimento: {
        type: Sequelize.DATE
    },
    TelefoneVendedor: {
        type: Sequelize.STRING(15)
    }
});

const PontoEstrategico = sequelize.define('PontoEstrategico', {
    CodigoPonto: {
        type: Sequelize.INTEGER,
        autoIncrement: true,
        allowNull: false,
        primaryKey: true
    },
    CodigoRegiao: {
        type: Sequelize.INTEGER,
        allowNull: false
    },
    NomePonto: {
        type: Sequelize.STRING(100),
        allowNull: false
    }
});

const UtilizacaoVeiculo = sequelize.define('UtilizacaoVeiculo', {
    CodigoVeiculo: {
        type: Sequelize.INTEGER,
        allowNull: false,
        primaryKey: true
    },
    CodigoVendedor: {
        type: Sequelize.INTEGER,
        allowNull: false,
        primaryKey: true
    },
    DataUtilizacao: {
        type: Sequelize.DATE,
        allowNull: false,
        primaryKey: true
    }
});

const NotaFiscal = sequelize.define('NotaFiscal', {
    CodigoNotaFiscal: {
        type: Sequelize.INTEGER,
        autoIncrement: true,
        allowNull: false,
        primaryKey: true
    },
    NumeroNotaFiscal: {
        type: Sequelize.INTEGER,
        allowNull: false
    },
    CodigoCliente: {
        type: Sequelize.INTEGER,
        allowNull: false
    },
    CodigoVendedor: {
        type: Sequelize.INTEGER,
        allowNull: false
    },
    DataEmissao: {
        type: Sequelize.DATE,
        allowNull: false
    }
});

const ItemNotaFiscal = sequelize.define('ItemNotaFiscal', {
    NumeroItemNotaFiscal: {
        type: Sequelize.INTEGER,
        autoIncrement: true,
        allowNull: false,
        primaryKey: true
    },
    CodigoProduto: {
        type: Sequelize.INTEGER,
        allowNull: false
    },
    CodigoNotaFiscal: {
        type: Sequelize.INTEGER,
        allowNull: false
    },
    QuantidadeProduto: {
        type: Sequelize.INTEGER,
        allowNull: false
    }
});

// Defina os relacionamentos entre os modelos
Telefone.belongsTo(Cliente, { foreignKey: 'CodigoCliente' });
TipoTelefone.belongsTo(Telefone, { foreignKey: 'CodigoTelefone' });
Vendedor.belongsTo(Regiao, { foreignKey: 'CodigoRegiao' });
PontoEstrategico.belongsTo(Regiao, { foreignKey: 'CodigoRegiao' });
UtilizacaoVeiculo.belongsTo(Veiculo, { foreignKey: 'CodigoVeiculo' });
UtilizacaoVeiculo.belongsTo(Vendedor, { foreignKey: 'CodigoVendedor' });
NotaFiscal.belongsTo(Cliente, { foreignKey: 'CodigoCliente' });
NotaFiscal.belongsTo(Vendedor, { foreignKey: 'CodigoVendedor' });
ItemNotaFiscal.belongsTo(Produto, { foreignKey: 'CodigoProduto' });
ItemNotaFiscal.belongsTo(NotaFiscal, { foreignKey: 'CodigoNotaFiscal' });

// Sincronize os modelos com o banco de dados, se necessário
// (Adicione essa linha no código onde você deseja sincronizar)
sequelize.sync({ force: true });

// Exporte os modelos
module.exports = {
    Produto,
    Cliente,
    Telefone,
    TipoTelefone,
    Veiculo,
    Regiao,
    Vendedor,
    PontoEstrategico,
    UtilizacaoVeiculo,
    NotaFiscal,
    ItemNotaFiscal
};
