<?php
/**
 * CPT para Suítes
 *
 * @since ModaBiz 1.0
 * @subpackage ModaBiz
 */

function suites_init() {
  $labels = array(
    'name'               => 'Suítes',
    'singular_name'      => 'Suíte',
    'add_new'            => 'Adicionar Nova',
    'add_new_item'       => 'Adicionar nova Suíte',
    'edit_item'          => 'Editar Suíte',
    'new_item'           => 'Nova Suíte',
    'all_items'          => 'Todas as Suítes',
    'view_item'          => 'Ver Suíte',
    'search_items'       => 'Buscar Suítes',
    'not_found'          => 'N&atilde;o encontrada',
    'not_found_in_trash' => 'N&atilde;o encontrada',
    'parent_item_colon'  => '',
    'menu_name'          => 'Suítes'
  );

      $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'suite' ),
        //'menu_icon'           => get_stylesheet_directory_uri() . '/images/works.png',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 2,
        'supports'           => array( 'title','thumbnail' )
      );

    register_post_type( 'suite', $args );
}
add_action( 'init', 'suites_init' );
?>