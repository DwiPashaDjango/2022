const express = require('express');
const db = require('../../config/database/Mysql');
const router = express.Router();

router.get('/guru', (req, res, next) => {
    const query = "SELECT * FROM guru";
    
    db.query(query, (err, result) => {
        if (err) {
            throw err;
        }
        res.status(200).json({
            status: "200",
            guru: result
        })
    })
})

router.get('/guru/:id', (req, res) => {
    const id = req.params.id;
    const query = "SELECT * FROM guru WHERE id="+id;

    db.query(query, (err, result) => {
        if (err) {
            throw err;
        }
        if (result.length) {
            res.status(200).json({
                status: "200",
                message: "Finding Guru",
                guru: result
            })
        }
        res.status(200).json({
            message: "Guru Not Found",
        })
    })
})

router.post('/guru/store', (req, res, next) => {
    const nama_guru = req.body.nama_guru;
    const nuptk = req.body.nuptk;
    const nik = req.body.nik;
    const nip = req.body.nip;
    const jk = req.body.jk;
    const tgl_lahir = req.body.tgl_lahir;
    const tempat_lahir = req.body.tempat_lahir; 

    const query = "INSERT INTO guru (nama_guru, nuptk, nik, nip, jk, tgl_lahir, tempat_lahir) VALUES ('"+ nama_guru +"', '"+ nuptk +"', '"+ nik +"', '"+ nip +"', '"+ jk +"', '"+ tgl_lahir +"', '"+ tempat_lahir +"')";
    db.query(query, (err, result) => {
        if (err) {
            throw err;
        }
        res.status(200).json({
            status: "200",
            message: "Created",
            desc: result
        })
    })
})

router.put('/guru/:id', (req, res, next) => {
    const id = req.params.id;
    const nama_guru = req.body.nama_guru;
    const nuptk = req.body.nuptk;
    const nik = req.body.nik;
    const nip = req.body.nip;
    const jk = req.body.jk;
    const tgl_lahir = req.body.tgl_lahir;
    const tempat_lahir = req.body.tempat_lahir; 

    const query = "UPDATE guru SET nama_guru = ?, nuptk= ?, nik= ?, nip= ?, jk= ?, tgl_lahir= ?, tempat_lahir= ? WHERE id= ?";
    db.query(query, [nama_guru, nuptk, nik, nip, jk, tgl_lahir, tempat_lahir, id], (err, result) => {
        if (err) {
            throw err;
        }
        res.status(200).json({
            status: "200",
            message: "Updated",
        })
    })
})

router.delete('/guru/:id', (req, res, next) => {
    const id = req.params.id;

    const query = "DELETE FROM guru WHERE id= ?";
    db.query(query, id, (err, result) => {
        if (err) {
            throw err;
        }
        res.status(200).json({
            status: "200",
            message: "Deleted",
        })
    })
})

module.exports = router;