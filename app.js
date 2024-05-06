var express = require('express');
var app = express();

var bodyParser = require('body-parser');
var cookieParser = require('cookie-parser');
var session = require('express-session');
var morgan = require('morgan');
var User = require('./models/user');
var handlebars = require('express-handlebars').engine
var post = require("./models/post")


app.use(morgan('dev'));

app.use(bodyParser.urlencoded({ extended: true }));

app.use(cookieParser());

app.use(express.static('assets'))

app.use(session({
    key: 'user_sid',
    secret: 'somerandonstuffs',
    resave: false,
    saveUninitialized: false,
    cookie: {
        expires: 600000
    }
}));

app.engine('handlebars', handlebars({ defaultLayout: 'layout' }))
app.set('view engine', 'handlebars')

app.set("view engine", "handlebars")
app.use(bodyParser.json())
app.use(cookieParser());

app.use((req, res, next) => {
    if (req.cookies.user_sid && !req.session.user) {
        res.clearCookie('user_sid');        
    }
    next();
});

var hbsContent = {userName: '', loggedin: false, title: "You are not logged in today", body: "Hello World"}; 

var sessionChecker = (req, res, next) => {
    if (req.session.user && req.cookies.user_sid) {
		res.redirect('/gerenciamento');
    } else {
        next();
    }    
};


app.get('/', sessionChecker, (req, res) => {
    res.render('index');
});

app.route('/login')
    .get(sessionChecker, (req, res) => {
        res.render('login/login', hbsContent);
    })
    .post((req, res) => {
        var username = req.body.nomeUsuario,
            password = req.body.senha;

        User.findOne({ where: { username: username } }).then(function (user) {
            if (!user) {
                res.redirect('/login');
            } else if (!user.comparePassword(password)) {
                res.redirect('/login');
            } else {
                req.session.user = user.dataValues;
                res.redirect('/gerenciamento');
            }
        });
});


app.get('/gerenciamento', (req, res) => {
    if (req.session.user && req.cookies.user_sid) {
		hbsContent.loggedin = true; 
		hbsContent.userName = req.session.user.username; 
		console.log(req.session.user.username); 
		hbsContent.title = "You are logged in"; 
        res.render('gerenciamento', hbsContent);
    } else {
        res.redirect('/login');
    }
});

app.get('/logout', (req, res) => {
    if (req.session.user && req.cookies.user_sid) {
		hbsContent.loggedin = false; 
		hbsContent.title = "You are logged out!"; 
        res.clearCookie('user_sid');
		console.log(JSON.stringify(hbsContent)); 
        res.redirect('/');
    } else {
        res.redirect('/login');
    }
});

/*PRODUTO*/
app.get('/cadastro_Produto', (req, res) => {
    if (req.session.user && req.cookies.user_sid) {
		hbsContent.loggedin = true; 
		hbsContent.userName = req.session.user.username; 
		console.log(req.session.user.username); 
		hbsContent.title = "You are logged in"; 
        res.render('produto/cadastro_Produto', hbsContent);
    } else {
        res.redirect('/login');
    }
});

app.post('/cadastro_Produto', function(req,res){
    post.Produto.create({
        NomeProduto: req.body.nomeProduto,
        SituacaoProduto: req.body.situacao,
        PrecoUnitario: req.body.precoUnitario,
        QuantidadeEstoque: req.body.quantidadeEstoque
    }).then(function(){
        res.redirect("/cadastro_Produto")
    }).catch(function(erro){
        console.log("Erro ao cadastrar o produto! Erro: " + erro);
    })
})

app.get('/listar_Produto', function (req, res) {
    post.Produto.findAll().then(function(post){
        res.render("produto/listar_Produto", {post})
    }).catch(function(erro){
        res.send("Erro ao listar produtos! Erro: " + erro)
    })
});

app.get('/editar_Produto/:CodigoProduto', function (req, res) {
    post.Produto.findAll({
        where:{ 'CodigoProduto': req.params.CodigoProduto }
    }).then(function(post){
        res.render("produto/editar_Produto", {post})
    }).catch(function(erro){
        res.send("Erro ao buscar produto! Erro: " + erro)
    })
});

app.post('/editar_Produto', function(req,res){
    post.Produto.update({
        NomeProduto: req.body.nomeProduto,
        SituacaoProduto: req.body.situacao,
        PrecoUnitario: req.body.precoUnitario,
        QuantidadeEstoque: req.body.quantidadeEstoque
    }, {
        where: {CodigoProduto: req.body.CodigoProduto}
    }).then(function(){
        res.redirect("/listar_Produto");
    }).catch(function(erro){
        res.send("Erro ao editar produto! Erro: " + erro)
    })
})

