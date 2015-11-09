    <footer id="footer" class="small-14 left section-60">
      <div class="row">
        <div class="small-14 columns">
          <figure class="left">
            <a href="<?php echo home_url(); ?>" title="Página principal" class="less-opacity"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="Motel Le Jardin"></a>
          </figure>
          <address class="left column primary">
            <p><?php echo get_field('lejardin_endereco', 'option'); ?></p>
            <p><a href="<?php echo get_field('lejardin_maps', 'option'); ?>" title="Veja como chegar" class="secondary">Veja como chegar</a></p>
          </address>
          <nav id="social-footer" class="right">
            <ul class="inline-list">
              <?php
                $facebook = get_field('lejardin_facebook', 'option');
                $twitter = get_field('lejardin_twitter', 'option');
                $youtube = get_field('lejardin_youtube', 'option');
                $linkedin = get_field('lejardin_linkdin', 'option');

                if($facebook)
                  printf('<li><h3><a href="%s" target="_blank"><span class="icon-lejardim_facebook"></span></a></h3></li>',$facebook);

                if($twitter)
                  printf('<li><h3><a href="%s" target="_blank"><span class="icon-lejardim_twitter"></span></a></h3></li>',$twitter);

                if($youtube)
                  printf('<li><h3><a href="%s" target="_blank"><span class="icon-lejardim_youtube"></span></a></h3></li>',$youtube);

                if($linkedin)
                  printf('<li><h3><a href="%s" target="_blank"><span class="icon-lejardim_linkedin"></span></a></h3></li>',$linkedin);
              ?>
            </ul>
          </nav>
        </div>
      </div>
    </footer>

    <section id="credits" class="small-14 left">  
      <div class="row">
        <div class="small-14 columns">
          <p class="left small-14"><span class="left">© 2014 Le Jardin Motel. Todos os direitos reservados.
          <?php $page = get_page_by_title("Politica de privacidade"); if($page): ?>
          <a href="<?php echo get_page_link($page->ID); ?>" class="secondary">Política de privacidade</a>
          <?php endif; ?>
          </span> <span class="right"><a href="http://plandc.com.br" title="Site desenvolvido pela Plan" class="icon-lejardim_logo_plan" target="_blank"></a></span></p>
        </div>
      </div>
    </section>

    <?php wp_footer(); ?>
  </body>
</html>