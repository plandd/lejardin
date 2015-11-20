<?php
/**
  * Template Name: Voucher
  * @package WordPress
  */
?>
<!doctype html>
<html class="no-js" lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo('name'); ?> | <?php is_home()?bloginfo('description'):wp_title(''); ?></title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,600' rel='stylesheet' type='text/css'>
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyB664XOo1V2z76RD87sMi4b4nAM1JzKthg&sensor=false'></script>
    <script>
      //<![CDATA[
      var getData = {
        'urlDir':'<?php bloginfo('template_directory');?>/',
        'ajaxDir':'<?php echo stripslashes(get_admin_url()).'admin-ajax.php';?>'
      }
      //]]>
    </script>
    <?php wp_head(); ?>
  </head>
  <body>
    <?php 
      $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      $arr = explode('voucher=', $url);
    ?>
    <div class="row">
      <header class="small-14 columns text-center bg-secondary vip-header">
        <h4 class="white">Seu voucher individual:</h4>
        <h2 class="white"><?php echo $arr[1]; ?></h2>
      </header>

      <article class="small-14 columns text-center">
        <div class="divide-40"></div>
        <p>Imprima seu voucher e apresente na entrada do motel.</p>
        <p class="left">
          <a href="<?php echo home_url(); ?>" title="Voltar para a página principal" class="button-primary">Voltar para a página principal</a>
        </p>

        <p class="right">
          <a href="#" onclick="window.print();" title="Imprimir" class="button-primary">Imprimir</a>
        </p>

        <p>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="">
        </p>
      </article>
    </div>
    
  </body>
</script>
