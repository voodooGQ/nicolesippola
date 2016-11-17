<?php
/**
 * Service Data Query
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

namespace NiSi\Service;

/**
 * Class Query
 *
 * @package NiSi\Service\Meta
 * @author  Shane Smith <voodoogq@gmail.com>
 * @since   1.0
 */
class Query {
    /**
     * Get all Services
     *
     * @return \WP_Query
     * @since 1.0.1
     */
    public static function allServices()
    {
        $service = Register::getInstance();

        $query = new \WP_Query(array(
            'post_type'         => $service->getPostTypeSlug(),
            'post_status'       => array('publish'),
            'posts_per_page'    => -1,
            'order'             => 'date',
        ));

        wp_reset_query();

        return $query;
    }
}