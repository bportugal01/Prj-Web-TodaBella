const express = require('express')
const app = express()
const handlebars = require('express-handlebars').engine

app.engine('handlebars', handlebars({ defaultLayout: 'main' }))
app.set('view engine', 'handlebars')



app.get('/', function (req, res) {
    res.render('index');
});

app.get('/cadastro_Cliente', function (req, res) {
    res.render('cadastro_Cliente');
});

app.get('/cadastro_itemNotaFiscal', function (req, res) {
    res.render('cadastro_itemNotaFiscal');
});

app.get('/cadastro_NotaFiscal', function (req, res) {
    res.render('cadastro_NotaFiscal');
});

app.get('/cadastro_Produto', function (req, res) {
    res.render('cadastro_Produto');
});

app.get('/cadastro_Regiao_Ponto', function (req, res) {
    res.render('cadastro_Regiao_Ponto');
});

app.get('/cadastro_Veiculo', function (req, res) {
    res.render('cadastro_Veiculo');
});

app.get('/cadastro_Vendedor', function (req, res) {
    res.render('cadastro_Vendedor');
});

app.get('/cadastro_UtilizacaoVeiculo', function (req, res) {
    res.render('cadastro_UtilizacaoVeiculo');
});

app.get('/editar_Cliente', function (req, res) {
    res.render('editar_Cliente');
});

app.get('/editar_itemNotaFiscal', function (req, res) {
    res.render('editar_itemNotaFiscal');
});

app.get('/editar_NotaFiscal', function (req, res) {
    res.render('editar_NotaFiscal');
});

app.get('/editar_Produto', function (req, res) {
    res.render('editar_Produto');
});

app.get('/editar_Regiao_Ponto', function (req, res) {
    res.render('editar_Regiao_Ponto');
});

app.get('/editar_UtilizacaoVeiculo', function (req, res) {
    res.render('editar_UtilizacaoVeiculo');
});

app.get('/editar_Veiculo', function (req, res) {
    res.render('editar_Veiculo');
});

app.get('/editar_Vendedor', function (req, res) {
    res.render('editar_Vendedor');
});

app.get('/gerenciamento', function (req, res) {
    res.render('gerenciamento');
});

app.get('/listar_Cliente', function (req, res) {
    res.render('listar_Cliente');
});

app.get('/listar_NotaFiscal', function (req, res) {
    res.render('listar_NotaFiscal');
});

app.get('/listar_Produto', function (req, res) {
    res.render('listar_Produto');
});

app.get('/listar_RegiaoPonto', function (req, res) {
    res.render('listar_RegiaoPonto');
});

app.get('/listar_Veiculo', function (req, res) {
    res.render('listar_Veiculo');
});

app.get('/listar_Vendedor', function (req, res) {
    res.render('listar_Vendedor');
});

app.get('/login', function (req, res) {
    res.render('login');
});

app.get('/sair', function (req, res) {
    res.render('sair');
});

app.get('/select_HistoricoVeiculo', function (req, res) {
    res.render('select_HistoricoVeiculo');
});

app.get('/select_Ponto_Regiao', function (req, res) {
    res.render('select_Ponto_Regiao');
});

app.get('/select_ProdutosN', function (req, res) {
    res.render('select_ProdutosN');
});

app.get('/select_ProdutoVendedor', function (req, res) {
    res.render('select_ProdutoVendedor');
});

app.get('/select_QuantidadeProdutoNotaF', function (req, res) {
    res.render('select_QuantidadeProdutoNotaF');
});

app.get('/select_Regiao', function (req, res) {
    res.render('select_Regiao');
});

app.get('/select_VendedorProduto', function (req, res) {
    res.render('select_VendedorProduto');
});

app.get('/select_VendedorRegiao', function (req, res) {
    res.render('select_VendedorRegiao');
});

app.get('/select_VendedorVeiculo', function (req, res) {
    res.render('select_VendedorVeiculo');
});

app.get('/select', function (req, res) {
    res.render('select');
});


app.listen(8081, function () {
    console.log('Servidor no endereço http://localhost:8081')
})