const express = require('express');
const db = require('../../config/database/Mysql');
const router = express.Router();
const controller = require('../../controller/index');

router.get('/siswa', controller.siswa.getAll);
// router.get('/siswa', (req, res, next) => {
//     const query = "SELECT * FROM siswa";

//     db.query(query, (err, result) => {
//         if (err) {
//             throw err;
//         }
//         res.status(200).json({
//             status: "200",
//             siswa: result
//         })
//     })
// })

router.get('/siswa/:id', (req, res, next) => {
    const id = req.params.id;
    const query = "SELECT * FROM siswa WHERE id="+id;

    db.query(query, (err, result) => {
        if (err) {
            throw err;
        }
        if (result.length) {
            res.status(200).json({
                status: "200",
                message: "Finding Siswa",
                siswa: result
            })
        }
        res.status(200).json({
            message: "Siswa Not Found",
        })
    })
})

router.post('/siswa/store', (req, res, next) => {
    const nama_siswa = req.body.nama_siswa;
    const jk = req.body.jk;
    const tgl_lahir = req.body.tgl_lahir;
    const tempat_lahir = req.body.tempat_lahir;
    const nama_ibu = req.body.nama_ibu;
    const nik = req.body.nik;
    const nisn = req.body.nisn;

    const query = "INSERT INTO siswa (nama_siswa, jk, tgl_lahir, tempat_lahir, nama_ibu, nik, nisn) VALUES ('"+ nama_siswa +"', '"+ jk +"', '"+ tgl_lahir +"', '"+ tempat_lahir +"', '"+ nama_ibu +"', '"+ nik +"', '"+ nisn +"')";
    db.query(query, (err, result) => {
        if (err) {
            throw err;
        }
        res.status(200).json({
            status: "200",
            message: "C4reated Siswa",
        })
    })
})

router.put('/siswa/:id', (req, res) => {
    const id = req.params.id;
    const nama_siswa = req.body.nama_siswa;
    const jk = req.body.jk;
    const tgl_lahir = req.body.tgl_lahir;
    const tempat_lahir = req.body.tempat_lahir;
    const nama_ibu = req.body.nama_ibu;
    const nik = req.body.nik;
    const nisn = req.body.nisn;

    const query = "UPDATE siswa SET nama_siswa= ?, jk= ?, tgl_lahir= ?, tempat_lahir= ?, nama_ibu= ?, nik= ?, nisn= ? WHERE id= ?";
    db.query(query, [nama_siswa, jk, tgl_lahir, tempat_lahir, nama_ibu, nik, nisn, id], (err, result) => {
        if (err) {
            throw err;
        }
        res.status(200).json({
            status: "200",
            message: "Updated",
        })
    })
})

router.delete('/siswa/:id', (req, res) => {
    const id = req.params.id;

    const query = "DELETE FROM siswa WHERE id= ?";
    db.query(query, id, (err, result) => {
        if (err) {
            throw err;
        }
        res.status(200).json({
            status: "200",
            message: "Deleted"
        })
    })
})



module.exports = router;