<?php
/*
Plugin Name:  Page Words Count
Plugin URI:   https://github.com/navidbakhtiary/WordPress-PWC-Plugin 
Description:  a light plugin for add page words count column to list of pages
Version:      1.0
Author:       Navid Bakhtiary 
Author URI:   https://www.linkedin.com/in/navid-bakhtiary/
*/

add_filter('manage_pages_columns', 'pwc_plugin_add_words_count_column');
add_action('manage_pages_custom_column', 'pwc_plugin_fill_words_count_column', 5, 2);

//filters
function pwc_plugin_add_words_count_column($columns)
{
    $myCustomColumns = array(
        'words_count' => __('Words Count')
    );
    $columns = array_merge($columns, $myCustomColumns);
    return $columns;
}

//actions
function pwc_plugin_fill_words_count_column($column_name, $page_id)
{
    if ($column_name === 'words_count') {
        $page_object = get_page($page_id);
        echo (count(explode(" ", strip_tags($page_object->post_content))));
    }
}
