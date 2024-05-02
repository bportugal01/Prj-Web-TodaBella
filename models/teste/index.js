(async()=>{
    const database = require('./models/db')
    const Produto = require('./models/produtos')
    const Fabricante = require('./models/fabricante')
    await database.sync({force: true})


})