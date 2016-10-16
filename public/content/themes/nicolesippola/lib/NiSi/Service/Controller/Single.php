<?php
/**
 * Service Single Controller
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

namespace NiSi\Service\Controller;

use NiSi\Vendor\Twig\TwigInterface;
use NiSi\Service\Meta\Single as Meta;
use NiSi\Theme\Image as Image;

/**
 * Class Single
 *
 * @package NiSi\Service\Controller;
 * @author  Shane Smith <voodoogq@gmail.com>
 * @since   1.0
 */
class Single implements TwigInterface
{
    const TWIG_TEMPLATE_NAME = 'service/single';

    /**
     * Returns the name of the Twig Template to use
     *
     * @return string
     * @since 1.0.1
     */
    public function getTemplateName()
    {
        return self::TWIG_TEMPLATE_NAME;
    }

    /**
     * Returns the data for Twig
     *
     * @param int $postId
     * @return array
     * @since 1.0.1
     */
    public function getTwigData($postId = null)
    {
        global $post;
        $id = null;

        if(!empty($postId)) {
            $id = $postId;
        } else if($post) {
            $id = $post->ID;
        }

        $twigData = array();

        if($id) {
            $meta = new Meta($id);
            $imageMeta = Image::getImageMeta(get_post_thumbnail_id($post->ID));
            var_dump($imageMeta);
            $twigData['featured_image_src'] = $imageMeta['urls']['hero'];
        }

        return $twigData;
    }
}