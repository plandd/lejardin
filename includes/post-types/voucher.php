<?php
/**
 * CPT para Voucher
 *
 * @since ModaBiz 1.0
 * @subpackage ModaBiz
 */

function voucher_init() {
  $labels = array(
    'name'               => 'Voucher',
    'singular_name'      => 'Voucher',
    'add_new'            => 'Adicionar Novo',
    'add_new_item'       => 'Adicionar novo Voucher',
    'edit_item'          => 'Editar Voucher',
    'new_item'           => 'Novo Voucher',
    'all_items'          => 'Todos os Voucher',
    'view_item'          => 'Ver Voucher',
    'search_items'       => 'Buscar Voucher',
    'not_found'          => 'N&atilde;o encontrada',
    'not_found_in_trash' => 'N&atilde;o encontrada',
    'parent_item_colon'  => '',
    'menu_name'          => 'Voucher'
  );

      $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'voucher' ),
        //'menu_icon'           => get_stylesheet_directory_uri() . '/images/works.png',
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 2,
        'supports'           => array( 'title' )
      );

    register_post_type( 'voucher', $args );
}
add_action( 'init', 'voucher_init' );
?>