app.get('/excluir_Produto/:CodigoProduto', function(req, res){
    post.Produto.destroy({
        where: {
            'CodigoProduto': req.params.CodigoProduto
        }
    }).then(function(){
        res.redirect("/listar_produto")
    }).catch(function(erro){
        res.send("Erro ao excluir o produto! Erro: " + erro)
    })
})

/*CLIENTE*/
app.get('/cadastro_cliente', function(req, res){
    res.render('cliente/cadastro_Cliente')
})

app.post('/cadastro_Cliente', function(req, res){
    post.Cliente.create({
        NomeCliente: req.body.nomeCliente,
        RGCliente: req.body.rgCliente,
        CPFCliente: req.body.cpfCliente,
        EnderecoCliente: req.body.enderecoCliente
    }).then(function(){
        res.redirect("/cadastro_Cliente")
    }).catch(function(erro){
        res.send("Erro ao cadastrar cliente! Erro:" + erro)
    })
})

app.get('/listar_Cliente', function (req, res) {
    post.Cliente.findAll().then(function(post){
        res.render("cliente/listar_Cliente", {post})
    }).catch(function(erro){
        res.send("Erro ao listar Clientes! Erro: " + erro)
    })
});

app.get('/editar_Cliente/:CodigoCliente', function(req, res){
    post.Cliente.findAll({
        where: {'CodigoCliente': req.params.CodigoCliente}
    }).then(function(post){
        res.render("cliente/editar_Cliente", {post})
    }).catch(function(erro){
        res.send("Erro na busca pelo registro! Erro: " + erro)
    })
    
});

app.post('/editar_Cliente', function (req, res) {
    post.Cliente.update({
        NomeCliente: req.body.nomeCliente,
        RGCliente: req.body.rgCliente,
        CPFCliente: req.body.cpfCliente,
        EnderecoCliente: req.body.enderecoCliente
    }, 
    {
        where: {CodigoCliente: req.body.CodigoCliente}
    }).then(function(){
        res.redirect("/listar_Cliente");
    }).catch(function(erro){
        res.send("Erro ao editar cliente! Erro: " + erro);
    });
});

app.get('/excluir_Cliente/:CodigoCliente', function(req, res){
    post.Cliente.destroy({
        where: {CodigoCliente: req.params.CodigoCliente}
    }).then(function(){
        res.redirect("/listar_Cliente");
    }).catch(function(erro){
        res.send("Erro ao excluir o registro! Erro: " + erro);
    })
})

/*VENDEDOR*/
app.get('/cadastro_Vendedor', function (req, res) {
    res.render('vendedor/cadastro_Vendedor');
});

app.post('/cadastro_Vendedor', function(req,res){
    post.Vendedor.create({
        NomeVendedor: req.body.nomeVendedor,
        RGVendedor: req.body.rgVendedor,
        DataNascimento: req.body.dataNascimento,
        TelefoneVendedor: req.body.telefoneVendedor,
        CodigoRegiao: req.body.codigoRegiao
    }).then(function(){
        res.redirect('/cadastro_Vendedor');
    }).catch(function(erro){
        res.send("Erro no cadastro do vendedor! Erro: " + erro)
    })
})

app.get('/listar_Vendedor', function (req, res) {
    post.Vendedor.findAll().then(function(post){
        res.render('vendedor/listar_Vendedor', {post});
    }).catch(function(erro){
        res.send("Erro ao listar os Vendedores! Erro: " + erro)
    })
});

app.get('/editar_Vendedor/:CodigoVendedor', function (req, res) {
    post.Vendedor.findAll({
        where: {'CodigoVendedor': req.params.CodigoVendedor}
    }).then(function(post){
        res.render("vendedor/editar_Vendedor", {post})
    }).catch(function(erro){
        res.send("Erro ao buscar vendedor! Erro: " + erro)
    })
});

app.post('/editar_Vendedor', function(req, res){
    post.Vendedor.update({
        NomeVendedor: req.body.nomeVendedor,
        RGVendedor: req.body.rgVendedor,
        DataNascimento: req.body.dataNascimento,
        TelefoneVendedor: req.body.telefoneVendedor
    },{
        where: {CodigoVendedor: req.body.CodigoVendedor}
    }).then(function(){
        res.redirect("/listar_Vendedor")
    }).catch(function(erro){
        res.send("Erro ao editar vendedor! Erro: " + erro);
    })
});

