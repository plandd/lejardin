<section id="testimonials" class="small-14 left d-table rel" data-thumb="<?php echo get_stylesheet_directory_uri(); ?>/images/bg-testimonials.jpg">
  <div class="mask abs small-14"></div>
  <div class="d-table-cell small-14 text-center">
    <div class="row">
      <header class="divide-20 column">
        <h1 class="no-margin lh-1"><span class="icon-lejardim_mensagem white"></span></h1>
        <h2 class="white text-up">O que dizem</h2>
      </header>
      
      <div class="small-14 large-12 large-offset-1 columns end white">
      <?php
        $depoimentos = get_field('depoimentos_lista', 'option');
        shuffle($depoimentos);
        $i = 0;
        foreach ($depoimentos as $depoimento):
          $i++; if(2 == $i) break;
      ?>
        <p><?php echo $depoimento['depo_conteudo']; ?></p>
        <p class="no-margin"><i><strong>"<?php echo $depoimento['depo_autor']; ?>"</strong></i></p>
      <?php
        endforeach;
      ?>
      </div>
    </div>
  </div>
</section>