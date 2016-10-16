<?php
/**
 * The Service Post Type
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since  1.0
 */

namespace NiSi\Services;

use NiSi\Theme\PostParent;

/**
 * The Service Post Type
 *
 * @class   Register
 * @package \NiSi\Services
 */
class Register extends PostParent
{
    /**
     * The singleton instance
     *
     * @const
     * @var null
     * @static
     * @since 1.0.1
     */
    protected static $instance = null;

    /**
     * Constructor
     *
     * @since 1.0.1
     */
    public function __construct()
    {
        $this->singularName = 'Service';
        $this->pluralName = 'Services';
        $this->menuIcon = 'dashicons-businessman';
        $this->supports = array('title', 'editor', 'thumbnail');
        parent::__construct();
    }

}
