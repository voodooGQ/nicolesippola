<?php
/**
 * Site Header Controller
 *
 * @author Shane Smith <ssmith@nerdery.com>
 * @since 1.0
 */

namespace NiSi\Landmark\Controller;

use NiSi\Vendor\Twig\TwigInterface;

/**
 * Class Header
 *
 * @package NiSi\Landmark\Controller
 * @author  Shane Smith <ssmith@nerdery.com>
 * @since   1.0
 */
class Header implements TwigInterface
{
    /**
     * The Twig Template Name
     *
     * @const
     * @type string
     * @since 1.0
     */
    const TWIG_TEMPLATE_NAME = 'landmark/header';

    /**
     * Returns the name of the Twig Template to use
     *
     * @return string
     * @since 1.0
     */
    public function getTemplateName()
    {
        return self::TWIG_TEMPLATE_NAME;
    }

    /**
     * Returns the staff feed data for Twig
     *
     * @return array
     * @since 1.0
     */
    public function getTwigData()
    {
        global $post;
        $twigData = array();

        if ($post) {
            $twigData['menu'] = wp_nav_menu(
                array(
                    'menu' => 'primary',
                    'menu_class' => 'menu-primary'
                )
            );
        }
        return $twigData;
    }
}