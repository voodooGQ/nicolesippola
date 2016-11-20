<?php
/**
 * Site Frontpage Controller
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

namespace NiSi\Frontpage;

use NiSi\Vendor\Twig\TwigInterface;

/**
 * Class Footer
 *
 * @package NiSi\Frontpage\Controller
 * @author  Shane Smith <voodoogq@gmail.com>
 * @since   1.0
 */
class Controller implements TwigInterface
{
    /**
     * The Twig Template Name
     *
     * @const
     * @type string
     * @since 1.0
     */
    const TWIG_TEMPLATE_NAME = 'template/frontpage.twig';

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
            $twigData['content'] = $meta->getPostContent();
            $twigData['logo'] = $meta->getLogoUrl();
            $twigData['carousel'] = $meta->getCarouselImages();
            $twigData['pages'] = $meta->getPageLinks();

        }
        return $twigData;
    }
}