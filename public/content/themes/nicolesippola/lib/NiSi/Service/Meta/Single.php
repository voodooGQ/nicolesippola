<?php
/**
 * The Service Post Meta
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

namespace NiSi\Service\Meta;

use NiSi\Theme\MetaParent;

/**
 *
 * Class Single
 *
 * @package NiSi\Service\Meta
 * @author  Shane Smith <voodoogq@gmail.com>
 * @since   1.0.1
 */
class Single extends MetaParent {
    public function getArchiveImageId()
    {
        return $this->getMeta('archive_image');
    }
}