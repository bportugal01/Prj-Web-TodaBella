const Sequelize = require('sequelize');

const sequelize = new Sequelize('teste2', 'root', '', {
  host: 'localhost',
  dialect: 'mysql'
});

module.exports = sequelize;
