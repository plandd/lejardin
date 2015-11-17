<?php
/**
  * Template Name: Contato
  * @package WordPress
  */
  if(isset($_POST['submited'])) {
    $vNome = false;
    $vEmail = false;
    $vSexo = false;
    $vMsg = false;

    $nome = filter_var($_POST['nome'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);
    $sexo = filter_var($_POST['sexo'],FILTER_SANITIZE_STRING);
    $mensagem = filter_var($_POST['mensagem'],FILTER_SANITIZE_STRING);

    if($nome && !empty($nome))
      $vNome = true;

    if($email && !empty($email))
      $vEmail = true;

    if($sexo && !empty($sexo))
      $vSexo = true;
    
    if($mensagem && !empty($mensagem))
      $vMsg = true;

    if($vNome && $vEmail && $vSexo && $vMsg) {
      $to = get_field('email_contato', 'option');
      if($to && wp_mail( $to, '[Fale conosco] - Contato do site', "Nome: " . $nome . "\n" . "Mensagem: " . $mensagem . "\n" . "Sexo: " . $sexo . "\n" )) {
        wp_redirect( home_url() );
      }
    }
  }

  get_header();
?>
  <section id="contato" class="section-60 small-14 left">
    <div class="row text-center">

      <div class="small-14 large-8 d-iblock">
      
        <header class="divide-40 column text-center">
          <h2 class="secondary font-lite divide-10">Fale Conosco</h2>
          <h5 class="vapor small-14 d-iblock">
            Fale conosco através deste canal enviando para nós suas dúvidas, mensagens e sugestões ou venha nos fazer uma visita. Esperamos vê-lo em breve! 
          </h5>
        </header>

        <div class="form-contato small-14 medium-10 columns">
          
          <form action="<?php the_permalink(); ?>" method="post" class="small-14 left">
            <p class="small-14 left no-margin">
              <label for="nome" class="primary left">Nome:</label>
              <input type="text" name="nome" id="nome" class="left" placeholder="DIGITE SEU NOME" title="Seu nome" required>
            </p>

            <p class="small-14 left no-margin">
              <label for="email" class="primary left">E-mail:</label>
              <input type="email" name="email" id="email" class="left" placeholder="DIGITE SEU E-MAIL" title="Seu nome" required>
            </p>

            <p class="small-14 left no-margin">
              <label class="primary left">Sexo:</label>
              <input type="radio" id="masculino" name="sexo" value="masculino" class="left"><label class="iron left sexo" for="masculino">Masculino</label>
              <input type="radio" id="feminino" name="sexo" value="feminino" class="left"><label class="iron left sexo" for="feminino">Feminino</label>
            </p>

            <p class="small-14 left no-margin">
              <label for="msg" class="primary left">Mensagem:</label>
              <textarea name="mensagem" id="msg" cols="30" rows="5" placeholder="DIGITE SUA MENSAGEM"></textarea>
            </p>

            <p class="small-14 left no-margin">
              <span class="iron left font-small"><input type="checkbox" name="newsletter"> Quero receber informes e novidades do Le Jardin</span>
            </p>

            <p class="small-14 left no-margin">
              <button type="submit" class="button-primary" name="submited">Enviar</button>
            </p>
          </form>

        </div>

        <div class="small-14 medium-4 columns form-info show-for-medium-up">
          <h5 class="primary font-bold">Motel Le Jardin</h5>
          <div class="small-14 left text-left">
            <p class="font-small primary">
              <?php
                echo get_field('lejardin_endereco', 'option') . "<br>";
                echo get_field('lejardin_cidade', 'option') . "<br>";
              ?>
              Fone: <?php
                echo get_field('tel_reservas', 'option');
              ?><br>
              Email: <a href="mailto:<?php echo get_field('email_contato', 'option'); ?>" class="secondary" title="Nosso email"><?php echo get_field('email_contato', 'option'); ?></a>
            </p>
          </div>
          
        </div>

      </div>

    </div>
    
  </section>

<?php
  include get_stylesheet_directory() . "/includes/sections/cliente-vip.php";
  get_footer();
?>
