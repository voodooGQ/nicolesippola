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
}