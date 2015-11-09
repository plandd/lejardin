<?php
  $obj = get_queried_object();
  get_header();
?>
  <section id="slide-suites" class="small-14 left">
    
    <div id="green-bar" class="small-6 abs bg-success show-for-large-up"></div>
    <?php
      $args = array( 'posts_per_page' => -1, 'post_type' => 'suite', 'orderby' => 'date' );
      $planos = get_posts( $args );
      $titulos = array();
      foreach ($planos as $post): setup_postdata( $post );
        global $post;
        $titulos[] = get_the_title( $post->ID );
        $titulo = get_the_title( $post->ID );
        $galeria = get_field('suite_galeria');
        $itens = get_field('suite_itens');
        $active = ($titulo == $obj->post_title) ? 'active' : '';
    ?>
    <div class="a-suite <?php echo $active; ?> small-14" data-suite="<?php echo $titulo; ?>">
      <nav id="suites-rooms" class="small-14 large-9 abs cycle-slideshow"
        data-cycle-fx="fade" 
        data-cycle-timeout="6000"
        data-cycle-slides="> figure"
        data-cycle-speed="800"
        data-cycle-prev=".prev-slider"
        data-cycle-next=".next-slider"
        data-cycle-pause-on-hover="false"
        data-cycle-pager=".slider-pager"
        data-cycle-pager-template="<i></i>"
        data-cycle-swipe=true
        data-cycle-swipe-fx=scrollHorz
      >
        <?php
          foreach ($galeria as $foto):
        ?>
        <figure class="small-14 left item" data-thumb="<?php echo $foto['sizes']['large']; ?>"></figure>
        <?php
          endforeach;
        ?>

        <a href="#" class="d-table nav-slider prev-slider abs" title="Anterior">
          <span class="d-table-cell small-14">
            <span class="icon-lejardim_left_2"></span>
          </span>
        </a>
        <a href="#" class="d-table nav-slider next-slider abs" title="Próximo">
          <span class="d-table-cell small-14">
            <span class="icon-lejardim_right_2"></span>
          </span>
        </a>
        
      </nav>

      <nav id="suites-info" class="abs cycle-slideshow">
        <article>
          <header>
            <h2 class="text-up white font-bold"><?php the_title(); ?></h2>
            <p class="white font-normal"><?php echo get_field('suite_descricao'); ?></p>
            <p class="button-white">R$ <?php echo get_field('suite_valor'); ?></p>
          </header>

          <p class="text-up font-bold white font-medium">Itens</p>
          <ul class="white font-medium">
            <?php
              foreach ($itens as $item) {
                printf('<li>%s</li>',$item['suite_item']);
              }
            ?>
          </ul>
          <p>
            <a href="#" title="Sou Cliente VIP" class="button-primary">Sou Cliente VIP</a>
          </p>
        </article>
      </nav>
    </div>
  <?php endforeach; ?>

  </section>

  <nav id="nav-suites" class="small-14 left">
    <div class="row">
      <div class="small-14 columns text-center">
        <ul class="inline-list font-bold d-iblock">
          <li>
            <span class="text-up success">Suítes:</span>
          </li>
          <?php
            foreach ($titulos as $titulo) {
              $active = ($titulo == $obj->post_title) ? 'active' : '';
              printf('<li><a href="#" title="" class="%s">%s</a></li>',$active,$titulo);
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
<?php
  include get_stylesheet_directory() . "/includes/sections/cliente-vip.php";
  get_footer();
?>
