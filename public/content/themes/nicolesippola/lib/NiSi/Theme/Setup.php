<?php
/**
 * Theme Setup File. Handles the base setup configurations for the theme.
 * Should only be instantiated a single time in the functions.php file
 *
 * @author  Shane Smith <voodoogq@gmail.com>
 * @since   1.0
 */
namespace NiSi\Theme;

/**
 * Theme Setup Class
 *
 * @class   Setup
 * @package NiSi\Theme
 * @since   1.0
 */
class Setup
{
    /**
     * The singleton Instance
     *
     * @var Setup
     * @default null
     * @since   1.0
     */
    private static $instance = null;

    /**
     * Constructor
     *
     * @since 1.0
     */
    public function __construct()
    {
        // Call all WP Actions and Filters
        $this->actions()
            ->filters();
    }

    /**
     * Initialize the Theme Application
     *
     * @return $this
     * @since 1.0
     */
    public function init()
    {
        return $this->registerSupportFeatures();
    }

    /**
     * Returns the singleton instance of the Theme.
     * This keeps the theme class from being instantiated
     * more than once.
     *
     * ex: $setup = \NiSi\Theme\Setup::getInstance();
     *
     * @return $this
     * @since 1.0
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * All actions that need to be run on instantiation of the theme.
     *
     * @return $this
     * @since 1.0
     * @chainable
     */
    protected function actions()
    {
        add_action('after_setup_theme', array(&$this, 'init'));
        add_action('wp_enqueue_scripts', array(&$this, 'enqueueStyles'), 99);
        return $this;
    }

    /**
     * All filters that need to be run on instantiation of the theme.
     *
     * @return $this
     * @since 1.0
     * @chainable
     */
    protected function filters()
    {
        add_filter('image_resize_dimensions', array(new Image(), 'thumbnailUpscale'), 10, 6);
        return $this;
    }

    /**
     * Allows the theme to register support of a certain theme feature.
     *
     * @link  http://codex.wordpress.org/Function_Reference/add_theme_support
     *
     * @return $this
     * @since 1.0.0
     * @chainable
     */
    protected function registerSupportFeatures()
    {
        // Featured Images
        add_theme_support('post-thumbnails');
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Enable support for Post Formats.
        add_theme_support(
            'post-formats',
            array(
                'aside',
                'image',
                'video',
                'quote',
                'link'
            )
        );

        // Enable support for HTML5 markup.
        add_theme_support(
            'html5',
            array(
                'comment-list',
                'search-form',
                'comment-form',
                'gallery',
            )
        );

        return $this;
    }

    /**
     * Enqueue CSS Stylesheets
     *
     * @return $this
     * @since 1.0.0
     * @chainable
     */
    public function enqueueStyles()
    {
        $themeHandle = THEME_SETTINGS['handle'];
        $themeVersion = THEME_SETTINGS['version'];
        $stylesFolder = get_template_directory_uri() . '/assets/styles/';
        $fileType = self::isProd() ? '.min.css' : '.css';

        wp_register_style(
            $themeHandle . '_screen',
            $stylesFolder .  'screen' . $fileType,
            array(),
            $themeVersion,
            'screen, projection'
        );

        wp_enqueue_style($themeHandle . '_screen');
        return $this;
    }

    /**
     * Are we running in the Development environment?
     *
     * @return bool
     * @since 1.0
     */
    public function isDev()
    {
        return THEME_SETTINGS['env'] == 'dev';
    }

    /**
     * Are we running in the Production environment?
     *
     * @return bool
     * @since 1.0
     */
    public function isProd()
    {
        return THEME_SETTINGS['env'] == 'prod';
    }
}
