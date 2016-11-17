<?php
/**
 * Footer Meta
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

namespace NiSi\Landmark\Meta;

use NiSi\Theme\MetaParent;
use NiSi\Landmark\Controller\Menu;

/**
 * Class Footer
 *
 * @package NiSi\Post\Meta\Site
 * @author  Shane Smith <voodoogq@gmail.com>
 * @since   1.0
 */
class Footer extends MetaParent {
    /**
     * Return the address option variables
     *
     * @return string
     * @since 1.0
     */
    public function getAddress()
    {
        $street = get_field('street', 'option');
        $city = get_field('city', 'option');
        $state = get_field('state', 'option');
        $zip = get_field('zip', 'option');

        $address = get_bloginfo('name') . '<br />';
        $address .= $street . '<br />';
        $address .= $city . ', ' . $state . ' ' . $zip;

        return $address;
    }

    /**
     * Get the copyright string
     *
     * @return string
     * @since 1.0
     */
    public function getCopyright()
    {
        return '&copy; ' . date('Y') . ' ' . get_bloginfo('name') . '. All Rights Reserved.';
    }

    /**
     * Return the menu for the header
     *
     * @return array
     */
    public function getMenu()
    {
        $menu = new Menu('footer','primary');
        return $menu->getData();
    }
}