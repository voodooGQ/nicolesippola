<?php
/**
 * Update the PHP Error Reporting Level
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0.0
 */

if ( WP_DEBUG ) {
    error_reporting(E_ERROR | E_PARSE);
}