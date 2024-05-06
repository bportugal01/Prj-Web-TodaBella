const Sequelize = require('sequelize');

const sequelize = new Sequelize('bdbeleza', 'root', '', {
  host: 'localhost',
  dialect: 'mysql'
});

module.exports = sequelize;