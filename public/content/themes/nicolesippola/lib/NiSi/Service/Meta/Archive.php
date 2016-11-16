<?php
/**
 * The Service Archive Post Meta
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

namespace NiSi\Service\Meta;

use NiSi\Theme\MetaParent;
use NiSi\Service\Query;
use NiSi\Service\Controller\Single;

/**
 * Class Archive
 *
 * @package NiSi\Service\Meta
 * @author  Shane Smith <ssmith@nerdery.com>
 * @since   1.0.1
 */
class Archive extends MetaParent
{
    /**
     * Pull in all twig related posts data
     *
     * @return array
     * @since 1.0
     */
    public function getPosts()
    {
        $query = Query::allServices();
        $services = array();

        foreach($query->posts as $service) {
            $controller = new Single();
            array_push($services, $controller->getTwigData($service->ID));
        }
        return $services;
    }
}