// ############## import package ################
const express = require('express');
const morgan = require('morgan');
const BodyParser = require('body-parser');
const app = express();

const bodyParser = require('body-parser');

app.use(morgan('dev'));
app.use(BodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
// ###############################################

// ############# router file ################
const guruRouter = require('./router/guru/Guru');
const siswaRouter = require('./router/siswa/Siswa');
// ##########################################

// ######## route ##########
app.use('/api/', guruRouter);
app.use('/api/', siswaRouter);
// #########################

// ###### handling error message ######
// app.use((req, res, next) => {
//     const error = new Error('Not Found');
//     error.status = 404;
//     next(error);
// })

// app.use((error, req, res, next) => {
//     req.status(error.status || 500);
//     res.json({
//         error: {
//             message: error.message
//         }
//     })
// })
// ####################################

// # module export #
module.exports = app;
// ################