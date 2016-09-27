
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./jquery');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

var Vue = require('vue');
var VueRouter = require('vue-router');
Vue.use(VueRouter);

var HomeView = require('./components/HomeView.vue');
var AboutView = require('./components/AboutView.vue');
var CodingChallengeView = require('./components/CodingChallengeView.vue');
var FlappyBirdView = require('./components/FlappyBirdView.vue');

var router = new VueRouter();

router.map({
    '/': {
        component: HomeView
    },
    '/about': {
        component: AboutView
    },
    '/codingChallenge-5e5bc3d3-435c-49f6-b130-7d16cbea643f': {
        component: CodingChallengeView
    },
    '/flappyBird': {
        component: FlappyBirdView
    }
});

var App = Vue.extend({

});

router.start(App, 'body');
