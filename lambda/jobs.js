'use strict';
//AWS lambda function to retrieve the HRM Direct jobs site and parse it into usable JSON.
//This exists because we've tried Kimono (shut down) and import.io, and they weren't reliable.
const http = require('http');
const BASE_URL = 'http://atsid.hrmdirect.com/employment/';
const SEARCH_URL = BASE_URL + 'job-openings.php?search=true';

const fields = ['title', 'href', 'department', 'city', 'state'];
const titlePattern = /<td id='posTitle'[\w\s="]*>.*>([-\w\s\/]*)<\/td>/g;
const linkPattern = /<td id='posTitle'[\w\s="]*><a href="(.*)">[-\w\s\/]*<\/td>/g;
const departmentPattern = /<td id='departments'[\w\s="]*>([\w\s\/]*)<\/td>/g;
const cityPattern = /<td id='cities'[\w\s="]*>([\w\s\/]*)<\/td>/g;
const statePattern = /<td id='state'[\w\s="]*>([\w\s\/]*)<\/td>/g;

function extractRows(pattern, text) {
    let rows = [];
    let reg = new RegExp(pattern);
    let match;
    while (match = reg.exec(text)) {
        let value;
        if (match[1]) {
            value = match[1];
        } else {
            value = match[0];
        }
        rows.push(value.trim());
    }
    return rows;
}

//extracts all the arrays of table row values
//this is a weird data structure, because the number of outer array entries is the number of fields (5), and the inner arrays are all length === open reqs
function extractTuple(patterns, text) {

    let tuple = [];

    //TODO: should validate that each is exactly the same length
    patterns.forEach((pattern) => {
        let rows = extractRows(pattern, text);
        tuple.push(rows);
    });

    return tuple;
}

//turn the tuple into an array of objects, using the prop names
//array order of the tuple must match the props order!
function objectify(tuple, props) {

    let arr = [];
    let length = tuple[0].length; //how many rows (job reqs) have we harvested?

    //create a bunch of empty objects to start with
    for (let i = 0; i < length; i++) {
        arr.push({});
    }

    //now fill in the props on each by "unwinding" the tuple rows
    for (let i = 0; i < props.length; i++) {
        let rowsOfField = tuple[i];
        for (let j = 0; j < length; j++) {
            arr[j][props[i]] = rowsOfField[j];
        }
    }

    return arr;
}

exports.handler = (event, context, callback) => {
    const req = http.get(SEARCH_URL, (res) => {
        let body = '';
        res.setEncoding('utf8');
        res.on('data', (chunk) => body += chunk);
        res.on('end', () => {

            let tuple = extractTuple([
                titlePattern,
                linkPattern,
                departmentPattern,
                cityPattern,
                statePattern
            ], body);

            let results = objectify(tuple, fields);

            //correct the job URL
            results.forEach((job) => {
                job.href = BASE_URL + job.href;
            });

            callback(null, results);
        });
    });

    req.on('error', callback);
    req.end();
};

