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
        $_titulo = explode(' ', $titulo);
        $galeria = get_field('suite_galeria');
        $itens = get_field('suite_itens');
        $active = ($titulo == $obj->post_title) ? 'active' : '';
        $promo_id = uniqid();
    ?>
    <div class="a-suite <?php echo $active; ?> small-14" data-suite="<?php echo $_titulo[1]; ?>">
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
            <?php if(get_field('suite_promo_regra',$post->ID) || get_field('suite_promo_validade',$post->ID)): ?>
            <a href="#" title="Sou Cliente VIP" class="button-primary" data-reveal-id="promo-<?php echo $promo_id; ?>">Sou Cliente VIP</a>
            <?php endif; ?>
          </p>
          
          <?php if(get_field('suite_promo_regra',$post->ID) || get_field('suite_promo_validade',$post->ID)): ?>
          <div id="promo-<?php echo $promo_id; ?>" class="reveal-modal medium promo-voucher" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
            <div class="small-14 left voucher-info">
              <header class="divide-40 text-center bg-secondary vip-header">
                <h2 class="white">Voucher para a esta promoção</h2>
              </header>

              <article class="small-14 left text-center">
                <h4 class="primary text-up"><?php the_title(); ?></h4>
                <h5 class="primary">Descrição: <?php echo get_field('suite_promo_desc',$post->ID); ?></h5>
                <?php
                  if(get_field('suite_promo_regra',$post->ID))
                    printf('<p class="secondary no-margin font-medium">Condições: %s</p>',get_field('suite_promo_regra',$post->ID));

                   if(get_field('suite_promo_validade',$post->ID))
                    printf('<p class="secondary no-margin font-medium">Validade: %s</p>',get_field('suite_promo_validade',$post->ID));
                ?>
              </article>

              <div class="small-14 left text-center">
                <div class="divide-20"></div>
                <p class="font-medium vapor">Para receber seu voucher, insira o email cadastrado no campo abaixo:</p>
                <p class="no-margin">
                  <form novalidate="novalidate" class="small-14 large-10 large-offset-2 columns text-center req-vip-voucher">
                    <input type="email" title="Seu email" name="email" placeholder="Digite seu email aqui" required>
                    <a href="#" class="button-primary" data-vouchervip="<?php echo get_the_title( $post->ID ) . " - " . get_field('suite_promo_desc',$post->ID); ?>">Gerar voucher</a>
                  </form>
                </p>
              </div>
            </div>
            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
          </div>
          <?php endif; ?>
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
              $_titulo = explode(' ', $titulo);
              $active = ($titulo == $obj->post_title) ? 'active' : '';
              printf('<li><a href="#" title="" class="%s">%s</a></li>',$active,$_titulo[1]);
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
