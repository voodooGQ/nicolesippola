<?php
/**
 * Header Meta
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

namespace NiSi\Landmark\Meta;

use NiSi\Landmark\Controller\Menu;
use NiSi\Theme\MetaParent;

/**
 * Class Header
 *
 * @package NiSi\Post\Meta\Site
 * @author  Shane Smith <voodoogq@gmail.com>
 * @since   1.0.0
 */
class Header extends MetaParent {
    /**
     * Return the menu for the header
     *
     * @return array
     */
    public function getMenu()
    {
        $menu = new Menu('primary','primary');
        return $menu->getData();
    }
}