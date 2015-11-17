<?php
define('THEME_VERSION', '1.0.4');
define('THEME_ICON', get_stylesheet_directory_uri() . '/images/icon.png');
error_reporting(E_ERROR | E_PARSE);

/**
* Configure funções para campos personalizados da aplicação
*/
define( 'USE_LOCAL_ACF_CONFIGURATION', true ); // apenas conf. local

add_filter('acf/settings/path', 'plandd_acf_path');
function plandd_acf_path( $path ) {
     // update path
     $path = get_stylesheet_directory() . '/includes/acf-pro/';
     // return
     return $path;
}

add_filter('acf/settings/dir', 'plandd_acf_dir');
function plandd_acf_dir( $dir ) {
     // update path
     $dir = get_stylesheet_directory_uri() . '/includes/acf-pro/';
     // return
     return $dir;
}
/**
 * Framework para personalização de campos
 * (custom meta post)
 */
include_once( get_stylesheet_directory() . '/includes/acf-pro/acf.php' );
define( 'ACF_LITE' , true );
//include_once( get_stylesheet_directory() . '/includes/acf/preconfig.php' );

if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page(array(
    'page_title'  => 'Opções gerais do Le Jardin',
    'menu_title'  => 'Le Jardin',
    'menu_slug'   => 'opcoes-gerais',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Seções da página principal',
    'menu_title'  => 'Seções',
    'parent_slug' => 'opcoes-gerais',
  ));
  
  acf_add_options_sub_page(array(
    'page_title'  => 'Slider destaques',
    'menu_title'  => 'Destaques',
    'parent_slug' => 'opcoes-gerais',
  ));  

  acf_add_options_sub_page(array(
    'page_title'  => 'Lista de depoimentos',
    'menu_title'  => 'Depoimentos',
    'parent_slug' => 'opcoes-gerais',
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Construa o mapa',
    'menu_title'  => 'Localização',
    'parent_slug' => 'opcoes-gerais',
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Cadastro de promoções',
    'menu_title'  => 'Promoções',
    'parent_slug' => 'opcoes-gerais',
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Cadastrar tipos de reservas',
    'menu_title'  => 'Reservas',
    'parent_slug' => 'opcoes-gerais',
  ));
}

/**
 * Incorpore scripts essenciais para toda a
 * aplicação
 */
function plandd_scripts() {
  /*
    Folha de estilo base para a aplicação
   */
  wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css', array(), THEME_VERSION, "screen");
    
  /*
    modernizr
  */
  wp_enqueue_script('modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array(), THEME_VERSION);
  
  /*
    Jquery
   */
  wp_deregister_script('jquery');
  wp_register_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', false, THEME_VERSION);
  wp_enqueue_script('jquery');

  /*
    Scripts essenciais minificados em
    um arquivo unico e essenciais para
    o funcionamento do lado cliente
  */
  wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/scripts.js', array(), THEME_VERSION, true);
}
add_action( 'wp_enqueue_scripts', 'plandd_scripts' );

/**
 * thumb support
 */
add_theme_support('post-thumbnails');    
set_post_thumbnail_size( 242, 220, true );
if (function_exists('add_image_size')) {
  add_image_size('home.slider.suite', 407, 220, true);
}

/**
 * Menus
 */
register_nav_menus( array(
    'primary' => __( 'Menu principal',   'plandd' )
) );

/**
 * remover widgets padroes
 */
function remove_dashboard_widgets() {
  remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
  remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
  remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
  remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
  remove_meta_box('dashboard_primary', 'dashboard', 'side');
  remove_meta_box('dashboard_secondary', 'dashboard', 'side');
  remove_meta_box('dashboard_activity', 'dashboard', 'normal');
  remove_meta_box('dashboard_welcome', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

/**
 * CPT Suítes
 * */
include_once( get_stylesheet_directory() . '/includes/post-types/suites.php' );

/**
 * CPT Cliente VIP
 * */
include_once( get_stylesheet_directory() . '/includes/post-types/cliente-vip.php' );

/**
 * CPT Voucher
 * */
include_once( get_stylesheet_directory() . '/includes/post-types/voucher.php' );

/*
    Icones para post-types
    (http://melchoyce.github.io/dashicons/)
    edit.php?post_type=acf
 */
function add_menu_icons_styles(){
?>

<style>
#menu-posts-suite div.wp-menu-image:before {
  content: "\f487";
}
#menu-posts-vip div.wp-menu-image:before {
  content: "\f338";
}
#menu-posts-voucher div.wp-menu-image:before {
  content: "\f524";
}
</style>
 
<?php
}

