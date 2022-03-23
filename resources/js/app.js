require('./bootstrap');

window.Vue = require('vue').default;

import {ElementUI, locale} from './imports';

Vue.use(ElementUI, {locale})

component('example-component', require('./components/property/list.vue').default);

const app = new Vue({
    el: '#app',
});
