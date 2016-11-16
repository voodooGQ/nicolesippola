<?php
/**
 * Header File
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

?>
<!DOCTYPE html>
<html class="no-js" lang="en-us">
    <head>
        <!-- NOJS TOGGLE -->
        <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>

        <!-- META DATA -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!--[if IE]><meta http-equiv="cleartype" content="on" /><![endif]-->

        <!-- SEO -->
        <title>
            <?php wp_title(); ?>
        </title>

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="container-site">
            <?php get_template_part('partials/globals/site', 'header'); ?>
            <div class="site-bd container">
