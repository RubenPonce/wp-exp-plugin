<?php
/**
 * Plugin Name: Work Experience Plugin
 * Description: This plugin will allow you to create a custom post type for work experience.
 * Version: 1.0
 */


class JobForm
{
    public function __construct()
    {
        // Custom Post Type
        add_action('init', array($this, 'create_custom_post_type'));
        // Assets
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
    }

    public function create_custom_post_type()
    {
        $args= array(
            'labels' => array(
                'name' => __('Work Experience'),
                'singular_name' => __('Job'),
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array('title', 'editor', 'custom-fields'),
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'capability' => 'manage_options',
            'menu_icon' => 'dashicons-businessman',
        );
        register_post_type('work_experience', $args);
    }
    public function enqueue_assets()
    {
        wp_enqueue_script('work-experience-admin', plugin_dir_url(__FILE__) . 'work-experience-admin.js', array('jquery'), null, true);

        wp_enqueue_style(
            'work-experience-admin',
            plugin_dir_url(__FILE__) . '/css/index.css',
            array(),
            '1.0.0',
            'all',
       );
        wp_enqueue_script(
            'work-experience-admin',
            plugin_dir_url(__FILE__) . '/javascript/index.js',
            array(),
            '1.0.0',
            true
        );
    }
}

new JobForm;
?>

