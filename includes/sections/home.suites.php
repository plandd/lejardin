<section id="suites" class="small-14 left section-60 show-onload">
  <div class="row rel">
    <header class="divide-40 column text-center">
      <h3 class="primary"><span>CONHEÇA NOSSAS ACOMODAÇÕES E</span>
      ESCOLHA A QUE MAIS COMBINA COM VOCÊ</h3>
    </header>

    <nav id="suites-carousel" class="small-14 left">
    <?php
      $args = array( 'posts_per_page' => 20, 'post_type' => 'suite', 'orderby' => 'rand' );
      $planos = get_posts( $args );
      foreach ($planos as $post): setup_postdata( $post );
        global $post;
        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'home.slider.suite');
        $th = (!empty($thumb[0])) ? $thumb[0] : get_stylesheet_directory_uri() . '';
    ?>
      <figure class="column item">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="d-block divide-20 rel white" data-thumb="<?php echo $th; ?>">
          <div class="mask-secondary small-14 abs def-pos d-table">
            <div class="d-table-cell small-14 text-center">
              <span class="icon-lejardim_mais"></span>
              <span class="small-14 left text-up">Mais detalhes</span>
            </div>
          </div>
        </a>

        <figcaption class="small-14 left text-center">
          <h3 class="no-margin"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="secondary text-up"><?php the_title(); ?></a></h3>
          <p class="vapor">A partir de R$ <?php echo get_field('suite_valor'); ?></p>
        </figcaption>
      </figure>
    <?php endforeach; ?>
    </nav>

    <a href="#" class="nav-caroulsel next-roll d-table abs">
      <div class="d-table-cell small-14">
        <span class="secondary icon-lejardim_right_2"></span>
      </div>
    </a>

    <a href="#" class="nav-caroulsel prev-roll d-table abs">
      <div class="d-table-cell small-14">
        <span class="secondary icon-lejardim_left_2"></span>
      </div>
    </a>

  </div>
</section><!-- // suites -->