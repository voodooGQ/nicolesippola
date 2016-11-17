<?php
/**
 * Site Footer Partial
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

use NiSi\Landmark\Controller\Footer;
use NiSi\Vendor\Twig\Template;

$controller = new Footer();
$template = new Template($controller);
$template->render();