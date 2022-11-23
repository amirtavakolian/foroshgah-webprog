window._ = require('lodash');

/* try {
    require('bootstrap');
} catch (e) {} */

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Popper = require('popper.js')
window.jQuery = window.$ = require('jquery');

require('bootstrap');
require('jquery.easing');
require('chart.js');
require('./panel/sb-admin-2');
require('./panel/demo/chart-area-demo');
require('./panel/demo/chart-bar-demo');
require('./panel/demo/chart-pie-demo');
require('./panel/demo/datatables-demo');
require('../../public/js/panel/bootstrap-select.min.js');



/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
