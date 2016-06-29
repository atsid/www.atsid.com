'use strict';
const jobs = require('./jobs.js');
const nock = require('nock');
const expect = require('chai').expect;

const HRM_URL = 'http://atsid.hrmdirect.com';

describe('Jobs HTML-to-JSON lambda', () => {

    it('one job in each division', (done) => {

        let scope = nock(HRM_URL)
            .get('/employment/job-openings.php?search=true')
            .replyWithFile(200, __dirname + '/test-data/hrm-direct-2-jobs.htm');

        jobs.handler.call(this, {}, {}, (err, results) => {
            expect(results).to.have.lengthOf(2);
            done();
        });

    });

    it('one job, systems division', (done) => {

        let scope = nock(HRM_URL)
            .get('/employment/job-openings.php?search=true')
            .replyWithFile(200, __dirname + '/test-data/hrm-direct-1-job.htm');

        jobs.handler.call(this, {}, {}, (err, results) => {
            expect(results).to.have.lengthOf(1);
            let result = results[0];
            expect(result).to.have.all.keys(['title', 'href', 'department', 'city', 'state']);
            expect(result).to.have.property('title', 'JavaScript Developer');
            expect(result).to.have.property('department', 'Systems Engineering');
            expect(result).to.have.property('city', 'Alexandria');
            expect(result).to.have.property('state', 'VA');
            done();
        });

    });

});