add_action( 'admin_head', 'add_menu_icons_styles' );

//Cliente Vip
add_action('wp_ajax_nopriv_plandd_cliente_vip', 'plandd_cliente_vip');
add_action('wp_ajax_plandd_cliente_vip', 'plandd_cliente_vip');

function plandd_cliente_vip() {
  $vip_email = $_GET['vip_email'];
  $email = filter_var($vip_email,FILTER_VALIDATE_EMAIL);
  
  if($email) {
    $post_exists = post_exists($email);
    
    if($post_exists) {
      $vip_post = get_page_by_title( $email, 'OBJECT', 'vip' );
      ?>
      <header class="divide-40 text-center bg-secondary vip-header">
        <h2 class="white">Seu email já foi cadastrado</h2>
      </header>
      <p class="vapor text-center">
        Olá <?php echo get_field('vip_nome',$vip_post->ID); ?>. Seu e-mail já consta no nosso banco de dados.<br>
        Obrigado pela sua participação!
      </p>
      <?php
    } else {
      ?>
      <header class="divide-40 text-center bg-secondary vip-header">
        <h2 class="white">Cadastre-se e seja VIP</h2>
      </header>

      <p class="vapor text-center">Basta preencher o cadastro abaixo e você se tornará um Cliente VIP do Motel Le Jardin no mesmo instante, tendo acesso a descontos e promoções exclusivas:</p>

      <p class="text-center divide-10 error-reporting" style="color:#cc0000;"></p>
      
      <div class="small-14 left text-center">
        <form id="form-vip" class="small-14 large-8 d-iblock form-contato">

          <p class="small-14 left no-margin">
            <label for="email" class="primary left">E-mail:</label>
            <input type="email" name="email" id="email" class="left" placeholder="DIGITE SEU E-MAIL" value="<?php echo $vip_email; ?>" title="Seu nome" required>
          </p>

          <p class="small-14 left no-margin">
            <label for="nome" class="primary left">Nome:</label>
            <input type="text" name="nome" id="nome" class="left" placeholder="DIGITE SEU NOME" title="Seu nome" required>
          </p>

          <p class="small-14 left no-margin">
            <label for="sobrenome" class="primary left">Sobrenome:</label>
            <input type="text" name="sobrenome" id="sobrenome" class="left" placeholder="DIGITE SEU SOBRENOME" title="Seu sobrenome" required>
          </p>

          <p class="small-14 left no-margin">
            <label class="primary left">Sexo:</label>
            <input type="radio" id="masculino" name="sexo" value="masculino" class="left"><label class="iron left sexo" for="masculino">Masculino</label>
            <input type="radio" id="feminino" name="sexo" value="feminino" class="left"><label class="iron left sexo" for="feminino">Feminino</label>
          </p>

          <p class="small-14 left no-margin">
            <label for="nascimento" class="primary left">Data de nascimento:</label>
            <input type="text" name="nascimento" id="nascimento" class="left birthday" placeholder="SUA DATA DE NASCIMENTO" title="Seu nascimento" required>
          </p>

          <p class="small-14 left no-margin">
            <button type="submit" class="button-primary req-cliente-vip">Quero ser vip</button>
          </p>

        </form>
      </div>
      <?php
    }

  }
  else {
    echo "Email inválido. Tente novamente.";
  }

  exit();
}

add_action('wp_ajax_nopriv_add_cliente_vip', 'add_cliente_vip');
add_action('wp_ajax_add_cliente_vip', 'add_cliente_vip');

