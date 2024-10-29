<?php
/*
   Plugin Name: BBpress Addon For Yoast SEO
   Plugin URI: https://ehospital.in/
   Description: This plugin simply adds required code, so that when Yoast SEO plugin is installed, topics shows meta description correctly.
   Version: 1.3
   Author: Himadri Goswami
   Author URI: https://healthpam.com/
   License: GPL2
   */


add_filter( 'wpseo_metadesc', 'bafys_meta_desc' );
function bafys_meta_desc( $content ) {
    global $post;
    if ( !function_exists( 'bbp_get_topic_content' ) || $post->post_type != 'topic' ) {
        return $content;
    }
    $topic_content = trim( strip_tags( bbp_get_topic_content() ) );
    if ( !empty( $topic_content ) ) {
        return $topic_content;
    }
    return $content;
}

