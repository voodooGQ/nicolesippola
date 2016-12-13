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
    /**
     * The twig template name/location
     *
     * @const
     * @type string
     * @since 1.0
     */
    const TWIG_TEMPLATE_NAME = 'service/single';

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
     * Returns the data for Twig
     *
     * @param int $postId
     * @return array
     * @since 1.0
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
            $featuredImageMeta = Image::getImageMeta(get_post_thumbnail_id($id));
            $twigData['archive_image_id']          = $meta->getArchiveImageId();
            $archiveImageMeta = Image::getImageMeta($twigData['archive_image_id']);

            $twigData['featured_image_src']         = $featuredImageMeta['urls']['hero'];
            $twigData['featured_image_src_mobile']  = $featuredImageMeta['urls']['hero_mobile'];
            $twigData['archive_image_src']          = $archiveImageMeta['urls']['square'];
            $twigData['title']                      = $meta->getPostTitle();
            $twigData['permalink']                  = $meta->getPermalink();
            $twigData['content']                    = $meta->getPostContent();
        }

        return $twigData;
    }
}