const Sequelize = require('sequelize');

const db = new Sequelize('db_sekolah', 'root', '', {
    dialect: 'mysql',
    host: 'localhost',
});

module.exports = db;