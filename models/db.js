const Sequelize = require('sequelize');

const sequelize = new Sequelize('bdlogin', 'root', '', {
  host: 'localhost',
  dialect: 'mysql'
});

module.exports = sequelize;