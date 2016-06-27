'use strict';
//Execute lambda handlers as a simple test harness
const func = require('./jobs.js');

func.handler({}, {}, (err, result) => {
    console.log(err);
    console.log(result);
});