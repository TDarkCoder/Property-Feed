require('./bootstrap');

window.Vue = require('vue').default;

import {ElementUI, locale} from './imports';

Vue.use(ElementUI, {locale})

Vue.component('property', require('./components/property/Property.vue').default);

new Vue({
    el: '#app',
});
