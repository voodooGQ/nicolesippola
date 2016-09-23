<?php
/**
 * Site Header Partial
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

use NiSi\Landmark\Controller\Header;
use NiSi\Vendor\Twig\Template;

$controller = new Header();
$template = new Template($controller);
$template->render();