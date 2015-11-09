 <section id="home-slider" class="small-14 left text-center">
    <div class="load-slide d-table small-14 abs def-pos">
      <div class="d-table-cell small-14 text-center">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/loading.gif" alt="">
      </div>
    </div>
    <nav class="small-14 left cycle-slideshow show-onload"
      data-cycle-fx="fade" 
      data-cycle-timeout="6000"
      data-cycle-slides="> figure"
      data-cycle-speed="800"
      data-cycle-prev=".prev-slider"
      data-cycle-next=".next-slider"
      data-cycle-pause-on-hover="false"
      data-cycle-pager=".slider-pager"
      data-cycle-pager-template="<i></i>"
      data-cycle-swipe="true"
      data-cycle-swipe-fx="scrollHorz"
    >
    <?php
      $sliders = get_field('slider_destaques', 'option');
      foreach ($sliders as $slide):
    ?>
      <figure class="small-14 left item" data-thumb="<?php echo $slide['destaque_img']; ?>">
          <a href="<?php echo $slide['destaque_url']; ?>" class="grad-mask small-14 abs def-pos d-block">
              <div class="row">
                  <div class="d-table-cell small-14">
                    <div class="small-14 large-3 large-offset-2 columns">
                      <hgroup class="small-14 left small-text-center large-text-right">
                        <h2 class="text-up white font-bold no-margin lh-1"><?php echo $slide['destaque_titulo']; ?></h2>
                        <h5 class="white divide-20 font-lite lh-1"><span class="small-14 large-10 right"><?php echo $slide['destaque_descricao']; ?></span></h5>
                        <h5 class="small-14 left">
                          <span class="button-white radius"><?php echo $slide['destaque_btn']; ?></span>
                        </h5>
                      </hgroup>
                    </div>
                  </div>
              </div>
          </a>
      </figure>
      
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

      <div class="slider-pager d-iblock"></div>
    </nav>
    
    <!--<div id="user-bar" class="small-14 abs text-center show-for-large-up">
      <div class="row usb">
        <div class="small-14 columns">
          <ul class="small-block-grid-4">
            <li>
              <a href="#" title="" class="d-table small-14 left white rel">
                <div class="d-table-cell small-14">
                  <span class="icon-lejardim_calendario d-block left"></span>
                  
                  <span class="d-block right text-left promo">
                    <span class="caption-small">Promoções especiais para</span>
                    <span class="caption-large text-up font-bold">Datas especiais</span>
                  </span>
                </div>

                <div class="d-table small-14 abs" data-thumb="images/promo.jpg">
                  <div class="mask small-14 abs def-pos"></div>
                  <div class="d-table-cell small-14 rel text-center">
                    <span class="text-up button-glass">Ver promoções</span>
                  </div>
                </div>
              </a>
            </li>

            <li>
              <a href="#" title="" class="d-table small-14 left white">
                <div class="d-table-cell small-14">
                  <span class="icon-lejardim_perfil d-block left"></span>
                  
                  <span class="d-block right text-left promo">
                    <span class="caption-small">Cadastre-se e seja um</span>
                    <span class="caption-large text-up font-bold">Cliente Vip</span>
                  </span>
                </div>

                <div class="d-table small-14 abs" data-thumb="images/promo2.jpg">
                  <div class="mask small-14 abs def-pos"></div>
                  <div class="d-table-cell small-14 rel text-center">
                    <span class="text-up button-glass">Ver promoções</span>
                  </div>
                </div>
              </a>
            </li>

            <li>
              <a href="#" title="" class="d-table small-14 left white">
                <div class="d-table-cell small-14">
                  <span class="icon-lejardim_ticket-27 d-block left"></span>
                  
                  <span class="d-block right text-left promo">
                    <span class="caption-small">Reservas personalizadas</span>
                    <span class="caption-large text-up font-bold">Ocasiões especiais</span>
                  </span>
                </div>

                <div class="d-table small-14 abs" data-thumb="images/promo3.jpg">
                  <div class="mask small-14 abs def-pos"></div>
                  <div class="d-table-cell small-14 rel text-center">
                    <span class="text-up button-glass">Ver promoções</span>
                  </div>
                </div>
              </a>
            </li>

            <li>
              <a href="#" title="" class="d-table small-14 left white">
                <div class="d-table-cell small-14">
                  <span class="icon-lejardim_tempo d-block left"></span>
                  
                  <span class="d-block right text-left promo">
                    <span class="caption-small">Chegue mais cedo e ganhe</span>
                    <span class="caption-large text-up font-bold">Um drink especial</span>
                  </span>
                </div>

                <div class="d-table small-14 abs" data-thumb="images/promo4.jpg">
                  <div class="mask small-14 abs def-pos"></div>
                  <div class="d-table-cell small-14 rel text-center">
                    <span class="text-up button-glass">Ver promoções</span>
                  </div>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>-->
</section><!-- // slider -->
<!--<section id="user-gui" class="small-14 left section-60 show-for-medium-down">
  <div class="row">
    
    <figure class="small-14 medium-7 columns">
      <a href="#" class="d-table small-14 left rel white" data-thumb="images/promo.jpg">
        <div class="mask small-14 abs def-pos"></div>
        <div class="d-table-cell small-14">
          <span class="icon-lejardim_calendario d-block left"></span>
          
          <span class="d-block right text-left promo">
            <span class="caption-small">Promoções especiais para</span>
            <span class="caption-large text-up font-bold">Datas especiais</span>
          </span>
        </div>
      </a>
    </figure>

    <figure class="small-14 medium-7 columns">
      <a href="#" class="d-table small-14 left rel white" data-thumb="images/promo2.jpg">
        <div class="mask small-14 abs def-pos"></div>
        <div class="d-table-cell small-14">
           <span class="icon-lejardim_perfil d-block left"></span>
          
          <span class="d-block right text-left promo">
            <span class="caption-small">Cadastre-se e seja um</span>
            <span class="caption-large text-up font-bold">Cliente Vip</span>
          </span>
        </div>
      </a>
    </figure>

    <figure class="small-14 medium-7 columns">
      <a href="#" class="d-table small-14 left rel white" data-thumb="images/promo3.jpg">
        <div class="mask small-14 abs def-pos"></div>
        <div class="d-table-cell small-14">
         <span class="icon-lejardim_ticket-27 d-block left"></span>
          
          <span class="d-block right text-left promo">
            <span class="caption-small">Reservas personalizadas</span>
            <span class="caption-large text-up font-bold">Ocasiões especiais</span>
          </span>
        </div>
      </a>
    </figure>

    <figure class="small-14 medium-7 columns">
      <a href="#" class="d-table small-14 left rel white" data-thumb="images/promo4.jpg">
        <div class="mask small-14 abs def-pos"></div>
        <div class="d-table-cell small-14">
          <span class="icon-lejardim_tempo d-block left"></span>
                  
          <span class="d-block right text-left promo">
            <span class="caption-small">Chegue mais cedo e ganhe</span>
            <span class="caption-large text-up font-bold">Um drink especial</span>
          </span>
        </div>
      </a>
    </figure>
    

  </div>
</section>--><!-- // links uteis -->