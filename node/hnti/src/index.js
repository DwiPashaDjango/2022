const { Cabul } = require('cabul');
const reddit = new Cabul()
const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const app = express();

// To use and import hentai only
// reddit.hentai("ahegao", "hot").then(res => {
//     console.log(res); // Returns a object 
// });

app.get("ahegao", "hot").then(res => {
    console.log(res);
});

app.listen(3001, () => {
    console.log('Server Runing In Port 3001!')
});