app.get('/excluir_Vendedor/:CodigoVendedor', function(req, res){
    post.Vendedor.destroy({
        where: {'CodigoVendedor': req.params.CodigoVendedor}
    }).then(function(){
        res.redirect("/listar_Vendedor")
    }).catch(function(erro){
        res.send("Errro ao excluir vendedor! Erro" + erro)
    })
});

/*VEICULOS*/
app.get('/cadastro_Veiculo', function (req, res) {
    res.render('veiculo/cadastro_Veiculo');
});

app.post('/cadastro_Veiculo', function(req,res){
    post.Veiculo.create({
        PlacaVeiculo: req.body.placaVeiculo,
        TipoVeiculo: req.body.tipoVeiculo,
        ModeloVeiculo: req.body.modeloVeiculo
    }).then(function(){
        res.redirect('/cadastro_Veiculo');
    }).catch(function(erro){
        res.send("Erro no cadastro de veículos! Erro: " + erro);
    })
})

app.get('/listar_Veiculo', function(req, res){
    let veiculoPromise = post.Veiculo.findAll();
    let utilizacaoPromise = post.UtilizacaoVeiculo.findAll();

    Promise.all([veiculoPromise, utilizacaoPromise])
        .then(function([veiculos, utilizacoes]){
            res.render('veiculo/listar_Veiculo', { veiculos, utilizacoes });
        })
        .catch(function(erro){
            res.status(500).send("Erro na listagem de veículos e suas utilizações! Erro: " + erro);
        });
})

app.get('/editar_Veiculo/:CodigoVeiculo', function (req, res) {
    post.Veiculo.findAll({
        where: {'CodigoVeiculo': req.params.CodigoVeiculo}
    }).then(function(post){
        res.render("veiculo/editar_Veiculo", {post})
    }).catch(function(erro){
        res.send("Erro na busca pelo veículo! Erro: " + erro)
    })
});

app.post('/editar_Veiculo', function(req, res){
    post.Veiculo.update({
        PlacaVeiculo: req.body.placaVeiculo,
        TipoVeiculo: req.body.tipoVeiculo,
        ModeloVeiculo: req.body.modeloVeiculo
    },{
        where: {CodigoVeiculo: req.body.CodigoVeiculo}
    }).then(function(){
        res.redirect("/listar_Veiculo")
    }).catch(function(erro){
        res.send("Erro ao editar veículo! Erro: " + erro)
    })
})

app.get('/excluir_Veiculo/:CodigoVeiculo', function(req, res){
    post.Veiculo.destroy({
        where:{ 'CodigoVeiculo' : req.params.CodigoVeiculo }
    }).then(function(){
        res.redirect("/listar_Veiculo")
    }).catch(function(erro){
        res.send("Erro ao excluir veículo! Erro: " + erro)
    })
})

/*UTILIZAÇÃO VEICULO*/
app.get('/cadastro_UtilizacaoVeiculo', function (req, res) {
    res.render('utilizacao/cadastro_UtilizacaoVeiculo');
});

app.post('/cadastro_UtilizacaoVeiculo', function(req, res){
    post.UtilizacaoVeiculo.create({
        CodigoVeiculo: req.body.codigoVeiculo,
        CodigoVendedor: req.body.codigoVendedor,
        DataUtilizacao: req.body.dataUtilizacao
    }).then(function(){
        res.redirect('/cadastro_UtilizacaoVeiculo');
    }).catch(function(erro){
        res.send("Erro ao cadastrar a utilização! Erro: " + erro);
    })
})

/*REGIÃO PONTO*/
app.get('/cadastro_Regiao_Ponto', function (req, res) {
    res.render('regiao/cadastro_Regiao_Ponto');
});

app.post('/cadastro_Regiao_Ponto', function(req, res){
    post.PontoEstrategico.create({
        CodigoRegiao: req.body.regiaoId,
        NomePonto: req.body.pontoNome
    }).then(function(){
        res.redirect('/cadastro_Regiao_Ponto')
    }).catch(function(erro){
        res.send("Erro ao cadastrar ponto estratégico. Erro: " + erro)
    })
})

app.get('/listar_RegiaoPonto', function (req, res) {
    let regiaoPromise = post.Regiao.findAll();
    let pontoPromise = post.PontoEstrategico.findAll();

    Promise.all([regiaoPromise, pontoPromise])
        .then(function([regioes, pontos]){
            res.render('regiao/listar_RegiaoPonto', { regioes, pontos });
        })
        .catch(function(erro){
            res.status(500).send("Erro na listagem de regiões e pontos estratégicos! Erro: " + erro);
        });
});

