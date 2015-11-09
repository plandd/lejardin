<?php
/**
 * CPT para Suítes
 *
 * @since ModaBiz 1.0
 * @subpackage ModaBiz
 */

function vip_init() {
  $labels = array(
    'name'               => 'VIP',
    'singular_name'      => 'VIP',
    'add_new'            => 'Adicionar Novo',
    'add_new_item'       => 'Adicionar novo VIP',
    'edit_item'          => 'Editar VIP',
    'new_item'           => 'Novo VIP',
    'all_items'          => 'Todos os VIP',
    'view_item'          => 'Ver VIP',
    'search_items'       => 'Buscar VIP',
    'not_found'          => 'N&atilde;o encontrado',
    'not_found_in_trash' => 'N&atilde;o encontrado',
    'parent_item_colon'  => '',
    'menu_name'          => 'Cliente VIP'
  );

      $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'vip' ),
        //'menu_icon'           => get_stylesheet_directory_uri() . '/images/works.png',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 2,
        'supports'           => array( 'title' )
      );

    register_post_type( 'vip', $args );
}
add_action( 'init', 'vip_init' );
?>