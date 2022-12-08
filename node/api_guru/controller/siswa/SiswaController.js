const model = require('../../config/model/index');
const controller = {};

controller.getAll = async function(req, res) {
    try {
        await model.siswa.getAll()
        .then ((result) => {
            if (result.length > 0) {
                res.status(200).json({
                    message: "Get Siswa Method",
                    data: result
                })
            } else {
                res.status(200).json({
                    message: "Not Found Siswa"
                })
            }
        })
    } catch (err) {
        res.status(404).json({
            message: "Eror Query Sql"
        })
    }
}

module.exports = controller;