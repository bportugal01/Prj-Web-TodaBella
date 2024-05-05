const express = require('express')
const app = express()
const handlebars = require('express-handlebars').engine

app.engine('handlebars', handlebars({ defaultLayout: 'main' }))
app.set('view engine', 'handlebars')



app.get('/', function (req, res) {
    res.render('index')
})
app.get('/atualizar', function (req, res) {
    res.render('atualizar')
})

app.get('/consultar', function (req, res) {
    res.render('consultar')
})


app.listen(8082, function () {
    console.log('Servidor no endereço http://localhost:8081')
})