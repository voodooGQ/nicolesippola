// Application
'use strict';

window.$ = window.jQuery = require('jquery');
var slick = require('../vendor/slick-carousel/slick/slick');
var MobileMenuView = require('./views/MobileMenu');

var MobileMenu = new MobileMenuView($('.js-mobileMenu'));

$(".carousel").slick({
    infinite: true,
    autoplay: true,
    prevArrow: false,
    nextArrow: false,
    speed: 800,
});