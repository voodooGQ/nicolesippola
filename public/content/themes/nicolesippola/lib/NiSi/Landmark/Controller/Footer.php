<?php
/**
 * Site Footer Controller
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

namespace NiSi\Landmark\Controller;

use NiSi\Vendor\Twig\TwigInterface;
use NiSi\Landmark\Meta\Footer as Meta;

/**
 * Class Footer
 *
 * @package NiSi\Landmark\Controller
 * @author  Shane Smith <voodoogq@gmail.com>
 * @since   1.0
 */
class Footer implements TwigInterface
{
    /**
     * The Twig Template Name
     *
     * @const
     * @type string
     * @since 1.0
     */
    const TWIG_TEMPLATE_NAME = 'landmark/footer';

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
            $meta = new Meta($post->ID);
            $twigData['address'] = $meta->getAddress();
            $twigData['copyright'] = $meta->getCopyright();
            $twigData['menu'] = $meta->getMenu();
            $twigData['social'] = array(
                'facebook' => get_field('facebook', 'option'),
                'twitter'  => get_field('twitter', 'option'),
                'instagram' => get_field('instagram', 'option'),
                'email'     => 'mailto:' . get_field('email', 'option')
            );
        }
        return $twigData;
    }
}