// import styles
import '@scss/main.scss';
import '@lib/scss/base.lib.scss';

// import libs
import dl from '@lib/js/devLogger';
import http from '@lib/js/http';
import DomManipulate from '@lib/js/domManipulate';

// set libs to global scope
window.dl = dl;
window.http = http;
window.dml = DomManipulate;

window.Draggabilly = require('draggabilly/draggabilly');
import 'slick-carousel/slick/slick.min';

require('../node_modules/@fortawesome/fontawesome-free/js/all.js');
require('../node_modules/selectric/public/jquery.selectric.js');

// require main js file
require('@js/home');
require('@js/about');
require('@js/city-jets');
require('@js/sub-menu');
require('@js/contact');
require('@js/single-trips');
require('@js/single-sales');
require('@js/maintenance');
require('@js/modal');
require('@js/index');

