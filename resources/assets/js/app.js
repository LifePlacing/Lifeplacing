
require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component( 'cep' , require('./components/Cep.vue'));


const app = new Vue({
    el: '#app'
});