function add_cliente_vip() {
  $serialize = $_GET['serialize'];
  $params = array();
  parse_str($serialize, $params);

  $valNome = false;
  $valSobrenome = false;
  $valEmail = false;
  $valSexo = false;
  $valNascimento = false;

  if(array_key_exists('email', $params) && !empty($params['email'])) {
    $email = filter_var($params['email'],FILTER_VALIDATE_EMAIL);
    if($email) {
      $valEmail = true;
    } else {
      echo 'Seu e-mail é obrigatório'; //email inválido
      exit();
    }
  }

  if(array_key_exists('nome', $params) && !empty($params['nome'])) {
    $nome = filter_var($params['nome'],FILTER_SANITIZE_STRING);
    if(!$nome || strlen($nome) > 300) {
      echo 'Seu nome é obrigatório'; //nome inválido
      exit();
    } else {
      $valNome = true;
    }
  } else {
    echo 'Seu nome é obrigatório'; // o nome é obrigatório
    exit();
  }

  if(array_key_exists('sobrenome', $params) && !empty($params['sobrenome'])) {
    $sobrenome = filter_var($params['sobrenome'],FILTER_SANITIZE_STRING);
    if(!$sobrenome || strlen($sobrenome) > 300) {
      echo 'Seu sobrenome é obrigatório'; //sobrenome inválido
      exit();
    } else {
      $valSobrenome = true;
    }
  } else {
    echo 'Seu sobrenome é obrigatório'; // o sobrenome é obrigatório
    exit();
  }

  if(array_key_exists('sexo', $params) && !empty($params['sexo'])) {
    $sexo = filter_var($params['sexo'],FILTER_SANITIZE_STRING);
    if($sexo) {
      $valSexo = true;
    } else {
      echo 'Marque seu sexo'; //email inválido
      exit();
    }
  }

  if(array_key_exists('nascimento', $params) && !empty($params['nascimento'])) {
    $nascimento = filter_var($params['nascimento'],FILTER_SANITIZE_STRING);

    if(!$nascimento || strlen($nascimento) > 11) {
      echo 'Seu nascimento é obrigatório'; //nascimento inválido
      exit();
    } else {
      $valNascimento = true;
    }

  } else {
    echo 'Seu nascimento é obrigatório'; // o nascimento é obrigatório
    exit();
  }

  if($valNome && $valSobrenome && $valEmail && $valSexo && $valNascimento) {
    $contact_id = wp_insert_post( array(
      "post_title" => $params['email'],
      "post_type" => 'vip',
      "post_status" => 'pending'
    ));
    update_field('vip_email', $email, $contact_id);
    update_field('vip_nome', $nome, $contact_id);
    update_field('vip_sobrenome', $sobrenome, $contact_id);
    update_field('vip_sexo', $sexo, $contact_id);
    update_field('vip_nascimento', $nascimento, $contact_id);
    
    echo "true";
    
    exit();
  }

}

/**
 * Indica ao administrador a quantidade de clientes pendentes
 */
function show_pending_number( $menu ) {
    $type = "vip";
    $status = "pending";
    $num_posts = wp_count_posts( $type, 'readable' );
    $pending_count = 0;
    if ( !empty($num_posts->$status) )
        $pending_count = $num_posts->$status;

    // build string to match in $menu array
    $menu_str = 'edit.php?post_type=' . $type;

    // loop through $menu items, find match, add indicator
    foreach( $menu as $menu_key => $menu_data ) {
        if( $menu_str != $menu_data[2] )
            continue;
        $menu[$menu_key][0] .= " <span class='update-plugins count-$pending_count'><span class='plugin-count'>" . number_format_i18n($pending_count) . '</span></span>';
    }
    return $menu;
}
add_filter( 'add_menu_classes', 'show_pending_number');

//Voucher promoção aberta
add_action('wp_ajax_nopriv_plandd_voucher', 'plandd_voucher');
add_action('wp_ajax_plandd_voucher', 'plandd_voucher');

function plandd_voucher() {
  $promo = $_GET['promo'];
  $tipo = $_GET['tipo'];
  $id_a = uniqid();
  $id_b = uniqid();
  $voucher = $id_a . "&" . $id_b;

  $contact_id = wp_insert_post( array(
    "post_title" => $voucher,
    "post_type" => 'voucher',
    "post_status" => 'publish'
  ));
  update_field('voucher_nome', $promo, $contact_id);
  update_field('voucher_tipo', $tipo, $contact_id);

  $page = get_page_by_title("Voucher individual");

  echo get_page_link( $page->ID ) . "?voucher=" . $voucher;

  exit();
}

//Voucher promoção vips
add_action('wp_ajax_nopriv_plandd_voucher_vip', 'plandd_voucher_vip');
add_action('wp_ajax_plandd_voucher_vip', 'plandd_voucher_vip');

function plandd_voucher_vip() {
  $promo = $_GET['promo'];
  $tipo = $_GET['tipo'];
  $email = $_GET['form_data'];
  $id_a = uniqid();
  $id_b = uniqid();
  $voucher = $id_a . "&" . $id_b;

  //$vip = get_page_by_title( $email, $output, $post_type );
  $vip = $post_exists = post_exists($email);

  if($vip) {
    $contact_id = wp_insert_post( array(
      "post_title" => $voucher . '-' . $email,
      "post_type" => 'voucher',
      "post_status" => 'publish'
    ));
    update_field('vouchervip_nome', $promo, $contact_id);
    update_field('vouchervip_tipo', $tipo, $contact_id);

    $page = get_page_by_title("Voucher individual");
    echo get_page_link( $page->ID ) . "?voucher=" . $voucher;
  } else {
    echo "false";
  }

  exit();
}
?>