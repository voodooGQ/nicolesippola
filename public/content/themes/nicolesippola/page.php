<?php
/**
 * General Page Template
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

use NiSi\Page\Controller;
use NiSi\Vendor\Twig\Template;

get_header();
$template = new Template(new Controller());
$template->render();
get_footer();