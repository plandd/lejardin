<?php
/**
  * Template Name: Promoções
  * @package WordPress
  */
  get_header();
?>

  <section id="promo-section" class="section-60 small-14 left">
    <div class="row">
      
      <header class="divide-40 text-center">
        <h5 class="primary text-up lh-1">As melhores promoções</h5>
        <h3 class="primary text-up">Veja as promoções que o motel Le Jardin tem para você</h3>
      </header>
      
      <?php
        $promos = get_field('promo_lista', 'option');
        if($promos):
      ?>
      <div class="small-14 columns text-center rel promo-content">
        <nav id="promo-nav" class="small-12 large-10 d-iblock promo-slider cycle-slideshow"
          data-cycle-fx="scrollHorz" 
          data-cycle-timeout="6000"
          data-cycle-slides="> figure"
          data-cycle-speed="300"
          data-cycle-prev=".prev-promo"
          data-cycle-next=".next-promo"
          data-cycle-pause-on-hover="false"
          data-cycle-pager=".promo-pager"
          data-cycle-pager-template="<i></i>"
          data-cycle-swipe=true
          data-cycle-swipe-fx=scrollHorz
        >
        <?php
          foreach ($promos as $promo):
            $promo_id = uniqid();
        ?>
          <figure class="small-14 left promo-item rel">
            <header class="left text-left">
              <p class="lh-1 vapor font-small text-up no-margin">Promoções</p>
              <h5 class="secondary font-bold text-up no-margin">Em aberto</h5>
            </header>

            <a href="#" data-reveal-id="promo-<?php echo $promo_id; ?>" class="img small-14 large-12 right rel" title="<?php echo $promo['promo_nome']; ?>" data-thumb="<?php echo $promo['promo_img']; ?>">
              <p><?php echo $promo['promo_nome']; ?></p>
            </a>
            
            <figcaption class="small-14 large-10 text-left right">
              <div class="divide-10"></div>
              <p class="vapor no-margin"><?php echo $promo['promo_desc']; ?></p>
              <p class=""><a href="#" data-reveal-id="promo-<?php echo $promo_id; ?>" class="button-primary no-margin" data-promo>Imprimir voucher</a></p>
            </figcaption>

            <a href="#" data-reveal-id="promo-<?php echo $promo_id; ?>" class="promo-icon d-table abs" title="">
              <span class="d-table-cell small-14 text-center">
                <h1 class="icon-lejardim_calendario vapor"></h1>
                <h6 class="no-margin secondary text-up font-bold"><?php echo $promo['promo_nome']; ?></h6>
              </span>
            </a>

            <div id="promo-<?php echo $promo_id; ?>" class="reveal-modal medium promo-voucher" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
              <div class="small-14 left">
                <header class="divide-40 text-center bg-secondary vip-header">
                  <h2 class="white">Voucher para a esta promoção</h2>
                </header>

                <article class="small-14 left text-center">
                  <h4 class="primary text-up"><?php echo $promo['promo_nome']; ?></h4>
                  <h5 class="primary">Descrição: <?php echo $promo['promo_desc']; ?></h5>
                  <?php
                    if($promo['promo_regra'])
                      printf('<p class="secondary no-margin font-medium">Condições: %s</p>',$promo['promo_regra']);

                     if($promo['promo_validade'])
                      printf('<p class="secondary no-margin font-medium">Validade: %s</p>',$promo['promo_validade']);
                  ?>
                </article>

                <div class="small-14 left text-center">
                  <div class="divide-20"></div>
                  <p class="font-medium vapor">Imprima seu voucher e apresente na entrada do motel</p>
                  <p class="no-margin"><a href="#" class="button-primary no-margin" data-voucher="<?php echo $promo['promo_nome']; ?>">Imprimir voucher</a></p>
                </div>
                
              </div>
              <a class="close-reveal-modal" aria-label="Close">&#215;</a>
            </div>

          </figure>
        <?php
          endforeach;
        ?>
          
          <nav class="promo-pager small-14 left text-right"></nav>
        </nav>

        <a href="#" class="nav-promo next-promo" title="">
          <span class="d-table-cell small-14 text-center">
            <span class="icon-lejardim_right_2"></span>
          </span>
        </a>

        <a href="#" class="nav-promo prev-promo" title="">
          <span class="d-table-cell small-14 text-center">
            <span class="icon-lejardim_left_2"></span>
          </span>
        </a>

      </div>
      <div class="divide-40"></div>
      <?php endif; ?>
      
      <?php
        $promos = get_field('promovip_lista', 'option');
        if($promos):
      ?>
      <div class="small-14 columns text-center rel promo-content">
        <nav id="promo-nav" class="small-12 large-10 d-iblock promo-slider cycle-slideshow"
          data-cycle-fx="scrollHorz" 
          data-cycle-timeout="6000"
          data-cycle-slides="> figure"
          data-cycle-speed="300"
          data-cycle-prev=".prev2-promo"
          data-cycle-next=".next2-promo"
          data-cycle-pause-on-hover="false"
          data-cycle-pager=".promo2-pager"
          data-cycle-pager-template="<i></i>"
          data-cycle-swipe=true
          data-cycle-swipe-fx=scrollHorz
        >
        <?php
          foreach ($promos as $promo):
            $promo_id = uniqid();
        ?>
          <figure class="small-14 left promo-item rel">
            <header class="left text-left">
              <p class="lh-1 vapor font-small text-up no-margin">Promoções para</p>
              <h5 class="secondary font-bold text-up no-margin">Cliente VIP</h5>
            </header>

            <a href="#" data-reveal-id="promo-<?php echo $promo_id; ?>" class="img small-14 large-12 right rel" title="<?php echo $promo['promovip_nome']; ?>" data-thumb="<?php echo $promo['promovip_img']; ?>">
              <p><?php echo $promo['promovip_nome']; ?></p>
            </a>
            
            <figcaption class="small-14 large-10 text-left right">
              <div class="divide-10"></div>
              <p class="vapor no-margin"><?php echo $promo['promovip_desc']; ?></p>
              <p class=""><a href="#" data-reveal-id="promo-<?php echo $promo_id; ?>" class="button-primary no-margin" data-promovip>Imprimir voucher</a></p>
            </figcaption>

            <a href="#" data-reveal-id="promo-<?php echo $promo_id; ?>" class="promo-icon d-table abs" title="">
              <span class="d-table-cell small-14 text-center">
                <h1 class="icon-lejardim_calendario vapor"></h1>
                <h6 class="no-margin secondary text-up font-bold"><?php echo $promo['promovip_nome']; ?></h6>
              </span>
            </a>

            <div id="promo-<?php echo $promo_id; ?>" class="reveal-modal medium promo-voucher" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
              <div class="small-14 left voucher-info">
                <header class="divide-40 text-center bg-secondary vip-header">
                  <h2 class="white">Voucher para a esta promoção</h2>
                </header>

                <article class="small-14 left text-center">
                  <h4 class="primary text-up"><?php echo $promo['promovip_nome']; ?></h4>
                  <h5 class="primary">Descrição: <?php echo $promo['promovip_desc']; ?></h5>
                  <?php
                    if($promo['promovip_regra'])
                      printf('<p class="secondary no-margin font-medium">Condições: %s</p>',$promo['promovip_regra']);

                     if($promo['promovip_validade'])
                      printf('<p class="secondary no-margin font-medium">Validade: %s</p>',$promo['promovip_validade']);
                  ?>
                </article>

                <div class="small-14 left text-center">
                  <div class="divide-20"></div>
                  <p class="font-medium vapor">Para receber seu voucher, insira o email cadastrado no campo abaixo:</p>
                  <p class="no-margin">
                    <form novalidate="novalidate" class="small-14 large-10 large-offset-2 columns text-center req-vip-voucher">
                      <input type="email" title="Seu email" name="email" placeholder="Digite seu email aqui" required>
                      <a href="#" class="button-primary" data-vouchervip="<?php echo $promo['promovip_nome'] ." - ". $promo['promovip_desc']; ?>">Gerar voucher</a>
                    </form>
                  </p>
                </div>
              </div>
              <a class="close-reveal-modal" aria-label="Close">&#215;</a>
            </div>
          </figure>
        <?php
          endforeach;
        ?>
          <nav class="promo2-pager small-14 left text-right"></nav>
        </nav>

        <a href="#" class="nav-promo next2-promo" title="">
          <span class="d-table-cell small-14 text-center">
            <span class="icon-lejardim_right_2"></span>
          </span>
        </a>

        <a href="#" class="nav-promo prev2-promo" title="">
          <span class="d-table-cell small-14 text-center">
            <span class="icon-lejardim_left_2"></span>
          </span>
        </a>

      </div>
      <?php endif; ?>

    </div>
  </section>

  <section id="reservas" class="section-60 small-14 left">
    <div class="row">
      <header class="divide-40 text-center">
        <h2 class="secondary font-lite divide-10">Reservas personalizadas para ocasiões especiais</h2>
        <h5 class="vapor font-lite">
          Agora você pode preparar o clima perfeito para viver momentos inesquecíveis.<br>
          Aquele clima de aventura e selvagem que sai da rotina e redescobre um novo romance em cada um de nós.<br>
          Veja algumas sugestões de decoração e faça a sua:
        </h5>
      </header>

      <nav id="reservas-cards" class="small-14 columns">
        <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-4">
        <?php
          $reservas = get_field('reservas_lista', 'option');
          foreach ($reservas as $res):
        ?>
          <li>
            <header class="small-14 left text-center bg-success">
              <h4 class="font-bold white text-up no-margin"><?php echo $res['res_titulo']; ?></h4>
            </header>
            <nav class="card-items small-14 left">
              <ul class="vapor font-medium">
                <?php
                  $itens = $res['res_itens'];
                  foreach ($itens as $item) {
                    echo "<li>". $item['res_item'] ."</li>";
                  }
                ?>
              </ul>
            </nav>
            <footer class="card-valor small-14 left text-center">
              <h4 class="font-bold success no-margin">R$ <?php echo $res['res_valor']; ?></h4>
            </footer>
          </li>
        <?php
          endforeach;
        ?>
          <li>
            <header class="small-14 left text-center bg-success">
              <h4 class="font-bold white text-up no-margin">reservas</h4>
            </header>
            <div class="reservas-info small-14 left white">
              <h5 class="font-bold white">Motel Le Jardin</h5>
              <p class="font-medium">
               <?php
                  echo get_field('lejardin_endereco', 'option') . "<br>";
                  echo get_field('lejardin_cidade', 'option');
                ?>
              </p>
              <p class="font-medium">Fone: +55 <?php echo get_field('tel_reservas', 'option'); ?></p>
              <p class="font-medium no-margin">Email: <a href="mailto:<?php echo get_field('email_contato', 'option'); ?>"><?php echo get_field('email_contato', 'option'); ?></a></p>
            </div>
            <footer class="card-valor small-14 left text-center info">
              <h5 class="white no-margin">Esperamos vê-lo em breve!</h5>
            </footer>
          </li>
        </ul>
      </nav>

    </div>
    
  </section>

<?php
  include get_stylesheet_directory() . "/includes/sections/cliente-vip.php";
  get_footer();
?>
