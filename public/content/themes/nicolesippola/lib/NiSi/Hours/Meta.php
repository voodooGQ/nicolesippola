<?php
/**
 * Hours Template Meta
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

namespace NiSi\Hours;

use NiSi\Theme\MetaParent;

/**
 * Class Meta
 *
 * @package NiSi\Contact\Meta
 * @author  Shane Smith <voodoogq@gmail.com>
 * @since   1.0
 */
class Meta extends MetaParent {
    /**
     * Return an array of days + their corresponding hours.
     *
     * @return array
     */
    public function getHours()
    {
        global $post;

        $days = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
        $hours = array();

        foreach($days as $day) {
            $meta = get_post_meta($post->ID, $day, true);
            if(!empty($meta)) {
                $hours[ucfirst($day)] = $meta;
            }
        }

        return $hours;
    }
}