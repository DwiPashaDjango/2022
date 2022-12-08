const Sequelize = require('sequelize');
const db = require('../../database/Mysql');

const siswa = db.define('siswa', {
    nama_siswa: Sequelize.STRING,
    jk: Sequelize.STRING,
    tgl_lahir: Sequelize.DATE,
    tempat_lahir: Sequelize.STRING,
    nama_ibu: Sequelize.STRING,
    nik: Sequelize.STRING,
    nisn: Sequelize.STRING
},{
    freezeTableName: true,
    timestamps: false
});

siswa.removeAttribute('id');
module.exports = siswa;