<?php
/**
 * Frontpage Meta
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

namespace NiSi\Frontpage;

use NiSi\Theme\MetaParent;
use NiSi\Theme\Image;

/**
 * Class Meta
 *
 * @package NiSi\Frontpage\Meta
 * @author  Shane Smith <voodoogq@gmail.com>
 * @since   1.0
 */
class Meta extends MetaParent {
    /**
     * Get the url for the primary logo
     *
     * @return string
     */
    public function getLogoUrl()
    {
        return get_template_directory_uri() . '/assets/media/images/logo.png';
    }

    /**
     * Get an array of carousel images
     *
     * @return array
     */
    public function getCarouselImages()
    {
        $images = array(
            'desktop' => array(),
            'mobile' => array()
        );

        if(have_rows('carousel')) {
            while(have_rows('carousel')) {
                the_row();
                $meta = Image::getImageMeta(get_sub_field('image'));
                array_push($images['desktop'], $meta['urls']['hero']);
                array_push($images['mobile'], $meta['urls']['hero_mobile']);
            }
        }
        return $images;
    }

    public function getPageLinks()
    {
        $pages = array();

        if(have_rows('page_links')) {
            while(have_rows('page_links')) {
                the_row();
                $postID = get_sub_field('page_link')[0];
                $imageMeta = Image::getImageMeta(get_post_thumbnail_id($postID));

                $page = array(
                    'permalink'                 => get_permalink($postID),
                    'title'                     => get_the_title($postID),
                    'featured_image_src_cta'    => $imageMeta['urls']['cta'],
                );

                array_push($pages, $page);
            }
        }
        return $pages;
    }
}