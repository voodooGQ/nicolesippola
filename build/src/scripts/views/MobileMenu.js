/**
 * Responsible for functionality of the mobile menu
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

'use strict';

/**
 * The jQuery library (utilized from CMS)
 *
 * @type {object}
 * @since 1.0
 */
var $ = window.jQuery;

/**
 * The mobile menu trigger element
 *
 * @const
 * @type {string}
 * @since 1.0
 */
var TRIGGER_SELECTOR = 'js-mobileMenuTrigger';

/**
 * The class selector when the mobile menu is 'open'
 *
 * @const
 * @type {string}
 * @since 1.0
 */
var IS_OPEN_SELECTOR = 'isOpen';

/**
 * The pixel value the container element will be shifted 'left' when the mobile menu is 'closed'
 * when 'open' it will be at 0
 *
 * @const
 * @type {string}
 * @since 1.0
 */
var CLOSED_PIXEL_VALUE = '-300';

/**
 * The Mobile Menu Constructor
 *
 * @param {object} $element The jQuery Element
 * @param {number} animationSpeed The speed of the transition animation
 * @type {module.exports}
 * @since 1.0
 */
var MobileMenu = module.exports = function($element, animationSpeed) {
    this.$element = $element;
    this.animationSpeed = animationSpeed;
    this.init();
};

/**
 * The prototype object
 *
 * @type {module.exports}
 * @since 1.0
 */
var proto = MobileMenu.prototype;

/**
 * Initialize the Componenet
 *
 * @returns {proto}
 * @since 1.0
 */
proto.init = function() {

    return this.setupHandlers()
        .createChildren()
        .enable();
};

/**
 * Setup event handlers bound to the module
 *
 * @returns {proto}
 * @since 1.0
 */
proto.setupHandlers = function() {
    this.onClickHandler = this.onClick.bind(this);
    return this;
};

/**
 * Create any child elements of the main module element
 *
 * @returns {proto}
 * @since 1.0
 */
proto.createChildren = function() {
    this.$trigger = this.$element.find('.' + TRIGGER_SELECTOR);
    return this;
};

/**
 * Enable the module and activate any event handlers
 *
 * @returns {proto}
 * @since 1.0
 */
proto.enable = function() {
    if (this.isEnabled) {
        return this;
    }

    this.isEnabled = true;

    this.$trigger.on('click', this.onClickHandler);

    return this;
};

/**
 * Disable the module and destroy any event handlers
 *
 * @returns {proto}
 * @since 1.0
 */
proto.disable = function() {
    if (!this.isEnabled) {
        return this;
    }

    this.isEnabled = false;

    this.$trigger.off('click', this.onClickHandler);

    return this;
};

/**
 * On click of the mobile menu trigger element, shift the container left/right to open/close
 *
 * @param {MouseEvent} $event
 * @returns {proto}
 * @since 1.0
 */
proto.onClick = function($event) {
    var self = this;

    var pixelValue = (this.getToggleValue() === 'close')
        ? CLOSED_PIXEL_VALUE
        : '0';

    // Prevent click stacking
    this.disable();

    this.$element.animate({
        'left' : pixelValue + 'px'
    }, this.animationSpeed, function() {
        self.toggleOpenClass().enable();
    });

    return this;
};

/**
 * Get the value of the current toggle status 'open'/'close'
 *
 * @returns {string}
 * @since 1.0
 */
proto.getToggleValue = function() {
    return this.$element.hasClass(IS_OPEN_SELECTOR)
        ? 'close'
        : 'open';
};

/**
 * Toggle the Open value class on the primary module element
 *
 * @since 1.0
 * @returns {proto}
 */
proto.toggleOpenClass = function() {
    if(this.getToggleValue() === 'close') {
        this.$element.removeClass(IS_OPEN_SELECTOR);
    } else {
        this.$element.addClass(IS_OPEN_SELECTOR);
    }

    return this;
};