<?php
  get_header();

    switch (get_field('secao_1', 'option')) {
    	case 'vazio':
    		echo '';
    		break;

    	case 'destaques':
    		include get_stylesheet_directory() . "/includes/sections/home.destaques.php";
    		break;

    	case 'suites':
    		include get_stylesheet_directory() . "/includes/sections/home.suites.php";
    		break;

    	case 'depoimentos':
    		include get_stylesheet_directory() . "/includes/sections/home.depoimentos.php";
    		break;

    	case 'cliente':
    		include get_stylesheet_directory() . "/includes/sections/cliente-vip.php";
    		break;

    	case 'mapa':
    		include get_stylesheet_directory() . "/includes/sections/home.mapa.php";
    		break;
    	
    	default:
    		# code...
    		break;
    }

    switch (get_field('secao_2', 'option')) {
    	case 'vazio':
    		echo '';
    		break;

    	case 'destaques':
    		include get_stylesheet_directory() . "/includes/sections/home.destaques.php";
    		break;

    	case 'suites':
    		include get_stylesheet_directory() . "/includes/sections/home.suites.php";
    		break;

    	case 'depoimentos':
    		include get_stylesheet_directory() . "/includes/sections/home.depoimentos.php";
    		break;

    	case 'cliente':
    		include get_stylesheet_directory() . "/includes/sections/cliente-vip.php";
    		break;

    	case 'mapa':
    		include get_stylesheet_directory() . "/includes/sections/home.mapa.php";
    		break;
    	
    	default:
    		# code...
    		break;
    }

    switch (get_field('secao_3', 'option')) {
    	case 'vazio':
    		echo '';
    		break;

    	case 'destaques':
    		include get_stylesheet_directory() . "/includes/sections/home.destaques.php";
    		break;

    	case 'suites':
    		include get_stylesheet_directory() . "/includes/sections/home.suites.php";
    		break;

    	case 'depoimentos':
    		include get_stylesheet_directory() . "/includes/sections/home.depoimentos.php";
    		break;

    	case 'cliente':
    		include get_stylesheet_directory() . "/includes/sections/cliente-vip.php";
    		break;

    	case 'mapa':
    		include get_stylesheet_directory() . "/includes/sections/home.mapa.php";
    		break;
    	
    	default:
    		# code...
    		break;
    }

    switch (get_field('secao_4', 'option')) {
    	case 'vazio':
    		echo '';
    		break;

    	case 'destaques':
    		include get_stylesheet_directory() . "/includes/sections/home.destaques.php";
    		break;

    	case 'suites':
    		include get_stylesheet_directory() . "/includes/sections/home.suites.php";
    		break;

    	case 'depoimentos':
    		include get_stylesheet_directory() . "/includes/sections/home.depoimentos.php";
    		break;

    	case 'cliente':
    		include get_stylesheet_directory() . "/includes/sections/cliente-vip.php";
    		break;

    	case 'mapa':
    		include get_stylesheet_directory() . "/includes/sections/home.mapa.php";
    		break;
    	
    	default:
    		# code...
    		break;
    }

    switch (get_field('secao_5', 'option')) {
    	case 'vazio':
    		echo '';
    		break;

    	case 'destaques':
    		include get_stylesheet_directory() . "/includes/sections/home.destaques.php";
    		break;

    	case 'suites':
    		include get_stylesheet_directory() . "/includes/sections/home.suites.php";
    		break;

    	case 'depoimentos':
    		include get_stylesheet_directory() . "/includes/sections/home.depoimentos.php";
    		break;

    	case 'cliente':
    		include get_stylesheet_directory() . "/includes/sections/cliente-vip.php";
    		break;

    	case 'mapa':
    		include get_stylesheet_directory() . "/includes/sections/home.mapa.php";
    		break;
    	
    	default:
    		# code...
    		break;
    }

  get_footer();
?>
