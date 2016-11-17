<?php
/**
 * Frontpage Meta
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

namespace NiSi\Frontpage;

use NiSi\Theme\MetaParent;

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
}