app.get('/editar_Regiao_Ponto/:CodigoPonto', function (req, res) {
    post.PontoEstrategico.findAll({
        where: {'CodigoPonto': req.params.CodigoPonto}
    }).then(function(post){
        res.render('regiao/editar_Regiao_Ponto', {post});
    }).catch(function(erro){
        res.send("Erro ao buscar o ponto para edição! Erro: " + erro);
    })
});

app.post('/editar_Regiao_Ponto', function(req, res){
    post.PontoEstrategico.update({
        NomePonto: req.body.pontoNome
    },{
        where: {CodigoPonto: req.body.CodigoPonto}
    }).then(function(){
        res.redirect("/listar_RegiaoPonto")
    }).catch(function(erro){
        res.send("Erro ao editar ponto estratégico! Erro: " + erro)
    })
})

app.get('/excluir_Regiao_Ponto/:CodigoPonto', function(req, res){
    post.PontoEstrategico.destroy({
        where: {'CodigoPonto': req.params.CodigoPonto}
    }).then(function(){
        res.redirect("/listar_RegiaoPonto")
    }).catch(function(erro){
        res.send("Erro ao excluir o Ponto Estratégico! Erro: " + erro)
    })
})


/*ITEM NOTA FISCAL*/
app.get('/cadastro_itemNotaFiscal', function(req, res){
    res.render('itemNotaFiscal/cadastro_itemNotaFiscal')
})

app.post('/cadastro_itemNotaFiscal', function (req, res) {
    post.ItemNotaFiscal.create({
        NumeroItemNotaFiscal: req.body.NumeroItemNotaFiscal,
        CodigoProduto: req.body.codigoProduto,
        CodigoNotaFiscal: req.body.codigoNotaFiscal,
        QuantidadeProduto: req.body.quantidadeProduto
    }).then(function(){
        res.redirect("/cadastro_itemNotaFiscal")
    }).catch(function(erro){
        res.send("Erro ao cadastrar cliente!" + erro)
    })
});

/*NOTA FISCAL*/
app.get('/cadastro_NotaFiscal', function (req, res) {
    res.render('notaFiscal/cadastro_NotaFiscal');
});

app.post('/cadastro_NotaFiscal', function (req, res) {
    post.NotaFiscal.create({
        NumeroNotaFiscal: req.body.numeroNotaFiscal,
        CodigoCliente: req.body.codigoCliente,
        CodigoVendedor: req.body.codigoVendedor,
        DataEmissao: req.body.dataEmissao
    }).then(function(){
        res.redirect("/cadastro_NotaFiscal")
    }).catch(function(erro){
        res.send("Erro ao cadastrar cliente!" + erro)
    })
});

app.get('/listar_NotaFiscal', function (req, res) {
    post.NotaFiscal.findAll().then(function(post){
        res.render("notaFiscal/listar_NotaFiscal", {post})
    }).catch(function(erro){
        res.send("Não foi possível consultar os dados: " + erro)
    })
});

app.get('/editar_NotaFiscal/:CodigoNotaFiscal', function(req, res){
    post.NotaFiscal.findAll({
        where: {'CodigoNotaFiscal': req.params.CodigoNotaFiscal}
    }).then(function(post){
        res.render("notaFiscal/editar_NotaFiscal", {post})
    }).catch(function(erro){
        res.send("Erro ao buscar registro da nota fiscal! Erro: " + erro);
    })
});

app.post('/editar_NotaFiscal/', function (req, res) {
    post.NotaFiscal.update({
        NumeroNotaFiscal: req.body.numeroNotaFiscale,
        CodigoCliente: req.body.codigoCliente,
        CodigoVendedor: req.body.codigoVendedor,
        DataEmissao: req.body.dataEmissao
    }, 
    {where: {CodigoNotaFiscal: req.body.CodigoNotaFiscal}})
    .then(function(){
        res.redirect("/listar_NotaFiscal");
    }).catch(function(erro){
        res.send("Erro ao editar nota fiscal! Erro: " + erro);
    });
});

app.get('/excluir_NotaFiscal/:CodigoNotaFiscal', function(req, res){
    post.NotaFiscal.destroy({
        where: {'CodigoNotaFiscal': req.params.CodigoNotaFiscal}
    }).then(function(){
        res.redirect("/listar_NotaFiscal");
    }).catch(function(erro){
        res.send("Erro ao excluir Nota Fiscal! Erro: " + erro);
    })
})

// start the express server
app.listen(8081, function () {
    console.log('Servidor no endereço http://localhost:8081')
})