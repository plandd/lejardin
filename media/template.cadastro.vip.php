<?php
/**
  * Template Name: Cadastro VIP 2
  * @package WordPress
  */
  get_header();

  ?>
  <section id="contato" class="section-60 small-14 left">
    <div class="row text-center">

      <div class="small-14 large-8 d-iblock">
      
        <header class="divide-40 column text-center">
          <h2 class="secondary font-lite divide-10">Cliente VIP</h2>
          <h5 class="vapor small-14 d-iblock">
            Basta preencher o cadastro abaixo e você se tornará um Cliente VIP do Motel Le Jardin no mesmo instante, tendo acesso a descontos e promoções exclusivas.
          </h5>
        </header>
		
		<div class="small-14 left text-center">
			<div id="cliente-vip" class="form-contato small-14 medium-10 d-iblock">
          
		        <form novalidate="novalidate" id="form-vip" class="small-14 left form-contato">

		          <p class="small-14 left no-margin">
		            <label for="email" class="primary left">E-mail:</label>
		            <input type="email" name="email" id="email" class="left" placeholder="DIGITE SEU E-MAIL" value="<?php echo $vip_email; ?>" title="Seu nome" required>
		          </p>

		          <p class="small-14 left no-margin">
		            <label for="nome" class="primary left">Nome:</label>
		            <input type="text" name="nome" id="nome" class="left" placeholder="DIGITE SEU NOME" title="Seu nome" required>
		          </p>

		          <p class="small-14 left no-margin">
		            <label for="sobrenome" class="primary left">Sobrenome:</label>
		            <input type="text" name="sobrenome" id="sobrenome" class="left" placeholder="DIGITE SEU SOBRENOME" title="Seu sobrenome" required>
		          </p>

		          <p class="small-14 left no-margin">
		            <label class="primary left">Sexo:</label>
		            <input type="radio" id="masculino" name="sexo" value="masculino" class="left"><label class="iron left sexo" for="masculino">Masculino</label>
		            <input type="radio" id="feminino" name="sexo" value="feminino" class="left"><label class="iron left sexo" for="feminino">Feminino</label>
		          </p>

		          <p class="small-14 left no-margin">
		            <label for="nascimento" class="primary left">Data de nascimento:</label>
		            <input type="text" name="nascimento" id="nascimento" class="left birthday" placeholder="SUA DATA DE NASCIMENTO" title="Seu nascimento" required>
		          </p>

		          <p class="small-14 left no-margin">
		            <button type="submit" class="button-primary req-cliente-vip">Quero ser vip</button>
		          </p>

		        </form>

        	</div>
		</div>
        

      </div>

    </div>
    
  </section>
  <?php
  
  get_footer();
?>
