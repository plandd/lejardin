<?php
/**
  * Template Name: Localização
  * @package WordPress
  */
  get_header();
?>
<section id="map-section" class="small-14 left section-60 rel">
  <header class="divide-20 column text-center">
    <div class="row">
      <div class="small-14 columns">
        <h1 class="secondary font-lite">É muito fácil chegar ao Le Jardin...</h1>
        <p class="font-large vapor">
          <?php echo get_field('local_como', 'option'); ?>
        </p>
        <p class="font-large vapor">
          Veja como chegar ao Le Jardin através do mapa abaixo:
        </p>
      </div>
    </div>
  </header>

  <figure id="map" class="small-14 left" data-lat="<?php echo get_field('local_latitude', 'option'); ?>" data-lng="<?php echo get_field('local_longitude', 'option'); ?>" data-brandicon="https://maps.gstatic.com/mapfiles/ms2/micons/red-dot.png"></figure>

  <div id="map-adderess abs show-for-large-up">
    <div class="row rel">

      <div class="motel-address show-for-large-up">
        <header>
          <h5 class="white font-bold">Motel Le Jardin</h5>
          <p class="white font-small">
            <?php
              echo get_field('lejardin_referencia', 'option');
            ?>
          </p>
          <p class="white font-small">
            <?php
              echo get_field('lejardin_endereco', 'option') . "<br>";
              echo get_field('lejardin_cidade', 'option');
            ?>
          </p>
          <p class="white font-small">
            <?php
              echo get_field('tel_reservas', 'option');
            ?>
          </p>
          <p class="white no-margin">Esperamos vê-lo em breve</p>
        </header>
      </div>

      <nav id="map-btns" class="show-for-large-up">
        <?php
          $pdf_map = get_field('local_pdf', 'option');
          $page = get_page_by_title("Localizacao");

          if($page):
            echo '<a href="'. get_page_link($page->ID) .'" title="Ver mapa ampliado" class="button-primary left">Ver mapa ampliado</a>';
          endif;

          if($pdf_map):
            echo '<a href="'. $pdf_map .'" title="Imprimir mapa em PDF" class="button-primary left" target="_blank">Imprimir mapa em PDF</a>';
          endif;
        ?>
      </nav>
    </div>
  </div>

</section>
<?php
  include get_stylesheet_directory() . "/includes/sections/cliente-vip.php";
  get_footer();
?>
