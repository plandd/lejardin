<!doctype html>
<html class="no-js" lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo('name'); ?> | <?php is_home()?bloginfo('description'):wp_title(''); ?></title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,600' rel='stylesheet' type='text/css'>
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyB664XOo1V2z76RD87sMi4b4nAM1JzKthg&sensor=false'></script>
    <?php $page_cadastro = get_page_by_title('Cadastro VIP'); ?>
    <script>
      //<![CDATA[
      var getData = {
        'urlDir':'<?php bloginfo('template_directory');?>/',
        'ajaxDir':'<?php echo stripslashes(get_admin_url()).'admin-ajax.php';?>',
        'cadastroVip': '<?php echo get_page_link($page_cadastro->ID); ?>'
      }
      //]]>
    </script>
    <?php wp_head(); ?>
  </head>
  <body>
  
    <nav id="offmenu"></nav>

    <nav id="offcanvas" class="bg-primary">
      <header class="small-14 left">
          <h3 class="close-menu"><span class="icon-lejardim_fechar"></span></h3>
      </header>
    </nav>

    <a href="#" class="close-offcanvas def-pos"></a>
    
    <header id="header" class="small-14">

      <div class="row">
        <figure class="small-10 medium-7 large-2 columns">
            <a href="<?php echo home_url(); ?>" title="Página principal" class="less-opacity d-block left"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt=""></a>
        </figure>
        
        <div id="top-phone" class="small-4 columns show-for-large-up end">
            <div class="d-table small-14 left">
                <div class="d-table-cell small-14">
                    <span class="icon-lejardim_phone secondary left"></span>
                    <span class="font-lite font-small">Reservas:</span>
                    <span class="d-block primary">+55 <span class="font-semi-bold"><?php echo get_field('tel_reservas', 'option'); ?></span></span>
                </div>
            </div>
        </div>

          <nav id="main-menu" class="small-8 columns show-for-large-up">
              <div class="d-table small-14 left">
                  <div class="d-table-cell small-14">
                      <ul class="social-top inline-list right">
                          <?php
                            $email = get_field('email_contato', 'option');
                            //social
                            $facebook = get_field('lejardin_facebook', 'option');
                            $twitter = get_field('lejardin_twitter', 'option');
                            $youtube = get_field('lejardin_youtube', 'option');
                            $linkedin = get_field('lejardin_linkdin', 'option');

                            if($email)
                              printf('<li><a href="mailto:%s"><span class="icon-lejardim_mail2 secondary left"></span> <span class="left lh-14">%s</span></a></li>',$email,$email);

                            if($facebook)
                              printf('<li><a href="%s" target="_blank"><span class="icon-lejardim_facebook"></span></a></li>',$facebook);

                            if($twitter)
                              printf('<li><a href="%s" target="_blank"><span class="icon-lejardim_twitter"></span></a></li>',$twitter);

                            if($youtube)
                              printf('<li><a href="%s" target="_blank"><span class="icon-lejardim_youtube"></span></a></li>',$youtube);

                            if($linkedin)
                              printf('<li><a href="%s" target="_blank"><span class="icon-lejardim_linkedin"></span></a></li>',$linkedin);
                          ?>
                      </ul>
                      <ul class="inline-list no-margin right site-menu">
                        <li><a href="#"><span class="icon-lejardim_home"></span></a></li>
                        <?php
                          $defaults = array(
                            'theme_location'  => 'primary',
                            'menu'            => 'Menu principal',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => '',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'primary',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '%3$s',
                            'depth'           => 0,
                            'walker'          => '',
                          );
                          wp_nav_menu($defaults);
                        ?>
                      </ul>
                  </div>
              </div>
          </nav>

          <h1 class="no-margin right show-for-medium-down">
              <span class="icon-lejardim_menu primary show-offcanvas less-opacity"></span>
          </h1>
      </div>
    </header>